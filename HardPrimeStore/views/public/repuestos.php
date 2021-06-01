<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/public/sitio_publico.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Sitio_Publico::headerTemplate('HardPrimeStore - Categorías');
?>
<main>
    <div class="row">

        <div class="col s12 m12">
            <!--Encabezado y paginación-->

            <h5> &nbsp;&nbsp;&nbsp;Producto Buscado</h5>
            <hr>
            <ul class="pagination">
                <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                <li class="active orange darken-4"><a href="#!">1</a></li>
                <li class="waves-effect"><a href="#!">2</a></li>
                <li class="waves-effect"><a href="#!">3</a></li>
                <li class="waves-effect"><a href="#!">4</a></li>
                <li class="waves-effect"><a href="#!">5</a></li>
                <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
            </ul>
            <!--Creacion de la cards-->
            <!--Creacion del div para la primera fila de productos-->
            <div class="row">
                <div class="col s12 m3">
                    <div class="card">
                        <div class="card-image">
                            <img src="../../resources/img/public/DiscoInterno.jpg" width="100" height="200">
                            <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add_shopping_cart</i></a>
                        </div>

                        <div class="card-content">
                            <span class="card-title indigo-text text-darken-4"><b>Disco duro Seagate</b></span>
                            <h6 class="orange-text text-darken-4"><b>$200</b></h6>
                            <p>
                                La unidad portátil de expansión de Seagate proporciona almacenamiento adicional para su
                                colección de archivos en constante crecimiento.
                            </p>
                            <a href="vista_producto.php" id="link1">Ver producto</a>
                        </div>
                    </div>
                </div>

                <div class="col s12 m3">
                    <div class="card">
                        <div class="card-image">
                            <img src="../../resources/img/public/Monitor.jpg" width="100" height="200">
                            <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add_shopping_cart</i></a>
                        </div>
                        <div class="card-content">
                            <span class="card-title indigo-text text-darken-4"><b>Pantalla dell</b></span>
                            <h6 class="orange-text text-darken-4"><b>$200</b></h6>
                            <p>
                                La unidad portátil de expansión de Seagate proporciona almacenamiento adicional para su
                                colección de archivos en constante crecimiento.
                            </p>
                            <a href="vista_producto.php" id="link1">Ver producto</a>
                        </div>
                    </div>
                </div>

                <div class="col s12 m3">
                    <div class="card">
                        <div class="card-image">
                            <img src="../../resources/img/public/TarjetaGrafica.jpg" width="100" height="200">
                            <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add_shopping_cart</i></a>
                        </div>
                        <div class="card-content">
                            <span class="card-title indigo-text text-darken-4"><b>Tarjeta Gráfica</b></span>
                            <h6 class="orange-text text-darken-4"><b>$200</b></h6>
                            <p>
                                La unidad portátil de expansión de Seagate proporciona almacenamiento adicional para su
                                colección de archivos en constante crecimiento.
                            </p>
                            <a href="vista_producto.php" id="link1">Ver producto</a>
                        </div>
                    </div>
                </div>

                <div class="col s12 m3">
                    <div class="card">
                        <div class="card-image">
                            <img src="../../resources/img/public/Teclado.jpg" width="100" height="200">
                            <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add_shopping_cart</i></a>
                        </div>
                        <div class="card-content">
                            <span class="card-title indigo-text text-darken-4"><b>Teclado</b></span>
                            <h6 class="orange-text text-darken-4"><b>$200</b></h6>
                            <p>
                                La unidad portátil de expansión de Seagate proporciona almacenamiento adicional para su
                                colección de archivos en constante crecimiento.
                            </p>
                            <a href="vista_producto.php" id="link1">Ver producto</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--Div para la segunda fila de productos-->
            <div class="row">
                <div class="col s12 m3">
                    <div class="card">
                        <div class="card-image">
                            <img src="../../resources/img/public/Teclado.jpg" width="100" height="200">
                            <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add_shopping_cart</i></a>
                        </div>
                        <div class="card-content">
                            <span class="card-title indigo-text text-darken-4"><b>Teclado con cable extendido</b></span>
                            <h6 class="orange-text text-darken-4"><b>$200</b></h6>
                            <p>
                                La unidad portátil de expansión de Seagate proporciona almacenamiento adicional para su
                                colección de archivos en constante crecimiento.
                            </p>
                            <a href="vista_producto.php" id="link1">Ver producto</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
Sitio_Publico::footerTemplate('buscar_producto.js');
?>

</html>