<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/dashboard/dashboard_page2.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Dashboard_Page::headerTemplate('Empleados');
?>

<!--Contenedor para mostrar la card contenedora del formulario correspondiente a empleados-->
<!--Se le asigna el id "ocultable" lo que nos permite que cuando cargue esta sección-->
<!--aparezca oculta y solo muestre la tabla de datos-->
<div class="row container" id="ocultable">
    <div class="col s12">
        <div class="card whithe">
            <!--Defiendo el contenido de la card que contendrá el formulario-->
            <div class="card-content black-text">
                <!--Colocamos el titulo de la card-->
                <span class="card-title center-align">Gestión de Empleados</span>
                <br>
                <!--Estableciendo el tamaño de cada div correspondiente-->
                <div class="row">
                    <!--Creamos la estructura del formulario respectivo-->
                    <form class="col-md-4">
                        <div class="row">
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12 m6">
                                <input id="nombres" type="text" class="validate">
                                <label for="nombres">Nombres</label>
                            </div>
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12 m6">
                                <input id="apellidos" type="text" class="validate">
                                <label for="apellidos">Apellidos</label>
                            </div>
                        </div>
                        <div class="row">
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12 m6">
                                <input id="correo" type="text" class="validate">
                                <label for="correo">Correo</label>
                            </div>
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12 m6">
                                <input id="telefono" type="text" class="validate">
                                <label for="telefono">Teléfono</label>
                            </div>
                        </div>
                        <div class="row">
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12 m6">
                                <!--Establecemos los selects-->
                                <div class="input-field col s12">
                                    <select>
                                        <option value="" disabled selected>Género</option>
                                        <option value="1">Masculino</option>
                                        <option value="2">Femenino</option>
                                    </select>
                                </div>
                            </div>
                            <!--Establecemos el datepicker-->
                            <div class="input-field col s12 m6">
                                <label for="fecha">Fecha de nacimiento</label>
                                <input type="text" class="datepicker">
                            </div>
                        </div>
                        <div class="row">
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12 m6">
                                <form action="#">
                                    <!--Estableciendo el tamaño del que tomará el File Input--> 
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
            <!--Asignamos los botones correspondientes para cada acción Scrud-->
            <!--Le colocamos onclick="mostrarOcultar();" a los botones para mostrar la tabla de datos-->
            <!--y esconder el formulario-->
            <!--Especificamos con un "title" lo que realiza cada botón-->
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
<!--Contenedor para mostrar la card contenedora de la tabla de datos correspondiente a empleados-->
<!--Se le asigna el id="ocultable1" ya que esta sección(la tabla de datos) será lo que se mostrará primero-->
<div class="container" id="ocultable1">
    <div class="card whithe">
        <div class="card-content Black-text">
            <!--Colocamos el titulo de la card-->
            <span class="card-title center-align">Visualizar Empleados</span>
            <br>
            <!--Agregamos un botón cuya función es que nos mueste el formulario para agregar-->
            <!--un registro-->
            <div>
                <a class="waves-effect red btn" onclick="mostrarOcultar();" href="#mostrar"><i
                        class="material-icons left">add</i>Agregar empleado</a>
            </div>
            <br>
            <!--Se añade un input field el cual su función es buscar un empleado en especifico-->
            <div class="input-field col s6">
                <i class="material-icons prefix">search</i>
                <input type="text" id="autocomplete-input" class="autocomplete">
                <label for="autocomplete-input">Buscar empleado</label>
            </div>
            <!--Se construye la tabla de datos correspondiente a empleados-->
            <!--Se especifica la clase para hacer responsive la tabla, y el tipo de tabla-->
            <!--Se especifica el detalle de cada fila y columna-->
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
                        <th><img class="responsive-img" src="../../resources/img/tabla/man.png"></th>
                        <!--Le colocamos onclick="mostrarOcultar();" al boton para mostrar el formulario-->
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
                        <th><img class="responsive-img" src="../../resources/img/tabla/woman.png"></th>
                        <!--Le colocamos onclick="mostrarOcultar();" al boton para mostrar el formulario-->
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
                        <th><img class="responsive-img" src="../../resources/img/tabla/man.png"></th>
                        <!--Le colocamos onclick="mostrarOcultar();" al boton para mostrar el formulario-->
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
                        <th><img class="responsive-img" src="../../resources/img/tabla/woman.png"></th>
                        <!--Le colocamos onclick="mostrarOcultar();" al boton para mostrar el formulario-->
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
Dashboard_Page::footerTemplate('empleados.js');
?>