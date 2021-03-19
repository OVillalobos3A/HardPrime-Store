<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/dashboard/dashboard_page2.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Dashboard_Page::headerTemplate('Usuarios');
?>

<!--Contenedor para mostrar la card contenedora del formulario correspondiente a usuarios-->
<!--Se le asigna el id "ocultable" lo que nos permite que cuando cargue esta sección-->
<!--aparezca oculta y solo muestre la tabla de datos-->
<div class="row container" id="ocultable">
    <br>
    <br>
    <div class="col s12">
        <div class="card whithe">
            <!--Defiendo el contenido de la card que contendrá el formulario-->
            <div class="card-content black-text">
                <!--Colocamos el titulo de la card-->
                <span class="card-title center-align">Administración de Usuarios</span>
                <br>
                <!--Estableciendo el tamaño de cada div correspondiente-->
                <div class="row">
                    <!--Creamos la estructura del formulario respectivo-->
                    <form class="col-md-4">
                        <div class="row">
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12 m6">
                                <select>
                                    <option value="" disabled selected>Empleado</option>
                                </select>
                            </div>
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12 m6">
                                <select>
                                    <option value="" disabled selected>Tipo de usuario</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12 m6">
                                <input id="telefono" type="text" class="validate">
                                <label for="telefono">Usuario</label>
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
                    onclick="mostrarOcultar();">
                    <i class="material-icons">visibility</i></a>
            </div>
        </div>
    </div>
</div>
<!--Contenedor para mostrar la card contenedora de la tabla de datos correspondiente a usuarios-->
<!--Se le asigna el id="ocultable1" ya que esta sección(la tabla de datos) será lo que se mostrará primero-->
<div class="container" id="ocultable1">
    <div class="card whithe">
        <div class="card-content Black-text">
            <!--Colocamos el titulo de la card-->
            <span class="card-title center-align">Visualizar Usuarios</span>
            <br>
            <!--Agregamos un botón cuya función es que nos mueste el formulario para agregar-->
            <!--un registro-->
            <div class="col s6">
                <a class="waves-effect red btn" onclick="mostrarOcultar();" href="#mostrar"><i
                        class="material-icons left">add</i>Agregar usuario</a>
            </div>
            <br>
            <!--Se añade un input field el cual su función es buscar un usuario en especifico-->
            <div class="input-field col s6">
                <i class="material-icons prefix">search</i>
                <input type="text" id="autocomplete-input" class="autocomplete">
                <label for="autocomplete-input">Buscar usuario</label>
            </div>
            <!--Se construye la tabla de datos correspondiente a usuarios-->
            <!--Se especifica la clase para hacer responsive la tabla, y el tipo de tabla-->
            <!--Se especifica el detalle de cada fila y columna-->
            <table class="responsive-table striped">
                <thead>
                    <tr>
                        <th>Empleado</th>
                        <th>Usuario</th>
                        <th>Tipo empleado</th>
                        <th>Acción</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <th>Fernando Cubías</th>
                        <th>fjcubi13</th>
                        <th>Gerente</th>
                        <!--Le colocamos onclick="mostrarOcultar();" al boton para mostrar el formulario-->
                        <th><a class="btn-floating btn-large waves-effect waves-light red" onclick="mostrarOcultar();"
                                href="#mostrar"><i class="material-icons" title="Editar registro">update</i></a>
                        </th>
                    </tr>
                    <tr>
                        <th>Alejandro Muñoz</th>
                        <th>alejo124</th>
                        <th>Administrador</th>
                        <!--Le colocamos onclick="mostrarOcultar();" al boton para mostrar el formulario-->
                        <th><a class="btn-floating btn-large waves-effect waves-light red" onclick="mostrarOcultar();"
                                href="#mostrar"><i class="material-icons" title="Editar registro">update</i></a>
                        </th>
                    </tr>
                    <tr>
                        <th>Mónica Acevedo</th>
                        <th>monica0103</th>
                        <th>Secretaria</th>
                        <!--Le colocamos onclick="mostrarOcultar();" al boton para mostrar el formulario-->
                        <th><a class="btn-floating btn-large waves-effect waves-light red" onclick="mostrarOcultar();"
                                href="#mostrar"><i class="material-icons" title="Editar registro">update</i></a>
                        </th>
                    </tr>
                    <tr>
                        <th>Gustavo Morales</th>
                        <th>gustavito12</th>
                        <th>Repartidor</th>
                        <!--Le colocamos onclick="mostrarOcultar();" al boton para mostrar el formulario-->
                        <th><a class="btn-floating btn-large waves-effect waves-light red" onclick="mostrarOcultar();"
                                href="#mostrar"><i class="material-icons" title="Editar registro">update</i></a>
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
Dashboard_Page::footerTemplate('Usuarios.js');
?>