<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/public/sitio_publico.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Sitio_Publico::headerTemplate('HardPrimeStore - Carrito de compras');
?>
<main>
    <div class="tabla">    
        <h4>&nbsp;&nbsp;Carrito de compras</h4>
        <hr>
        <div class="row">
            <div class="col s12 m12">
            <!--Card que va a contener la tabla-->
                <div class="card white darken-1">
                    <div class="card-content black-text">
                    <!--Creacion de la tabla para los productos del pedido-->
                        <table class="striped responsive-table">
                            <thead>
                            <!--Se crean las filas con los elementos que va a llevar la tabla-->
                                <tr>
                                    <th>Producto</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                            <!--Creacion de las columnas para las filas ya previamente creadas-->
                                <tr>
                                    <td><img src="../../resources/img/public/DiscoInterno.jpg" width="80" height="80"></td>
                                    <td>Lollipop</td>
                                    <td>$7.00</td>
                                    <td>$7.00</td>
                                    <td>$7.00</td>
                                    <td><a class="btn-floating btn-small btn tooltipped waves-effect waves-light orange darken-4" data-position="right" data-tooltip="remover"><i class="material-icons">remove</i></a></td>
                                </tr>
                                <tr>
                                    <td><img src="../../resources/img/public/Monitor.jpg" width="80" height="80"></td>
                                    <td>Lollipop</td>
                                    <td>$7.00</td>
                                    <td>$7.00</td>
                                    <td>$7.00 </td>
                                    <td><a class="btn-floating btn-small btn tooltipped waves-effect waves-light orange darken-4" data-position="right" data-tooltip="remover"><i class="material-icons">remove</i></a></td>
                                </tr>
                                <tr>
                                    <td><img src="../../resources/img/public/Teclado.jpg" width="80" height="80"></td>
                                    <td>Lollipop</td>
                                    <td>$7.00</td>
                                    <td>$7.00</td>
                                    <td>$7.00</td>
                                    <td><a class="btn-floating btn-small btn tooltipped waves-effect waves-light orange darken-4" data-position="right" data-tooltip="remover"><i class="material-icons">remove</i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--Apartado para que el cliente vea mas a detalle la suma para el costo total-->
    <div class="row">
        <div class="col s12 m5" id="confirmar">
            <div class="card grey lighten-2">
                <div class="card-content black-text">
                    <span class="card-title"><b>Costos</b></span>
                    <h6><b>Sub Total :</b> $300.00 &nbsp;+ &nbsp;<b>Costo de envío:</b> $20.00</h6>

                    <h6><b>Total : $320.00</b></h6>
                </div>
                <!--Boton para ir a la pagina de confirmar pedido-->
                <div class="card-action" id="btnconfirmar">
                    <a class="waves-effect orange darken-4 btn" href="confirmar_pedido.php"><i class="material-icons right">done</i>Confirmar Compra</a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>

</main>

<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
Sitio_Publico::footerTemplate('carrito_compras.js');
?>