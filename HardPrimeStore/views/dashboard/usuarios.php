<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/dashboard/dashboard_page2.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Dashboard_Page::headerTemplate('Administrar usuarios');
?>

<div class="container">
    <div class="card whithe">
        <div class="card-content Black-text">
            <!--Colocamos el titulo de la card-->
            <span class="card-title center-align">Gestión de usuarios</span>
            <br>
            <!--Agregamos un botón cuya función es que nos mueste el formulario para agregar-->
            <!--un registro-->
            <div>
            <a onclick="openCreateDialog()" class="waves-effect red btn modal-trigger" href="#"><i class="material-icons left">add</i>Agregar usuarios</a>
            </div>
            <br>
            <!--Se añade un input field el cual su función es buscar un empleado en especifico-->
            <form method="post" id="search-form">
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">search</i>
                        <input type="text" name="search" id="autocomplete-input" class="autocomplete">
                        <label for="autocomplete-input">Buscar usuario por alias</label>
                    </div>
                    <div class="input-field col s6">
                    <button type="submit" class="btn waves-effect tooltipped red" data-tooltip="Buscar"><i class="material-icons">check</i></button>
                    </div>
                </div>
            </form>
            <!--Se construye la tabla de datos correspondiente a usuarios-->
            <!--Se especifica la clase para hacer responsive la tabla, y el tipo de tabla-->
            <!--Se especifica el detalle de cada fila y columna-->
            <table class="responsive-table striped">
                <thead>
                    <tr>
                        <th>Empleado</th>
                        <th>Usuario</th>
                        <th>Estado</th>
                        <th>Tipo empleado</th>
                        <th>Acción</th>
                    </tr>
                </thead>

                <tbody id="tbody-rows">
                    <tr>
                        <th>Fernando Cubías</th>
                        <th>fjcubi13</th>
                        <th>Gerente</th>
                        <th>
                            <a class="btn-floating btn waves-effect light-blue darken-4 modal-trigger" href="#modal_registro"><i class="material-icons" title="Editar registro">create</i></a>
                            <a class="btn-floating btn waves-effect red" href="#"><i class="material-icons" title="Eliminar registro">delete</i></a>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="save-modal" class="modal">
    <div class="modal-content">
        <h5 id="modal-title" class="center-align">Agregar usuario</h5>
        <br>
        <!--Estableciendo el tamaño de cada div correspondiente-->
        <div class="row">
            <!--Creamos la estructura del formulario respectivo-->
            <form method="post" id="save-form" name="save-form" enctype="multipart/form-data" class="col-md-4">
                <!-- Campo oculto para asignar el id del registro al momento de modificar -->
                <input class="hide" type="number" id="id_usuario" name="id_usuario" />
                <input class="hide" type="text" id="contraseña" name="contraseña" value="123456"/>
                <div class="row">
                    <!--Estableciendo el tamaño del que tomará el Input field-->
                    <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person</i>
                        <select id="empleado" name="empleado">
                            <option value="" disabled selected>Empleado</option>
                        </select>
                        <label for="tipo_usuario">Empleado</label>
                    </div>
                    <!--Estableciendo el tamaño del que tomará el Input field-->
                    <div class="input-field col s12 m6">
                    <i class="material-icons prefix">supervisor_account</i>
                        <select id="tipo_usuario"  name="tipo_usuario">
                            <option value="" disabled selected>Tipo de usuario</option>                            
                        </select>
                        <label for="tipo_usuario">Tipo de usuario</label>
                    </div>
                </div>
                <div class="row">
                    <!--Estableciendo el tamaño del que tomará el Input field-->
                    <div class="input-field col s12 m6">
                    <i class="material-icons prefix">account_box</i>
                        <input id="usuario" name="usuario" type="text" class="validate" required>
                        <label for="telefono">Usuario</label>
                    </div>

                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">playlist_add_check</i>
                        <select id="estado" name="estado">
                            <option value="" disabled selected>Estado</option>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>  
                </div>
                <div class="row">
                    <div class="col s10 offset-s1 center-align">
                        <a href="#" class="btn waves-effect red tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                        <button type="submit" class="btn waves-effect light-blue darken-4 tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
    </div>
</div>

<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
Dashboard_Page::footerTemplate('usuarios.js');
?>