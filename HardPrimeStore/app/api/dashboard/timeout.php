<?php
require_once('../../helpers/dashboard/database.php');
require_once('../../helpers/dashboard/validator.php');
require_once('../../models/empleados.php');


// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_name("dashboard");
    session_start();
    // Se instancia la clase correspondiente.
    $usuario = new Empleados;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'error' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        $fechaGuardada = $_SESSION["ultimoAcceso"];
        date_default_timezone_set('America/El_Salvador');
        $ahora = date("Y-n-j H:i:s");
        $tiempo_transcurrido = (strtotime($ahora) - strtotime($fechaGuardada));
        switch ($_GET['action']) {           
                //Método para cerrar sesión en caso de inactividad
            case 'timeOutt':
                //comparamos el tiempo transcurrido
                if ($tiempo_transcurrido >= 300) {
                    $result['status'] = 1;
                    //si pasaron 5 minutos o más
                    session_destroy(); // destruyo la sesión                    
                    //sino, actualizo la fecha de la sesión
                } else {
                    $_SESSION["ultimoAcceso"] = $ahora;
                }
                break;
                //Método para consultar la existencia de empleados sin tener en cuenta la existencia del usuario root
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
