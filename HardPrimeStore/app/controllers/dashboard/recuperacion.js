// Constantes para establecer las rutas y parámetros de comunicación con la API.
const API_RECU = '../../app/api/dashboard/recu.php?action=';

// Método manejador de eventos que se ejecuta cuando el documento ha cargado.


// Método manejador de eventos que se ejecuta cuando se envía el formulario de guardar.
document.getElementById('save-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se define una variable para establecer la acción a realizar en la API.
    let action = '';
    
    // Se comprueba si el campo oculto del formulario esta seteado para actualizar, de lo contrario será para crear.
    if (document.getElementById('usuario').value) {
        action = 'generarCodigo';        
        document.getElementById('usuario2').value = document.getElementById('usuario').value
        document.getElementById('cambiar').disabled = false;
    } else {
        
    }
    saveRow(API_RECU, action, 'save-form', 'save-modal');
});

document.getElementById('save-form2').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se define una variable para establecer la acción a realizar en la API.
    let action = '';
    
    // Se comprueba si el campo oculto del formulario esta seteado para actualizar, de lo contrario será para crear.
    if (document.getElementById('codigo').value && document.getElementById('usuario2').value) {
        action = 'recuContra';                
    } else {
        sweetAlert(2, response.exception, null);
    }
    
    // Se comprueba si el campo oculto del formulario esta seteado para actualizar, de lo contrario será para crear.    
    saveRow(API_RECU, action, 'save-form2', 'save-modal2');
});