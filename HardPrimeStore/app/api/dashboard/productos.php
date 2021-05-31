<?php
require_once('../../helpers/dashboard/database.php');
require_once('../../helpers/dashboard/validator.php');
require_once('../../models/productos.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $producto = new Productos;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $producto->readAll()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay productos registrados';
                    }
                }
                break;
            case 'search':
                $_POST = $producto->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $producto->searchRows($_POST['search'])) {
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
                $_POST = $producto->validateForm($_POST);
                if ($producto->setNombre($_POST['nombre'])) {
                    if ($producto->setDescripcion($_POST['descp'])) {
                        if ($producto->setStock($_POST['stock'])) {
                            if ($producto->setPrecio($_POST['precio'])) {
                                if ($producto->setEstado(isset($_POST['estado']) ? 1 : 0)) {
                                    if (isset($_POST['categoria'])) {
                                        if ($producto->setCategoria($_POST['categoria'])) {
                                            if (isset($_POST['marca'])) {
                                                if ($producto->setMarca($_POST['marca'])) {
                                                    if (isset($_POST['proveedor'])) {
                                                        if ($producto->setProveedor($_POST['proveedor'])) {
                                                            if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
                                                                if ($producto->setImagen($_FILES['imagen'])) {
                                                                    if (is_uploaded_file($_FILES['imagen2']['tmp_name'])) {
                                                                        if ($producto->setImagen2($_FILES['imagen2'])) {
                                                                            if ($producto->createRow()) {
                                                                                $result['status'] = 1;
                                                                                if ($producto->saveFile($_FILES['imagen'], $producto->getRuta(), $producto->getImagen())) {
                                                                                    if ($producto->saveFile($_FILES['imagen2'], $producto->getRuta(), $producto->getImagen2())) {
                                                                                        $result['message'] = 'Producto creado correctamente';
                                                                                    } else {
                                                                                        $result['message'] = 'Producto creado pero solo una imagen se guardó';
                                                                                    }
                                                                                } else {
                                                                                    $result['message'] = 'Producto creado pero no se guardó ninguna imagen';
                                                                                }
                                                                            } else {
                                                                                $result['exception'] = Database::getException();;
                                                                            }
                                                                        } else {
                                                                            $result['exception'] = $producto->getImageError();
                                                                        }
                                                                    } else {
                                                                        $result['exception'] = 'Seleccione una segunda imagen';
                                                                    }
                                                                } else {
                                                                    $result['exception'] = $producto->getImageError();
                                                                }
                                                            } else {
                                                                $result['exception'] = 'Seleccione una imagen';
                                                            }
                                                        } else {
                                                            $result['exception'] = 'Proveedor incorrecto';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Seleccione un proveedor';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Marca incorrecta';
                                                }
                                            } else {
                                                $result['exception'] = 'Seleccione una marca incorrecta';
                                            }
                                        } else {
                                            $result['exception'] = 'Categoría incorrecta';
                                        }
                                    } else {
                                        $result['exception'] = 'Seleccione una categoría';
                                    }
                                } else {
                                    $result['exception'] = 'Estado erroneo';
                                }
                            } else {
                                $result['exception'] = 'Precio incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Stock invalido';
                        }
                    } else {
                        $result['exception'] = 'Descripción incorrecta';
                    }
                } else {
                    $result['exception'] = 'Nombre incorrecto';
                }
                break;
            case 'readOne':
                if ($producto->setId($_POST['id_producto'])) {
                    if ($result['dataset'] = $producto->readOne()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Producto inexistente';
                        }
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
                break;
            case 'update':
                $_POST = $producto->validateForm($_POST);
                if ($producto->setId($_POST['id_producto'])) {
                    if ($data = $producto->readOne()) {
                        if ($producto->setNombre($_POST['nombre'])) {
                            if ($producto->setDescripcion($_POST['descp'])) {
                                if ($producto->setStock($_POST['stock'])) {
                                    if ($producto->setEstado(isset($_POST['estado']) ? 1 : 0)) {
                                        if ($producto->setPrecio($_POST['precio'])) {
                                            if (isset($_POST['categoria'])) {
                                                if ($producto->setCategoria($_POST['categoria'])) {
                                                    if (isset($_POST['marca'])) {
                                                        if ($producto->setMarca($_POST['marca'])) {
                                                            if (isset($_POST['proveedor'])) {
                                                                if ($producto->setProveedor($_POST['proveedor'])) {
                                                                    if (is_uploaded_file($_FILES['imagen']['tmp_name']) && is_uploaded_file($_FILES['imagen2']['tmp_name'])) {
                                                                        if ($producto->setImagen($_FILES['imagen'])) {
                                                                            if ($producto->setImagen2($_FILES['imagen2'])) {
                                                                                if ($producto->updateRow($data['imagen'], $data['imagen2'])) {
                                                                                    $result['status'] = 1;
                                                                                    if ($producto->saveFile($_FILES['imagen'], $producto->getRuta(), $producto->getImagen())) {
                                                                                        if ($producto->saveFile($_FILES['imagen2'], $producto->getRuta(), $producto->getImagen2())) {
                                                                                            $result['message'] = 'Producto creado correctamente';
                                                                                        } else {
                                                                                            $result['message'] = 'Producto creado pero solo una imagen se guardó';
                                                                                        }
                                                                                    } else {
                                                                                        $result['message'] = 'Producto creado pero no se guardó ninguna imagen';
                                                                                    }
                                                                                } else {
                                                                                    $result['exception'] = Database::getException();;
                                                                                }
                                                                            } else {
                                                                                $result['exception'] = $producto->getImageError();
                                                                            }
                                                                        } else {
                                                                            $result['exception'] = $producto->getImageError();
                                                                        }
                                                                    } else {
                                                                        if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
                                                                            if ($producto->setImagen($_FILES['imagen'])) {
                                                                                if ($producto->updateRow($data['imagen'], $data['imagen2'])) {
                                                                                    $result['status'] = 1;
                                                                                    if ($producto->saveFile($_FILES['imagen'], $producto->getRuta(), $producto->getImagen())) {
                                                                                        $result['message'] = 'Producto modificado correctamente';
                                                                                    } else {
                                                                                        $result['message'] = 'Producto modificado pero no se guardó la imagen.';
                                                                                    }
                                                                                } else {
                                                                                    $result['exception'] = Database::getException();
                                                                                }
                                                                            } else {
                                                                                $result['exception'] = $marca->getImageError();
                                                                            }
                                                                        } else {
                                                                            if (is_uploaded_file($_FILES['imagen2']['tmp_name'])) {
                                                                                if ($producto->setImagen2($_FILES['imagen2'])) {
                                                                                    if ($producto->updateRow($data['imagen'], $data['imagen2'])) {
                                                                                        $result['status'] = 1;
                                                                                        if ($producto->saveFile($_FILES['imagen2'], $producto->getRuta(), $producto->getImagen2())) {
                                                                                            $result['message'] = 'Producto modificado correctamente';
                                                                                        } else {
                                                                                            $result['message'] = 'Producto modificado pero no se guardó el logo.';
                                                                                        }
                                                                                    } else {
                                                                                        $result['exception'] = Database::getException();
                                                                                    }
                                                                                } else {
                                                                                    $result['exception'] = $producto->getImageError();
                                                                                }
                                                                            } else {
                                                                                if ($producto->updateRow($data['imagen'], $data['imagen2'])) {
                                                                                    $result['status'] = 1;
                                                                                    $result['message'] = 'Producto modificado correctamente';
                                                                                } else {
                                                                                    $result['exception'] = Database::getException();
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                } else {
                                                                    $result['exception'] = 'Proveedor incorrecto';
                                                                }
                                                            } else {
                                                                $result['exception'] = 'Seleccione un proveedor';
                                                            }
                                                        } else {
                                                            $result['exception'] = 'Marca incorrecta';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Seleccione una marca incorrecta';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Categoría incorrecta';
                                                }
                                            } else {
                                                $result['exception'] = 'Seleccione una categoría';
                                            }
                                        } else {
                                            $result['exception'] = 'Precio incorrecto';
                                        }
                                    } else {
                                        $result['exception'] = 'Estado invalido';
                                    }
                                } else {
                                    $result['exception'] = 'Stock invalido';
                                }
                            } else {
                                $result['exception'] = 'Descripción incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Nombre incorrecto';
                        }
                    } else {
                        $result['exception'] = 'El producto no existe';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
                break;
            case 'delete':
                if ($producto->setId($_POST['id_producto'])) {
                    if ($data = $producto->readOne()) {
                        if ($producto->deleteRow()) {
                            $result['status'] = 1;
                            if ($producto->deleteFile($producto->getRuta(), $data['imagen']) && $producto->deleteFile($producto->getRuta(), $data['imagen2'])) {
                                $result['message'] = 'Producto eliminado correctamente';
                            } else {
                                $result['message'] = 'Producto eliminado pero no se borró la imagen';
                            }
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
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
