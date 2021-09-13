<?php
require_once('../../helpers/dashboard/database.php');
require_once('../../helpers/dashboard/validator.php');
require_once('../../models/index.php');


// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se instancian las clases correspondientes.
    $index = new Index;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se compara la acción a realizar según la petición del controlador.
    switch ($_GET['action']) {
        //Método para mostrar los productos por marca
        case 'openMac':
            if ($result['dataset'] = $index->readMarcas()) {
                $result['status'] = 1;
            } else {
                if (Database::getException()) {
                    $result['exception'] = Database::getException();
                } else {
                    $result['exception'] = 'No existen marcas para mostrar';
                }
            }
            break;            
            //Método para mostrar el titulo con el nombre de la marca seleccionada
        case 'readTittle':
            if ($index->setId($_POST['id_marca'])) {
                if ($result['dataset'] = $index->readTittle()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'Error al mostrar el titulo';
                    }
                }
            } else {
                $result['exception'] = 'Marca incorrecta';
            }
            break;
            //Método para mostrar el titulo con el nombre de la categoría seleccionada
            case 'tittleCateg':
                if ($index->setId($_POST['id_categoria'])) {
                    if ($result['dataset'] = $index->tittleCateg()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Error al mostrar el titulo';
                        }
                    }
                } else {
                    $result['exception'] = 'Categoría incorrecta';
                }
                break;
                //Método para seleccionar las categorías registradas
        case 'openCat':
            if ($result['dataset'] = $index->readCategorias()) {
                $result['status'] = 1;
            } else {
                if (Database::getException()) {
                    $result['exception'] = Database::getException();
                } else {
                    $result['exception'] = 'No existen categorías para mostrar';
                }
            }
            break;
                //Método para mostrar los productos que son de la categoría seleccionada
            case 'openProductCategorias':
                if ($index->setId($_POST['id_categoria'])) {
                    if ($result['dataset'] = $index->readPC()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No existen productos para mostrar';
                        }
                    }
                } else {
                    $result['exception'] = 'Categorías incorrecta';
                }
                break;
                //Método para mostrar los productos que son de la marca seleccionada
        case 'openProductmarcas':
            if ($index->setId($_POST['id_marca'])) {
                if ($result['dataset'] = $index->readPM()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No existen productos para mostrar';
                    }
                }
            } else {
                $result['exception'] = 'Marca incorrecta';
            }
            break;
            //Método para mostrar los productos que son de la categoría seleccionada
            case 'openProduct':
                if ($index->setId($_POST['id_producto'])) {
                    if ($result['dataset'] = $index->readOne()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Ha ocurrido un error';
                        }
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
                break;
                //Método para mostrar los productos registrados
                case 'openProduct2':                    
                        if ($result['dataset'] = $index->readProduct2()) {
                            $result['status'] = 1;
                        } else {
                            if (Database::getException()) {
                                $result['exception'] = Database::getException();
                            } else {
                                $result['exception'] = 'Ha ocurrido un error';
                            }
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
