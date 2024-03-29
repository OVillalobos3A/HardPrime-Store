<?php
require_once('../../helpers/dashboard/database.php');
require_once('../../helpers/dashboard/validator.php');
require_once('../../models/proveedor.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_name("dashboard");
    session_start();
    // Se instancia la clase correspondiente.
    $proveedor = new Proveedores;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
                //Método para consultar la existencia de todos los proveedores registrados
            case 'readAll':
                if (isset($_SESSION['id_usuario'])) {
                    if ($result['dataset'] = $proveedor->readAll()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['status'] = 2;
                            $result['exception'] = Database::getException();
                        } else {
                            $result['status'] = 2;
                            $result['exception'] = 'No hay proveedores registrados';
                        }
                    }
                } else {
                    $result['status'] = 3;
                }
                break;
                //Método para buscar un proveedor en especifico
            case 'search':
                $_POST = $proveedor->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $proveedor->searchRows($_POST['search'])) {
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
                //Método para crear un proveedor
            case 'create':
                $_POST = $proveedor->validateForm($_POST);
                if ($proveedor->setNombre($_POST['nombre'])) {
                    if ($proveedor->setDirection($_POST['direccion'])) {
                        if ($proveedor->setCorreo($_POST['correo'])) {
                            if ($proveedor->setTel($_POST['tel'])) {
                                if ($proveedor->createRow()) {
                                    $result['status'] = 1;
                                    $result['message'] = 'Proveedor añadido correctamente';
                                } else {
                                    $result['exception'] = Database::getException();
                                }
                            } else {
                                $result['exception'] = 'Formato del teléfono incorrecto, recuerde que debe de ser así: 0000-0000 y debe de iniciar con 2, 6 o 7';
                            }
                        } else {
                            $result['exception'] = 'Formato de correo incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Formato de dirección incorrecta';
                    }
                } else {
                    $result['exception'] = 'Formato de nombre incorrecto';
                }
                break;
                //Método para consultar un proveedor
            case 'readOne':
                if ($proveedor->setId($_POST['id_proveedor'])) {
                    if ($result['dataset'] = $proveedor->readOne()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Proveedor inexistente';
                        }
                    }
                } else {
                    $result['exception'] = 'Proveedor incorrecto';
                }
                break;
                //Método para actualizar un proveedor
            case 'update':
                $_POST = $proveedor->validateForm($_POST);
                if ($proveedor->setId($_POST['id_proveedor'])) {
                    if ($data = $proveedor->readOne()) {
                        if ($proveedor->setNombre($_POST['nombre'])) {
                            if ($proveedor->setCorreo($_POST['correo'])) {
                                if ($proveedor->setDirection($_POST['direccion'])) {
                                    if ($proveedor->setTel($_POST['tel'])) {
                                        if ($proveedor->updateRow()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Proveedor modificado correctamente';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    } else {
                                        $result['exception'] = 'Formato del teléfono incorrecto, recuerde que debe de ser así: 0000-0000 y debe de iniciar con 2, 6 o 7';
                                    }
                                } else {
                                    $result['exception'] = 'Formato de dirección incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Formato de correo incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Formato de nombre incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Proveedor inexistente';
                    }
                } else {
                    $result['exception'] = 'Proveedor incorrecto';
                }
                break;
                //Método para eliminar un proveedor
            case 'delete':
                if ($proveedor->setId($_POST['id_proveedor'])) {
                    if ($data = $proveedor->readOne()) {
                        if ($proveedor->deleteRow()) {
                            $result['status'] = 1;
                            $result['message'] = 'Proveedor eliminado correctamente';
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Proveedor inexistente';
                    }
                } else {
                    $result['exception'] = 'Proveedor incorrecto';
                }
                break;
            default:
                $result['exception'] = 'Acción no disponible dentro de la sesión';
        }
        // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
        header('content-type: application/json; charset=utf-8');
        // Se imprime el resultado en formato JSON y se retorna al controlador.
        print(json_encode($result));
    } else {
        print(json_encode('Acceso denegado'));
    }
} else {
    print(json_encode('Recurso no disponible'));
}
