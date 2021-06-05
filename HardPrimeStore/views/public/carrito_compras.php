<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/public/sitio_publico.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Sitio_Publico::headerTemplate('HardPrimeStore - Carrito de compras');
?>
<main>
    <br>
    <div class="row container">
        <div class="col s12 m12">
            <!--Card que va a contener la tabla-->
            <div class="card white darken-1">
                <div class="card-content black-text">
                    <span class="card-title center-align"><b>Carrito de compras</b></span>
                    <br>
                    <!--Creacion de la tabla para los productos del pedido-->
                    <table class="responsive-table">
                        <thead>
                        <!--Se crean las filas con los elementos que va a llevar la tabla-->
                            <tr>
                                <th>Producto</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-carrito">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row container">
            <div class="col s12" id="confirmar">
                <div class="card white">
                    <div class="card-content black-text">
                        <span class="card-title"><b>Resumen del pedido</b></span>
                        <h6><b>Total a pagar : </b><b>$</b><b id="total"></b></h6>
                    </div>
                    <!--Boton para ir a la pagina de confirmar pedido-->
                    <div class="card-action" id="btnconfirmar">
                        <a onclick="finishOrder()" class="waves-effect deep-orange lighten-1 btn"><i class="material-icons left">task</i>Finalizar pedido</a>
                        <a class="waves-effect red btn"><i class="material-icons left">cancel_presentation</i>Cancelar pedido</a>
                    </div>
                    <div class="card-action" id="btnconfirmar">
                        <a class="waves-effect deep-orange lighten-1 btn"><i class="material-icons left">keyboard_return</i>Seguir comprando</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Componente Modal para mostrar una caja de dialogo -->
    <div id="item-modal" class="modal">
        <div class="modal-content">
            <!-- Título para la caja de dialogo -->
            <h4 class="center-align">Cambiar cantidad</h4>
            <!-- Formulario para cambiar la cantidad de producto -->
            <form method="post" id="item-form">
                <!-- Campo oculto para asignar el id del registro al momento de modificar -->
                <input type="number" id="id_detalle" name="id_detalle" class="hide"/>
                <input type="number" id="id_producto" name="id_producto" class="hide"/>
                <div class="row">
                    <div class="input-field col s12 m4 offset-m4">
                        <i class="material-icons prefix">list</i>
                        <input type="number" id="cantidad_producto" name="cantidad_producto" min="1" class="validate" required/>
                        <label for="cantidad_producto">Cantidad</label>
                    </div>
                </div>
                <div class="row center-align">
                    <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                    <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
                </div>
            </form>
        </div>
    </div>
</main>

<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
Sitio_Publico::footerTemplate('carrito_compras.js');
?>