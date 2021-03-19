<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/dashboard/dashboard_page2.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Dashboard_Page::headerTemplate('Entradas');
?>

<!--Contenedor para mostrar la card contenedora del formulario correspondiente a entradas-->
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
                <span class="card-title center-align">Administración de Entradas</span>
                <br>
                <!--Estableciendo el tamaño de cada div correspondiente-->
                <div class="row">
                    <!--Creamos la estructura del formulario respectivo-->
                    <form class="col-md-4">
                        <div class="row">
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12 m6">
                                <select>
                                    <option value="" disabled selected>Producto</option>
                                </select>
                            </div>
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12 m6">
                                <input id="telefono" type="number" class="validate">
                                <label for="telefono">Cantidad</label>
                            </div>
                        </div>
                        <div class="row">
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12 m6">
                                <label for="fecha">Fecha de ingreso</label>
                                <input type="text" class="datepicker">
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
<!--Contenedor para mostrar la card contenedora de la tabla de datos correspondiente a entradas-->
<!--Se le asigna el id="ocultable1" ya que esta sección(la tabla de datos) será lo que se mostrará primero-->
<div class="container" id="ocultable1">
    <div class="card whithe">
        <div class="card-content Black-text">
            <!--Colocamos el titulo de la card-->
            <span class="card-title center-align">Visualizar Entradas</span>
            <br>
            <!--Agregamos un botón cuya función es que nos mueste el formulario para agregar-->
            <!--un registro-->
            <div class="col s6">
                <a class="waves-effect red btn" onclick="mostrarOcultar();" href="#mostrar">
                     <i class="material-icons left">add</i>Agregar entrada
                </a>
            </div>
            <br>
            <!--Se añade un input field el cual su función es buscar una entrada en especifico-->
            <div class="input-field col s6">
                <i class="material-icons prefix">search</i>
                <input type="text" id="autocomplete-input" class="autocomplete">
                <label for="autocomplete-input">Buscar entrada</label>
            </div>
            <!--Se construye la tabla de datos correspondiente a entradas-->
            <!--Se especifica la clase para hacer responsive la tabla, y el tipo de tabla-->
            <!--Se especifica el detalle de cada fila y columna-->
            <table class="responsive-table striped">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Fecha</th>
                        <th>Empleado</th>
                        <th>Acción</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <th>Mouse Logitech G203</th>
                        <th>10</th>
                        <th>15/08/2021</th>
                        <th>Fernando Cubías</th>
                        <!--Le colocamos onclick="mostrarOcultar();" al boton para mostrar el formulario-->
                        <th><a class="btn-floating btn-large waves-effect waves-light red" onclick="mostrarOcultar();"
                                href="#mostrar"><i class="material-icons" title="Editar registro">update</i></a>
                        </th>
                    </tr>
                    <tr>
                        <th>GEFORCE RTX 3090</th>
                        <th>25</th>
                        <th>23/08/2021</th>
                        <th>Alejandro Muñoz</th>
                        <!--Le colocamos onclick="mostrarOcultar();" al boton para mostrar el formulario-->
                        <th><a class="btn-floating btn-large waves-effect waves-light red" onclick="mostrarOcultar();"
                                href="#mostrar"><i class="material-icons" title="Editar registro">update</i></a>
                        </th>
                    </tr>
                    <tr>
                        <th>Memoria usb</th>
                        <th>60</th>
                        <th>27/10/2021</th>
                        <th>Mónica Acevedo</th>
                        <!--Le colocamos onclick="mostrarOcultar();" al boton para mostrar el formulario-->
                        <th><a class="btn-floating btn-large waves-effect waves-light red" onclick="mostrarOcultar();"
                                href="#mostrar"><i class="material-icons" title="Editar registro">update</i></a>
                        </th>
                    </tr>
                    <tr>
                        <th>Cargador laptop universal</th>
                        <th>15</th>
                        <th>01/03/2021</th>
                        <th>Gustavo Morales</th>
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
Dashboard_Page::footerTemplate('entradas.js');
?>