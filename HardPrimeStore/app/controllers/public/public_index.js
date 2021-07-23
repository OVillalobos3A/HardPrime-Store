document.addEventListener('DOMContentLoaded', function() {
    
  });
// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_INDEX =  '../../app/api/public/index.php?action=';

// Método manejador de eventos que se ejecuta cuando el documento ha cargado.
document.addEventListener('DOMContentLoaded', function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js      
    loadMarcas(API_INDEX); 
    loadCategorias(API_INDEX);    
});

// Función para preparar el formulario al momento de modificar un registro.
function loadMarcas() {
    fetch(API_INDEX + 'openMac', {
        method: 'get',
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
                        url = `buscar_marcas.php?id=${row.id_marca}`;
                        // Se crean y concatenan las tarjetas con los datos de cada categoría.
                        content += `
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-image">
                                        <img src="../../resources/img/marcas/${row.imgmac}" width="100" height="200">
                                    </div>
                                    <div class="card-content center-align">
                                        <!--Nombre del producto, precio  y descripción-->
                                        <span class="card-title indigo-text text-darken-4"><b>${row.marca}</b></span>
                                        <a href="${url}">Ver marca</a>
                                    </div>
                                </div>
                            </div>
                        `;
                    });
                    // Se agregan las tarjetas a la etiqueta div mediante su id para mostrar las categorías.
                    document.getElementById('marca').innerHTML = content;
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
function loadCategorias() {
    fetch(API_INDEX + 'openCat', {
        method: 'get',
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
                        url = `buscar_categorias.php?id=${row.id_categoria}`;
                        // Se crean y concatenan las tarjetas con los datos de cada categoría.
                        content += `
                        <div class="col s12 m3">
                            <div class="card">
                                <div class="card-image">
                                    <img src="../../resources/img/categorias/${row.imagen}" width="100" height="200">                                        
                                </div>
                                <div class="card-content">
                                    <br>
                                    <span class="card-title activator indigo-text text-darken-4"><b>${row.nombre}</b><i class="material-icons right">wysiwyg</i></span>  
                                    <a href="${url}">Ver categoría</a>
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
                    // Se agregan las tarjetas a la etiqueta div mediante su id para mostrar las categorías.
                    document.getElementById('categoria').innerHTML = content;
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






