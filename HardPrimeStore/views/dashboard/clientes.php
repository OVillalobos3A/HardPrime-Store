<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/dashboard/dashboard_page2.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Dashboard_Page::headerTemplate('Clientes');
?>
<br>
<div class="container">
    <div class="card whithe" id="ocultable">
        <div class="card-content Black-text">
            <!--Se especifica el titulo de la card-->
            <span class="card-title center-align">Pedidos del cliente</span>
            <br>
            <!--Se añade un boton para regresar a los pedidos-->
            <a class="waves-effect red btn" onclick="mostrarOcultar();" href="#mostrar">
                <i class="material-icons left">arrow_back</i>Clientes
            </a>
            <br>
            <br>
            <!--Se construye la tabla de datos correspondiente al detalle del pedido-->
            <!--Se especifica la clase para hacer responsive la tabla, y el tipo de tabla-->
            <!--Se especifica el detalle de cada fila y columna-->
            <form method="post" id="form1" enctype="multipart/form-data">
                <table class="responsive-table striped">
                    <thead>
                        <tr>
                            <th>Código pedido</th>
                            <th>Estado</th>
                            <th>Fecha de envío</th>
                            <th>Fecha de realización</th>
                            <th>Encargado</th>
                        </tr>
                    </thead>
                    <tbody id="tbody-rows1">
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    <div class="card whithe" id="ocultable1">
        <div class="card-content Black-text">
            <!--Colocamos el titulo de la card-->
            <span class="card-title center-align">Visualización de Clientes</span>
            <br>
            <!--Se añade un input field el cual su función es buscar un empleado en especifico-->
            <form method="post" id="search-form">
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">search</i>
                        <input id="search" type="text" name="search" required/>
                        <label for="autocomplete-input">Nombre</label>
                    </div>
                    <div class="input-field col s6">
                        <button class="btn red" type="submit" name="action">Buscar
                            <i class="material-icons right">search</i>
                        </button>
                        <a href="#" onclick="openTable()" class="btn waves-effect blue tooltipped" data-tooltip="Refrescar tabla"><i class="material-icons">refresh</i></a>
                    </div>
                </div>
            </form>
            <!--Se construye la tabla de datos correspondiente a usuarios-->
            <!--Se especifica la clase para hacer responsive la tabla, y el tipo de tabla-->
            <!--Se especifica el detalle de cada fila y columna-->
            <!--Estableciendo el tamaño de cada div correspondiente-->
            <form method="post" id="save-form" enctype="multipart/form-data">
                <!-- Campo oculto para asignar el id del registro al momento de modificar -->
                <input class="hide" type="number" id="id_cliente" name="id_cliente"/>
                <table class="responsive-table striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Dirección</th>
                        <th>Celeluar</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody id="tbody-rows">
                </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
<br>
<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
Dashboard_Page::footerTemplate('clientes.js');
?>