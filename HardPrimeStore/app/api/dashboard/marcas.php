<?php
require_once('../../helpers/dashboard/database.php');
require_once('../../helpers/dashboard/validator.php');
require_once('../../models/marcas.php');


// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_name("dashboard");
    session_start();
    // Se instancia la clase correspondiente.
    $marca = new Marcas;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
                //Método para consultar la información de todas las marcas registradas
            case 'readAll':
                if (isset($_SESSION['id_usuario'])) {
                    if ($result['dataset'] = $marca->readAll()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['status'] = 2;
                            $result['exception'] = Database::getException();
                        } else {
                            $result['status'] = 2;
                            $result['exception'] = 'No hay marcas registradas';
                        }
                    }
                } else {
                    $result['status'] = 3;
                }
                break;
                //Método para consultar la información de una marca en especifico
            case 'search':
                $_POST = $marca->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $marca->searchRows($_POST['search'])) {
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
                //Método para crear una marca
            case 'create':
                $_POST = $marca->validateForm($_POST);
                if ($marca->setNombre($_POST['nombre_marca'])) {
                    if (is_uploaded_file($_FILES['archivo_marca']['tmp_name'])) {
                        if ($marca->setImagen($_FILES['archivo_marca'])) {
                            if (is_uploaded_file($_FILES['archivo_marca1']['tmp_name'])) {
                                if ($marca->setLogo($_FILES['archivo_marca1'])) {
                                    if ($marca->createRow()) {
                                        $result['status'] = 1;
                                        if ($marca->saveFile($_FILES['archivo_marca'], $marca->getRuta(), $marca->getImagen())) {
                                            $result['message'] = 'Marca creada correctamente';
                                            if ($marca->saveFile($_FILES['archivo_marca1'], $marca->getRuta1(), $marca->getLogo())) {
                                            } else {
                                                $result['message'] = 'Marca creada pero no se guardó logo';
                                            }
                                        } else {
                                            $result['message'] = 'Marca creada pero no se guardó imagen ni logo';
                                        }
                                    } else {
                                        $result['exception'] = Database::getException();
                                    }
                                } else {
                                    $result['exception'] = $marca->getImageError();
                                }
                            } else {
                                $result['exception'] = 'Seleccione una imagen';
                            }
                        } else {
                            $result['exception'] = $marca->getImageError();
                        }
                    } else {
                        $result['exception'] = 'Seleccione una imagen';
                    }
                } else {
                    $result['exception'] = 'Nombre incorrecto o campo vacío';
                }
                break;
                //Método para consultar la información de una marca
            case 'readOne':
                if ($marca->setId($_POST['id_marca'])) {
                    if ($result['dataset'] = $marca->readOne()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Marca inexistente';
                        }
                    }
                } else {
                    $result['exception'] = 'Marca incorrecta';
                }
                break;
                //Método para actualizar una marca
            case 'update':
                $_POST = $marca->validateForm($_POST);
                if ($marca->setId($_POST['id_marca'])) {
                    if ($data = $marca->readOne()) {
                        if ($marca->setNombre($_POST['nombre_marca'])) {
                            if (is_uploaded_file($_FILES['archivo_marca']['tmp_name']) && is_uploaded_file($_FILES['archivo_marca1']['tmp_name'])) {
                                if ($marca->setImagen($_FILES['archivo_marca'])) {
                                    if ($marca->setLogo($_FILES['archivo_marca1'])) {
                                        if ($marca->updateRow2($data['imagen'], $data['logo_marca'])) {
                                            $result['status'] = 1;
                                            if (
                                                $marca->saveFile($_FILES['archivo_marca'], $marca->getRuta(), $marca->getImagen()) &&
                                                $marca->saveFile($_FILES['archivo_marca1'], $marca->getRuta1(), $marca->getLogo())
                                            ) {
                                                $result['message'] = 'Marca modificada correctamente';
                                            } else {
                                                $result['message'] = 'Marca modificada pero no se guardó la imagen o el logo';
                                            }
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    } else {
                                        $result['exception'] = $marca->getImageError();
                                    }
                                } else {
                                    $result['exception'] = $marca->getImageError();
                                }
                            } else {
                                if (is_uploaded_file($_FILES['archivo_marca']['tmp_name'])) {
                                    if ($marca->setImagen($_FILES['archivo_marca'])) {
                                        if ($marca->updateRow2($data['imagen'], $data['logo_marca'])) {
                                            $result['status'] = 1;
                                            if ($marca->saveFile($_FILES['archivo_marca'], $marca->getRuta(), $marca->getImagen())) {
                                                $result['message'] = 'Marca modificada correctamente';
                                            } else {
                                                $result['message'] = 'Marca modificada pero no se guardó la imagen.';
                                            }
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    } else {
                                        $result['exception'] = $marca->getImageError();
                                    }
                                } else {
                                    if (is_uploaded_file($_FILES['archivo_marca1']['tmp_name'])) {
                                        if ($marca->setLogo($_FILES['archivo_marca1'])) {
                                            if ($marca->updateRow2($data['imagen'], $data['logo_marca'])) {
                                                $result['status'] = 1;
                                                if ($marca->saveFile($_FILES['archivo_marca1'], $marca->getRuta1(), $marca->getLogo())) {
                                                    $result['message'] = 'Marca modificada correctamente';
                                                } else {
                                                    $result['message'] = 'Marca modificada pero no se guardó el logo.';
                                                }
                                            } else {
                                                $result['exception'] = Database::getException();
                                            }
                                        } else {
                                            $result['exception'] = $marca->getImageError();
                                        }
                                    } else {
                                        if ($marca->updateRow2($data['imagen'], $data['logo_marca'])) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Marca modificada correctamente';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    }
                                }
                            }
                        } else {
                            $result['exception'] = 'Nombre incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Marca inexistente';
                    }
                } else {
                    $result['exception'] = 'Marca incorrecta';
                }
                break;
                //Método para eliminar una marca
            case 'delete':
                if ($marca->setId($_POST['id_marca'])) {
                    if ($data = $marca->readOne()) {
                        if ($marca->deleteRow()) {
                            $result['status'] = 1;
                            if ($marca->deleteFile($marca->getRuta(), $data['imagen'])) {
                                $result['message'] = 'Marca eliminada correctamente';
                                if ($marca->deleteFile($marca->getRuta1(), $data['logo_marca'])) {
                                } else {
                                    $result['message'] = 'Marca eliminada pero no se borró el logo';
                                }
                            } else {
                                $result['message'] = 'Marca eliminada pero no se borró la imagen ni el logo';
                            }
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Marca inexistente';
                    }
                } else {
                    $result['exception'] = 'Marca incorrecta';
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
