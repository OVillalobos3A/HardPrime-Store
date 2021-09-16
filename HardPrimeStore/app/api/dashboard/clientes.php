<?php
require_once('../../helpers/dashboard/database.php');
require_once('../../helpers/dashboard/validator.php');
require_once('../../models/clientes.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_name("dashboard");
    session_start();
    // Se instancia la clase correspondiente.
    $cli = new Clientes;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if (isset($_SESSION['id_usuario'])) {
                    if ($result['dataset'] = $cli->readAll()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['status'] = 2;
                            $result['exception'] = Database::getException();
                        } else {
                            $result['status'] = 2;
                            $result['exception'] = 'No hay clientes registrados';
                        }
                    }
                } else {
                    $result['status'] = 3;
                }
                break;
                //Método para buscar un cliente en especifico en el apartado de la vista del cliente(dashboard)
            case 'search':
                $_POST = $cli->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $cli->searchRows($_POST['search'])) {
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
                //Método para consultar un cliente en el apartado de la vista del cliente(dashboard)
            case 'readOne':
                if ($val->setId($_POST['id_cliente'])) {
                    if ($result['dataset'] = $cli->readOne()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Cliente inexistente';
                        }
                    }
                } else {
                    $result['exception'] = 'Cliente incorrecto';
                }
                break;
                //Método para seleccionar a un cliente en especifico, cuando el estado es inactivo
            case 'readOne1':
                if ($cli->setId($_POST['id_cliente'])) {
                    if ($result['dataset'] = $cli->readOne1()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Cliente inexistente';
                        }
                    }
                } else {
                    $result['exception'] = 'Cliente incorrecto';
                }
                break;
                //Método para consultar la información de los pedidos efectuados por un cliente
                //en el apartado de la vista del cliente(dashboard)
            case 'viewOrder':
                if ($cli->setId($_POST['id_cliente'])) {
                    if ($result['dataset'] = $cli->viewOrder()) {
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
                            $result['exception'] = 'El cliente aún no a realizado un pedido';
                        }
                    }
                } else {
                    $result['exception'] = 'Pedido incorrecto';
                }
                break;
                //Método para actualizar el estado de un cliente
            case 'update':
                $_POST = $cli->validateForm($_POST);
                if ($cli->setId($_POST['id_cliente'])) {
                    if ($data = $cli->readOne1()) {
                        if ($cli->updateRow()) {
                            $result['status'] = 1;
                            $result['message'] = 'Se ha dado de alta al cliente';
                        } else {
                            $result['exception'] = Database::getException();
                            $result['message'] = 'Ha ocurrido un error';
                        }
                    } else {
                        if ($cli->updateRow1()) {
                            $result['status'] = 1;
                            $result['message'] = 'Se ha desabilitado el cliente';
                        } else {
                            $result['exception'] = Database::getException();
                            $result['message'] = 'Ha ocurrido un error';
                        }
                    }
                } else {
                    $result['exception'] = 'Cliente incorrecto';
                }
                break;
                //Método para eliminar un cliente(Actualmente no se utiliza)
            case 'delete':
                if ($cli->setId($_POST['id_cliente'])) {
                    if ($data = $cli->readOne()) {
                        if ($cli->deleteRow()) {
                            $result['status'] = 1;
                            $result['message'] = 'Cliente eliminado correctamente';
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Cliente inexistente';
                    }
                } else {
                    $result['exception'] = 'Cliente incorrecto';
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
