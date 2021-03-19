<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/dashboard/dashboard_page2.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Dashboard_Page::headerTemplate('Consultas');
?>

<!--Contenedor para mostrar la card contenedora del formulario correspondiente a categorias-->
<!--Se le asigna el id "ocultable" lo que nos permite que cuando cargue esta sección-->
<!--aparezca oculta y solo muestre la tabla de datos-->
<div class="row container" id="ocultable">
    <br>
    <br>
    <br>
    <div class="col s12">
        <div class="card whithe">
            <!--Defiendo el contenido de la card que contendrá el formulario-->
            <div class="card-content black-text">
                 <!--Colocamos el titulo de la card-->
                <span class="card-title center-align">Resolución de dudas/consultas</span>
                <br>
                <!--Estableciendo el tamaño de cada div correspondiente-->
                <div class="row">
                    <!--Creamos la estructura del formulario respectivo-->
                    <form class="col-md-4">
                        <div class="row">
                            <!--Estableciendo el tamaño del que tomará cada Input field-->
                            <div class="input-field col s12 m6">
                                <input disabled value="¿Como puedo cambiar mi foto de perfil?" id="disabled1" type="text" class="validate">
                                <label for="disabled">Consulta</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input disabled value="Consulta" id="disabled" type="text" class="validate">
                                <label for="disabled">Tipo de comentario</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="respuesta" type="text" class="validate">
                                <label for="respuesta">Respuesta</label>
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
                <a class="btn-floating btn-large waves-effect waves-light red" title="Responder"
                    onclick="mostrarOcultar();" href="#mostrar"><i class="material-icons">done</i></a>
                <a class="btn-floating btn-large waves-effect waves-light red" title="Mostrar consultas"
                    onclick="mostrarOcultar();">
                    <i class="material-icons">visibility</i></a>
            </div>
        </div>
    </div>
</div>
<!--Contenedor para mostrar la card contenedora de la tabla de datos correspondiente a consultas-->
<!--Se le asigna el id="ocultable1" ya que esta sección(la tabla de datos) será lo que se mostrará primero-->
<div class="container" id="ocultable1">
    <br>
    <br>
    <div class="card whithe">
        <div class="card-content Black-text">
            <!--Colocamos el titulo de la card-->
            <span class="card-title center-align">Visualizar consultas/dudas</span>
            <div class="input-field col s6">
                <!--Se añade un input field el cual su función es buscar una categoria en especifico-->
                <i class="material-icons prefix">search</i>
                <input type="text" id="autocomplete-input" class="autocomplete">
                <label for="autocomplete-input">Buscar cliente</label>
            </div>
            <!--Se construye la tabla de datos correspondiente a consultas-->
            <!--Se especifica la clase para hacer responsive la tabla, y el tipo de tabla-->
            <!--Se especifica el detalle de cada fila y columna-->
            <table class="responsive-table striped">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Consulta</th>
                        <th>Tipo de comentario</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <th>Carlos Acevedo</th>
                        <th>¿Como puedo cambiar mi foto de perfil?</th>
                        <th>Consulta</th>
                        <th>17/02/2021</th>
                        <th>Sin responder</th>
                        <!--Le colocamos onclick="mostrarOcultar();" al boton para mostrar el formulario-->
                        <th><a class="btn-floating btn-large waves-effect waves-light red" onclick="mostrarOcultar();"
                                href="#mostrar"><i class="material-icons" title="Responder">update</i></a>
                        </th>
                    </tr>
                    <tr>
                        <th>Stuart Lupos</th>
                        <th>¿Como puedo cambiar mi dirección predeterminada?</th>
                        <th>Consulta</th>
                        <th>27/11/2021</th>
                        <th>Rsuelto</th>
                        <!--Le colocamos onclick="mostrarOcultar();" al boton para mostrar el formulario-->
                        <th><a class="btn-floating btn-large disabled waves-effect waves-light red">
                                <i class="material-icons" title="Consulta resuelta">update</i></a>
                        </th>
                    </tr>
                    <tr>
                        <th>Carla Muñoz</th>
                        <th>Me gustaría que tuvieran más stock de monitores.</th>
                        <th>Comentario</th>
                        <th>17/02/2021</th>
                        <th>Sin responder</th>
                        <!--Le colocamos onclick="mostrarOcultar();" al boton para mostrar el formulario-->
                        <th><a class="btn-floating btn-large waves-effect waves-light red" onclick="mostrarOcultar();"
                                href="#mostrar"><i class="material-icons" title="Responder">update</i></a>
                        </th>
                    </tr>
                    <tr>
                        <th>Adalid Otmaro</th>
                        <th>Gracias por la atención al cliente.</th>
                        <th>Comentario</th>
                        <th>30/11/2021</th>
                        <th>Resuelto</th>
                        <!--Le colocamos onclick="mostrarOcultar();" al boton para mostrar el formulario-->
                        <th><a class="btn-floating btn-large disabled waves-effect waves-light red">
                                <i class="material-icons" title="Comentario resuelto">update</i></a>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
Dashboard_Page::footerTemplate('consultas.js');
?>