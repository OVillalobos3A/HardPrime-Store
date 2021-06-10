document.addEventListener('DOMContentLoaded', function () {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);

    var elems = document.querySelectorAll('.autocomplete');
    var instances = M.Autocomplete.init(elems);

    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems);

    var elems = document.querySelectorAll('.materialboxed');
    var instances = M.Materialbox.init(elems);

    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);

    var elems = document.querySelectorAll('.tooltipped');
    var instances = M.Tooltip.init(elems);

    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);

    var elems = document.querySelectorAll('.datepicker');
    var instances = M.Datepicker.init(elems);

    //Se inicializa el componente nav dropdwn (navegación despegable)
    let dropdowns = document.querySelectorAll('.dropdown-trigger');
    let instancia_dropwdown = M.Dropdown.init(dropdowns, {
        hover: false
    });
});
// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_INDEX = '../../app/api/public/index.php?action=';
const API_CARRITO = '../../app/api/public/carrito.php?action=';
const API_VALORAR = '../../app/api/public/valoraciones.php?action=';
// Método manejador de eventos que se ejecuta cuando el documento ha cargado.
document.addEventListener('DOMContentLoaded', function () {
    // Se busca en la URL las variables (parámetros) disponibles.
    let params = new URLSearchParams(location.search);
    // Se obtienen los datos localizados por medio de las variables.
    const idpro = params.get('id');
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js      
    openProduct(idpro);
    obtenerFecha();
    mostrarComentarios(idpro);
    viewProm(idpro);
});

