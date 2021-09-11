document.addEventListener('DOMContentLoaded', function () {   
    
});

// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_PEDIDOS = '../../app/api/public/mi_cuenta.php?action=';
const API_COMENTARIOS = '../../app/api/public/valoraciones.php?action=';

// Método manejador de eventos que se ejecuta cuando el documento ha cargado.
document.addEventListener('DOMContentLoaded', function () {
    openName();
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readPedido();
    //openComments();
    readRows(API_COMENTARIOS);
});


element = document.getElementById('ocultable');
element.style.display = 'none';

function readPedido() {
    document.getElementById('search').value = "";
    fetch(API_PEDIDOS + 'readPedido', {
        method: 'get'
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    // Se declara e inicializa una variable para concatenar las filas de la tabla en la vista.
                    let content = '';
                    response.dataset.map(function (row) {
                        estado = row.estado;
                        if (estado == "Entregado" || estado == "Cancelado") {
                            content += `
                                <tr>
                                    <td>${row.id_pedido}</td>
                                    <td>${row.estado}</td>
                                    <td>${row.fecha_pedido}</td>
                                    <td>${row.direccion}</td>
                                    <td>${row.total}</td>
                                    <td>
                                        <a href="#" onclick="openAct2(${row.id_pedido})" class="btn blue-grey tooltipped" data-tooltip="Ver detalle"><i class="material-icons">shopping_cart</i></a>
                                        <a href="../../app/reports/comprobante.php?id=${row.id_pedido}" target="_blank" class="btn waves-effect light-blue darken-4 tooltipped" data-tooltip="Reporte de valoraciones por producto"><i class="material-icons">assignment</i></a>
                                    </td>
                                 </tr>
                            `;

                        } else {
                            content += `
                                <tr>
                                    <td>${row.id_pedido}</td>
                                    <td>${row.estado}</td>
                                    <td>${row.fecha_pedido}</td>
                                    <td>${row.direccion}</td>
                                    <td>${row.total}</td>
                                    <td>
                                        <a href="#" onclick="openAct2(${row.id_pedido})" class="btn blue-grey tooltipped" data-tooltip="Ver detalle"><i class="material-icons">shopping_cart</i></a>
                                        <a href="../../app/reports/comprobante.php?id=${row.id_pedido}" target="_blank" class="btn waves-effect light-blue darken-4 tooltipped" data-tooltip="Comprobante de compra"><i class="material-icons">assignment</i></a>
                                    </td>
                                </tr>
                            `;

                        }
                    });
                    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
                    document.getElementById('tbody-rows').innerHTML = content;
                    // Se inicializa el componente Tooltip asignado a los enlaces para que funcionen las sugerencias textuales.
                    M.Tooltip.init(document.querySelectorAll('.tooltipped'));
                } else {
                    sweetAlert(4, response.exception, 'index.php');
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
}


// Método manejador de eventos que se ejecuta cuando se envía el formulario de buscar.
document.getElementById('search-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchPedido(API_PEDIDOS, 'search-form');
});

function searchPedido(api, form) {
    fetch(api + 'searchPedido', {
        method: 'post',
        body: new FormData(document.getElementById(form))
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    sweetAlert(1, response.message, null);
                    // Se envían los datos a la función del controlador para que llene la tabla en la vista.
                     let content = '';
                     response.dataset.map(function (row) {
                         estado = row.estado;
                         if (estado == "Entregado" || estado == "Cancelado") {
                             content += `
                                 <tr>
                                     <td>${row.id_pedido}</td>
                                     <td>${row.estado}</td>
                                     <td>${row.fecha_pedido}</td>
                                     <td>${row.direccion}</td>
                                     <td>${row.total}</td>
                                     <td>
                                         <a href="#" onclick="openAct2(${row.id_pedido})" class="btn blue-grey tooltipped" data-tooltip="Ver detalle"><i class="material-icons">shopping_cart</i></a>
                                     </td>
                                  </tr>
                             `;
 
                         } else {
                             content += `
                                 <tr>
                                     <td>${row.id_pedido}</td>
                                     <td>${row.estado}</td>
                                     <td>${row.fecha_pedido}</td>
                                     <td>${row.direccion}</td>
                                     <td>${row.total}</td>
                                     <td>
                                         <a href="#" onclick="openAct2(${row.id_pedido})" class="btn blue-grey tooltipped" data-tooltip="Ver detalle"><i class="material-icons">shopping_cart</i></a>
                                     </td>
                                 </tr>
                             `;
 
                         }
                     });
                     // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
                     document.getElementById('tbody-rows').innerHTML = content;
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

// Función para establecer el registro a eliminar y abrir una caja de dialogo de confirmación.
function openDeleteDialog(id) {
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_pedido', id);
    // Se llama a la función que elimina un registro. Se encuentra en el archivo components.js
    confirmDelete(API_PEDIDOS, data);
}

function openTable() {
    //Se cargan nuevamente las filas en la tabla de la vista después de presionar el botón.
    readPedido();
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

function openAct(id) {
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
            fetch(API_PEDIDOS + 'cancel', {
                method: 'post',
                body: data
            }).then(function (request) {
                // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
                if (request.ok) {
                    request.json().then(function (response) {
                        // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                        if (response.status) {
                            // Se cargan nuevamente las filas en la tabla de la vista después de borrar un registro.
                            readPedido();
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
                        element2 = document.getElementById('ocultable_2');
                        estado2 = element.style.display;
                        if (estado == 'none') {
                            element.style.display = 'block'
                            element2.style.display = 'block'
                        } else {
                            element.style.display = 'none';
                            element2.style.display = 'none';
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

function fillTable(dataset) {
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.map(function (row) {
        let estado = row.estado;
        // Se establece un icono para el estado del producto.        
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        if (estado == "Deshabilitado") {
            content += `
                <tr>
                    <td class="center align">${row.nombre}</td>
                    <td class="center align">En revisión</td>
                    <td class="center align">${row.calificacion}</td>
                    <td class="center align">${row.fecha}</td>
                    <td class="center align">${row.comentario}</td>
                    <td class="center align">
                        <a onclick="openActComment(${row.id_calificacion})" class="btn-floating btn-small btn tooltipped waves-effect waves-light orange darken-4" data-position="right" data-tooltip="editar valoración"><i class="material-icons">edit</i></a>
                    </td>
                </tr>
            `;

        } else {
            content += `
                <tr>
                    <td class="center align">${row.nombre}</td>
                    <td class="center align">${row.estado}</td>
                    <td class="center align">${row.calificacion}</td>
                    <td class="center align">${row.fecha}</td>
                    <td class="center align">${row.comentario}</td>
                    <td class="center align">
                        <a onclick="openActComment(${row.id_calificacion})" class="btn-floating btn-small btn tooltipped waves-effect waves-light orange darken-4" data-position="right" data-tooltip="editar valoración"><i class="material-icons">edit</i></a>
                    </td>
                </tr>
            `;

        }
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    document.getElementById('tbody-rows_2').innerHTML = content;
    // Se inicializa el componente Tooltip asignado a los enlaces para que funcionen las sugerencias textuales.
    M.Tooltip.init(document.querySelectorAll('.tooltipped'));
}

function openComments() {
    fetch(API_COMENTARIOS + 'detalleComentarios', {
        method: 'get'
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    // Se declara e inicializa una variable para concatenar las filas de la tabla en la vista.
                    let content = '';
                    response.dataset.map(function (row) {

                        content += `
                                <tr>
                                    <td class="center align">${row.nombre}</td>
                                    <td class="center align">${row.estado}</td>
                                    <td class="center align">${row.calificacion}</td>
                                    <td class="center align">${row.fecha}</td>
                                    <td class="center align">${row.comentario}</td>
                                    <td class="center align">
                                    <a onclick="openActComment(${row.id_calificacion})" class="btn-floating btn-small btn tooltipped waves-effect waves-light orange darken-4" data-position="right" data-tooltip="editar valoración"><i class="material-icons">edit</i></a>                                    
                                    </td>
                                 </tr>
                            `;

                    });
                    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
                    document.getElementById('tbody-rows_2').innerHTML = content;
                    // Se inicializa el componente Tooltip asignado a los enlaces para que funcionen las sugerencias textuales.
                    M.Tooltip.init(document.querySelectorAll('.tooltipped'));
                } else {
                    sweetAlert(4, response.exception, 'index.php');
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
}

function openActComment(id) {
    // Se restauran los elementos del formulario.
    document.getElementById('comment-form').reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    let instance = M.Modal.getInstance(document.getElementById('comment-modal'));
    instance.open();

    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_calificacion', id);

    fetch(API_COMENTARIOS + 'readActualizar', {
        method: 'post',
        body: data
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    // Se inicializan los campos del formulario con los datos del registro seleccionado.
                    obtenerFecha();
                    document.getElementById('id_calificacion_act').value = response.dataset.id_calificacion;                    
                    document.getElementById('comentario').value = response.dataset.comentario;
                    if(response.dataset.calificacion == 1.00){
                        document.getElementById('calificacion').value = 1;
                    }
                    else if(response.dataset.calificacion == 2.00){
                        document.getElementById('calificacion').value = 2;
                    }
                    else if(response.dataset.calificacion == 3.00){
                        document.getElementById('calificacion').value = 3;
                    }
                    else if(response.dataset.calificacion == 4.00){
                        document.getElementById('calificacion').value = 4;
                    }
                    else{
                        document.getElementById('calificacion').value = 5;
                    }                    
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

document.getElementById('comment-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();

    // Se define una variable para establecer la acción a realizar en la API.
    let action = '';
    // Se comprueba si el campo oculto del formulario esta seteado para actualizar, de lo contrario será para crear.        
    action = 'updateComentario';

    saveRow(API_COMENTARIOS, action, 'comment-form', 'comment-modal');
});

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
    element2 = document.getElementById('ocultable_2');
    estado2 = element.style.display;
    if (estado == 'none') {
        element.style.display = 'block'
        element2.style.display = 'block'
    } else {
        element.style.display = 'none';
        element2.style.display = 'none';
    }
}

function obtenerFecha() {
    // Se declara e inicializa un objeto para obtener la fecha y hora actual.
    let today = new Date();
    // Se declara e inicializa una variable para guardar el día en formato de 2 dígitos.
    let day = ('0' + today.getDate()).slice(-2);
    // Se declara e inicializa una variable para guardar el mes en formato de 2 dígitos.
    var month = ('0' + (today.getMonth() + 1)).slice(-2);
    // Se declara e inicializa una variable para guardar el año con la mayoría de edad.
    let year = today.getFullYear();
    // Se declara e inicializa una variable para establecer el formato de la fecha.
    let date = `${year}-${month}-${day}`;
    document.getElementById('fecha').value = date;
}

// Función para preparar el formulario al momento de modificar un registro.
function openName() {
    fetch(API_COMENTARIOS + 'openName', {
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
                                <a class="waves-effect waves-light btn"><i class="material-icons right tooltipped" data-tooltip="Modificar Credenciales" onclick="openUpdateCredentials(${row.id_cliente})">pin</i>Credenciales</a>
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
    data.append('id_cliente', id);

    fetch(API_COMENTARIOS + 'readEmfileds', {
        method: 'post',
        body: data
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    // Se inicializan los campos del formulario con los datos del registro seleccionado.
                    document.getElementById('id_cliente').value = response.dataset.id_cliente;
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
    if (document.getElementById('id_cliente').value) {
        action = 'updateUserCredentials';
    } else {

    }
    saveRowClient(API_COMENTARIOS, action, 'credential-form', 'credential-modal');
});

function saveRowClient(api, action, form, modal) {
    fetch(api + action, {
        method: 'post',
        body: new FormData(document.getElementById(form))
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    // Se cierra la caja de dialogo (modal) del formulario.
                    let instance = M.Modal.getInstance(document.getElementById(modal));
                    instance.close();
                    openName();
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