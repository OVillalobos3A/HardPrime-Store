<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/dashboard/dashboard_page2.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Dashboard_Page::headerTemplate('Proveedores');
?>

<div class="container">
    <div class="card whithe">
        <div class="card-content Black-text">
            <!--Colocamos el titulo de la card-->
            <span class="card-title center-align">Gestión de proveedores</span>
            <br>
            <!--Agregamos un botón cuya función es que nos mueste el formulario para agregar-->
            <!--un registro-->
            <div>
                <a class="waves-effect red btn modal-trigger" onclick="openCreateDialog()"><i class="material-icons left">add</i>Agregar proveedor</a>
            </div>
            <br>
            <!--Se añade un input field el cual su función es buscar un empleado en especifico-->
            <form method="post" id="search-form">
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">search</i>
                        <input id="search" type="text" name="search" required/>
                        <label for="autocomplete-input">Nombre, dirección</label>
                    </div>
                    <div class="input-field col s6 m4">
                        <button class="btn red" type="submit" name="action">Buscar
                            <i class="material-icons right">search</i>
                        </button>
                    </div>
                </div>
            </form>
            <!--Se construye la tabla de datos correspondiente a proveedores-->
            <!--Se especifica la clase para hacer responsive la tabla, y el tipo de tabla-->
            <!--Se especifica el detalle de cada fila y columna-->
            <table class="responsive-table striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody id="tbody-rows">
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="save-modal" class="modal">
    <div class="modal-content">
        <h5 id="modal-title" class="center-align"></h5>
        <br>
        <!--Estableciendo el tamaño de cada div correspondiente-->
        <form method="post" id="save-form" enctype="multipart/form-data">
            <input class="hide" type="number" id="id_proveedor" name="id_proveedor"/>
            <div class="row">
                <!--Creamos la estructura del formulario respectivo-->
                <div class="row">
                    <!--Estableciendo el tamaño del que tomará el Input field-->
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">badge</i>
                        <input id="nombre" type="text" class="validate data-length=25" name="nombre">
                        <label for="nombre">Nombre</label>
                    </div>
                    <!--Estableciendo el tamaño del que tomará el Input field-->
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">apartment</i>
                        <input id="direccion" type="text" class="validate" name="direccion">
                        <label for="direccion">Dirección</label>
                    </div>
                </div>
                <div class="row">
                    <!--Estableciendo el tamaño del que tomará el Input field-->
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">call</i>
                        <input id="tel" type="text" class="validate" name="tel">
                        <label for="tel">Telefono</label>
                    </div>
                    <!--Estableciendo el tamaño del que tomará el Input field-->
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">email</i>
                        <input id="correo" type="text" class="validate" name="correo">
                        <label for="correo">Correo</label>
                    </div>
                </div>
                <div class="row center-align">
                    <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                    <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
Dashboard_Page::footerTemplate('proveedor.js');
?>