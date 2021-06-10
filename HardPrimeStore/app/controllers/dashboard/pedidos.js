// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_PEDIDOS = '../../app/api/dashboard/pedidos.php?action=';

// Método manejador de eventos que se ejecuta cuando el documento ha cargado.
document.addEventListener('DOMContentLoaded', function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows(API_PEDIDOS);
});


element = document.getElementById('ocultable');
element.style.display = 'none';

// Función para llenar la tabla con los datos de los registros. Se manda a llamar en la función readRows().
function fillTable(dataset) {
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.map(function (row) {
        fechape = row.fecha_pedido;
        estado = row.estado;
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        if (fechape == null && estado == "En preparacion") {
            content += `
                <tr>
                    <td>${row.id_pedido}</td>
                    <td>${row.estado}</td>
                    <td>${row.total}</td>
                    <td>No definida</td>
                    <td>${row.direccion}</td>
                    <td>${row.cliente}</td>
                    <td>${row.usuario}</td>
                    <td>
                        <a href="#" onclick="openAct(${row.id_pedido})" class="btn waves-effect blue tooltipped" data-tooltip="Finalizar pedido"><i class="material-icons">task_alt</i></a>
                        <a href="#" onclick="openAct2(${row.id_pedido})" class="btn blue-grey tooltipped" data-tooltip="Ver detalle"><i class="material-icons">shopping_cart</i></a>
                    </td>
                </tr>
            `;

        } else if(fechape != null && estado == "Finalizado") {
            content += `
                <tr>
                    <td>${row.id_pedido}</td>
                    <td>${row.estado}</td>
                    <td>${row.total}</td>
                    <td>${row.fecha_pedido}</td>
                    <td>${row.direccion}</td>
                    <td>${row.cliente}</td>
                    <td>${row.usuario}</td>
                    <td>
                        <a href="#" onclick="openEntrega(${row.id_pedido})" class="btn waves-effect green tooltipped" data-tooltip="Dar por entregado"><i class="material-icons">local_shipping</i></a>
                        <a href="#" onclick="openAct2(${row.id_pedido})" class="btn blue-grey tooltipped" data-tooltip="Ver detalle"><i class="material-icons">shopping_cart</i></a>
                    </td>
                </tr>
            `;
        } else if(fechape != null && estado == "Entregado") {
            content += `
                <tr>
                    <td>${row.id_pedido}</td>
                    <td>${row.estado}</td>
                    <td>${row.total}</td>
                    <td>${row.fecha_pedido}</td>
                    <td>${row.direccion}</td>
                    <td>${row.cliente}</td>
                    <td>${row.usuario}</td>
                    <td>
                        <a href="#" onclick="openAct2(${row.id_pedido})" class="btn blue-grey tooltipped" data-tooltip="Ver detalle"><i class="material-icons">shopping_cart</i></a>
                    </td>
                </tr>
            `;
        }
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
    searchRows(API_PEDIDOS, 'search-form');
});

// Función para establecer el registro a eliminar y abrir una caja de dialogo de confirmación.
function openDeleteDialog(id) {
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_pedido', id);
    // Se llama a la función que elimina un registro. Se encuentra en el archivo components.js
    confirmDelete(API_PEDIDOS, data);
}

function openTable() {
    // Se restauran los elementos del formulario.
    document.getElementById('search').value = "";
    //Se cargan nuevamente las filas en la tabla de la vista después de presionar el botón.
    readRows(API_PEDIDOS);
}

function openAct(id) {
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_pedido', id);
    swal({
        title: 'Advertencia',
        text: '¿Desea dar por finalizado el pedido?',
        icon: 'warning',
        buttons: ['No', 'Sí'],
        closeOnClickOutside: false,
        closeOnEsc: false
    }).then(function (value) {
        // Se verifica si fue cliqueado el botón Sí para hacer la petición de borrado, de lo contrario no se hace nada.
        if (value) {
            fetch(API_PEDIDOS + 'update', {
                method: 'post',
                body: data
            }).then(function (request) {
                // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
                if (request.ok) {
                    request.json().then(function (response) {
                        // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                        if (response.status) {
                            // Se cargan nuevamente las filas en la tabla de la vista después de borrar un registro.
                            readRows(API_PEDIDOS);
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
    data.append('id_pedido', id);
    searchRows2(API_PEDIDOS, data);
    function searchRows2(api, data) {
        fetch(api + 'viewShop', {
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
                <td> 
                    ${row.nombre}<br><img src="../../resources/img/productos/${row.imagen}" class="materialboxed" height="100">
                </td>
                <td>${row.cantidad}</td>
                <td>${row.precio}</td>
                <td>${row.subtotal}</td>
            </tr>
            `;
        });
        // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
        document.getElementById('tbody-rows1').innerHTML = content;
        // Se inicializa el componente Material Box asignado a las imagenes para que funcione el efecto Lightbox.
    }
}

function openCancel(id) {
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_pedido', id);
    swal({
        title: 'Advertencia',
        text: '¿Desea cancelar el pedido?',
        icon: 'warning',
        buttons: ['No', 'Sí'],
        closeOnClickOutside: false,
        closeOnEsc: false
    }).then(function (value) {
        // Se verifica si fue cliqueado el botón Sí para hacer la petición de borrado, de lo contrario no se hace nada.
        if (value) {
            fetch(API_PEDIDOS + 'cancelpedido1', {
                method: 'post',
                body: data
            }).then(function (request) {
                // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
                if (request.ok) {
                    request.json().then(function (response) {
                        // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                        if (response.status) {
                            // Se cargan nuevamente las filas en la tabla de la vista después de borrar un registro.
                            readRows(API_PEDIDOS);
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

function openEntrega(id) {
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_pedido', id);
    swal({
        title: 'Advertencia',
        text: '¿Desea dar por entregado el pedido?',
        icon: 'warning',
        buttons: ['No', 'Sí'],
        closeOnClickOutside: false,
        closeOnEsc: false
    }).then(function (value) {
        // Se verifica si fue cliqueado el botón Sí para hacer la petición de borrado, de lo contrario no se hace nada.
        if (value) {
            fetch(API_PEDIDOS + 'entrega', {
                method: 'post',
                body: data
            }).then(function (request) {
                // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
                if (request.ok) {
                    request.json().then(function (response) {
                        // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                        if (response.status) {
                            // Se cargan nuevamente las filas en la tabla de la vista después de borrar un registro.
                            readRows(API_PEDIDOS);
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

