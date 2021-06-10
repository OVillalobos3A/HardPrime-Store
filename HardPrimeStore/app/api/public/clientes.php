<?php
require_once('../../helpers/dashboard/database.php');
require_once('../../helpers/dashboard/validator.php');
require_once('../../models/clientes.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $cliente = new Clientes;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'recaptcha' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como cliente para realizar las acciones correspondientes.
    if (isset($_SESSION['id_cliente'])) {
        // Se compara la acción a realizar cuando un cliente ha iniciado sesión.
        switch ($_GET['action']) {
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
            default:
                $result['exception'] = 'Acción no disponible dentro de la sesión';
        }
    } else {
        // Se compara la acción a realizar cuando el cliente no ha iniciado sesión.
        switch ($_GET['action']) {
            case 'register':
                $_POST = $cliente->validateForm($_POST);
                // Se sanea el valor del token para evitar datos maliciosos.
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
                                                    $result['exception'] = 'Contraseña incorrecta';
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

                break;
            case 'logIn':
                $_POST = $cliente->validateForm($_POST);
                if ($cliente->checkUser($_POST['usuario'])) {
                    //if ($cliente->getEstado()) {
                    if ($cliente->checkPassword($_POST['clave'])) {
                        $_SESSION['id_cliente'] = $cliente->getId();
                        $_SESSION['usuario'] = $cliente->getUsuario();
                        $_SESSION['imagen'] = $cliente->getImagen();
                        $_SESSION['correo'] = $cliente->getCorreo();
                        //$_SESSION['correo_cliente'] = $cliente->getCorreo();
                        $result['status'] = 1;
                        $result['message'] = 'Autenticación correcta';
                        if ($cliente->readCantprods()) {
                            $_SESSION['numcarrito'] = $cliente->getNumproducts();
                        } else {
                            if (Database::getException()) {
                                $result['exception'] = Database::getException();
                            } else {
                                $result['exception'] = 'Error desconocido';
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
                        $result['exception'] = 'Alias incorrecto';
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
