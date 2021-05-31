<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/dashboard/dashboard_page2.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Dashboard_Page::headerTemplate('Entradas');
?>
<div class="container">
    <div class="col s12 m6">
        <div class="card withe">
            <div class="card-content black-text">
                <span class="card-title center-align">Administración de entradas</span>
                <form method="post" id="save-form" enctype="multipart/form-data">
                    <!-- Campo oculto para asignar el id del registro al momento de modificar -->
                    <input class="hide" type="number" id="id_empleado" name="id_empleado"/>
                    <input class="hide" type="number" id="id_entrada" name="id_entrada"/>
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <select id="producto" name="producto">
                            </select>
                            <label>Producto</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">note_add</i>
                            <input id="cantidad" type="number" class="validate" name="cantidad" maxlength="3" max="999" min="1" required>
                            <label for="cantidad">Cantidad</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input type="date" id="fecha" name="fecha" class="hide" required/>
                        </div>
                    </div>
                    <div class="row center-align">
                        <button type="submit" class="btn waves-effect light-blue darken-4 tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="card whithe">
        <div class="card-content Black-text">
            <!--Colocamos el titulo de la card-->
            <span class="card-title center-align">Visualización de entradas</span>
            <br>
            <!--Agregamos un botón cuya función es que nos mueste el formulario para agregar-->
            <!--un registro-->
            <br>
            <!--Se añade un input field el cual su función es buscar un empleado en especifico-->
            <form method="post" id="search-form">
                <div class="row">
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">search</i>
                        <input id="search" type="text" name="search" maxlength="20" required/>
                        <label for="autocomplete-input">Producto</label>
                    </div>
                    <div class="input-field s12 m6">
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
            <div class="row"> 
                <table class="responsive-table striped">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Fecha</th>
                            <th>Empleado</th>
                        </tr>
                    </thead>
                    <tbody id="tbody-rows">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
Dashboard_Page::footerTemplate('entradas.js');
?>