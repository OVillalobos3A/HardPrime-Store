<?php
require_once('../../helpers/dashboard/database.php');
require_once('../../helpers/dashboard/validator.php');
require_once('../../models/empleados.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $usuario = new Empleados;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'error' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'logOut':
                if (session_destroy()) {
                    $result['status'] = 1;
                    $result['message'] = 'Sesión eliminada correctamente';
                } else {
                    $result['exception'] = 'Ocurrió un problema al cerrar la sesión';
                }
                break;
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
            case 'create':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setNombre($_POST['nombre'])) {
                    if ($usuario->setApellido($_POST['apellido'])) {
                        if ($usuario->setCorreo($_POST['correo'])) {
                            if ($usuario->setTel($_POST['telefono'])) {
                                if ($usuario->setGen($_POST['genero'])) {
                                    if ($usuario->setFecha($_POST['fecha'])) {
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
                                        $result['exception'] = 'Fecha incorrecta';
                                    }
                                } else {
                                    $result['exception'] = $usuario->getPasswordError();
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
            default:
                $result['exception'] = 'Acción no disponible dentro de la sesión';
        }
    } else {
        // Se compara la acción a realizar cuando el administrador no ha iniciado sesión.
        switch ($_GET['action']) {
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
            case 'peme':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setNombre($_POST['nombre'])) {
                    if ($usuario->setApellido($_POST['apellido'])) {
                        if ($usuario->setCorreo($_POST['correo'])) {
                            if ($usuario->setTel($_POST['tel'])) {
                                if ($usuario->setFecha($_POST['fecha'])) {
                                    if ($usuario->setGen($_POST['gen'])) {
                                        if ($usuario->createRow()) {
                                            if ($usuario->setAlias($_POST['alias'])) {
                                                if ($_POST['clave1'] == $_POST['clave2']) {
                                                    if ($usuario->setClave($_POST['clave1'])) {
                                                        if ($usuario->firstUser()) {
                                                            $result['message'] = 'Se ha ingresado un usuario';
                                                            $result['status'] = 1;
                                                        } else {
                                                            $result['exception'] = Database::getException();
                                                            $result['message'] = 'Error desconocido';
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
                                            $result['exception'] = Database::getException();
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
            case 'logIn':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->checkUser($_POST['alias'])) {
                    if ($usuario->checkPassword($_POST['clave'])) {
                        $result['status'] = 1;
                        $result['message'] = 'Autenticación correcta';
                        $_SESSION['id_usuario'] = $usuario->getId();
                        $_SESSION['usuaio'] = $usuario->getAlias();
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Clave incorrecta';
                        }
                    }
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'Usuario incorrecto';
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
