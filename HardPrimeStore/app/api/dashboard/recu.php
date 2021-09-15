<?php
require_once('../../helpers/dashboard/database.php');
require_once('../../helpers/dashboard/validator.php');
require_once('../../models/usuarios.php');

require '../../../libraries/PHPMailer/PHPMailerAutoload.php';

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_name("dashboard");
    session_start();
    // Se instancia la clase correspondiente.
    $recu = new Usuarios;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    //if (isset($_SESSION['id_usuario'])) {
    // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
    switch ($_GET['action']) {
            //Método para generar el código de recuperación de contraseña
        case 'generarCodigo':
            $_POST = $recu->validateForm($_POST);
            $recu->setUsuario($_POST['usuario']);
            $recu->checkUser();
            if ($recu->getUsuario() == $_POST['usuario']) {
                if ($recu->generarCodigo(5)) {
                    if ($recu->updateCode()) {
                        if ($recu->obtenerCorreo()) {
                            $mail = new PHPMailer();
                            $mail->IsSMTP();
                            //Configuracion servidor mail
                            $mail->setFrom('hardprimestore@gmail.com', 'HardPrimeStore'); //remitente
                            $mail->SMTPAuth = true;
                            $mail->SMTPSecure = 'tls'; //seguridad
                            $mail->Host = "smtp.gmail.com"; // servidor smtp
                            $mail->Port = 587; //puerto
                            $mail->Username = 'HardPrimeStore@gmail.com'; //nombre usuario
                            $mail->Password = 'Store2021'; //contraseña

                            $mail->AddAddress($recu->getCorreo());
                            $mail->Subject = 'Código de recuperación - HardPrimeStore';
                            $mail->Body = 'El código de recuperación es: ' . $recu->getCodigo() . '.';
                            if ($mail->Send()) {
                                $result['status'] = 1;
                                $result['message'] = 'Código de recuperación enviado, por favor revise su correo.';
                            } else {
                                $result['exception'] = 'Ocurrió un error al enviar el correo.';
                            }
                        } else {
                            $result['exception'] = 'No se pudo obtener el correo correspondiente al usuario.';
                        }
                    } else {
                        $result['exception'] = 'Hubo un error al asignar el código de recuperación.';
                    }
                } else {
                    $result['exception'] = 'No fue posible generar el código de recuperación.';
                }
            } else {
                $result['exception'] = 'El usuario no existe.';
            }
            break;
            //Método para cambiar la contraseña en el apartado recu contra(dashboard)
        case 'recuContra':
            $_POST = $recu->validateForm($_POST);
            if ($recu->setCodigo($_POST['codigo'])) {
                if ($recu->setUsuario($_POST['usuario2'])) {
                    if ($recu->checkCode() == true) {
                        if ($recu->getCodigo() == $_POST['codigo']) {
                            if ($_POST['clave'] == $_POST['confirmar']) {
                                if ($_POST['clave'] != $_POST['usuario2']) {
                                    if ($recu->setClave($_POST['clave'])) {
                                        if ($recu->recuContra()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'La contraseña se ha actualizado correctamente.';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    } else {
                                        $result['exception'] = 'Por favor ingrese una contaseña con un mínimo ocho caracteres, al menos una letra, un número y un carácter especial.';
                                    }
                                } else {
                                    $result['exception'] = 'La contraseña no puede ser igual al nombre de usuario.';
                                }
                            } else {
                                $result['exception'] = 'Las contraseñas no coinciden.';
                            }
                        } else {
                            $result['exception'] = 'El código de recuperación no coincide.';
                        }
                    } else {
                        $result['exception'] = $recu->getCodigo();
                    }
                } else {
                    $result['exception'] = 'Error al intentar cambiar la contraseña.';
                }
            } else {
                $result['exception'] = 'Error al asignar el código de recuperación.';
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
    print(json_encode('Acceso denegado'));
}
//} else {
  //  print(json_encode('Recurso no disponible'));
//}
