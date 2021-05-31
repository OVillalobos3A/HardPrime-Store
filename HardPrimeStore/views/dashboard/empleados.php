<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/dashboard/dashboard_page2.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Dashboard_Page::headerTemplate('Empleados');
?>

<!--Contenedor para mostrar la card contenedora de la tabla de datos correspondiente a empleados-->

<div class="container">
    <div class="card whithe">
        <div class="card-content Black-text">
            <!--Colocamos el titulo de la card-->
            <span class="card-title center-align">Gestión de empleados</span>
            <br>
            <!--Agregamos un botón cuya función es que nos mueste el formulario para agregar-->
            <!--un registro-->
            <div>
                <a onclick="openCreateDialog()" class="waves-effect red btn" href="#"><i class="material-icons left">add</i>Agregar Empleados</a>
            </div>
            <br>
            <!--Se añade un input field el cual su función es buscar un empleado en especifico-->
            <div class="row">
                <form method="post" id="search-form">
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">search</i>
                        <input type="text" id="search" name="search" class="autocomplete" maxlength="20" required>
                        <label for="autocomplete-input">Primer nombre del empleado</label>
                    </div>
                    <div class="input-field s12 m6">
                        <button class="btn red" type="submit" name="action">Buscar
                            <i class="material-icons right">search</i>
                        </button>
                        <a href="#" onclick="openTable()" class="btn waves-effect blue tooltipped" data-tooltip="Refrescar tabla"><i class="material-icons">refresh</i></a>
                    </div>
                </form>
            </div>
            <!--Se construye la tabla de datos correspondiente a empleados-->
            <!--Se especifica la clase para hacer responsive la tabla, y el tipo de tabla-->
            <!--Se especifica el detalle de cada fila y columna-->
            <div class="row">
                <table class="responsive-table striped">
                    <thead>
                        <tr>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Género</th>
                            <th>Estado</th>
                            <th>Imagen</th>
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
        <h5 id="modal-title" class="center-align">Agregar empleado</h5>
        <br>
        <!--Estableciendo el tamaño de cada div correspondiente-->
        <!--Creamos la estructura del formulario respectivo-->
        <form method="post" id="save-form" enctype="multipart/form-data">
            <!-- Campo oculto para asignar el id del registro al momento de modificar -->
            <input class="hide" type="number" id="id_empleado" name="id_empleado" />
            <div class="row">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person</i>
                    <input id="nombre" type="text" maxlength="25" name="nombre" class="validate" required>
                    <label for="nombre">Nombres</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person</i>
                    <input id="apellido" type="text" name="apellido" maxlength="25" class="validate" required>
                    <label for="apellido">Apellidos</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">email</i>
                    <input id="correo" type="text" name="correo" maxlength="40" class="validate" required>
                    <label for="correo">Correo</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">phone</i>
                    <input id="telefono" type="text" name="telefono" maxlength="9" class="validate" required>
                    <label for="telefono">Teléfono</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">group</i>
                    <select id="genero" name="genero" required>  
                        <option value="0" disabled selected>Género</option>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    </select>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">date_range</i>
                    <input type="date" id="fecha" name="fecha" class="validate" required />
                    <label for="fecha">Nacimiento</label>
                </div>
                <div class="file-field input-field col s12 m6">
                    <div class="btn blue-grey tooltipped"  data-tooltip="Seleccione una imagen de 500x500">
                        <i class="material-icons right">image</i>Imagen
                        <input id="imagen" type="file" name="imagen" accept=".gif, .jpg, .png">
                    </div>
                    <div class="file-path-wrapper">
                        <input type="text" class="file-path validate" placeholder="Formatos aceptados: gif, jpg y png">
                    </div>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">playlist_add_check</i>
                    <select id="estado" name="estado" required>
                        <option value="0" disabled selected>Estado</option>
                        <option value="activo">Activo</option>
                        <option value="inactivo">Inactivo</option>
                    </select>
                </div>  
            </div>
            <div class="row center-align">
                <a href="#" class="btn waves-effect red tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                <button type="submit" class="btn waves-effect light-blue darken-4 tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
            </div>
        </form>
    </div>
</div>
<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
Dashboard_Page::footerTemplate('empleados.js');
?>