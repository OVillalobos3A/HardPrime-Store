<?php
include('../../app/Helpers/public/sitio_publico.php');
Sitio_Publico::headerTemplate('HardPrimeStore - Carrito de compras');
?>
<main>
    <div class="row container">
        <h4 class="center indigo-text" id="title"></h4>
        <div class="col s12">
            <div class="card-panel light-blue darken-4 white-text">
                <h5 class="center-align">Productos por marca</h5>
            </div>
        </div>
    </div>
    <div class="row container" id="productosmarcas">
    </div>
    <!-- Componente Modal para mostrar una caja de dialogo -->
    <div id="item-modal" class="modal modale">
        <div class="modal-content">
            <!-- Título para la caja de dialogo -->
            <h5 class="center-align">Elija la cantidad</h5>
            <!-- Formulario para cambiar la cantidad de producto -->
            <form method="post" id="item-form">
                <!-- Campo oculto para asignar el id del registro al momento de modificar -->
                <input type="number" id="id_detalle" name="id_detalle" class="hide"/>
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
Sitio_Publico::footerTemplate('pmarcas.js');
?>