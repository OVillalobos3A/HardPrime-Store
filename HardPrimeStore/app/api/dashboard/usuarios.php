<?php
require_once('../../helpers/dashboard/database.php');
require_once('../../helpers/dashboard/validator.php');
require_once('../../models/usuarios.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_name("dashboard");
    session_start();
    // Se instancia la clase correspondiente.
    $producto = new Usuarios;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
                //Método para consultar la existencia de todos los productos registrados
            case 'readAll':
                if (isset($_SESSION['id_usuario'])) {
                    if ($result['dataset'] = $producto->readAll()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['status'] = 2;
                            $result['exception'] = Database::getException();
                        } else {
                            $result['status'] = 2;
                            $result['exception'] = 'No hay usuarios registrados';
                        }
                    }
                } else {
                    $result['status'] = 3;
                }
                break;
                //Método para buscar un usuario en especifico      
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
                //Método para crear un usuario
            case 'create':
                $_POST = $producto->validateForm($_POST);
                if ($producto->setUsuario($_POST['usuario'])) {
                    if ($producto->setClave($_POST['contraseña'])) {
                        if ($producto->setEstado($_POST['estado'])) {
                            if (isset($_POST['empleado'])) {
                                if ($producto->setEmpleado($_POST['empleado'])) {
                                    if (isset($_POST['tipo_usuario'])) {
                                        if ($producto->setTipo_usuario($_POST['tipo_usuario'])) {
                                            if ($producto->createRow()) {
                                                $result['status'] = 1;
                                                $result['message'] = 'Empleado creado correctamente';
                                            } else {
                                                $result['exception'] = Database::getException();;
                                            }
                                        }
                                    } else {
                                        $result['exception'] = 'Seleccione un tipo de usuario';
                                    }
                                } else {
                                    $result['exception'] = 'Seleccione un empleado';
                                }
                            } else {
                                $result['exception'] = 'Empleado incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Error al asignar el estado';
                        }
                    } else {
                        $result['exception'] = 'Error al asignar la contraseña';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
                //Método para consultar la existencia de un usuario
            case 'readOne':
                if ($producto->setId($_POST['id_usuario'])) {
                    if ($result['dataset'] = $producto->readOne()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'El usuario no existe';
                        }
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
                break;
                //Método para actualizar un usuario
            case 'update':
                $_POST = $producto->validateForm($_POST);
                if ($producto->setId($_POST['id_usuario'])) {
                    if ($data = $producto->readOne()) {
                        if ($producto->setUsuario($_POST['usuario'])) {
                            if ($producto->setEmpleado($_POST['empleado'])) {
                                if ($producto->setTipo_usuario($_POST['tipo_usuario'])) {
                                    if ($producto->setEstado($_POST['estado'])) {
                                        if ($producto->updateRow()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Usuario modificado correctamente';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    } else {
                                        $result['exception'] = 'El estado es incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'El tipo de usuario es incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Error al asignar empleado';
                            }
                        } else {
                            $result['exception'] = 'Nombre de usuario invalido';
                        }
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
                //Método para eliminar un usuario
            case 'delete':
                if ($_POST['id_usuario'] != $_SESSION['id_usuario']) {
                    if ($producto->setId($_POST['id_usuario'])) {
                        if ($data = $producto->readOne()) {
                            if ($producto->deleteRow()) {
                                $result['status'] = 1;
                            } else {
                                $result['exception'] = Database::getException();
                            }
                        } else {
                            $result['exception'] = 'Usuario inexistente';
                        }
                    } else {
                        $result['exception'] = 'Usuario incorrecto';
                    }
                } else {
                    $result['exception'] = 'No se puede eliminar a si mismo';
                }
                break;
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
