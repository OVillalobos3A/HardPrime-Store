<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/dashboard/dashboard_page2.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Dashboard_Page::headerTemplate('Marcas');
?>
<br>
<div class="container">
    <div class="card whithe">
        <div class="card-content Black-text">
            <!--Colocamos el titulo de la card-->
            <span class="card-title center-align">Gestión de marcas</span>
            <br>
            <!--Agregamos un botón cuya función es que nos mueste el formulario para agregar-->
            <!--un registro-->
            <div>
                <a href="#" class="waves-effect red btn" onclick="openCreateDialog()"><i class="material-icons left">add</i>Agregar marca</a>
            </div>
            <br>
            <!--Se añade un input field el cual su función es buscar un empleado en especifico-->
            <form method="post" id="search-form">
                <div class="row">
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">search</i>
                        <input id="search" type="text" name="search" maxlength="20" required/>
                        <label for="autocomplete-input">Nombre de la marca</label>
                    </div>
                    <div class="input-field s12 m6">
                        <button class="btn red" type="submit" name="action">Buscar
                            <i class="material-icons right">search</i>
                        </button>
                        <a href="#" onclick="openTable()" class="btn waves-effect blue tooltipped" data-tooltip="Refrescar tabla"><i class="material-icons">refresh</i></a>
                        <!--Se añade un boton para genera reporte-->
                        <a href="../../app/reports/productos_marca.php" target="_blank" class="btn waves-effect light-blue darken-4 tooltipped" data-tooltip="Reporte de productos por marcas"><i class="material-icons">assignment</i></a>
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
                            <th>Nombre</th>
                            <th>Imagen</th>
                            <th>Logo</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody id="tbody-rows">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="save-modal" class="modal">
    <div class="modal-content">
        <h5 id="modal-title" class="center-align"></h5>
        <br>
        <!--Estableciendo el tamaño de cada div correspondiente-->
        <form method="post" id="save-form" enctype="multipart/form-data">
            <!-- Campo oculto para asignar el id del registro al momento de modificar -->
            <input class="hide" type="number" id="id_marca" name="id_marca"/>
            <div class="row">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">note_add</i>
                    <input id="nombre_marca" type="text" name="nombre_marca" class="validate"  maxlength="20" required/>
                    <label for="nombre_marca">Nombre</label>
                </div>
                <div class="file-field input-field col s12 m6">
                    <div class="btn blue-grey tooltipped"  data-tooltip="Seleccione una imagen de 500x500">
                        <i class="material-icons right">image</i>Imagen
                        <input id="archivo_marca" type="file" name="archivo_marca" accept=".gif, .jpg, .png"/>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Formatos aceptados: gif, jpg y png"/>
                    </div>
                </div>
                <div class="file-field input-field col s12 m6">
                    <div class="btn blue-grey tooltipped"  data-tooltip="Seleccione una imagen de 500x500">
                        <i class="material-icons right">image</i>Logo
                        <input id="archivo_marca1" type="file" name="archivo_marca1" accept=".gif, .jpg, .png"/>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Formatos aceptados: gif, jpg y png"/>
                    </div>
                </div>
            </div>
            <div class="row center-align">
                <a href="#" class="btn waves-effect red tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                <button type="submit" class="btn waves-effect light-blue darken-4 tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
            </div>
        </form>
    </div>
</div>
<br>
<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
Dashboard_Page::footerTemplate('marcas.js');
?>