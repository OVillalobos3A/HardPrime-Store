// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_PROFILE =  '../../app/api/dashboard/emp.php?action=';

// Método manejador de eventos que se ejecuta cuando el documento ha cargado.
document.addEventListener('DOMContentLoaded', function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js    
        var elems = document.getElementById('primer-modal');
        var instances = M.Modal.init(elems, {
            dismissible: false});    
    openName(API_PROFILE);     
    openPrimerUso(API_PROFILE);         
    
});
//function(document.getElementById('id_empleado').modal)


function openPrimerUso() {
    fetch(API_PROFILE + 'readPrimerUso', {
        method: 'post',
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {                                        
                    sweetAlert(3, 'Se ha detectado una contraseña por defecto.', null);
                    let instance = M.Modal.getInstance(document.getElementById('primer-modal'));
                    instance.open();
                    M.Tooltip.init(document.querySelectorAll('.tooltipped'));
                } else {
                    //sweetAlert(2, response.exception, null);
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
}



// Función para preparar el formulario al momento de modificar un registro.
function openName() {
    fetch(API_PROFILE + 'openName', {
        method: 'post',
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    let content = '';
                    // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                    response.dataset.map(function (row) {
                        // Se crean y concatenan las tarjetas con los datos de cada categoría.
                        content += `
                            <div>
                                <h4 class="center-align">${row.usuario}</h4>
                            </div>
                            <div class="center-align">
                                <img class="circle" height="100" src="../../resources/img/productos/${row.imagen}">
                            </div>
                            <div class="center-align">
                                <a class="waves-effect waves-light btn"><i class="material-icons right tooltipped" data-tooltip="Modificar perfil" onclick="openUpdateProfile(${row.empleado})">account_circle</i>Perfil</a>
                                <a class="waves-effect waves-light btn"><i class="material-icons right tooltipped" data-tooltip="Modificar Credenciales" onclick="openUpdateCredentials(${row.id_usuario})">pin</i>Credenciales</a>
                            </div>
                        `;
                    });
                    // Se agregan las tarjetas a la etiqueta div mediante su id para mostrar las categorías.
                    document.getElementById('datos').innerHTML = content;
                    // Se inicializa el componente Tooltip asignado a los enlaces para que funcionen las sugerencias textuales.
                    M.Tooltip.init(document.querySelectorAll('.tooltipped'));
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
}

// Función para preparar el formulario al momento de modificar un registro.
function openUpdateProfile(id) {
    // Se restauran los elementos del formulario.
    document.getElementById('save-form').reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    let instance = M.Modal.getInstance(document.getElementById('save-modal'));
    instance.open();
    // Se asigna el título para la caja de dialogo (modal).
    document.getElementById('modal-title').textContent = 'Editar perfil';
    // Se establece el campo de archivo como opcional.
    document.getElementById('archivo').required = false;
    

    const data = new FormData();
    data.append('id_empleado', id);

    fetch(API_PROFILE + 'readEmfileds', {
        method: 'post',
        body: data
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    // Se inicializan los campos del formulario con los datos del registro seleccionado.
                    document.getElementById('id_empleado').value = response.dataset.emp;
                    document.getElementById('nombre').value = response.dataset.nombre;
                    document.getElementById('apellido').value = response.dataset.apellido;
                    document.getElementById('correo').value = response.dataset.correo;
                    document.getElementById('tel').value = response.dataset.telefono;
                    // Se actualizan los campos para que las etiquetas (labels) no queden sobre los datos.
                    M.updateTextFields();
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
}
function openUpdateCredentials(id) {
    // Se restauran los elementos del formulario.
    document.getElementById('credential-form').reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    let instance = M.Modal.getInstance(document.getElementById('credential-modal'));
    instance.open();
    // Se asigna el título para la caja de dialogo (modal).
    document.getElementById('modal-title1').textContent = 'Editar credenciales';
    // Se establece el campo de archivo como opcional.
    document.getElementById('ncontra').required = false;
    document.getElementById('ncontra1').required = false;

    const data = new FormData();
    data.append('id_usuario', id);

    fetch(API_PROFILE + 'readEmfileds', {
        method: 'post',
        body: data
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    // Se inicializan los campos del formulario con los datos del registro seleccionado.
                    document.getElementById('id_usuario').value = response.dataset.id_usuario;
                    document.getElementById('alias').value = response.dataset.usuario;
                    // Se actualizan los campos para que las etiquetas (labels) no queden sobre los datos.
                    M.updateTextFields();
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
}

document.getElementById('primer-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se define una variable para establecer la acción a realizar en la API.
    let action = '';
    // Se comprueba si el campo oculto del formulario esta seteado para actualizar, de lo contrario será para crear.    
    action = 'updatePass';    
    saveRowUser(API_PROFILE, action, 'primer-form', 'primer-modal');
});

document.getElementById('save-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se define una variable para establecer la acción a realizar en la API.
    let action = '';
    // Se comprueba si el campo oculto del formulario esta seteado para actualizar, de lo contrario será para crear.
    if (document.getElementById('id_empleado').value) {
        action = 'updateProfile';
    } else {
    }
    saveRowUser(API_PROFILE, action, 'save-form', 'save-modal');
});

document.getElementById('credential-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se define una variable para establecer la acción a realizar en la API.
    let action = '';
    // Se comprueba si el campo oculto del formulario esta seteado para actualizar, de lo contrario será para crear.
    if (document.getElementById('id_usuario').value) {
        action = 'updateUserCredentials';
    } else {

    }
    
    saveRowUser(API_PROFILE, action, 'credential-form', 'credential-modal');

});
