// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_INDEX =  '../../app/api/public/index.php?action=';

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);

    var elems = document.querySelectorAll('.slider');
    var instances = M.Slider.init(elems);
    
    var elems = document.querySelectorAll('.carousel');
    var instances = M.Carousel.init(elems, {
      fullWidth: true,
      indicators: true});  
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
    hover:false});

    // Se busca en la URL las variables (parámetros) disponibles.
    let params = new URLSearchParams(location.search);
    // Se obtienen los datos localizados por medio de las variables.
    const idmac = params.get('id');
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js      
    openProductM(idmac);
    viewTittle(idmac)
  });

  


  // Función para obtener y mostrar los productos de acuerdo a la categoría seleccionada.
function openProductM(id) {
  // Se define un objeto con los datos del registro seleccionado.
  const data = new FormData();
  data.append('id_marca', id);

  fetch(API_INDEX + 'openProductmarcas', {
      method: 'post',
      body: data
  }).then(function (request) {
      // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
      if (request.ok) {
          request.json().then(function (response) {
              // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
              if (response.status) {
                  let content = '';
                  let url = '';
                  // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                  response.dataset.map(function (row) {
                      url = `vista_producto.php?id=${row.id_producto}`;
                      // Se crean y concatenan las tarjetas con los datos de cada producto.
                      content += `                  
                      <div class="col s12 m3">
                      <div class="card">
                          <div class="card-image">
                              <img src="../../resources/img/productos/${row.imagen}" width="100" height="200">
                              <a href="#" onclick="openCreateDialog()" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add_shopping_cart</i></a>
                          </div>
                          <div class="card-content">
                              <br>
                              <span class="card-title activator grey-text text-darken-4">${row.nombre}<i class="material-icons right">wysiwyg</i></span>
                              <h6 class="orange-text text-darken-4"><b>${row.precio}</b></h6>
                              <a href="${url}">Ver producto</a>
                          </div>
                          <div class="card-reveal">
                              <span class="card-title grey-text text-darken-4">${row.nombre}<i
                                      class="material-icons right">close</i></span>
                              <p>${row.descripcion}</p>
                          </div>
                      </div>
                  </div>
                      `;
                  });
                  // Se agregan las tarjetas a la etiqueta div mediante su id para mostrar los productos.
                  document.getElementById('contenido').innerHTML = content;                  
                  // Se inicializa el componente Material Box asignado a las imagenes para que funcione el efecto Lightbox.
                  M.Materialbox.init(document.querySelectorAll('.materialboxed'));
                  // Se inicializa el componente Tooltip asignado a los enlaces para que funcionen las sugerencias textuales.
                  M.Tooltip.init(document.querySelectorAll('.tooltipped'));
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

function viewTittle(id) {
  // Se define un objeto con los datos del registro seleccionado.
  const data = new FormData();
  data.append('id_marca', id);

  fetch(API_INDEX + 'readTittle', {
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
                    
                    // Se crean y concatenan las tarjetas con los datos de cada producto.
                    content += `                  
                    <h3 class="orange-text text-darken-4">&nbsp;&nbsp;Marca - ${row.nombre_marca}</h3>
                    `;
                });
                  // Se agregan las tarjetas a la etiqueta div mediante su id para mostrar los productos.
                  document.getElementById('titulo_pag').innerHTML = content;    
                  // Se inicializa el componente Material Box asignado a las imagenes para que funcione el efecto Lightbox.
                  M.Materialbox.init(document.querySelectorAll('.materialboxed'));
                  // Se inicializa el componente Tooltip asignado a los enlaces para que funcionen las sugerencias textuales.
                  M.Tooltip.init(document.querySelectorAll('.tooltipped'));
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

// Función para preparar el formulario al momento de insertar un registro.
function openCreateDialog() {
  // Se restauran los elementos del formulario.
  document.getElementById('item-form').reset();
  // Se abre la caja de dialogo (modal) que contiene el formulario.
  let instance = M.Modal.getInstance(document.getElementById('item-modal'));
  instance.open();
}


  