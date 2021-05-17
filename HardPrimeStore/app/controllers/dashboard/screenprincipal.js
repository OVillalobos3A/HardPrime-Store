// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_CARGAR = '../../app/api/dashboard/emp.php?action='; 

// Método manejador de eventos que se ejecuta cuando el documento ha cargado.
document.addEventListener('DOMContentLoaded', function () {
    // Se inicializa el componente Tooltip asignado al botón del formulario para que funcione la sugerencia textual.
    M.Tooltip.init(document.querySelectorAll('.tooltipped'));
    readProfile();
});

function readProfile() {
    fetch(API_CARGAR + 'readProfile', {
        method: 'get'
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
                                <img class="circle" height="100" src="../../resources/img/empleados/${row.imagen}">
                            </div>
                            <div class="center-align">
                                <a class="waves-effect waves-light btn"><i class="material-icons right tooltipped" data-tooltip="Modificar perfil" onclick="openUpdateProfile(${row.id_empleado})">account_circle</i>Perfil</a>
                                <a class="waves-effect waves-light btn"><i class="material-icons right tooltipped" data-tooltip="Modificar Credenciales" onclick="openUpdateCredentials(${row.id_usuario})">pin</i>Credenciales</a>
                            </div>
                        `;
                    });
                    // Se agregan las tarjetas a la etiqueta div mediante su id para mostrar las categorías.
                    document.getElementById('profile1').innerHTML = content;
                    // Se inicializa el componente Tooltip asignado a los enlaces para que funcionen las sugerencias textuales.
                    M.Tooltip.init(document.querySelectorAll('.tooltipped'));
                } else {
                    
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

    fetch(API_CARGAR + 'readOne', {
        method: 'post',
        body: data
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    // Se inicializan los campos del formulario con los datos del registro seleccionado.
                    document.getElementById('id_empleado').value = response.dataset.id_empleado;
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
    if (saveRowUser(API_CARGAR, action, 'save-form', 'save-modal')) {
        
    } else {
        
    }
});

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

    fetch(API_CARGAR + 'readOne', {
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
    if (saveRowUser(API_CARGAR, action, 'credential-form', 'credential-modal')) {
        
    } else {
        
    }
});



