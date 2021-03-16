<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/dashboard_page2.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Dashboard_Page::headerTemplate('Marcas');
?>

<!--Contenedor para mostrar una tabla con datos-->
<div class="row container" id="ocultable">
    <br>
    <br>
    <div class="col s12">
        <div class="card whithe">
            <div class="card-content black-text">
                <span class="card-title center-align">Gestión de Marcas</span>
                <br>
                <div class="row">
                    <form class="col-md-4">
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="nombres" type="text" class="validate">
                                <label for="nombres">Nombre de la marca</label>
                            </div>
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
                    onclick="mostrarOcultar();">
                    <i class="material-icons">visibility</i></a>
            </div>
        </div>
    </div>
</div>
<div class="container" id="ocultable1">
    <div class="card whithe">
        <div class="card-content Black-text">
            <span class="card-title center-align">Visualizar Marcas</span>
            <br>
            <div class="col s6">
                <a class="waves-effect red btn" onclick="mostrarOcultar();" href="#mostrar"><i
                        class="material-icons left">add</i>Agregar marca</a>
            </div>
            <br>
            <div class="input-field col s6">
                <i class="material-icons prefix">search</i>
                <input type="text" id="autocomplete-input" class="autocomplete">
                <label for="autocomplete-input">Buscar marca</label>
            </div>
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
                        <th><img class="responsive-img" src="../../resources/img/Tabla Marca/imagen.png"></th>
                        <th><img class="responsive-img" src="../../resources/img/Tabla Marca/logo.png"></th>
                        <th><a class="btn-floating btn-large waves-effect waves-light red" onclick="mostrarOcultar();"
                                href="#mostrar"><i class="material-icons" title="Editar registro">update</i></a>
                        </th>
                    </tr>
                    <tr>
                        <th>Intel</th>
                        <th><img class="responsive-img" src="../../resources/img/Tabla Marca/imagen.png"></th>
                        <th><img class="responsive-img" src="../../resources/img/Tabla Marca/logo.png"></th>
                        <th><a class="btn-floating btn-large waves-effect waves-light red" onclick="mostrarOcultar();"
                                href="#mostrar"><i class="material-icons" title="Editar registro">update</i></a>
                        </th>
                    </tr>
                    <tr>
                        <th>Ryzen</th>
                        <th><img class="responsive-img" src="../../resources/img/Tabla Marca/imagen.png"></th>
                        <th><img class="responsive-img" src="../../resources/img/Tabla Marca/logo.png"></th>
                        <th><a class="btn-floating btn-large waves-effect waves-light red" onclick="mostrarOcultar();"
                                href="#mostrar"><i class="material-icons" title="Editar registro">update</i></a>
                        </th>
                    </tr>
                    <tr>
                        <th>Logitech</th>
                        <th><img class="responsive-img" src="../../resources/img/Tabla Marca/imagen.png"></th>
                        <th><img class="responsive-img" src="../../resources/img/Tabla Marca/logo.png"></th>
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
Dashboard_Page::footerTemplate('Marcas.js');
?>