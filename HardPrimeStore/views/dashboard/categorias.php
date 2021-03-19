<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/dashboard/dashboard_page2.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Dashboard_Page::headerTemplate('Categorías');
?>

<!--Contenedor para mostrar la card contenedora del formulario correspondiente a categorias-->
<!--Se le asigna el id "ocultable" lo que nos permite que cuando cargue esta sección-->
<!--aparezca oculta y solo muestre la tabla de datos-->
<div class="row container" id="ocultable">
    <div class="col s12">
        <div class="card whithe">
            <!--Defiendo el contenido de la card que contendrá el formulario-->
            <div class="card-content black-text">
                <!--Colocamos el titulo de la card-->
                <span class="card-title center-align">Gestión de Categorías</span>
                <br>
                <!--Estableciendo el tamaño de cada div correspondiente-->
                <div class="row">
                    <!--Creamos la estructura del formulario respectivo-->
                    <form class="col-md-4">
                        <div class="row">
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12 m6">
                                <input id="nombres" type="text" class="validate">
                                <label for="nombres">Nombre de la categoría</label>
                            </div>
                        </div>
                        <div class="row">
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12">
                                <div class="input-field col s12">
                                    <!--Estableciendo el data-legnth de 120 para el textarea-->
                                    <textarea id="textarea2" class="materialize-textarea" data-length="120"></textarea>
                                    <label for="textarea2">Descripción</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12">
                                <div class="input-field col s12 m6">
                                    <div class="file-field input-field">
                                        <div class="btn blue-grey">
                                            <span>Escoger imagen</span>
                                            <input type="file">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text">
                                        </div>
                                    </div>
                                </div>
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
                    onclick="mostrarOcultar();" href="#mostrar"><i class="material-icons">visibility</i></a>
            </div>
        </div>
    </div>
</div>
<!--Contenedor para mostrar la card contenedora de la tabla de datos correspondiente a categorias-->
<!--Se le asigna el id="ocultable1" ya que esta sección(la tabla de datos) será lo que se mostrará primero-->
<div class="container" id="ocultable1">
    <div class="card whithe">
        <div class="card-content Black-text">
            <!--Colocamos el titulo de la card-->
            <span class="card-title center-align">Visualizar Categorías</span>
            <br>
            <!--Agregamos un botón cuya función es que nos mueste el formulario para agregar-->
            <!--un registro-->
            <div>
                <a class="waves-effect red btn" onclick="mostrarOcultar();" href="#mostrar"><i
                        class="material-icons left">add</i>Agregar categoría</a>
            </div>
            <br>
            <!--Se añade un input field el cual su función es buscar una categoria en especifico-->
            <div class="input-field col s6">
                <i class="material-icons prefix">search</i>
                <input type="text" id="autocomplete-input" class="autocomplete">
                <label for="autocomplete-input">Buscar categoría</label>
            </div>
            <!--Se construye la tabla de datos correspondiente a categorias-->
            <!--Se especifica la clase para hacer responsive la tabla, y el tipo de tabla-->
            <!--Se especifica el detalle de cada fila y columna-->
            <table class="responsive-table striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Imagen</th>
                        <th>Acción</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <th>Perifericos</th>
                        <th>Teclados, mouse, cámaras, auriculares.</th>
                        <th><img class="responsive-img" src="../../resources/img/tabla categoria/tipo.png"></th>
                        <th>
                            <!--Le colocamos onclick="mostrarOcultar();" al boton para mostrar el formulario-->
                            <a class="btn-floating btn-large waves-effect waves-light red" onclick="mostrarOcultar();"
                                href="#mostrar">
                                <i class="material-icons" title="Editar registro">
                                    update
                                </i>
                            </a>
                        </th>
                    </tr>
                    <tr>
                        <th>Repuestos</th>
                        <th>Disco duro, baterías, cargadores, memorias usb.</th>
                        <th><img class="responsive-img" src="../../resources/img/tabla categoria/tipo.png"></th>
                        <th>
                            <!--Le colocamos onclick="mostrarOcultar();" al boton para mostrar el formulario-->
                            <a class="btn-floating btn-large waves-effect waves-light red" onclick="mostrarOcultar();"
                                href="#mostrar">
                                <i class="material-icons" title="Editar registro">
                                    update
                                </i>
                            </a>
                        </th>
                    </tr>
                    <tr>
                        <th>Componentes</th>
                        <th>Tarjeta de video, fuentes de poder, cases.</th>
                        <th><img class="responsive-img" src="../../resources/img/tabla categoria/tipo.png"></th>
                        <th>
                            <!--Le colocamos onclick="mostrarOcultar();" al boton para mostrar el formulario-->
                            <a class="btn-floating btn-large waves-effect waves-light red" onclick="mostrarOcultar();"
                                href="#mostrar">
                                <i class="material-icons" title="Editar registro">
                                    update
                                </i>
                            </a>
                        </th>
                    </tr>
                    <tr>
                        <th>Imagen</th>
                        <th>Proyectores, pantallas, monitores.</th>
                        <th><img class="responsive-img" src="../../resources/img/tabla categoria/tipo.png"></th>
                        <th>
                            <!--Le colocamos onclick="mostrarOcultar();" al boton para mostrar el formulario-->
                            <a class="btn-floating btn-large waves-effect waves-light red" onclick="mostrarOcultar();"
                                href="#mostrar">
                                <i class="material-icons" title="Editar registro">
                                    update
                                </i>
                            </a>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
Dashboard_Page::footerTemplate('categorias.js');
?>