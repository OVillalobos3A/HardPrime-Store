<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/dashboard/dashboard_page2.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Dashboard_Page::headerTemplate('Valoraciones');
?>
<br>
<div class="container">
    <div class="card whithe">
        <div class="card-content Black-text">
            <!--Colocamos el titulo de la card-->
            <span class="card-title center-align">Gestión de Valoraciones</span>
            <br>
            <!--Se añade un input field el cual su función es buscar un empleado en especifico-->
            <form method="post" id="search-form">
                <div class="row">
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">search</i>
                        <input id="search" type="text" name="search" maxlength="40" required/>
                        <label for="autocomplete-input">Cliente o producto</label>
                    </div>
                    <div class="input-field s12 m6">
                        <button class="btn red" type="submit" name="action">Buscar
                            <i class="material-icons right">search</i>
                        </button>
                        <a href="#" onclick="openTable()" class="btn waves-effect blue tooltipped" data-tooltip="Refrescar tabla"><i class="material-icons">refresh</i></a>
                        <!--Se añade un boton para genera reporte-->
                        <a href="../../app/reports/valoraciones_producto.php" target="_blank" class="btn waves-effect light-blue darken-4 tooltipped" data-tooltip="Reporte de valoraciones por producto"><i class="material-icons">assignment</i></a>
                    </div>
                </div>
            </form>
            <!--Se construye la tabla de datos correspondiente a usuarios-->
            <!--Se especifica la clase para hacer responsive la tabla, y el tipo de tabla-->
            <!--Se especifica el detalle de cada fila y columna-->
            <!--Estableciendo el tamaño de cada div correspondiente-->
            <form method="post" id="save-form" enctype="multipart/form-data">
                <!-- Campo oculto para asignar el id del registro al momento de modificar -->
                <input class="hide" type="number" id="id_calificacion" name="id_calificacion"/>
                <div class="row">
                    <table class="responsive-table striped">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Calificación</th>
                                <th>Comentario</th>
                                <th>Cliente</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody id="tbody-rows">
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>
<br>
<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
Dashboard_Page::footerTemplate('valoraciones.js');
?>