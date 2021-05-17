<?php
require_once('../../helpers/dashboard/database.php');
require_once('../../helpers/dashboard/validator.php');
require_once('../../models/pedidos.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $pedidos = new Pedidos;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $pedidos->readAll()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay pedidos registrados';
                    }
                }
                break;
            case 'viewShop':
                if ($pedidos->setId($_POST['id_pedido'])) {
                    if ($result['dataset'] = $pedidos->viewShop()) {
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
                            $result['exception'] = 'Este pedido aún no tiene detalle';
                        }
                    }
                } else {
                    $result['exception'] = 'Pedido incorrecto';
                }
                break;
            case 'search':
                $_POST = $pedidos->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $pedidos->searchRows($_POST['search'])) {
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
            case 'readOne':
                if ($pedidos->setId($_POST['id_pedido'])) {
                    if ($result['dataset'] = $pedidos->readOne()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Pedido inexistente';
                        }
                    }
                } else {
                    $result['exception'] = 'Pedido incorrecto';
                }
                break;
            case 'readOne1':
                if ($pedidos->setId($_POST['id_pedido'])) {
                    if ($result['dataset'] = $pedidos->readOne()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Pedido inexistente';
                        }
                    }
                } else {
                    $result['exception'] = 'Pedido incorrecto';
                }
                break;
            case 'update':
                $_POST = $pedidos->validateForm($_POST);
                if ($pedidos->setId($_POST['id_pedido'])) {
                    if ($data = $pedidos->readOne1()) {
                        $result['exception'] = 'Este pedido ya fue finalizado';
                    } else {
                        if ($pedidos->updateRow()) {
                            $result['status'] = 1;
                            $result['message'] = 'Se ha dado por finalizado el pedido';
                        } else {
                            $result['exception'] = Database::getException();
                            $result['message'] = 'Ha ocurrido un error';
                        }
                    }
                } else {
                    $result['exception'] = 'Pedido incorrecto';
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
