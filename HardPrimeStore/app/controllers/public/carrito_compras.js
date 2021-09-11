document.addEventListener('DOMContentLoaded', function() {
   
  });

// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_CARRITO = '../../app/api/public/carrito.php?action=';

// Método manejador de eventos que se ejecuta cuando el documento ha cargado.
document.addEventListener('DOMContentLoaded', function () {
    // Se llama a la función que obtiene los productos del carrito de compras para llenar la tabla en la vista.
    readOrderDetail();    
});

// Función para obtener el detalle del pedido (carrito de compras).
function readOrderDetail() {
    fetch(API_CARRITO + 'readOrderDetail', {
        method: 'get'
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    // Se declara e inicializa una variable para concatenar las filas de la tabla en la vista.
                    let content = '';
                    let subtotal = 0;
                    // Se declara e inicializa una variable para ir sumando cada subtotal y obtener el monto final a pagar.
                    let total = 0;
                    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
                    response.dataset.map(function (row) {
                        subtotal = row.cost * row.cantidad;
                        total += subtotal;
                        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
                        content += `
                            <tr>
                                <td><img src="../../resources/img/productos/${row.imagen}" class="materialboxed" height="100"></td>
                                <td>${row.nombre}</td>
                                <td>${row.precio}</td>
                                <td>${row.cantidad}</td>
                                <td>${row.subtotal}</td>
                                <td>
                                    <a onclick="openUpdateDialog(${row.id_detalle}, ${row.cantidad}, ${row.id_producto})" class="btn-floating btn-small btn tooltipped waves-effect waves-light orange darken-4" data-position="right" data-tooltip="modificar cantidad"><i class="material-icons">add</i></a>
                                    <a onclick="openDeleteDialog(${row.id_detalle})" class="btn-floating btn-small btn tooltipped waves-effect waves-light orange darken-4" data-position="right" data-tooltip="remover producto"><i class="material-icons">remove</i></a>
                                </td>
                            </tr>
                        `;
                    });
                    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
                    document.getElementById('tabla-carrito').innerHTML = content;
                    document.getElementById('total').textContent = total.toFixed(2);
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

// Función para abrir una caja de dialogo (modal) con el formulario de cambiar cantidad de producto.
function openUpdateDialog(id, quantity, product) {    
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    let instance = M.Modal.getInstance(document.getElementById('item-modal'));
    instance.open();
    // Se inicializan los campos del formulario con los datos del registro seleccionado.
    document.getElementById('id_detalle').value = id;
    document.getElementById('cantidad_producto').value = quantity;
    document.getElementById('id_producto').value = product;
    document.getElementById('stock').value = quantity;
    // Se actualizan los campos para que las etiquetas (labels) no queden sobre los datos.
    M.updateTextFields();
}

// Método manejador de eventos que se ejecuta cuando se envía el formulario de cambiar cantidad de producto.
document.getElementById('item-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    let stock = document.getElementById('stock').value;
    let nquantity = document.getElementById('cantidad_producto').value;
    if (stock == nquantity) {
        document.getElementById('mensaje').textContent = "Por favor ingrese una cantidad que no sea igual, para poder efectuar un cambio.";
    } else {
        if (stock > nquantity) {
            fetch(API_CARRITO + 'updateDetail', {
                method: 'post',
                body: new FormData(document.getElementById('item-form'))
            }).then(function (request) {
                // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
                if (request.ok) {
                    request.json().then(function (response) {
                        // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                        if (response.status) {
                            // Se actualiza la tabla en la vista para mostrar el cambio de la cantidad de producto.
                            readOrderDetail();
                            // Se cierra la caja de dialogo (modal) del formulario.
                            let instance = M.Modal.getInstance(document.getElementById('item-modal'));
                            instance.close();
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
        } else if (stock < nquantity){
            let total = nquantity - stock;
            document.getElementById('sbuscar').value = total;
            fetch(API_CARRITO + 'updateDetail1', {
                method: 'post',
                body: new FormData(document.getElementById('item-form'))
            }).then(function (request) {
                // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
                if (request.ok) {
                    request.json().then(function (response) {
                        // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                        if (response.status) {
                            // Se actualiza la tabla en la vista para mostrar el cambio de la cantidad de producto.
                            readOrderDetail();
                            // Se cierra la caja de dialogo (modal) del formulario.
                            let instance = M.Modal.getInstance(document.getElementById('item-modal'));
                            instance.close();
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
        
    }
});

// Función para mostrar un mensaje de confirmación al momento de eliminar un producto del carrito.
function openDeleteDialog(id) {
    swal({
        title: 'Advertencia',
        text: '¿Está seguro de remover el producto?',
        icon: 'warning',
        buttons: ['No', 'Sí'],
        closeOnClickOutside: false,
        closeOnEsc: false
    }).then(function (value) {
        // Se verifica si fue cliqueado el botón Sí para realizar la petición respectiva, de lo contrario no se hace nada.
        if (value) {
            // Se define un objeto con los datos del registro seleccionado.
            const data = new FormData();
            data.append('id_detalle', id);

            fetch(API_CARRITO + 'deleteDetail', {
                method: 'post',
                body: data
            }).then(function (request) {
                // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
                if (request.ok) {
                    request.json().then(function (response) {
                        // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                        if (response.status) {
                            // Se cargan nuevamente las filas en la tabla de la vista después de borrar un producto del carrito.
                            readOrderDetail();
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

// Función para mostrar un mensaje de confirmación al momento de finalizar el pedido.
function finishOrder() {
    swal({
        title: 'Aviso',
        text: '¿Está seguro de finalizar el pedido?',
        icon: 'info',
        buttons: ['No', 'Sí'],
        closeOnClickOutside: false,
        closeOnEsc: false
    }).then(function (value) {
        // Se verifica si fue cliqueado el botón Sí para realizar la petición respectiva, de lo contrario se muestra un mensaje.
        if (value) {
            fetch(API_CARRITO + 'finishOrder', {
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
            sweetAlert(4, 'Puede seguir comprando', null);
        }
    });
}

function clearField() {
    document.getElementById('mensaje').textContent = "";
}

  