// Función para obtener y mostrar los productos de acuerdo a la categoría seleccionada.
function openProduct(id) {
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_producto', id);

    fetch(API_INDEX + 'openProduct', {
        method: 'post',
        body: data
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    // Se colocan los datos en la tarjeta de acuerdo al producto seleccionado previamente.
                    document.getElementById('imagen').setAttribute('src', '../../resources/img/productos/' + response.dataset.imagen);
                    document.getElementById('imagen2').setAttribute('src', '../../resources/img/productos/' + response.dataset.imagen2);
                    document.getElementById('nombre').textContent = response.dataset.nombre;
                    document.getElementById('descripcion').textContent = response.dataset.descripcion;
                    document.getElementById('precio').textContent = response.dataset.precio;
                    // Se asigna el valor del id del producto al campo oculto del formulario.
                    document.getElementById('id_producto').value = response.dataset.id_producto;
                    document.getElementById('id_producto2').value = response.dataset.id_producto;
                } else {
                    // Se presenta un mensaje de error cuando no existen datos para mostrar.
                    document.getElementById('title').innerHTML = `<i class="material-icons small">cloud_off</i><span class="red-text">${response.exception}</span>`;
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
}

// Método manejador de eventos que se ejecuta cuando se envía el formulario de agregar un producto al carrito.
document.getElementById('shopping-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();

    fetch(API_CARRITO + 'createDetail', {
        method: 'post',
        body: new FormData(document.getElementById('shopping-form'))
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se constata si el cliente ha iniciado sesión.
                if (response.status) {
                    sweetAlert(1, response.message, 'carrito_compras.php');
                } else {
                    // Se verifica si el cliente ha iniciado sesión para mostrar la excepción, de lo contrario se direcciona para que se autentique. 
                    if (response.session) {
                        sweetAlert(2, response.exception, null);
                    } else {
                        sweetAlert(3, response.exception, 'login.php');
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

document.getElementById('valorar-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();

    fetch(API_VALORAR + 'createValoracion', {
        method: 'post',
        body: new FormData(document.getElementById('valorar-form'))
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
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
});

function mostrarComentarios(id) {
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_producto', id);

    fetch(API_VALORAR + 'readComments', {
        method: 'post',
        body: data
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    let content = '';
                    // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                    response.dataset.map(function (row) {

                        if (row.calificacion == 1.00) {                            
                            content += `                  
                            <li class="collection-item avatar">
                            <img class="circle" height="50" src="../../resources/img/productos/${row.imagen}">
                              <span class="title"><b>${row.usuario}</b></span>
                              <p>${row.fecha}<br>
                                  ${row.comentario}
                              </p>                              
                                  <div class="ec-stars-wrapper" id="estrellas1">
                                    <a class="secondary-content" data-value="1" title="Votar con 1 estrellas">&#9733;&#9733;&#9733;&#9733;&#9733;</a>
                                  </div>
                                  <div class="ec-stars-wrapper" id="estrella2">
                                    <a class="secondary-content" data-value="2" title="Votar con 2 estrellas">&#9733;&#9733;&#9733;&#9733;</a>
                                  </div>
                                  <div class="ec-stars-wrapper" id="estrella3">
                                    <a  class="secondary-content" data-value="3" title="Votar con 3 estrellas">&#9733;&#9733;&#9733;</a>
                                  </div>
                                  <div class="ec-stars-wrapper" id="estrella4">
                                    <a  class="secondary-content" data-value="4" title="Votar con 4 estrellas">&#9733;&#9733;</a>
                                  </div>
                                  <div class="ec-stars-wrapper" id="estrella5">
                                    <a  class="secondary-content" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
                                  </div>
                              
                              `                                                                                                   
                          ;                                       
                                }                                                                   
                        
                        else if (row.calificacion == 2.00){
                            content += `                  
                            <li class="collection-item avatar">
                            <img class="circle" height="50" src="../../resources/img/productos/${row.imagen}">
                              <span class="title"><b>${row.usuario}</b></span>
                              <p>${row.fecha}<br>
                                  ${row.comentario}
                              </p>                              
                                  <div class="ec-stars-wrapper" id="estrellas1">
                                    <a class="secondary-content" data-value="1" title="Votar con 1 estrellas">&#9733;&#9733;&#9733;&#9733;&#9733;</a>
                                  </div>
                                  <div class="ec-stars-wrapper" id="estrellas2">
                                    <a class="secondary-content" data-value="2" title="Votar con 2 estrellas">&#9733;&#9733;&#9733;&#9733;</a>
                                  </div>
                                  <div class="ec-stars-wrapper" id="estrella3">
                                    <a  class="secondary-content" data-value="3" title="Votar con 3 estrellas">&#9733;&#9733;&#9733;</a>
                                  </div>
                                  <div class="ec-stars-wrapper" id="estrella4">
                                    <a  class="secondary-content" data-value="4" title="Votar con 4 estrellas">&#9733;&#9733;</a>
                                  </div>
                                  <div class="ec-stars-wrapper" id="estrella5">
                                    <a  class="secondary-content" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
                                  </div>
                              
                              `                                                                                                   
                          ;
                        }

                        else if (row.calificacion == 3.00){
                            content += `                  
                            <li class="collection-item avatar">
                            <img class="circle" height="50" src="../../resources/img/productos/${row.imagen}">
                              <span class="title"><b>${row.usuario}</b></span>
                              <p>${row.fecha}<br>
                                  ${row.comentario}
                              </p>                              
                                  <div class="ec-stars-wrapper" id="estrellas1">
                                    <a class="secondary-content" data-value="1" title="Votar con 1 estrellas">&#9733;&#9733;&#9733;&#9733;&#9733;</a>
                                  </div>
                                  <div class="ec-stars-wrapper" id="estrellas2">
                                    <a class="secondary-content" data-value="2" title="Votar con 2 estrellas">&#9733;&#9733;&#9733;&#9733;</a>
                                  </div>
                                  <div class="ec-stars-wrapper" id="estrellas3">
                                    <a  class="secondary-content" data-value="3" title="Votar con 3 estrellas">&#9733;&#9733;&#9733;</a>
                                  </div>
                                  <div class="ec-stars-wrapper" id="estrella4">
                                    <a  class="secondary-content" data-value="4" title="Votar con 4 estrellas">&#9733;&#9733;</a>
                                  </div>
                                  <div class="ec-stars-wrapper" id="estrella5">
                                    <a  class="secondary-content" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
                                  </div>
                              
                              `                                                                                                   
                          ;
                        }

                        else if (row.calificacion == 4.00){
                            content += `                  
                            <li class="collection-item avatar">
                            <img class="circle" height="50" src="../../resources/img/productos/${row.imagen}">
                              <span class="title"><b>${row.usuario}</b></span>
                              <p>${row.fecha}<br>
                                  ${row.comentario}
                              </p>                              
                                  <div class="ec-stars-wrapper" id="estrellas1">
                                    <a class="secondary-content" data-value="1" title="Votar con 1 estrellas">&#9733;&#9733;&#9733;&#9733;&#9733;</a>
                                  </div>
                                  <div class="ec-stars-wrapper" id="estrellas2">
                                    <a class="secondary-content" data-value="2" title="Votar con 2 estrellas">&#9733;&#9733;&#9733;&#9733;</a>
                                  </div>
                                  <div class="ec-stars-wrapper" id="estrellas3">
                                    <a  class="secondary-content" data-value="3" title="Votar con 3 estrellas">&#9733;&#9733;&#9733;</a>
                                  </div>
                                  <div class="ec-stars-wrapper" id="estrellas4">
                                    <a  class="secondary-content" data-value="4" title="Votar con 4 estrellas">&#9733;&#9733;</a>
                                  </div>
                                  <div class="ec-stars-wrapper" id="estrella5">
                                    <a  class="secondary-content" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
                                  </div>
                              
                              `                                                                                                   
                          ;
                        }

                        else{
                            content += `                  
                            <li class="collection-item avatar">
                            <img class="circle" height="50" src="../../resources/img/productos/${row.imagen}">
                              <span class="title"><b>${row.usuario}</b></span>
                              <p>${row.fecha}<br>
                                  ${row.comentario}
                              </p>                              
                              <div class="ec-stars-wrapper" id="estrellas1">
                                  <a class="secondary-content" data-value="1" title="Votar con 1 estrellas">&#9733;&#9733;&#9733;&#9733;&#9733;</a>
                                  <a class="secondary-content" data-value="2" title="Votar con 2 estrellas">&#9733;&#9733;&#9733;&#9733;</a>
                                  <a class="secondary-content" data-value="3" title="Votar con 3 estrellas">&#9733;&#9733;&#9733;</a>
                                  <a class="secondary-content" data-value="4" title="Votar con 4 estrellas">&#9733;&#9733;</a>
                                  <a class="secondary-content" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
                              </div>
                              
                              `                                                                                                   
                          ;
                        }
                    })
                    // Se agregan las tarjetas a la etiqueta div mediante su id para mostrar los productos.
                    document.getElementById('seccion_comentarios').innerHTML = content;
                    // Se inicializa el componente Material Box asignado a las imagenes para que funcione el efecto Lightbox.
                    M.Materialbox.init(document.querySelectorAll('.materialboxed'));
                    // Se inicializa el componente Tooltip asignado a los enlaces para que funcionen las sugerencias textuales.
                    M.Tooltip.init(document.querySelectorAll('.tooltipped'));
                } else {
                    // Se presenta un mensaje de error cuando no existen datos para mostrar.
                    document.getElementById('seccion_comentarios').innerHTML = `<i class="material-icons small">mode_comment</i><span class="red-text"> ${response.exception}</span>`;
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
}

function viewProm(id) {
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_producto', id);
  
    fetch(API_VALORAR + 'readProm', {
        method: 'post',
        body: data
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                  let content = '';                
                  // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                  response.dataset.map(function (row) {
                      
                      if(row.calificacion == null){
                        content +=                         
                        `                  
                        <h5 class="center-align">Calificación promedio: 0.0 estrellas</h5>
                        `;
                      }
                      else{
                        content +=                         
                      `                  
                      <h5 class="center-align">Calificación promedio: ${row.calificacion} estrellas</h5>
                      `;
                      }                      
                  });
                    // Se agregan las tarjetas a la etiqueta div mediante su id para mostrar los productos.
                    document.getElementById('calificacion_prom').innerHTML = content;    
                    // Se inicializa el componente Material Box asignado a las imagenes para que funcione el efecto Lightbox.
                    M.Materialbox.init(document.querySelectorAll('.materialboxed'));
                    // Se inicializa el componente Tooltip asignado a los enlaces para que funcionen las sugerencias textuales.
                    M.Tooltip.init(document.querySelectorAll('.tooltipped'));
                } else {
                    // Se presenta un mensaje de error cuando no existen datos para mostrar.
                    document.getElementById('calificacion_prom').innerHTML = `<h5 class="center-align">Calificación promedio: 0.0 estrellas</h5>`;
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
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

