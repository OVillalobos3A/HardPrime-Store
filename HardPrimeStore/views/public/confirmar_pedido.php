<?php
//Se incluye la clase con las plantillas del documento
include('../../app/Helpers/public/sitio_publico.php');
//Se imprime la plantilla del encabezado y se envia el titulo de la pagina web
Sitio_Publico::headerTemplate('HardPrimeStore - Carrito de compras');
?>
<main>
    <h3>&nbsp;&nbsp;Confirmar Pedido</h3>
    <hr>
    <div></div>
    <div class="row">
        <div class="col s12 m6">
        <!--Card en la que se muestra la direccíon que el cliente tiene registrada-->
            <div class="card ">
                <div class="card-content black-text">
                    <span class="card-title blue-grey-text"><b>Dirección</b><a class="btn-floating right btn-small tooltipped waves-effect waves-light red" data-position="left" data-tooltip="editar dirección"><i class="material-icons">edit</i></a></span>
                    <h6><b>Casa</b></h6>

                    <div class="row">
                        <div class="col s12 m2">
                            <br><i class="medium material-icons">home</i>
                        </div>
                        <!--Apartado en el que va la dirección del cliente-->
                        <div class="col s12 m10">
                            <h6>Centro Comercial plaza Mundo 1er. nivel parqueo sur local #88, Boulevard del Ejercito Nacional Km 5 1/2, calle Montecarmelo, Soyapango.</h6>
                        </div>
                    </div>
                </div>
                <div class="card-action" id="btnconfirmar">
                </div>
            </div>
        </div>
        <!--Card que muestra la información de contacto del cliente-->
        <div class="col s12 m6">
            <div class="card ">
                <div class="card-content black-text">
                    <span class="card-title blue-grey-text"><b>Información de contacto<i class="small material-icons floating right">person_pin</i></b><br></span>
                    <h6><b>Correo</b> usuario@example.com</h6>
                    <h6><b>Teléfono:</b> 7777-7777</h6>
                    <h6><b>Celular:</b> 2222-2222</h6>
                    <br><br>
                </div>
                <div class="card-action" id="btnconfirmar">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m8">
        <!--Card que contiene el resumen del pedido-->
            <div class="card">
                <div class="card-content black-text">
                    <span class="card-title blue-grey-text"><b>
                            <h4>Resumen del pedido</h4>
                        </b></span>
                    <!--Tabla de resumen de productos que contiene el pedido-->
                    <div class="row">
                        <div class="col s12 m12">
                            <table class="responsive-table">
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
                                <!--Se crean las columnas con la información para las filas anteriormente creadas-->
                                    <tr>
                                        <td><img src="../../resources/img/public/DiscoInterno.jpg" width="80" height="80"></td>
                                        <td>Disco duro interno 200TB</td>
                                        <td>$150.00</td>
                                        <td>2</td>
                                        <td>$300.00</td>
                                    </tr>
                                    <tr>
                                        <td><img src="../../resources/img/public/Monitor.jpg" width="80" height="80"></td>
                                        <td>Monitor HP 1080P</td>
                                        <td>$120.00</td>
                                        <td>1</td>
                                        <td>$120.00 </td>
                                    </tr>
                                    <tr>
                                        <td><img src="../../resources/img/public/Teclado.jpg" width="80" height="80"></td>
                                        <td>Teclado LogiTech</td>
                                        <td>$20.00</td>
                                        <td>1</td>
                                        <td>$20.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--Apartado con los costos que tiene el pedido-->
                    <div class="row">
                        <div class="col s12 m12 right-align">
                            <h6> Costo de Envío: $20.00</h6>
                        </div>
                    </div>
                </div>
                <div class="card-action" id="btnconfirmar">
                    <h5 class="orange-text text-darken-1">Total a pagar: <b>$440.00</b></h5>
                </div>
            </div>
        </div>

        <br><br><br><br>
        <!--Botones de confirmar compra y regresar al carrito-->
        <div class="center-align">
            <a class="waves-effect blue-grey btn btn-medium"><i class="material-icons right">done</i>Confirmar Compra</a><br>
            <br><a class="waves-effect blue-grey btn btn-medium" href="carrito_compras.php"><i class="material-icons right">undo</i>Regresar al carrito</a>
        </div>
    </div>

</main>

<?php
Sitio_Publico::footerTemplate('confirmar_pedido.js');
?>