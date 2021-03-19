<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/dashboard/dashboard_page2.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Dashboard_Page::headerTemplate('clientes');
?>

<!--Contenedor para mostrar la card contenedora de la tabla correspondiente a cada detalle del cliente-->
<div class="container">
    <div class="card">
        <div class="card-content">
            <!--Colocamos el titulo de la card Tabs in Cards-->
            <span class="card-title center-align">Clientes</span>
        </div>
        <!--Se especifica que se trabjará con una variante de las cards: "Tabs in Cards"-->
        <div class="card-tabs">
            <ul class="tabs tabs-fixed-width">
                <!--Definimos el titulo de cada sección-->
                <li class="tab"><a href="#test4">Visualizar Clientes</a></li>
                <li class="tab"><a class="active" href="#test5">Pedidos</a></li>
            </ul>
        </div>
        <div class="card-content whithe">
            <!--Se especifica el contenido de la primera sección de la Tabs in Cards-->
            <div id="test4">
                <div class="card whithe">
                    <div class="card-content Black-text">
                        <br>
                         <!--Se añade un input field el cual su función es buscar un cliente en especifico-->
                        <div class="input-field col s6">
                            <i class="material-icons prefix">search</i>
                            <input type="text" id="autocomplete-input" class="autocomplete">
                            <label for="autocomplete-input">Buscar cliente</label>
                        </div>
                        <!--Se construye la tabla de datos correspondiente a clientes-->
                        <!--Se especifica la clase para hacer responsive la tabla, y el tipo de tabla-->
                        <!--Se especifica el detalle de cada fila y columna-->
                        <table class="responsive-table striped">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Dirección</th>
                                    <th>Teléfono</th>
                                    <th>Correo</th>
                                    <th>Imagen</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <th>Juan Alvarez</th>
                                    <th>Passeig Villar, 724, 1º 1º</th>
                                    <th>7228-9635</th>
                                    <th>coolacs@empresa.com</th>
                                    <th><img class="responsive-img" src="../../resources/img/tabla/man.png"></th>
                                </tr>
                                <tr>
                                    <th>Miranda Escobar</th>
                                    <th>537 Loy Hill Apt. 515</th>
                                    <th>7228-4545</th>
                                    <th>strplc@empresa.com</th>
                                    <th><img class="responsive-img" src="../../resources/img/tabla/woman.png"></th>
                                </tr>
                                <tr>
                                    <th>Pablo Rodriguez</th>
                                    <th>537 Loy Hill Apt. 515</th>
                                    <th>7228-4545</th>
                                    <th>strplc@empresa.com</th>
                                    <th><img class="responsive-img" src="../../resources/img/tabla/man.png"></th>
                                </tr>
                                <tr>
                                    <th>Carlos Gallardo</th>
                                    <th>Cl. Gaitán, 91, Piso 75</th>
                                    <th>2628-4845</th>
                                    <th>aszc@empresa.com</th>
                                    <th><img class="responsive-img" src="../../resources/img/tabla/man.png"></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--Se especifica el contenido de la segunda sección de la Tabs in Cards-->
            <div id="test5">
                <div class="card whithe" id="ocultable">
                    <div class="card-content Black-text">
                        <!--Se especifica el titulo de la card-->
                        <span class="card-title center-align">Detalle del pedido</span>
                        <br>
                        <!--Se añade un boton para regresar a los pedidos-->
                        <a class="waves-effect red btn" onclick="mostrarOcultar();" href="#mostrar">
                            <i class="material-icons left">arrow_back</i>Pedidos
                        </a>
                        <br>
                        <br>
                        <!--Se construye la tabla de datos correspondiente al detalle del pedido-->
                        <!--Se especifica la clase para hacer responsive la tabla, y el tipo de tabla-->
                        <!--Se especifica el detalle de cada fila y columna-->
                        <table class="responsive-table striped">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio unitario</th>
                                    <th>Subtotal</th>
                                    <th>Imagen</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <th>Logitech G203 Mouse</th>
                                    <th>4</th>
                                    <th>$39.00</th>
                                    <th>$156.00</th>
                                    <th><img class="responsive-img" src="../../resources/img/tabla/informatica.png">
                                    </th>
                                </tr>
                                <tr>
                                    <th>GEFORCE RTX 3090</th>
                                    <th>1</th>
                                    <th>$1700.00</th>
                                    <th>$1700.00</th>
                                    <th><img class="responsive-img" src="../../resources/img/tabla Marca/imagen.png">
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--Contenedor para mostrar la card contenedora de la tabla de datos correspondiente a pedidos.-->
                <!--Se le asigna el id "ocultable1" lo que nos permite que cuando cargue esta sección desaparezca-->
                <!--la sección número 1-->
                <div class="card whithe" id="ocultable1">
                    <div class="card-content Black-text">
                        <br>
                        <!--Se añade un input field el cual su función es buscar un pedido en especifico-->
                        <div class="input-field col s6">
                            <i class="material-icons prefix">search</i>
                            <input type="text" id="autocomplete-input" class="autocomplete">
                            <label for="autocomplete-input">Buscar pedido</label>
                        </div>
                        <!--Se construye la tabla de datos correspondiente a pedidos-->
                        <!--Se especifica la clase para hacer responsive la tabla, y el tipo de tabla-->
                        <!--Se especifica el detalle de cada fila y columna-->
                        <table class="responsive-table striped">
                            <thead>
                                <tr>
                                    <th>Código pedido</th>
                                    <th>Cliente</th>
                                    <th>Dirección</th>
                                    <th>Telefóno</th>
                                    <th>Fecha</th>
                                    <th>Costo de envío</th>
                                    <th>Estado</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <th>3007</th>
                                    <th>Juan Alvarez</th>
                                    <th>Passeig Villar, 724, 1º 1º</th>
                                    <th>7228-9635</th>
                                    <th>08/10/2021</th>
                                    <th>$3.00</th>
                                    <th>Finalizado</th>
                                    <!--Le colocamos onclick="mostrarOcultar();" al boton para mostrar el detalle del pedido-->
                                    <th><a class="btn-floating btn-large waves-effect waves-light red"
                                            onclick="mostrarOcultar();" href="#mostrar"><i class="material-icons"
                                                title="Ver detalle">visibility</i></a>
                                    </th>
                                </tr>
                                <tr>
                                    <th>3008</th>
                                    <th>Sandra Muñoz</th>
                                    <th>Residencial Villar, 724, 1º 1º</th>
                                    <th>7228-9635</th>
                                    <th>15/09/2021</th>
                                    <th>$5.00</th>
                                    <th>En preparación</th>
                                    <!--Le colocamos onclick="mostrarOcultar();" al boton para mostrar el detalle del pedido-->
                                    <th><a class="btn-floating btn-large waves-effect waves-light red"
                                            onclick="mostrarOcultar();" href="#mostrar"><i class="material-icons"
                                                title="Ver detalle">visibility</i></a>
                                    </th>
                                </tr>
                                <tr>
                                    <th>3009</th>
                                    <th>Carlos Gallardo</th>
                                    <th>Residencial Villar, 724, 1º 1º</th>
                                    <th>7228-9635</th>
                                    <th>08/10/2021</th>
                                    <th>$2.00</th>
                                    <th>Finalizado</th>
                                    <!--Le colocamos onclick="mostrarOcultar();" al boton para mostrar el detalle del pedido-->
                                    <th><a class="btn-floating btn-large waves-effect waves-light red"
                                            onclick="mostrarOcultar();" href="#mostrar"><i class="material-icons"
                                                title="Ver detalle">visibility</i></a>
                                    </th>
                                </tr>
                                <tr>
                                    <th>3010</th>
                                    <th>Oscar Beltrán</th>
                                    <th>Residencial Villar, 724, 1º 1º</th>
                                    <th>7228-9635</th>
                                    <th>78/02/2021</th>
                                    <th>$1.00</th>
                                    <th>Finalizado</th>
                                    <!--Le colocamos onclick="mostrarOcultar();" al boton para mostrar el detalle del pedido-->
                                    <th><a class="btn-floating btn-large waves-effect waves-light red"
                                            onclick="mostrarOcultar();" href="#mostrar"><i class="material-icons"
                                                title="Ver detalle">visibility</i></a>
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
Dashboard_Page::footerTemplate('clientes.js');
?>