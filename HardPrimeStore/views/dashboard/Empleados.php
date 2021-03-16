<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/dashboard_page2.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Dashboard_Page::headerTemplate('Empleados');
?>

<!--Contenedor para mostrar una tabla con datos-->

<div class="row container" id="ocultable">
    <div class="col s12">
        <div class="card whithe">
            <div class="card-content black-text">
                <span class="card-title center-align">Gestión de Empleados</span>
                <br>
                <div class="row">
                    <form class="col-md-4">
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="nombres" type="text" class="validate">
                                <label for="nombres">Nombres</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="apellidos" type="text" class="validate">
                                <label for="apellidos">Apellidos</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="correo" type="text" class="validate">
                                <label for="correo">Correo</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="telefono" type="text" class="validate">
                                <label for="telefono">Teléfono</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <div class="input-field col s12">
                                    <select>
                                        <option value="" disabled selected>Género</option>
                                        <option value="1">Masculino</option>
                                        <option value="2">Femenino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="input-field col s12 m6">
                                <label for="fecha">Fecha de nacimiento</label>
                                <input type="text" class="datepicker">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <form action="#">
                                    <div class="file-field input-field">
                                        <div class="btn blue-grey">
                                            <span>Escoger imagen</span>
                                            <input type="file">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-action">
                <a class="btn-floating btn-large waves-effect waves-light red" title="Ingresar registro"
                    onclick="mostrarOcultar();" href="#mostrar"><i class="material-icons">add</i></a>
                <a class="btn-floating btn-large waves-effect waves-light red" title="Modificar registro"><i
                        class="material-icons">edit</i></a>
                <a class="btn-floating btn-large waves-effect waves-light red" title="Borrar registro"><i
                        class="material-icons">delete</i></a>
                <a class="btn-floating btn-large waves-effect waves-light red" title="Visualizar registros"
                    onclick="mostrarOcultar();" href="#mostrar">
                    <i class="material-icons">visibility</i></a>
            </div>
        </div>
    </div>
</div>
<div class="container" id="ocultable1">
    <div class="card whithe">
        <div class="card-content Black-text">
            <span class="card-title center-align">Visualizar Empleados</span>
            <br>
            <div>
                <a class="waves-effect red btn" onclick="mostrarOcultar();" href="#mostrar"><i
                        class="material-icons left">add</i>Agregar empleado</a>
            </div>
            <br>
            <div class="input-field col s6">
                <i class="material-icons prefix">search</i>
                <input type="text" id="autocomplete-input" class="autocomplete">
                <label for="autocomplete-input">Buscar empleado</label>
            </div>
            <table class="responsive-table striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Género</th>
                        <th>Estado</th>
                        <th>Imagen</th>
                        <th>Acción</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <th>Oscar Villalobos</th>
                        <th>7942-8223</th>
                        <th>oscarv@empresa.com</th>
                        <th>Masculino</th>
                        <th>Activo</th>
                        <th><img class="responsive-img" src="../../resources/img/Tabla/man.png"></th>
                        <th><a class="btn-floating btn-large waves-effect waves-light red" onclick="mostrarOcultar();"
                                href="#mostrar">
                                <i class="material-icons" title="Editar registro">update</i>
                            </a>
                        </th>
                    </tr>
                    <tr>
                        <th>Nora Puerta</th>
                        <th>8084-8223</th>
                        <th>norap@empresa.com</th>
                        <th>Femenino</th>
                        <th>Activo</th>
                        <th><img class="responsive-img" src="../../resources/img/Tabla/woman.png"></th>
                        <th><a class="btn-floating btn-large waves-effect waves-light red" onclick="mostrarOcultar();"
                                href="#mostrar">
                                <i class="material-icons" title="Editar registro">update</i>
                            </a>
                        </th>
                    </tr>
                    <tr>
                        <th>Noel Valverde</th>
                        <th>1089-8223</th>
                        <th>noelv@empresa.com</th>
                        <th>Masculino</th>
                        <th>Activo</th>
                        <th><img class="responsive-img" src="../../resources/img/Tabla/man.png"></th>
                        <th><a class="btn-floating btn-large waves-effect waves-light red" onclick="mostrarOcultar();"
                                href="#mostrar">
                                <i class="material-icons" title="Editar registro">update</i>
                            </a>
                        </th>
                    </tr>
                    <tr>
                        <th>Marta Prados</th>
                        <th>8084-8228</th>
                        <th>martap@empresa.com</th>
                        <th>Femenino</th>
                        <th>Activo</th>
                        <th><img class="responsive-img" src="../../resources/img/Tabla/woman.png"></th>
                        <th><a class="btn-floating btn-large waves-effect waves-light red" onclick="mostrarOcultar();"
                                href="#mostrar">
                                <i class="material-icons" title="Editar registro">update</i>
                            </a>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>

<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
Dashboard_Page::footerTemplate('Empleados.js');
?>