<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/dashboard/dashboard_page2.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Dashboard_Page::headerTemplate('Página Principal');
?>

<!--Contenedor para mostrar la card contenedora correspondiente a la página de bienvenida-->
<br>
<div class="row container">
    <div class="col s12">
        <div class="card indigo light-blue darken-4">
            <!--Defiendo el contenido de la card que contendrá las gráficas-->
            <div class="card-content white-text">
                <!--Definiendo el nombre del encabezado-->
                <h4 class="center-align">¡BIENVENIDO @usuario!</h4>
                <h5 class="center-align">Estas son las novedades:</h5>
                <!--Definiendo el panel número 1 para almacenar las gráficas-->
                <!--En este caso solo son imagenes-->
                <div class="col s12 m6">
                    <div class="card-panel blue-grey">
                        <img class="responsive-img" src="../../resources/img/Charts/chart1.PNG">
                        <h4 class="center-align">Productos más vendidos</h4>
                    </div>
                </div>
                <!--Definiendo el panel número 1 para almacenar las gráficas-->
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