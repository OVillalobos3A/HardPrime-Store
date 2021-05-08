<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/dashboard/dashboard_page2.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Dashboard_Page::headerTemplate('Marcas');
?>
<br>
<div class="container">
    <div class="card whithe">
        <div class="card-content Black-text">
            <!--Colocamos el titulo de la card-->
            <span class="card-title center-align">Gestión de marcas</span>
            <br>
            <!--Agregamos un botón cuya función es que nos mueste el formulario para agregar-->
            <!--un registro-->
            <div>
                <a class="waves-effect red btn modal-trigger" href="#modal_registro"><i class="material-icons left">add</i>Agregar marcas</a>
            </div>
            <br>
            <!--Se añade un input field el cual su función es buscar un empleado en especifico-->
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">search</i>
                    <input type="text" id="autocomplete-input" class="autocomplete">
                    <label for="autocomplete-input">Buscar marca por nombre</label>
                </div>
                <div class="input-field col s6">
                    <a class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">done</i></a>
                </div>
            </div>
            <!--Se construye la tabla de datos correspondiente a usuarios-->
            <!--Se especifica la clase para hacer responsive la tabla, y el tipo de tabla-->
            <!--Se especifica el detalle de cada fila y columna-->
            <table class="responsive-table striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Imagen</th>
                        <th>Logo</th>
                        <th>Acción</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <th>Nvida</th>
                        <th><img class="responsive-img" src="../../resources/img/tabla marca/imagen.png"></th>
                        <th><img class="responsive-img" src="../../resources/img/tabla marca/logo.png"></th>
                        <th>
                            <a class="btn-floating btn waves-effect light-blue darken-4 modal-trigger" href="#modal_registro"><i class="material-icons" title="Editar registro">create</i></a>
                            <a class="btn-floating btn waves-effect red" href="#"><i class="material-icons" title="Eliminar registro">delete</i></a>
                        </th>
                    </tr>
                    <tr>
                        <th>Intel</th>
                        <th><img class="responsive-img" src="../../resources/img/tabla marca/imagen.png"></th>
                        <th><img class="responsive-img" src="../../resources/img/tabla marca/logo.png"></th>
                        <th>
                            <a class="btn-floating btn waves-effect light-blue darken-4 modal-trigger" href="#modal_registro"><i class="material-icons" title="Editar registro">create</i></a>
                            <a class="btn-floating btn waves-effect red" href="#"><i class="material-icons" title="Eliminar registro">delete</i></a>
                        </th>
                    </tr>
                    <tr>
                        <th>Ryzen</th>
                        <th><img class="responsive-img" src="../../resources/img/tabla marca/imagen.png"></th>
                        <th><img class="responsive-img" src="../../resources/img/tabla marca/logo.png"></th>
                        <th>
                            <a class="btn-floating btn waves-effect light-blue darken-4 modal-trigger" href="#modal_registro"><i class="material-icons" title="Editar registro">create</i></a>
                            <a class="btn-floating btn waves-effect red" href="#"><i class="material-icons" title="Eliminar registro">delete</i></a>
                        </th>
                    </tr>
                    <tr>
                        <th>Logitech</th>
                        <th><img class="responsive-img" src="../../resources/img/tabla marca/imagen.png"></th>
                        <th><img class="responsive-img" src="../../resources/img/tabla marca/logo.png"></th>
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
        <h5 class="center-align">Agregar marca</h5>
        <br>
        <!--Estableciendo el tamaño de cada div correspondiente-->
        <div class="row">
            <!--Creamos la estructura del formulario respectivo-->
            <form class="col-md-4">
                <div class="row">
                    <!--Estableciendo el tamaño del que tomará el Input field-->
                    <div class="input-field col s12 m6">
                        <input id="nombres" type="text" class="validate">
                        <label for="nombres">Nombre de la marca</label>
                    </div>
                    <!--Estableciendo el tamaño del que tomará el Input field-->
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
                    <!--Estableciendo el tamaño del que tomará el Input field-->
                    <div class="input-field col s12 m6">
                        <form action="#">
                            <div class="file-field input-field">
                                <div class="btn blue-grey">
                                    <span>Escoger logo</span>
                                    <input type="file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col s10 offset-s1 center-align">
                            <a class="waves-effect light-blue darken-3 btn"><i class="material-icons right">save</i>Guardar</a>
                            <a class="waves-effect red btn modal-close"><i class="material-icons right">close</i>Cancelar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
    </div>
</div>
<br>
<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
Dashboard_Page::footerTemplate('Marcas.js');
?>