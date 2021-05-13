// Constantes para establecer las rutas y parámetros de comunicación con la API.
const API_PRODUCTO = '../../app/api/dashboard/productos.php?action=';
const ENDPOINT_PROVEEDOR = '../../app/api/dashboard/proveedor.php?action=readAll';
const ENDPOINT_MARCA = '../../app/api/dashboard/marcas.php?action=readAll';
const ENDPOINT_CATEGORIA= '../../app/api/dashboard/categorias.php?action=readAll';

document.addEventListener('DOMContentLoaded', function () {
  // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
  readRows(API_PRODUCTO);
});

// Función para llenar la tabla con los datos de los registros. Se manda a llamar en la función readRows().
function fillTable(dataset) {
  let content = '';
  // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
  dataset.map(function (row) {
      // Se crean y concatenan las filas de la tabla con los datos de cada registro.
      content += `
          <tr>
              <td><b>${row.nombre_p}</b></td>
              <td><b>${row.descripcion}</b></td>
              <td><b>${row.stock}</b></td>
              <td><b>${row.precio}</b></td>
              <td><b>${row.categ}</b></td>              
              <td><b>${row.nombre_marca}</b></td>              
              <td><img src="../../resources/img/productos/${row.imagen}" class="materialboxed" height="100"></td> 
              <td>
              <a href="#modal_registro" onclick="openUpdateDialog(${row.id_producto})" class="btn-floating btn waves-effect light-blue darken-4 modal-trigger"><i class="material-icons" title="Editar registro">create</i></a>
              <a href="#" onclick="openDeleteDialog(${row.id_producto})" class="btn-floating btn waves-effect red"><i class="material-icons" title="Eliminar registro">delete</i></a>
              </td>
          </tr>
      `;
  });
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
  searchRows(API_PRODUCTO, 'search-form');
});

function openCreateDialog() {
  // Se restauran los elementos del formulario.
  document.getElementById('save-form').reset();
  // Se abre la caja de dialogo (modal) que contiene el formulario.
  let instance = M.Modal.getInstance(document.getElementById('save-modal'));
  instance.open();
  // Se asigna el título para la caja de dialogo (modal).
  document.getElementById('modal-title').textContent = 'Agregar Producto';
  // Se llama a la función que llena el select del formulario. Se encuentra en el archivo components.js
  fillSelect(ENDPOINT_MARCA, 'marca', null);
  fillSelect(ENDPOINT_PROVEEDOR, 'proveedor', null);
  fillSelect(ENDPOINT_CATEGORIA, 'categoria', null);
  
}

function openUpdateDialog(id) {
  // Se restauran los elementos del formulario.
  document.getElementById('save-form').reset();
  // Se abre la caja de dialogo (modal) que contiene el fourmlario.
  let instance = M.Modal.getInstance(document.getElementById('save-modal'));
  instance.open();
  // Se asigna el título para la caja de dialogo (modal).
  document.getElementById('modal-title').textContent = 'Actualizar producto'; 

  // Se define un objeto con los datos del registro seleccionado.
  const data = new FormData();
  data.append('id_producto', id);

  fetch(API_PRODUCTO+ 'readOne', {
      method: 'post',
      body: data
  }).then(function (request) {
      // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
      if (request.ok) {
          request.json().then(function (response) {
              // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
              if (response.status) {
                  // Se inicializan los campos del formulario con los datos del registro seleccionado.
                  document.getElementById('id_producto').value = response.dataset.id_producto;                    
                  document.getElementById('nombre').value = response.dataset.nombre;
                  document.getElementById('descp').value = response.dataset.descripcion;
                  document.getElementById('stock').value = response.dataset.stock;
                  document.getElementById('precio').value = response.dataset.precio;
                  fillSelect(ENDPOINT_PROVEEDOR, 'proveedor', response.dataset.id_proveedor);
                  fillSelect(ENDPOINT_MARCA, 'marca', response.dataset.id_marca);
                  fillSelect(ENDPOINT_CATEGORIA, 'categoria', response.dataset.id_categoria);                  
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

// Método manejador de eventos que se ejecuta cuando se envía el formulario de guardar.
document.getElementById('save-form').addEventListener('submit', function (event) {
  // Se evita recargar la página web después de enviar el formulario.
  event.preventDefault();
  // Se define una variable para establecer la acción a realizar en la API.
  let action = '';
  // Se comprueba si el campo oculto del formulario esta seteado para actualizar, de lo contrario será para crear.
  if (document.getElementById('id_producto').value) {
      action = 'update';
  } else {
      action = 'create';
  }
  saveRow(API_PRODUCTO, action, 'save-form', 'save-modal');
});

// Función para establecer el registro a eliminar y abrir una caja de dialogo de confirmación.
function openDeleteDialog(id) {
  // Se define un objeto con los datos del registro seleccionado.
  const data = new FormData();
  data.append('id_producto', id);
  // Se llama a la función que elimina un registro. Se encuentra en el archivo components.js
  confirmDelete(API_PRODUCTO, data);
}

