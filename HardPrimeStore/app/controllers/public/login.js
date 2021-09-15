const API_LOGIN = '../../app/api/public/clientes.php?action=';

document.addEventListener('DOMContentLoaded', function () {
    var elems = document.getElementById('autent-modal');
    var instances = M.Modal.init(elems, {
        dismissible: false});
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js    
    verSesion();
});


// Método manejador de eventos que se ejecuta cuando se envía el formulario de iniciar sesión.
document.getElementById('session-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();

    fetch(API_LOGIN + 'logIn', {
        method: 'post',
        body: new FormData(document.getElementById('session-form'))
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status == 3) {
                    sweetAlert(3, response.message, 'changepasspublic.php');
                } else if (response.status == 4){
                    sweetAlert(3, response.message, null);
                    openAuntentDialog();
                } else if (response.status == 1) {
                    sweetAlert(1, response.message, 'index.php');
                } else {
                    sweetAlert(2, response.exception, null);
                    if (response.exception == 'Clave incorrecta') {
                        document.getElementById('action').disabled = true;
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

function verSesion() {
    fetch(API_LOGIN + 'sesion', {
        method: 'get'
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    // Se agregan las tarjetas a la etiqueta div mediante su id para mostrar las categorías.
                    sweetAlert(2, "Ya existe una sesión iniciada", 'index.php');
                    // Se inicializa el componente Tooltip asignado a los enlaces para que funcionen las sugerencias textuales.                    
                } else {
                    // Se presenta un mensaje de error cuando no existen datos para mostrar.

                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
}


// Función para preparar el formulario al momento de insertar un registro.
function openAuntentDialog() {
    // Se restauran los elementos del formulario.
    document.getElementById('autent-form').reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    let instance = M.Modal.getInstance(document.getElementById('autent-modal'));
    instance.open();    
}

document.getElementById('autent-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();

    fetch(API_LOGIN + 'readAutenticacion', {
        method: 'post',
        body: new FormData(document.getElementById('autent-form'))
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    sweetAlert(1, response.message, 'index.php');
                } else {
                    sweetAlert(1, response.exception, null);         
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
});



