<?php
require_once('../../helpers/dashboard/database.php');
require_once('../../helpers/dashboard/validator.php');
require_once('../../models/public_valoraciones.php');


// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    session_start();
    // Se instancian las clases correspondientes.
    $valorar = new Valoraciones;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se compara la acción a realizar según la petición del controlador.
    switch ($_GET['action']) {
        case 'createValoracion':
            if (isset($_SESSION['id_cliente'])) {
                $_POST = $valorar->validateForm($_POST);
                if ($valorar->setComentario($_POST['comentario'])) {
                    if ($valorar->setCalificacion($_POST['calificacion'])) {
                        if ($valorar->setIdcliente($_SESSION['id_cliente'])) {
                            if ($valorar->setIdproducto($_POST['id_producto2'])) {
                                if ($valorar->validarComentario() == true) {
                                    if ($valorar->unComentario() == false) {
                                        if ($valorar->setFecha($_POST['fecha'])) {
                                            if ($valorar->createRow()) {
                                                $result['status'] = 1;
                                                $result['message'] = 'El comentario ha sido guardado.';
                                            } else {
                                                $result['exception'] = Database::getException();;
                                            }
                                        } else {
                                            $result['exception'] = 'Error al asignar la fecha';
                                        }
                                    } else {
                                        $result['exception'] = 'Ya tienes un comentario en este producto.';
                                    }
                                } else {
                                    $result['exception'] = 'Debes comprar este producto para comentar';
                                }
                            } else {
                                $result['exception'] = 'Error al asignar el producto';
                            }
                        } else {
                            $result['exception'] = 'Error al asignar el cliente';
                        }
                    } else {
                        $result['exception'] = 'Error al asignar la calificación';
                    }
                } else {
                    $result['exception'] = 'Error al asignar el comentario';
                }
            } else {
                $result['exception'] = 'No se ha iniciado sesión';
            }
            break;
        case 'readComments':
            if ($valorar->setIdproducto($_POST['id_producto'])) {
                if ($result['dataset'] = $valorar->readComments()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No existen comentarios para mostrar';
                    }
                }
            } else {
                $result['exception'] = 'Producto incorrecto';
            }
            break;
        case 'detalleComentarios':
            if ($valorar->setIdetalle($_POST['id_pedido'])) {
                if ($valorar->setIdcliente($_SESSION['id_cliente'])) {
                    if ($result['dataset'] = $valorar->viewComentarios()) {
                        $result['status'] = 1;                                                
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Aun no tienes comentarios en ningun producto de este pedido';
                        }
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
            } else {
                $result['exception'] = 'Pedido incorrecto';
            }
            break;
        case 'validarComentario':
            if ($valorar->setIdproducto($_POST['id_producto'])) {
                if ($valorar->setIdcliente($_POST['id_cliente'])) {
                    if ($result['dataset'] = $valorar->validarComentario()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            //$result['exception'] = 'No existen productos para mostrar';
                        }
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
            } else {
                $result['exception'] = 'Cliente incorrecto';
            }
            break;
        case 'readProm':
            if ($valorar->setIdproducto($_POST['id_producto'])) {
                if ($result['dataset'] = $valorar->readProm()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'Este producto aun no tiene valoraciones';
                    }
                }
            } else {
                $result['exception'] = 'Producto Incorrecto';
            }
            break;
        default:
            $result['exception'] = 'Acción no disponible';
    }
    // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
    header('content-type: application/json; charset=utf-8');
    // Se imprime el resultado en formato JSON y se retorna al controlador.
    print(json_encode($result));
} else {
    print(json_encode('Recurso no disponible'));
}
