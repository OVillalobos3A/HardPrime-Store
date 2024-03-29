<?php
require_once('../../helpers/dashboard/database.php');
require_once('../../helpers/dashboard/validator.php');
require_once('../../models/pedidos.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_name("clientes");
    session_start();

    $fechaGuardada = $_SESSION["ultimoAcceso"];
    $ahora = date("Y-n-j H:i:s");
    $tiempo_transcurrido = (strtotime($ahora) - strtotime($fechaGuardada));
    // Se instancia la clase correspondiente.
    $pedidos = new Pedidos;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_cliente'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
                //Método para consultar la información de todos los pedidos
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
                //Método para consultar la información del detalle de un pedido en especifico
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
                //Método para buscar un pedido en especifico
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
                //Método para buscar un pedido en especifico(por código)
            case 'searchPedido':
                $_POST = $pedidos->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $pedidos->searchPedido($_POST['search'])) {
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
                //Método para consultar la información de un pedido
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
                //Método para consultar la información de un pedido que no este en preparación
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
                //Método para consultar la informacion del historial de sesiones del cliente.
                case 'readSesiones':
                    if ($pedidos->setId($_SESSION['id_cliente'])) {
                        if ($result['dataset'] = $pedidos->readSesiones()) {
                            $result['status'] = 1;
                        } else {
                            if (Database::getException()) {
                                $result['exception'] = Database::getException();
                            } else {
                                $result['exception'] = 'Cliente inexistente';
                            }
                        }
                    } else {
                        $result['exception'] = 'Usuario incorrecto';
                    }
                    break;
                //Método para actualizar el estado de un pedido
                //darlo por finalizado
            case 'update':
                $_POST = $pedidos->validateForm($_POST);
                if ($pedidos->setId($_POST['id_pedido'])) {
                    if ($data = $pedidos->readOne1()) {
                        $result['exception'] = 'Este pedido ya fue finalizado';
                    } else {
                        if ($data = $pedidos->readOne2()) {
                            $result['exception'] = 'Este pedido ya no se puede modificar, ha sido cancelado.';
                        } else {
                            if ($data = $pedidos->readState2()) {
                                $result['exception'] = 'Este pedido ya no se puede modificar, ha sido entregado.';
                            } else {
                                if ($pedidos->updateRow()) {
                                    $result['status'] = 1;
                                    $result['message'] = 'Se ha dado por finalizado el pedido';
                                } else {
                                    $result['exception'] = Database::getException();
                                    $result['message'] = 'Ha ocurrido un error';
                                }
                            }
                        }
                    }
                } else {
                    $result['exception'] = 'Pedido incorrecto';
                }
                break;
                //Método para actualizar el estado de un pedio
                //Darlo por cancelado
                //ESTE MÉTODO YA NO SE OCUPA. HASTA PROXIMO AVISO.
            case 'cancelpedido1':
                $_POST = $pedidos->validateForm($_POST);
                if ($pedidos->setId($_POST['id_pedido'])) {
                    if ($data = $pedidos->readOne2()) {
                        $result['exception'] = 'Este pedido ya fue cancelado';
                    } else {
                        if ($data = $pedidos->readState2()) {
                            $result['exception'] = 'Este pedido ya a sido entregado, no se puede modificar.';
                        } else {
                            if ($pedidos->updateRowCancel()) {
                                $result['status'] = 1;
                                $result['message'] = 'Se ha dado por cancelado el pedido';
                            } else {
                                $result['exception'] = Database::getException();
                                $result['message'] = 'Ha ocurrido un error';
                            }
                        }
                    }
                } else {
                    $result['exception'] = 'Pedido incorrecto';
                }
                break;
            case 'cancelpedido':
                $_POST = $pedidos->validateForm($_POST);
                if ($pedidos->setId($_POST['id_pedido'])) {
                    if ($data = $pedidos->readOne2()) {
                        $result['exception'] = 'Este pedido ya fue cancelado';
                    } else {
                        if ($pedidos->updateRowCancel()) {
                            $result['status'] = 1;
                            $result['message'] = 'Se ha dado por cancelado el pedido';
                        } else {
                            $result['exception'] = Database::getException();
                            $result['message'] = 'Ha ocurrido un error';
                        }
                    }
                } else {
                    $result['exception'] = 'Pedido incorrecto';
                }
                break;
                //Método para actualizar el estado de un pedido
                //darlo por entregado
            case 'entrega':
                $_POST = $pedidos->validateForm($_POST);
                if ($pedidos->setId($_POST['id_pedido'])) {
                    if ($data = $pedidos->readState2()) {
                        $result['exception'] = 'Este pedido ya fue entregado';
                    } else {
                        if ($data = $pedidos->readState()) {
                            $result['exception'] = 'Este pedido ha sido cancelado, no se puede dar por entregado';
                        } else {
                            if ($data = $pedidos->readState3()) {
                                $result['exception'] = 'Este pedido se encuentra aún en proceso, no se puede dar por entregado';
                            } else {
                                if ($pedidos->updateRowDelivery()) {
                                    $result['status'] = 1;
                                    $result['message'] = 'Se ha dado por entregado el pedido';
                                } else {
                                    $result['exception'] = Database::getException();
                                    $result['message'] = 'Ha ocurrido un error';
                                }
                            }
                        }
                    }
                } else {
                    $result['exception'] = 'Pedido incorrecto';
                }
                break;
                //Acciones para los pedidos del cliente
            case 'readPedido':
                if ($result['dataset'] = $pedidos->readPedido($_SESSION['id_cliente'])) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay pedidos registrados';
                    }
                }
                break;
                //ESTE MÉTODO NO SE OCUPA, HASTA NUEVO AVISO.
            case 'cancel':
                $_POST = $pedidos->validateForm($_POST);
                if ($pedidos->setId($_POST['id_pedido'])) {
                    if ($data = $pedidos->readState()) {
                        $result['exception'] = 'Este pedido ya fue cancelado';
                    } else {
                        if ($data = $pedidos->readState2()) {
                            $result['exception'] = 'Este pedido ya fue entregado no se puede cancelar.';
                        } else {
                            if ($pedidos->updateRowCancel()) {
                                $result['status'] = 1;
                                $result['message'] = 'Se ha dado por cancelado el pedido';
                            } else {
                                $result['exception'] = Database::getException();
                                $result['message'] = 'Ha ocurrido un error';
                            }
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
