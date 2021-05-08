<?php
include('../../app/Helpers/public/sitio_publico.php');
Sitio_Publico::headerTemplate('HardPrimeStore - Producto');
?>
<main>

    <div class="row">
        <div class="row container">
            <div class="col s12">
                <div class="card whithe">
                    <div class="card-content black-text center-align">
                        <span class="card-title">Pantalla Dell S2421HS</span>
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="card whithe">
                    <div class="card-content black-text center-align">
                        <img width="400" class="responsive-img img2" src="../../resources/img/public/dell2.jpg">
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="card whithe">
                    <div class="card-content black-text center-align">
                        <img width="400" class="responsive-img img2" src="../../resources/img/public/dell1.jpg">
                    </div>
                </div>
            </div>
            <div class="col s12">
                <div class="card">
                    <!--Card en la que se muestra la información del producto-->
                    <div class="card-stacked">
                        <div class="card-content center-align">
                            <h5>Dell S2421HS - Monitor de bisel ultrafino (24 pulgadas, Full HD, 1080p, IPS, color
                                plateado, negro.</h5>
                            <div class="row">
                                <div class="col s12 m6">
                                    <h5 class="">Precio: <b class="orange-text text-darken-4">$299.99</b></h5>
                                </div>
                                <div class="col s12 m6">
                                    <div class="input-field col s12 m6">
                                        <i class="material-icons prefix">control_point</i>
                                        <input id="icon_prefix" type="number" class="validate">
                                        <label for="icon_prefix">Cantidad</label>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <a class="waves-effect blue-grey btn center"><i
                                            class="material-icons right">add_shopping_cart</i>Agregar al carrito</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12">
                <h5 class="center-align">Calificación promedio: 4.0 estrellas</h5>
                <div class="container">
                    <div class="card whithe">
                        <!--Card en la que se puede calificar al producto y escribir un comentario-->
                        <div class="card-content black-text">
                            <span class="card-title"><b>Calificar producto</b></span>
                            <div class="ec-stars-wrapper" id="calificar">
                                <a href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
                                <a href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
                                <a href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
                                <a href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
                                <a href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
                            </div>
                            <h6>Escribe tu comentario:</h6>
                            <textarea id="comment" class="materialize-textarea black-text"></textarea>
                            <a class="waves-effect blue-grey btn center"><i
                                class="material-icons right">grade</i>Añadir Calificación
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="row container">
            <div class="col s12">
                <div class="card whithe">
                    <div class="card-content black-text center-align">
                        <span class="card-title">Calificaciones de los demás usuarios</span>
                    </div>
                </div>
            </div>
            <ul class="collection">
                <!--Se crean los comentarios que tiene el producto-->
                <li class="collection-item avatar">
                    <i class="material-icons circle green">person</i>
                    <span class="title"><b>Andres02</b></span>
                    <p>10/03/2021 <br>
                        Lo recomiendo mucho, es uno de los productos que más me ha gustado, y lo mejor es que se 
                        encuentra en la relación calidad/precio.
                    </p>

                    <div class="ec-stars-wrapper" id="estrellas1">
                        <a href="#" class="secondary-content" data-value="1"
                            title="Votar con 1 estrellas">&#9733;&#9733;&#9733;&#9733;&#9733;</a>
                        <a href="#" class="secondary-content" data-value="2"
                            title="Votar con 2 estrellas">&#9733;&#9733;&#9733;&#9733;</a>
                        <a href="#" class="secondary-content" data-value="3"
                            title="Votar con 3 estrellas">&#9733;&#9733;&#9733;</a>
                        <a href="#" class="secondary-content" data-value="4"
                            title="Votar con 4 estrellas">&#9733;&#9733;</a>
                        <a href="#" class="secondary-content" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
                    </div>
                </li>
                <li class="collection-item avatar">
                    <i class="material-icons circle">person</i>
                    <span class="title"><b>Jesus12</b></span>
                    <p>11/03/2021 <br>
                        Lo recomiendo mucho, es uno de los productos que más me ha gustado, y lo mejor es que se 
                        encuentra en la relación calidad/precio.
                    </p>
                    <div class="ec-stars-wrapper" id="estrellas1">
                        <a href="#" class="secondary-content" data-value="1"
                            title="Votar con 1 estrellas">&#9733;&#9733;&#9733;&#9733;&#9733;</a>
                        <a href="#" class="secondary-content" data-value="2"
                            title="Votar con 2 estrellas">&#9733;&#9733;&#9733;&#9733;</a>
                        <a href="#" class="secondary-content" data-value="3"
                            title="Votar con 3 estrellas">&#9733;&#9733;&#9733;</a>
                        <a href="#" class="secondary-content" data-value="4"
                            title="Votar con 4 estrellas">&#9733;&#9733;</a>
                        <a href="#" class="secondary-content" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
                    </div>

                </li>
                <li class="collection-item avatar">
                    <i class="material-icons circle green">person</i>
                    <span class="title"><b>OscarV503</b></span>
                    <p>12/03/2021<br>
                        Lo recomiendo mucho, es uno de los productos que más me ha gustado, y lo mejor es que se 
                        encuentra en la relación calidad/precio.
                    </p>
                    <div class="ec-stars-wrapper" id="estrellas1">
                        <a href="#" class="secondary-content" data-value="1"
                            title="Votar con 1 estrellas">&#9733;&#9733;&#9733;&#9733;&#9733;</a>
                        <a href="#" class="secondary-content" data-value="2"
                            title="Votar con 2 estrellas">&#9733;&#9733;&#9733;&#9733;</a>
                        <a href="#" class="secondary-content" data-value="3"
                            title="Votar con 3 estrellas">&#9733;&#9733;&#9733;</a>
                        <a href="#" class="secondary-content" data-value="4"
                            title="Votar con 4 estrellas">&#9733;&#9733;</a>
                        <a href="#" class="secondary-content" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
                    </div>

                </li>
                <li class="collection-item avatar">
                    <i class="material-icons circle red">person</i>
                    <span class="title"><b>Carlos05</b></span>
                    <p>13/03/2021<br>
                        Lo recomiendo mucho, es uno de los productos que más me ha gustado, y lo mejor es que se 
                        encuentra en la relación calidad/precio.
                    </p>
                    <div class="ec-stars-wrapper" id="estrellas1">
                        <a href="#" class="secondary-content" data-value="1"
                            title="Votar con 1 estrellas">&#9733;&#9733;&#9733;&#9733;&#9733;</a>
                        <a href="#" class="secondary-content" data-value="2"
                            title="Votar con 2 estrellas">&#9733;&#9733;&#9733;&#9733;</a>
                        <a href="#" class="secondary-content" data-value="3"
                            title="Votar con 3 estrellas">&#9733;&#9733;&#9733;</a>
                        <a href="#" class="secondary-content" data-value="4"
                            title="Votar con 4 estrellas">&#9733;&#9733;</a>
                        <a href="#" class="secondary-content" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
                    </div>
                </li>
            </ul>
        </div>
        <!--Apartado en el que se muestran los comentarios y calificaciones del producto-->



    </div>

</main>

<?php
Sitio_Publico::footerTemplate('vista_producto.js');
?>