<?php
require_once('../../helpers/dashboard/database.php');
require_once('../../helpers/dashboard/validator.php');
require_once('../../models/carrito.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_name("clientes");
    session_start();
    // Se instancia la clase correspondiente.
    $pedido = new Carrito;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'session' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como cliente para realizar las acciones correspondientes.
    if (isset($_SESSION['id_cliente'])) {
        $result['session'] = 1;
        // Se compara la acción a realizar cuando un cliente ha iniciado sesión.
        switch ($_GET['action']) {
        //Método para consultar si ya existe un pedido que se encuentre
        //en estado de "En preparacion"
        case 'createDetail':
            if ($pedido->startOrder()) {
                $_SESSION['id_pedido'] = $pedido->getIdPedido();
                $_POST = $pedido->validateForm($_POST);
                if ($pedido->setProducto($_POST['id_producto'])) {
                    if ($pedido->setCantidad($_POST['cantidad_producto'])) {
                        if ($pedido->verifyDuplicidad()) {
                            $result['exception'] = 'Este producto ya ha sido agregado al carrito';
                        } else {
                            if ($pedido->verifyCantidad()) {
                                if ($pedido->createDetail()) {
                                    $result['status'] = 1;
                                    $result['message'] = 'Producto agregado correctamente';
                                    if ($pedido->readCantprods()) {
                                        $_SESSION['numcarrito'] = $pedido->getNumproducts();
                                    } else {
                                        if (Database::getException()) {
                                            $result['exception'] = Database::getException();
                                        } else {
                                            $result['exception'] = 'Error desconocido';
                                        }
                                    }
                                } else {
                                    $result['exception'] = 'Ocurrió un problema al agregar el producto';
                                }
                            } else {
                                $result['exception'] = 'No puede elegir más producto de lo que ya hay';
                            }
                        }
                    } else {
                        $result['exception'] = 'Cantidad incorrecta';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
            } else {
                $result['exception'] = 'Ocurrió un problema al obtener el pedido';
            }
            break;
            case 'timeOut':               
                //comparamos el tiempo transcurrido
                if ($tiempo_transcurrido >= 20) {
                    $result['status'] = 1;
                    //si pasaron 10 minutos o más
                    session_destroy(); // destruyo la sesión                    
                    //sino, actualizo la fecha de la sesión
                } else {
                    $_SESSION["ultimoAcceso"] = $ahora;
                }
                break;
            //Método para consultar los productos del carrito del cliente
            //que ha iniciado sesión
            case 'readOrderDetail':
                if ($pedido->startOrder()) {
                    if ($result['dataset'] = $pedido->readOrderDetail()) {
                        $result['status'] = 1;
                        $_SESSION['id_pedido'] = $pedido->getIdPedido();
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No tiene productos en el carrito';
                        }
                    }
                } else {
                    $result['exception'] = 'Debe agregar un producto al carrito';
                }
                break;
            //Método para actualizar la cantidad de un producto en el carrito
            //verificando la cantidad que se ingresa comparandola con 
            //el stock, y la cantidad anteriormente ingresada
            case 'updateDetail1':
                $_POST = $pedido->validateForm($_POST);
                if ($pedido->setIdDetalle($_POST['id_detalle'])) {
                    if ($pedido->setProducto($_POST['id_producto'])) {
                        if ($pedido->setCantidad($_POST['cantidad_producto'])) {
                            if ($pedido->setCantidad1($_POST['sbuscar'])) {
                                if ($pedido->verifyQuantity()) {
                                    if ($pedido->updateDetail()) {
                                        $result['status'] = 1;
                                        $result['message'] = 'Cantidad modificada correctamente';
                                    } else {
                                        $result['exception'] = 'Ocurrió un problema al modificar la cantidad';
                                    }
                                } else {
                                    $result['exception'] = 'No puede elegir más producto de lo que ya hay';
                                }
                            } else {
                                $result['exception'] = 'Cantidad1 incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Cantidad incorrecta';
                        }
                    } else {
                        $result['exception'] = 'Producto incorrecto';
                    }
                } else {
                    $result['exception'] = 'Detalle incorrecto';
                }
                break;
            //Método para actualizar la cantidad de un producto en el carrito
            case 'updateDetail':
                $_POST = $pedido->validateForm($_POST);
                if ($pedido->setIdDetalle($_POST['id_detalle'])) {
                    if ($pedido->setProducto($_POST['id_producto'])) {
                        if ($pedido->setCantidad($_POST['cantidad_producto'])) {
                            if ($pedido->updateDetail()) {
                                $result['status'] = 1;
                                $result['message'] = 'Cantidad modificada correctamente';
                            } else {
                                $result['exception'] = 'Ocurrió un problema al modificar la cantidad';
                            }
                        } else {
                            $result['exception'] = 'Cantidad incorrecta';
                        }
                    } else {
                        $result['exception'] = 'Producto incorrecto';
                    }
                } else {
                    $result['exception'] = 'Detalle incorrecto';
                }
                break;
            //Método para eliminar un producto del carrito
            case 'deleteDetail':
                if ($pedido->setIdDetalle($_POST['id_detalle'])) {
                    if ($pedido->deleteDetail()) {
                        $result['status'] = 1;
                        $result['message'] = 'Producto removido correctamente';
                        if ($pedido->readCantprods()) {
                            $_SESSION['numcarrito'] = $pedido->getNumproducts();
                        } else {
                            if (Database::getException()) {
                                $result['exception'] = Database::getException();
                            } else {
                                $result['exception'] = 'Error desconocido';
                            }
                        }
                    } else {
                        $result['exception'] = 'Ocurrió un problema al remover el producto';
                    }
                } else {
                    $result['exception'] = 'Detalle incorrecto';
                }
                break;
            //Método para actualizar el estado del carrito
            //pasar de "En preparación" a "Finalizado"
            case 'finishOrder':
                if ($pedido->finishOrder()) {
                    $result['status'] = 1;
                    $result['message'] = 'Pedido finalizado correctamente';
                    if ($pedido->readCantprods()) {
                        $_SESSION['numcarrito'] = $pedido->getNumproducts();
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Error desconocido';
                        }
                    }
                } else {
                    $result['exception'] = 'Ocurrió un problema al finalizar el pedido';
                }
                break;
            default:
                $result['exception'] = 'Acción no disponible dentro de la sesión';
        }
    } else {
        // Se compara la acción a realizar cuando un cliente no ha iniciado sesión.
        switch ($_GET['action']) {
            case 'createDetail':
                $result['exception'] = 'Debe iniciar sesión para agregar el producto al carrito';
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
