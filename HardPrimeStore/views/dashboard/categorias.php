<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/dashboard/dashboard_page2.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Dashboard_Page::headerTemplate('Categorías');
?>

<div class="container">
    <div class="card whithe">
        <div class="card-content Black-text">
            <!--Colocamos el titulo de la card-->
            <span class="card-title center-align">Gestión de categorías</span>
            <br>
            <!--Agregamos un botón cuya función es que nos mueste el formulario para agregar-->
            <!--un registro-->
            <div>
                <a class="waves-effect red btn modal-trigger" href="#modal_registro"><i class="material-icons left">add</i>Agregar categoría</a>
            </div>
            <br>
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">search</i>
                    <input type="text" id="autocomplete-input" class="autocomplete">
                    <label for="autocomplete-input">Buscar categoria por nombre</label>
                </div>
                <div class="input-field col s6">
                    <a class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">done</i></a>
                </div>
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
                            <a class="btn-floating btn waves-effect light-blue darken-4 modal-trigger" href="#modal_registro"><i class="material-icons" title="Editar registro">create</i></a>
                            <a class="btn-floating btn waves-effect red" href="#"><i class="material-icons" title="Eliminar registro">delete</i></a>
                        </th>
                    </tr>
                    <tr>
                        <th>Repuestos</th>
                        <th>Disco duro, baterías, cargadores, memorias usb.</th>
                        <th><img class="responsive-img" src="../../resources/img/tabla categoria/tipo.png"></th>
                        <th>
                            <a class="btn-floating btn waves-effect light-blue darken-4 modal-trigger" href="#modal_registro"><i class="material-icons" title="Editar registro">create</i></a>
                            <a class="btn-floating btn waves-effect red" href="#"><i class="material-icons" title="Eliminar registro">delete</i></a>
                        </th>
                    </tr>
                    <tr>
                        <th>Componentes</th>
                        <th>Tarjeta de video, fuentes de poder, cases.</th>
                        <th><img class="responsive-img" src="../../resources/img/tabla categoria/tipo.png"></th>
                        <th>
                            <a class="btn-floating btn waves-effect light-blue darken-4 modal-trigger" href="#modal_registro"><i class="material-icons" title="Editar registro">create</i></a>
                            <a class="btn-floating btn waves-effect red" href="#"><i class="material-icons" title="Eliminar registro">delete</i></a>
                        </th>
                    </tr>
                    <tr>
                        <th>Imagen</th>
                        <th>Proyectores, pantallas, monitores.</th>
                        <th><img class="responsive-img" src="../../resources/img/tabla categoria/tipo.png"></th>
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
<div id="modal_registro" class="modal">
    <div class="modal-content">
        <h5 class="center-align">Agregar categoría</h5>
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
                <div class="row">
                    <div class="col s10 offset-s1 center-align">
                        <a class="waves-effect light-blue darken-3 btn"><i class="material-icons right">save</i>Guardar</a>
                        <a class="waves-effect red btn modal-close"><i class="material-icons right">close</i>Cancelar</a>
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
Dashboard_Page::footerTemplate('categorias.js');
?>