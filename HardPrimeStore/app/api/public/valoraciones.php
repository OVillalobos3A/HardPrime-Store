<?php
require_once('../../helpers/dashboard/database.php');
require_once('../../helpers/dashboard/validator.php');
require_once('../../models/public_valoraciones.php');


// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    session_name("clientes");
    session_start();
    // Se instancian las clases correspondientes.
    $valorar = new Public_valoraciones;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.    
    $result = array('status' => 0, 'error' => 0, 'message' => null, 'exception' => null);
    // Se compara la acción a realizar según la petición del controlador.
    switch ($_GET['action']) {
        //Método para insertar guardar todos los campos y guardarlos en la base
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
            //Método para mostrar los comentarios de un producto en especifico mediante su ID
        case 'readComments':
            if ($valorar->setIdproducto($_POST['id_producto'])) {
                if ($result['dataset'] = $valorar->readComments()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'Este producto aun no tiene comentarios.';
                    }
                }
            } else {
                $result['exception'] = 'Producto incorrecto';
            }
            break;
            //Método para seleccionar una calificacion en especifico
        case 'readActualizar':
            if ($valorar->setId($_POST['id_calificacion'])) {
                if ($result['dataset'] = $valorar->readOne()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'Calificacion inexistente';
                    }
                }
            } else {
                $result['exception'] = 'Calificación incorrecto';
            }
            break;
        case 'openName':
            if ($result['dataset'] = $valorar->openName()) {
                $result['status'] = 1;
            } else {
                if (Database::getException()) {
                    $result['exception'] = Database::getException();
                } else {
                    $result['exception'] = 'Cliente inexistente';
                }
            }
            break;
        //Método para consultar la información del empleado para mandarla al modal
        case 'readEmfileds':
            if ($result['dataset'] = $valorar->readEmfileds()) {
                $result['status'] = 1;
            } else {
                if (Database::getException()) {
                    $result['exception'] = Database::getException();
                } else {
                    $result['exception'] = 'Empleado inexistente';
                }
            }
            break;
        case 'updateUserCredentials':
            $_POST = $valorar->validateForm($_POST);
            if ($valorar->setId($_POST['id_cliente'])) {
                if ($data = $valorar->readEmfileds()) {
                    if ($valorar->setAlias($_POST['alias'])) {
                        if ($_POST['ncontra'] != '' && $_POST['ncontra1'] != '') {
                            if ($_POST['ncontra'] == $_POST['ncontra1']) {
                                if ($_POST['contra'] != $_POST['ncontra']) {
                                    if ($_POST['alias'] != $_POST['ncontra']) {
                                        if ($valorar->checkPassword($_POST['contra'])) {
                                            if ($valorar->setClave($_POST['ncontra'])) {
                                                if ($valorar->updateUserCredentials()) {
                                                    $result['status'] = 1;
                                                    $result['message'] = 'Credenciales actualizadas correctamente';
                                                } else {
                                                    $result['exception'] = Database::getException();
                                                }
                                            } else {
                                                $result['exception'] = $valorar->getPasswordError();
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
                            if ($valorar->checkPassword($_POST['contra'])) {
                                if ($valorar->updateUserCredentials2()) {
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
        //Método para actualizar un comentario, capturando los datos del formulario
        case 'updateComentario':
            $_POST = $valorar->validateForm($_POST);
            if ($valorar->setId($_POST['id_calificacion_act'])) {                
                    if ($valorar->setComentario($_POST['comentario'])) {
                        if ($valorar->setCalificacion($_POST['calificacion'])) {
                            if ($valorar->setFecha($_POST['fecha'])) {
                                if ($valorar->updateComentario()) {
                                    $result['status'] = 1;
                                    $result['message'] = 'Calificación modificado correctamente';
                                } else {
                                    $result['exception'] = Database::getException();
                                }
                            } else {
                                $result['exception'] = 'Fecha incorrecta';
                            }
                        } else {
                            $result['exception'] = 'La calificación is invalida';
                        }
                    } else {
                        $result['exception'] = 'Comentario incorrecto';
                    }
                
            } else {
                $result['exception'] = 'No se pudo obtener el comentario';
            }
            break;
            //Método para mostrar comentarios que ha realizado un cliente en especifico
        case 'readAll':
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
                $result['exception'] = 'No se ha iniciado sesión';
            }
            break;
            //Método para validar que un cliente no pueda dar una calificación a un producto si no lo ha comprado            
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
            //Método para mostrar la calificación promedio de un producto.
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
