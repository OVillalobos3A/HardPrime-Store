<?php
require_once('../../helpers/dashboard/database.php');
require_once('../../helpers/dashboard/validator.php');
require_once('../../models/empleados.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_name("dashboard");
    session_start();
    // Se instancia la clase correspondiente.
    $usuario = new Empleados;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'error' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        $fechaGuardada = $_SESSION["ultimoAcceso"];
        $ahora = date("Y-n-j H:i:s");
        $tiempo_transcurrido = (strtotime($ahora) - strtotime($fechaGuardada));
        switch ($_GET['action']) {
            case 'logOut':
                if (session_destroy()) {
                    $result['status'] = 1;
                    $result['message'] = 'Sesión eliminada correctamente';
                } else {
                    $result['exception'] = 'Ocurrió un problema al cerrar la sesión';
                }
                break;
            //Método para consultar la existencia de empleados
            case 'readAll':
                if ($result['dataset'] = $usuario->readAll()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay empleados registrados';
                    }
                }
                break;
                //Método para cerrar sesión en caso de inactividad
                case 'timeOut':               
                    //comparamos el tiempo transcurrido
                    if ($tiempo_transcurrido >= 500) {
                        $result['status'] = 1;
                        //si pasaron 5 minutos o más
                        session_destroy(); // destruyo la sesión                    
                        //sino, actualizo la fecha de la sesión
                    } else {
                        $_SESSION["ultimoAcceso"] = $ahora;
                    }
                    break;
            //Método para consultar la existencia de empleados sin tener en cuenta la existencia del usuario root
            case 'readAll2':
                if ($result['dataset'] = $usuario->readAll2()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay empleados registrados';
                    }
                }
                break;
                 //Método para consultar la informacion del historial de sesiones del usuario.
                 case 'readSesiones':
                    if ($usuario->setId($_SESSION['id_usuario'])) {
                        if ($result['dataset'] = $usuario->readSesiones()) {
                            $result['status'] = 1;
                        } else {
                            if (Database::getException()) {
                                $result['exception'] = Database::getException();
                            } else {
                                $result['exception'] = 'Usuario inexistente';
                            }
                        }
                    } else {
                        $result['exception'] = 'Usuario incorrecto';
                    }
                    break;
            //Método para buscar un empleado
            case 'search':
                $_POST = $usuario->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $usuario->searchRows($_POST['search'])) {
                        $result['status'] = 1;
                        $rows = count($result['dataset']);
                        if ($rows > 1) {
                            $result['message'] = 'Se encontraron ' . $rows . ' coincidencias';
                        } else {
                            $result['message'] = 'Solo existe una coincidencia';
                        }
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay coincidencias';
                        }
                    }
                } else {
                    $result['exception'] = 'Ingrese un valor para buscar';
                }
                break;
            //Método para crear un empleado
            case 'create':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setNombre($_POST['nombre'])) {
                    if ($usuario->setApellido($_POST['apellido'])) {
                        if ($usuario->setCorreo($_POST['correo'])) {
                            if ($usuario->setTel($_POST['telefono'])) {
                                if ($usuario->setGen($_POST['genero'])) {
                                    if ($usuario->setFecha($_POST['fecha'])) {
                                        if ($usuario->setEstado($_POST['estado'])) {
                                            if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
                                                if ($usuario->setImagen($_FILES['imagen'])) {
                                                    if ($usuario->createRow()) {
                                                        $result['status'] = 1;
                                                        if ($usuario->saveFile($_FILES['imagen'], $usuario->getRuta(), $usuario->getImagen())) {
                                                            $result['message'] = 'Empleado creado correctamente';
                                                        } else {
                                                            $result['message'] = 'Empleado creado pero no se guardó la imagen';
                                                        }
                                                    } else {
                                                        $result['exception'] = Database::getException();;
                                                    }
                                                } else {
                                                    $result['exception'] = $usuario->getImageError();
                                                }
                                            } else {
                                                $result['exception'] = 'Seleccione una imagen';
                                            }
                                        } else {
                                            $result['exception'] = 'Estado no seleccionado';
                                        }
                                    } else {
                                        $result['exception'] = 'Fecha incorrecta';
                                    }
                                } else {
                                    $result['exception'] = 'Genero no seleccionado';
                                }
                            } else {
                                $result['exception'] = 'Teléfono incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Formato de correo incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Apellidos incorrectos';
                    }
                } else {
                    $result['exception'] = 'Nombres incorrectos';
                }
                break;
            //Método para consultar la existencia de un empleado
            case 'readOne':
                if ($usuario->setId($_POST['id_empleado'])) {
                    if ($result['dataset'] = $usuario->readOne()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Empleado inexistente';
                        }
                    }
                } else {
                    $result['exception'] = 'Empleado incorrecto';
                }
                break;
            //Método para consultar si el empleado nunca ha utilizado el sistema
            //Validación de primer uso
            case 'readPrimerUso':
                if ($usuario->setId($_SESSION['id_usuario'])) {
                    $usuario->primerUso();
                    if ($usuario->getPrimer_uso() == 1) {
                        $result['status'] = 1;
                        $result['message'] = 'Se debe modificar la contraseña por defecto.';
                    } else {
                    }
                } else {
                    $result['exception'] = 'Usuario Inexistente';
                }
                break;
            //Método para consultar la información del empleado que ha iniciado sesión
            //y mostrarla en la página de bienvenida
            case 'openName':
                if ($result['dataset'] = $usuario->readOne1()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'Empleado inexistente';
                    }
                }
                break;
            //Método para consultar la información del empleado para mandarla al modal
            case 'readEmfileds':
                if ($result['dataset'] = $usuario->readEmfileds()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'Empleado inexistente';
                    }
                }
                break;
            //Método para cambiar la contraseña por defecto
            case 'updatePass':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setId($_SESSION['id_usuario'])) {
                    if ($_POST['primer_contra'] == $_POST['primer_contra2']) {
                        if ($usuario->setClave($_POST['primer_contra'])) {
                            if ($usuario->changePass()) {
                                $result['status'] = 1;
                                $result['message'] = 'La contraseña se guardó correctamente';
                            }
                        } else {
                            $result['exception'] = 'La contraseña es incorrecta.';
                        }
                    } else {
                        $result['exception'] = 'Las contraseñas no coinciden';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            //Método para actualizar un empleado
            case 'update':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setId($_POST['id_empleado'])) {
                    if ($data = $usuario->readOne()) {
                        if ($usuario->setNombre($_POST['nombre'])) {
                            if ($usuario->setApellido($_POST['apellido'])) {
                                if ($usuario->setCorreo($_POST['correo'])) {
                                    if ($usuario->setTel($_POST['telefono'])) {
                                        if ($usuario->setGen($_POST['genero'])) {
                                            if ($usuario->setFecha($_POST['fecha'])) {
                                                if ($usuario->setEstado($_POST['estado'])) {
                                                    if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
                                                        if ($usuario->setImagen($_FILES['imagen'])) {
                                                            if ($usuario->updateRow($data['imagen'])) {
                                                                $result['status'] = 1;
                                                                if ($usuario->saveFile($_FILES['imagen'], $usuario->getRuta(), $usuario->getImagen())) {
                                                                    $result['message'] = 'Empleado modificado correctamente';
                                                                } else {
                                                                    $result['message'] = 'Empleado modificado pero no se guardó la imagen';
                                                                }
                                                            } else {
                                                                $result['exception'] = Database::getException();
                                                            }
                                                        } else {
                                                            $result['exception'] = $usuario->getImageError();
                                                        }
                                                    } else {
                                                        if ($usuario->updateRow($data['imagen'])) {
                                                            $result['status'] = 1;
                                                            $result['message'] = 'Empleado modificado correctamente';
                                                        } else {
                                                            $result['exception'] = Database::getException();
                                                        }
                                                    }
                                                } else {
                                                    $result['exception'] = 'El estado es incorrecto.';
                                                }
                                            } else {
                                                $result['exception'] = 'La fecha es incorrecta';
                                            }
                                        } else {
                                            $result['exception'] = 'Genero incorrecto';
                                        }
                                    } else {
                                        $result['exception'] = 'El teléfono es invalido';
                                    }
                                } else {
                                    $result['exception'] = 'Correo invalido';
                                }
                            } else {
                                $result['exception'] = 'Apellidos incorrectos';
                            }
                        } else {
                            $result['exception'] = 'Nombre incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Empleado inexistente';
                    }
                } else {
                    $result['exception'] = 'Empleado incorrecto';
                }
                break;
            //Método para actualizar la información del empleado que se encuentra iniciado sesión
            case 'updateProfile':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setId($_POST['id_empleado'])) {
                    if ($data = $usuario->readOne()) {
                        if ($usuario->setNombre($_POST['nombre'])) {
                            if ($usuario->setApellido($_POST['apellido'])) {
                                if ($usuario->setCorreo($_POST['correo'])) {
                                    if ($usuario->setTel($_POST['tel'])) {
                                        if (is_uploaded_file($_FILES['archivo']['tmp_name'])) {
                                            if ($usuario->setImagen($_FILES['archivo'])) {
                                                if ($usuario->updateRowProfile($data['imagen'])) {
                                                    $result['status'] = 1;
                                                    if ($usuario->saveFile($_FILES['archivo'], $usuario->getRuta(), $usuario->getImagen())) {
                                                        $result['message'] = 'Perfil actualizado correctamente';
                                                    } else {
                                                        $result['message'] = 'Perfil actualizado pero no se guardó la imagen';
                                                    }
                                                } else {
                                                    $result['exception'] = Database::getException();
                                                }
                                            } else {
                                                $result['exception'] = $usuario->getImageError();
                                            }
                                        } else {
                                            if ($usuario->updateRowProfile($data['imagen'])) {
                                                $result['status'] = 1;
                                                $result['message'] = 'Perfil actualizado correctamente';
                                            } else {
                                                $result['exception'] = Database::getException();
                                            }
                                        }
                                    } else {
                                        $result['exception'] = 'Teléfono incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Correo incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Apellidos incorrectos';
                            }
                        } else {
                            $result['exception'] = 'Nombres incorrectos';
                        }
                    } else {
                        $result['exception'] = 'Empleado inexistente';
                    }
                } else {
                    $result['exception'] = 'Empleado incorrecto';
                }
                break;
            //Método para actualizar las credenciales del empleado 
            //que ha iniciado sesión
            case 'updateUserCredentials':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setId($_POST['id_usuario'])) {
                    if ($data = $usuario->readOneuser()) {
                        if ($usuario->setAlias($_POST['alias'])) {
                            if ($_POST['ncontra'] != '' && $_POST['ncontra1'] != '') {
                                if ($_POST['ncontra'] == $_POST['ncontra1']) {
                                    if ($_POST['contra'] != $_POST['ncontra']) {
                                        if ($_POST['alias'] != $_POST['ncontra']) {
                                            if ($usuario->checkPassword($_POST['contra'])) {
                                                if ($usuario->setClave($_POST['ncontra'])) {
                                                    if ($usuario->updateUserCredentials()) {
                                                        if ($usuario->changeDate()) {
                                                            $result['status'] = 1;
                                                            $result['message'] = 'Credenciales actualizadas correctamente';
                                                        } else {
                                                            $result['exception'] = Database::getException();
                                                        }    
                                                    } else {
                                                        $result['exception'] = Database::getException();
                                                    }
                                                } else {
                                                    $result['exception'] = $usuario->getPasswordError();
                                                }
                                            } else {
                                                if (Database::getException()) {
                                                    $result['exception'] = Database::getException();
                                                } else {
                                                    $result['exception'] = 'Clave incorrecta';
                                                }
                                            }
                                        } else {
                                            $result['exception'] = 'Ingrese una contraseña diferente a su nombre de usuario';
                                        }
                                    } else {
                                        $result['exception'] = 'Ingrese una contraseña diferente a la actual';
                                    }
                                } else {
                                    $result['exception'] = 'Contraseñas diferentes';
                                }
                            } else {
                                if ($usuario->checkPassword($_POST['contra'])) {
                                    if ($usuario->updateUserCredentials2()) {
                                        $result['status'] = 1;
                                        $result['message'] = 'Credenciales actualizadas correctamente';
                                    } else {
                                        $result['exception'] = Database::getException();
                                    }
                                } else {
                                    if (Database::getException()) {
                                        $result['exception'] = Database::getException();
                                    } else {
                                        $result['exception'] = 'Clave incorrecta';
                                    }
                                }
                            }
                        } else {
                            $result['exception'] = 'Alias incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            //Método para eliminar un empleado
            case 'delete':
                // if ($_POST['id_empleado'] != $_SESSION['id_empleado']) {
                if ($usuario->setId($_POST['id_empleado'])) {
                    if ($data = $usuario->readOne()) {
                        if ($usuario->deleteRow()) {
                            $result['status'] = 1;
                            if ($usuario->deleteFile($usuario->getRuta(), $data['imagen'])) {
                                $result['message'] = 'Empleado eliminado correctamente';
                            } else {
                                $result['message'] = 'Empleado eliminado pero no se borró la imagen';
                            }
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Empleado inexistente';
                    }
                } else {
                    $result['exception'] = 'Empleado incorrecto';
                }
                // } else {
                //   $result['exception'] = 'No se puede eliminar a sí mismo';
                //}
                break;
                //Metodo para la grafica tipo donut cantidad de productos por marcas
            case 'cantidadProductosMarcas':
                if ($result['dataset'] = $usuario->cantidadProductosMarcas()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay datos disponibles';
                    }
                }
                break;
                //Metodo para la grafica de pastel cantidad de productos por marcas
            case 'cantidadProductosCategoria':
                if ($result['dataset'] = $usuario->cantidadProductosCategoria()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay datos disponibles';
                    }
                }
                break;
                //Metodo para la grafica de barras para la calificacion de los productos
            case 'calificacionProductos':
                if ($result['dataset'] = $usuario->calificacionProductos()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay datos disponibles';
                    }
                }
                break;
                //Metodo para la grafica lineal para visulizar el progreso de los que se han entregado
            case 'fechaPedidos':
                if ($result['dataset'] = $usuario->fechaPedidos()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay datos disponibles';
                    }
                }
                break;
                //Metodo para la grafica polar para visulizar los productos más vendidos
            case 'ProductosVendidos':
                if ($result['dataset'] = $usuario->productosVendidos()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay datos disponibles';
                    }
                }
                break;
            default:
                $result['exception'] = 'Acción no disponible dentro de la sesión';
        }
    } else {
        // Se compara la acción a realizar cuando el administrador no ha iniciado sesión.
        switch ($_GET['action']) {
            //Método para consultar la existencia de la cantidad de empleados
            case 'readAll':
                if ($usuario->readAll()) {
                    $result['status'] = 1;
                    $result['message'] = 'Existe al menos un usuario registrado';
                } else {
                    if (Database::getException()) {
                        $result['error'] = 1;
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No existen usuarios registrados';
                    }
                }
                break;
            //Método para crear el primer usuario.
            case 'peme':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setNombre($_POST['nombre'])) {
                    if ($usuario->setApellido($_POST['apellido'])) {
                        if ($usuario->setCorreo($_POST['correo'])) {
                            if ($usuario->setTel($_POST['tel'])) {
                                if ($usuario->setFecha($_POST['fecha'])) {
                                    if ($usuario->setGen($_POST['gen'])) {
                                        if ($usuario->setAlias($_POST['alias'])) {
                                            if ($_POST['clave1'] == $_POST['clave2']) {
                                                if ($usuario->setClave($_POST['clave1'])) {
                                                    if (is_uploaded_file($_FILES['archivo']['tmp_name'])) {
                                                        if ($usuario->setImagen($_FILES['archivo'])) {
                                                            if ($usuario->createFirstEmp()) {
                                                                if ($usuario->saveFile($_FILES['archivo'], $usuario->getRuta(), $usuario->getImagen())) {
                                                                    if ($usuario->firstUser()) {
                                                                        $result['status'] = 1;
                                                                        $result['message'] = 'Se han ingresado correctamente los datos';
                                                                    } else {
                                                                        $result['exception'] = Database::getException();
                                                                        $result['message'] = 'Error desconocido';
                                                                    }
                                                                } else {
                                                                    $result['message'] = 'Empleado creado pero no se guardó la imagen';
                                                                }
                                                            } else {
                                                                $result['exception'] = Database::getException();
                                                            }
                                                        } else {
                                                            $result['exception'] = $usuario->getImageError();
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Seleccione foto de perfil';
                                                    }
                                                } else {
                                                    $result['exception'] = $usuario->getPasswordError();
                                                }
                                            } else {
                                                $result['exception'] = 'Claves diferentes';
                                            }
                                        } else {
                                            $result['exception'] = 'Usuario incorrecto';
                                        }
                                    } else {
                                        $result['exception'] = 'Género incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Fecha incorrecta';
                                }
                            } else {
                                $result['exception'] = 'Teléfono incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Correo incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Apellidos incorrectos';
                    }
                } else {
                    $result['exception'] = 'Nombres incorrectos';
                }
                break;
            case 'changePass':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setId($_SESSION['id_user'])) {
                    if ($_POST['clave'] == $_POST['confirmar']) {
                        if ($_POST['clave'] != $_SESSION['usuaio']) {
                            if ($_POST['clave'] != $_SESSION['pass']) {
                                if ($usuario->setClave($_POST['clave'])) {
                                    if ($usuario->changePassw()) {
                                        if ($usuario->changeDate()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'La contraseña se guardó correctamente';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    } else {
                                        $result['exception'] = Database::getException();
                                    }
                                } else {
                                    $result['exception'] = $usuario->getPasswordError();
                                }
                            } else {
                                $result['exception'] = 'La contraseña no tiene que ser la misma que la anterior.';
                            }      
                        } else {
                            $result['exception'] = 'Las contraseña no debe de ser igual al nombre de usuario.';
                        }    
                    } else {
                        $result['exception'] = 'Las contraseñas no coinciden';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            //Método para el proceso de login para los empleados(dashboard)
            case 'logIn':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->checkUser($_POST['alias'])) {
                    //$usuario->primerUso();
                    //if ($usuario->getPrimer_uso() == '2') {
                    if ($usuario->checkPassword($_POST['clave'])) {
                        $_SESSION['pass'] = $_POST['clave'];
                        $_SESSION['fecha'] = $usuario->getFecha();
                        $_SESSION['usuaio'] = $usuario->getAlias();
                        $_SESSION['cant'] = $usuario->getCant();
                        if ($_SESSION['cant'] >= 90) {
                            $result['message'] = 'Han pasado un período largo desde su último cambio de contraseña, es hora de renovar tus credenciales.';
                            $result['status'] = 3;
                            $_SESSION['id_user'] = $usuario->getId();
                        } else {
                            $_SESSION['id_usuario'] = $usuario->getId();
                            $result['message'] = 'Autenticación correcta';
                            $result['status'] = 1;
                            //sesion que captura la fecha y hora del inicio de sesión
                            $_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s");
                            $user_agent = $_SERVER['HTTP_USER_AGENT'];
                            //Se establece la zona horaria y se obtiene la fecha y hora actual
                            date_default_timezone_set('America/El_Salvador');
                            $DateAndTime = date('m-d-Y h:i:s a', time());
                            $plataforma = $usuario->getPlatform($user_agent);
                            //Se registra ingresan los datos en la base de datos
                            $usuario->registrarSesion($DateAndTime, $plataforma, $_SESSION['id_usuario']);
                        }
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Clave incorrecta';
                        }
                    }
                    //}else{
                    //  $result['exception'] = 'Se debe cambiar la clave por defecto.';
                    //}
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'Usuario incorrecto o inactivo';
                    }
                }
                break;
            default:
                $result['exception'] = 'Acción no disponible fuera de la sesión';
        }
    }
    // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
    header('content-type: application/json; charset=utf-8');
    // Se imprime el resultado en formato JSON y se retorna al controlador.
    print(json_encode($result));
} else {
    print(json_encode('Recurso no disponible'));
}
