<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/dashboard_page2.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Dashboard_Page::headerTemplate('Página Principal');
?>

<!--Contenedor para mostrar una tabla con datos-->
<div class="row container">
    <div class="col s12">
        <div class="card indigo light-blue darken-4">
            <div class="card-content white-text">
                <h3 class="center-align">¡BIENVENIDO @usuario!</h3>
                <h5 class="center-align">Estas son las novedades:</h5>
                <div class="col s12 m6">
                    <div class="card-panel blue-grey">
                        <img class="responsive-img" src="../../resources/img/Charts/chart1.PNG">
                        <h4 class="center-align">Productos más vendidos</h4>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="card-panel blue-grey">
                        <img class="responsive-img" src="../../resources/img/Charts/chart2.PNG">
                        <h4 class="center-align">Clientes registrados</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
Dashboard_Page::footerTemplate('index.js');
?>