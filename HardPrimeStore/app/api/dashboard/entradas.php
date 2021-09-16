<?php
require_once('../../helpers/dashboard/database.php');
require_once('../../helpers/dashboard/validator.php');
require_once('../../models/entradas.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_name("dashboard");
    session_start();
    // Se instancia la clase correspondiente.
    $entrada = new Entradas;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
                //Método para consultar la existencia de entradas
            case 'readAll':
                if (isset($_SESSION['id_usuario'])) {
                    if ($result['dataset'] = $entrada->readAll()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['status'] = 2;
                            $result['exception'] = Database::getException();
                        } else {
                            $result['status'] = 2;
                            $result['exception'] = 'No hay entradas registradas';
                        }
                    }
                } else {
                    $result['status'] = 3;
                }
                break;
                //Método para consultar la información de todos los productos registrados
                //para luego pasarlos al combobox(select)
            case 'readAllProduct':
                if ($result['dataset'] = $entrada->readAllProduct()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                    }
                }
                break;
                //Método para consultar el empleado que ha iniciado sesión
            case 'readEmp':
                if ($result['dataset'] = $entrada->readEmp()) {
                    $result['status'] = 1;
                    $result['exception'] = 'El id se a cargado';
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No se cargo el empleado';
                    }
                }
                break;
                //Método para consultar una entrada en especifico
            case 'search':
                $_POST = $entrada->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $entrada->searchRows($_POST['search'])) {
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
                //Método para crear una entrada
            case 'create':
                $_POST = $entrada->validateForm($_POST);
                if ($entrada->setCant($_POST['cantidad'])) {
                    if (isset($_POST['producto'])) {
                        if ($entrada->setIdpro($_POST['producto'])) {
                            if ($entrada->setIdemp($_POST['id_empleado'])) {
                                if ($entrada->setFecha($_POST['fecha'])) {
                                    if ($entrada->createRow()) {
                                        $result['status'] = 1;
                                        $result['message'] = 'Se ha agregado correctamente la entrada del producto';
                                    } else {
                                        $result['exception'] = Database::getException();
                                    }
                                } else {
                                    $result['exception'] = 'Fecha incorrecta';
                                }
                            } else {
                                $result['exception'] = 'Empleado incorrecto';
                            }
                        } else {
                            $result['exception'] = 'No hay existencia de productos';
                        }
                    } else {
                        $result['exception'] = 'Seleccione una producto';
                    }
                } else {
                    $result['exception'] = 'Cantidad incorrecta';
                }
                break;
                //Método para eliminar una entrada
            case 'delete':
                if ($entrada->setId($_POST['id_entrada'])) {
                    if ($data = $entrada->readOne()) {
                        $entrada->backStock();
                        if ($entrada->deleteRow()) {
                            $result['status'] = 1;
                            $result['message'] = 'Se ha eliminado la entrada';
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Entrada inexistente';
                    }
                } else {
                    $result['exception'] = 'Entrada incorrecta';
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
