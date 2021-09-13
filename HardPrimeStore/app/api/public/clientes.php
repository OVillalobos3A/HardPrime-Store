<?php
require_once('../../helpers/dashboard/database.php');
require_once('../../helpers/dashboard/validator.php');
require_once('../../models/clientes.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_name("clientes");
    session_start();


    // Se instancia la clase correspondiente.
    $cliente = new Clientes;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'recaptcha' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como cliente para realizar las acciones correspondientes.
    if (isset($_SESSION['id_cliente'])) {
        $fechaGuardada = $_SESSION["ultimoAcceso"];
        $ahora = date("Y-n-j H:i:s");
        $tiempo_transcurrido = (strtotime($ahora) - strtotime($fechaGuardada));
        // Se compara la acción a realizar cuando un cliente ha iniciado sesión.
        switch ($_GET['action']) {
                //Método que valida si el cliente ha iniciado sesión
            case 'sesion':
                if (isset($_SESSION['id_cliente'])) {
                    $result['status'] = 1;
                } else {
                    //$result['exception'] = 'Ocurrió un problema al cerrar la sesión';
                }
                break;
            case 'logOut':
                if (session_destroy()) {
                    $result['status'] = 1;
                    $result['message'] = 'Sesión eliminada correctamente';
                } else {
                    $result['exception'] = 'Ocurrió un problema al cerrar la sesión';
                }
                break;
                //Método para cerrar sesión en caso de inactividad
            case 'timeOut':
                //comparamos el tiempo transcurrido
                if ($tiempo_transcurrido >= 500) {
                    $result['status'] = 1;
                    //si pasaron 10 minutos o más
                    session_destroy(); // destruyo la sesión                    
                    //sino, actualizo la fecha de la sesión
                } else {
                    $_SESSION["ultimoAcceso"] = $ahora;
                }
                break;
            default:
                $result['exception'] = 'Acción no disponible dentro de la sesión';
        }
    } else {
        // Se compara la acción a realizar cuando el cliente no ha iniciado sesión.
        switch ($_GET['action']) {
            //Método para regsitrar un cliente
            case 'register':
                $_POST = $cliente->validateForm($_POST);
                // Se sanea el valor del token para evitar datos maliciosos.
                $token = filter_input(INPUT_POST, 'g-recaptcha-response', FILTER_SANITIZE_STRING);
                if ($token) {
                    $secretKey = '6Ld9Z2IcAAAAACXhl-PxIQIMlWpkzbeHFPOY87_U';
                    $ip = $_SERVER['REMOTE_ADDR'];

                    $data = array(
                        'secret' => $secretKey,
                        'response' => $token,
                        'remoteip' => $ip
                    );

                    $options = array(
                        'http' => array(
                            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                            'method'  => 'POST',
                            'content' => http_build_query($data)
                        ),
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false
                        )
                    );

                    $url = 'https://www.google.com/recaptcha/api/siteverify';
                    $context  = stream_context_create($options);
                    $response = file_get_contents($url, false, $context);
                    $captcha = json_decode($response, true);

                    if ($captcha['success']) {
                        if ($cliente->setNombre($_POST['nombre'])) {
                            if ($cliente->setApellido($_POST['apellido'])) {
                                if ($cliente->setCorreo($_POST['correo'])) {
                                    if ($cliente->setDireccion($_POST['direct'])) {
                                        if ($cliente->setFecha($_POST['fecha'])) {
                                            if ($cliente->setCelular($_POST['telefono'])) {
                                                if ($cliente->setUsuario($_POST['alias'])) {
                                                    if ($_POST['clave1'] == $_POST['clave2']) {
                                                        if ($cliente->setContraseña($_POST['clave1'])) {
                                                            if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
                                                                if ($cliente->setImagen($_FILES['imagen'])) {
                                                                    if ($cliente->saveFile($_FILES['imagen'], $cliente->getRuta(), $cliente->getImagen())) {
                                                                        if ($cliente->createClient()) {
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
                                                                    $result['exception'] = 'Imagen incorrecta';
                                                                }
                                                            } else {
                                                                $result['exception'] = 'Selecciona una imagen';
                                                            }
                                                        } else {
                                                            $result['exception'] = $cliente->getPasswordError();
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Claves diferentes';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Usuario incorrecto';
                                                }
                                            } else {
                                                $result['exception'] = 'Teléfono incorrecto';
                                            }
                                        } else {
                                            $result['exception'] = 'Fecha de nacimiento incorrecta';
                                        }
                                    } else {
                                        $result['exception'] = 'Dirección incorrecta';
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
                        $result['recaptcha'] = 1;
                        $result['exception'] = 'No eres un humano';
                    }
                } else {
                    $result['exception'] = 'Ocurrió un problema al cargar el reCAPTCHA';
                }
                break;
                //Método para llevar a cabo el proceso de inicio de sesión del sitio público
            case 'logIn':
                $_POST = $cliente->validateForm($_POST);
                if ($cliente->checkUser($_POST['usuario'])) {
                    //if ($cliente->getEstado()) {
                    if ($cliente->checkPassword($_POST['clave'])) {
                        $_SESSION['pass'] = $_POST['clave'];
                        $_SESSION['usuario'] = $cliente->getUsuario();
                        $_SESSION['imagen'] = $cliente->getImagen();
                        $_SESSION['correo'] = $cliente->getCorreo();
                        $_SESSION['fecha'] = $cliente->getFecha();
                        $_SESSION['cant'] = $cliente->getCant();
                        if ($_SESSION['cant'] >= 90) {
                            $result['message'] = 'Han pasado un período largo desde su último cambio de contraseña, es hora de renovar tus credenciales.';
                            $result['status'] = 3;
                            $_SESSION['id_user'] = $cliente->getId();
                        } else {
                            //$_SESSION['correo_cliente'] = $cliente->getCorreo();
                            //defino la sesión que demuestra que el usuario está autorizado
                            $_SESSION["autentificado"] = "SI";
                            //sesion que captura la fecha y hora del inicio de sesión
                            $_SESSION["ultimoAcceso"] = date("Y-n-j H:i:s");
                            $user_agent = $_SERVER['HTTP_USER_AGENT'];
                            date_default_timezone_set('America/El_Salvador');
                            $DateAndTime = date('m-d-Y h:i:s a', time());
                            $plataforma = $cliente->getPlatform($user_agent);
                            $cliente->registrarSesion($DateAndTime, $plataforma, $_SESSION['id_cliente']);
                            $_SESSION['id_cliente'] = $cliente->getId();
                            $result['message'] = 'Autenticación correcta';
                            $result['status'] = 1;
                            if ($cliente->readCantprods()) {
                                $_SESSION['numcarrito'] = $cliente->getNumproducts();
                            } else {
                                if (Database::getException()) {
                                    $result['exception'] = Database::getException();
                                } else {
                                    $result['exception'] = 'Error desconocido';
                                }
                            }
                        }
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Contraseña incorrecta';
                        }
                    }
                    //} else {
                    //  $result['exception'] = 'La cuenta ha sido desactivada';
                    //}
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'Alias incorrecto o cuenta desactivada';
                    }
                }
                break;
            case 'changePass':
                $_POST = $cliente->validateForm($_POST);
                if ($cliente->setId($_SESSION['id_user'])) {
                    if ($_POST['clave'] == $_POST['confirmar']) {
                        if ($_POST['clave'] != $_SESSION['usuario']) {
                            if ($_POST['clave'] != $_SESSION['pass']) {
                                if ($cliente->setContraseña($_POST['clave'])) {
                                    if ($cliente->changePassw()) {
                                        if ($cliente->changeDate()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'La contraseña se guardó correctamente';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    } else {
                                        $result['exception'] = Database::getException();
                                    }
                                } else {
                                    $result['exception'] = $cliente->getPasswordError();
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
