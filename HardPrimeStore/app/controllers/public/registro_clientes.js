// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_CLIENTES = '../../app/api/public/clientes.php?action=';

document.addEventListener('DOMContentLoaded', function() {
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

    //Se inicializa el componente nav dropdwn (navegación despegable)
    let dropdowns = document.querySelectorAll('.dropdown-trigger');
    let instancia_dropwdown = M.Dropdown.init(dropdowns, {
    hover:false});
  });
  

// Método manejador de eventos que se ejecuta cuando se envía el formulario de registrar.
document.getElementById('save-form').addEventListener('submit', function (event) {
  // Se evita recargar la página web después de enviar el formulario.
  event.preventDefault();

  fetch(API_CLIENTES + 'register', {
      method: 'post',
      body: new FormData(document.getElementById('save-form'))
  }).then(function (request) {
      // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
      if (request.ok) {
          request.json().then(function (response) {
              // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
              if (response.status) {
                  sweetAlert(1, response.message, 'login.php');
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
  