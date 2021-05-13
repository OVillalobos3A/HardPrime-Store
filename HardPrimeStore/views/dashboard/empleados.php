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
                <a onclick="openCreateDialog()" class="waves-effect red btn modal-trigger" href="#"><i class="material-icons left">add</i>Agregar usuarios</a>
            </div>
            <br>
            <!--Se añade un input field el cual su función es buscar un empleado en especifico-->
            <div class="row">
                <form method="post" id="search-form">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">search</i>
                        <input type="text" id="search" name="search" class="autocomplete" required>
                        <label for="autocomplete-input">Buscar empleado por nombre</label>
                    </div>
                    <div class="input-field col s6">
                        <button type="submit" class="btn waves-effect tooltipped red" data-tooltip="Buscar"><i class="material-icons">check_circle</i></button>
                    </div>
                </form>
            </div>
            <!--Se construye la tabla de datos correspondiente a empleados-->
            <!--Se especifica la clase para hacer responsive la tabla, y el tipo de tabla-->
            <!--Se especifica el detalle de cada fila y columna-->
            <table class="responsive-table striped">
                <thead>
                    <tr>
                        <th>NOMBRES</th>
                        <th>APELLIDOS</th>
                        <th>TELÉFONO</th>
                        <th>CORREO</th>
                        <th>GÉNERO</th>
                        <th>ESTADO</th>
                        <th>IMAGEN</th>
                        <th>ACCIÓN</th>
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
        <h5 id="modal-title" class="center-align">Agregar empleado</h5>
        <br>
        <!--Estableciendo el tamaño de cada div correspondiente-->
        <!--Creamos la estructura del formulario respectivo-->
        <form method="post" id="save-form" enctype="multipart/form-data">
            <!-- Campo oculto para asignar el id del registro al momento de modificar -->
            <input class="hide" type="number" id="id_empleado" name="id_empleado" />
            <div class="row">
                <!--Estableciendo el tamaño del que tomará el Input field-->
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person</i>
                    <input id="nombre" type="text" name="nombre" class="validate" required>
                    <label for="nombre">Nombres</label>
                </div>
                <!--Estableciendo el tamaño del que tomará el Input field-->
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix"></i>
                    <input id="apellido" type="text" name="apellido" class="validate" required>
                    <label for="apellido">Apellidos</label>
                </div>
            </div>
            <div class="row">
                <!--Estableciendo el tamaño del que tomará el Input field-->
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">email</i>
                    <input id="correo" type="text" name="correo" class="validate" required>
                    <label for="correo">Correo</label>
                </div>
                <!--Estableciendo el tamaño del que tomará el Input field-->
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">phone</i>
                    <input id="telefono" type="text" name="telefono" class="validate" required>
                    <label for="telefono">Teléfono</label>
                </div>
            </div>
            <div class="row">
                <!--Estableciendo el tamaño del que tomará el Input field-->                
                    <!--Establecemos los selects-->
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">group</i>
                        <select id="genero" name="genero">
                            <option value="" disabled selected>Género</option>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>                
                <!--Establecemos el datepicker-->
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">date_range</i>
                    <input type="date" id="fecha" name="fecha" class="validate" required />
                    <label for="fecha">Nacimiento</label>
                </div>
            </div>
            <div class="row">
                <!--Estableciendo el tamaño del que tomará el Input field-->
                <div class="input-field col s12 m6">
                    <!--Estableciendo el tamaño del que tomará el File Input-->
                    <div class="file-field input-field">
                        <div class="btn blue-grey">
                            <span>Escoger imagen</span>
                            <input id="imagen" type="file" name="imagen" accept=".gif, .jpg, .png">
                        </div>
                        <div class="file-path-wrapper">
                            <input type="text" class="file-path validate" placeholder="Formatos aceptados: gif, jpg y png">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row center-align">
                <a href="#" class="btn waves-effect red tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                <button type="submit" class="btn waves-effect light-blue darken-4 tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
            </div>
        </form>

        <!--Asignamos los botones correspondientes para cada acción Scrud-->
        <!--Especificamos con un "title" lo que realiza cada botón-->
    </div>
</div>

<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
Dashboard_Page::footerTemplate('empleados.js');
?>