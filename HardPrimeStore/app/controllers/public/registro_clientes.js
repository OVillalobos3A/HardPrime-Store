// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_CLIENTES = '../../app/api/public/clientes.php?action=';

document.addEventListener('DOMContentLoaded', function () {
    // Se llama a la función que asigna el token del reCAPTCHA al formulario.
    reCAPTCHA();
    let today = new Date();
    // Se declara e inicializa una variable para guardar el día en formato de 2 dígitos.
    let day = ('0' + today.getDate()).slice(-2);
    // Se declara e inicializa una variable para guardar el mes en formato de 2 dígitos.
    var month = ('0' + (today.getMonth() + 1)).slice(-2);
    // Se declara e inicializa una variable para guardar el año con la mayoría de edad.
    let year = today.getFullYear() - 18;
    // Se declara e inicializa una variable para establecer el formato de la fecha.
    let date = `${year}-${month}-${day}`;
    // Se asigna la fecha como valor máximo en el campo del formulario.
    document.getElementById('fecha').setAttribute('max', date);
});

// Función para obtener un token del reCAPTCHA y asignarlo al formulario.
function reCAPTCHA() {
    // Método para generar el token del reCAPTCHA.
    grecaptcha.ready(function () {
        // Se declara e inicializa una variable para guardar la llave pública del reCAPTCHA.
        let publicKey = '6Ld9Z2IcAAAAAHAu0IJJH8nKc3IlcX3CfCO_Ltqt';
        // Se obtiene un token para la página web mediante la llave pública.
        grecaptcha.execute(publicKey, { action: 'homepage' }).then(function (token) {
            // Se asigna el valor del token al campo oculto del formulario
            document.getElementById('g-recaptcha-response').value = token;
        });
    });
}

// Método manejador de eventos que se ejecuta cuando se envía el formulario de registrar.
document.getElementById('save-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();

    fetch(API_CLIENTES + 'register', {
        method: 'post',
        body: new FormData(document.getElementById('save-form'))
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    sweetAlert(1, response.message, 'login.php');
                } else {
                    // Se verifica si el token falló (ya sea por tiempo o por uso).
                    if (response.recaptcha) {
                        sweetAlert(2, response.exception, 'index.php');
                    } else {
                        sweetAlert(2, response.exception, null);
                        // Se genera un nuevo token.
                        reCAPTCHA();
                    }
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
});
