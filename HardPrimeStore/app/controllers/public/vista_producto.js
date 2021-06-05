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
  });
// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_INDEX =  '../../app/api/public/index.php?action=';
const API_CARRITO =  '../../app/api/public/carrito.php?action=';
// Método manejador de eventos que se ejecuta cuando el documento ha cargado.
document.addEventListener('DOMContentLoaded', function () {
    // Se busca en la URL las variables (parámetros) disponibles.
    let params = new URLSearchParams(location.search);
    // Se obtienen los datos localizados por medio de las variables.
    const idpro = params.get('id');
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js      
    openProduct(idpro);    
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

