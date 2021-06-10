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
const API_LOGIN = '../../app/api/public/clientes.php?action='; 

document.addEventListener('DOMContentLoaded', function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js    
    verificarSesion();
});

// Método manejador de eventos que se ejecuta cuando se envía el formulario de iniciar sesión.
document.getElementById('session-form').addEventListener('submit', function (event) {
  // Se evita recargar la página web después de enviar el formulario.
  event.preventDefault();

  fetch(API_LOGIN + 'logIn', {
      method: 'post',
      body: new FormData(document.getElementById('session-form'))
  }).then(function (request) {
      // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
      if (request.ok) {
          request.json().then(function (response) {
              // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
              if (response.status) {
                  sweetAlert(1, response.message, 'index.php');
              } else {
                  sweetAlert(2, response.exception, null);
                  //if(response.exception == 'Clave incorrecta'){
                      //document.getElementById('action').disabled = true;
                  //}

              }
          });
      } else {
          console.log(request.status + ' ' + request.statusText);
      }
  }).catch(function (error) {
      console.log(error);
  });
});

function verificarSesion() {
    fetch(API_LOGIN + 'sesion', {
        method: 'get'
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {                  
                    // Se agregan las tarjetas a la etiqueta div mediante su id para mostrar las categorías.
                    sweetAlert(2, "Ya existe una sesión iniciada", 'index.php');
                    // Se inicializa el componente Tooltip asignado a los enlaces para que funcionen las sugerencias textuales.                    
                } else {
                    // Se presenta un mensaje de error cuando no existen datos para mostrar.
                    
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
}
  