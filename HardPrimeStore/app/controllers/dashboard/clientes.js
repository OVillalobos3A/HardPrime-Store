// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_CLIENTES = '../../app/api/dashboard/Clientes.php?action=';

// Método manejador de eventos que se ejecuta cuando el documento ha cargado.
document.addEventListener('DOMContentLoaded', function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows(API_CLIENTES);
});

element = document.getElementById('ocultable');
element.style.display = 'none';


// Función para llenar la tabla con los datos de los registros. Se manda a llamar en la función readRows().
function fillTable(dataset) {
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.map(function (row) {
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>
                <td>${row.nombre}</td>
                <td>${row.apellido}</td>
                <td>${row.correo}</td>
                <td>${row.direccion}</td>
                <td>${row.celular}</td>
                <td>${row.estado}</td>
                <td>
                    <a href="#" onclick="openAct(${row.id_cliente})" class="btn waves-effect blue tooltipped" data-tooltip="Deshabilitar/Habilitar"><i class="material-icons">event_note</i></a>
                    <a href="#" onclick="openAct2(${row.id_cliente})" class="btn blue-grey tooltipped" data-tooltip="Ver pedidos"><i class="material-icons">local_mall</i></a>
                    <a href="#" onclick="openDeleteDialog(${row.id_cliente})" class="hide btn waves-effect red tooltipped" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
                </td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    document.getElementById('tbody-rows').innerHTML = content;
    // Se inicializa el componente Material Box asignado a las imagenes para que funcione el efecto Lightbox.
    M.Materialbox.init(document.querySelectorAll('.materialboxed'));
    // Se inicializa el componente Tooltip asignado a los enlaces para que funcionen las sugerencias textuales.
    M.Tooltip.init(document.querySelectorAll('.tooltipped'));
}

// Método manejador de eventos que se ejecuta cuando se envía el formulario de buscar.
document.getElementById('search-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows(API_CLIENTES, 'search-form');
});

// Función para establecer el registro a eliminar y abrir una caja de dialogo de confirmación.
function openDeleteDialog(id) {
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_cliente', id);
    // Se llama a la función que elimina un registro. Se encuentra en el archivo components.js
    confirmDelete(API_CLIENTES, data);
}

function openTable() {
    // Se restauran los elementos del formulario.
    document.getElementById('search').value = "";
    //Se cargan nuevamente las filas en la tabla de la vista después de presionar el botón.
    readRows(API_CLIENTES);
}

function openAct(id) {
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_cliente', id);
    swal({
        title: 'Advertencia',
        text: '¿Desea desabilitar/activar al cliente?',
        icon: 'warning',
        buttons: ['No', 'Sí'],
        closeOnClickOutside: false,
        closeOnEsc: false
    }).then(function (value) {
        // Se verifica si fue cliqueado el botón Sí para hacer la petición de borrado, de lo contrario no se hace nada.
        if (value) {
            fetch(API_CLIENTES + 'update', {
                method: 'post',
                body: data
            }).then(function (request) {
                // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
                if (request.ok) {
                    request.json().then(function (response) {
                        // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                        if (response.status) {
                            // Se cargan nuevamente las filas en la tabla de la vista después de borrar un registro.
                            readRows(API_CLIENTES);
                            sweetAlert(1, response.message, null);
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
    });
}


function openAct2(id) {
    //Método para ocultar y mostrar secciones en la página correspondiente a pedidos.
    const data = new FormData();
    data.append('id_cliente', id);
    searchRows2(API_CLIENTES, data);
    function searchRows2(api, data) {
        fetch(api + 'viewOrder', {
            method: 'post',
            body: data
        }).then(function (request) {
            // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
            if (request.ok) {
                request.json().then(function (response) {
                    // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                    if (response.status) {
                        // Se envían los datos a la función del controlador para que llene la tabla en la vista.
                        fillTable1(response.dataset);
                        sweetAlert(1, response.message, null);
                        element = document.getElementById('ocultable');
                        estado = element.style.display;
                        if (estado == 'none') {
                            element.style.display = 'block'
                        } else {
                            element.style.display = 'none';
                        }
                        element = document.getElementById('ocultable1');
                        estado = element.style.display;
                        if (estado == 'none') {
                            element.style.display = 'block'
                        } else {
                            element.style.display = 'none';
                        }
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
    function fillTable1(dataset) {
        let content = '';
        // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
        dataset.map(function (row) {
            // Se crean y concatenan las filas de la tabla con los datos de cada registro.
            content += `
            <tr>
                <td>${row.id_pedido}</td>
                <td>${row.estado}</td>
                <td>${row.fecha_pedido}</td>
                <td>${row.fecha_envio}</td>
                <td>${row.direccion}</td>
                <td>${row.encargado}</td>
            </tr>
            `;
        });
        // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
        document.getElementById('tbody-rows1').innerHTML = content;
        // Se inicializa el componente Material Box asignado a las imagenes para que funcione el efecto Lightbox.
    }
}

//Método para ocultar y mostrar secciones en la página correspondiente a pedidos.
element = document.getElementById('ocultable');
element.style.display = 'none';
function mostrarOcultar() {
    element = document.getElementById('ocultable');
    estado = element.style.display;
    if (estado == 'none') {
        element.style.display = 'block'
    } else {
        element.style.display = 'none';
    }
    element = document.getElementById('ocultable1');
    estado = element.style.display;
    if (estado == 'none') {
        element.style.display = 'block'
    } else {
        element.style.display = 'none';
    }
}


