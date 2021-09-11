// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_CLIENT= '../../app/api/public/clientes.php?action=';
// Función para mostrar un mensaje de confirmación al momento de cerrar sesión.
document.addEventListener('DOMContentLoaded', function () {
       timeOut();
});

function cerrarSesion() {
    swal({
        title: 'Advertencia',
        text: '¿Quiere cerrar la sesión?',
        icon: 'warning',
        buttons: ['No', 'Sí'],
        closeOnClickOutside: false,
        closeOnEsc: false
    }).then(function (value) {
        // Se verifica si fue cliqueado el botón Sí para hacer la petición de cerrar sesión, de lo contrario se muestra un mensaje.
        if (value) {
            fetch(API_CLIENT + 'logOut', {
                method: 'get'
            }).then(function (request) {
                // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
                if (request.ok) {
                    request.json().then(function (response) {
                        // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                        if (response.status) {
                            sweetAlert(1, response.message, 'index.php');
                        } else {
                            sweetAlert(2, response.exception, null);
                        }
                    });
                } else {
                    console.log(request.status + ' ' + request.statusText);
                }
            }).catch(function (error) {
                console.log(error);
            });
        } else {
            sweetAlert(4, 'Puede continuar con la sesión', null);
        }
    });
}

    function verificarSesion() {
        fetch(API_CLIENT + 'sesion', {
            method: 'get'
        }).then(function (request) {
            // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
            if (request.ok) {
                request.json().then(function (response) {
                    // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                    if (response.status) {
                      
                        // Se agregan las tarjetas a la etiqueta div mediante su id para mostrar las categorías.
                        document.getElementById('btnlogin').disabled = true;
                        // Se inicializa el componente Tooltip asignado a los enlaces para que funcionen las sugerencias textuales.
                        M.Tooltip.init(document.querySelectorAll('.tooltipped'));
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

    function timeOut() {
        fetch(API_CLIENT + 'timeOut', {
            method: 'get'
        }).then(function (request) {
            // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
            if (request.ok) {
                request.json().then(function (response) {
                    // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                    if (response.status) {                  
                        // Se agregan las tarjetas a la etiqueta div mediante su id para mostrar las categorías.
                        sweetAlert(2, "La sesión ha sido destruida por inactividad", 'login.php');
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