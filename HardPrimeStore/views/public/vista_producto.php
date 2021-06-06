<?php
include('../../app/Helpers/public/sitio_publico.php');
Sitio_Publico::headerTemplate('HardPrimeStore - Producto');
?>
<main>
    <h4 class="center indigo-text" id="title"></h4>
    <div class="row" id="justp">
        <div class="row container">
            <div class="col s12">
                <div class="card whithe">
                    <div class="card-content black-text center-align">
                        <span class="card-title" id="nombre"></span>
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="card whithe">
                    <div class="card-content black-text center-align">
                        <img img width="400" class="responsive-img img2" id="imagen" src="../../resources/img/">
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="card whithe">
                    <div class="card-content black-text center-align">
                        <img img width="400" class="responsive-img img2" id="imagen2" src="../../resources/img/">
                    </div>
                </div>
            </div>
            <div class="col s12">
                <div class="card">
                    <!--Card en la que se muestra la información del producto-->
                    <div class="card-stacked">
                        <div class="card-content center-align">
                            <h5 id="descripcion"></h5>
                            <div class="row">
                                <div class="col s12 m6">
                                    <h5 class="">Precio: <b class="orange-text text-darken-4" id="precio"></b></h5>
                                </div>
                                <form method="post" id="shopping-form">
                                    <input type="hidden" id="id_producto" name="id_producto" />
                                    <div class="col s12 m6">
                                        <div class="input-field col s12 m6">
                                            <i class="material-icons prefix">control_point</i>
                                            <input type="number" id="cantidad_producto" name="cantidad_producto" min="1" class="validate" required />
                                            <label for="cantidad_producto">Cantidad</label>
                                        </div>
                                    </div>
                                    <div class="col s12">
                                        <button type="submit" class="btn waves-effect waves-light blue tooltipped" data-tooltip="Agregar al carrito"><i class="material-icons">add_shopping_cart</i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12">
                <div id="calificacion_prom">
                
                </div>                
                <div class="container">
                    <div class="card whithe">
                        <!--Card en la que se puede calificar al producto y escribir un comentario-->

                        <div class="card-content black-text">
                            <span class="card-title"><b>Calificar producto</b></span>
                            <form method="post" id="valorar-form">
                            <input type="text" id="id_producto2" name="id_producto2" class="hide"/>
                            <input type="date" id="fecha" name="fecha" class="hide"/>
                                <div class="input-field col s12 m12">
                                    <i class="material-icons prefix">stars</i>
                                    <select id="calificacion" name="calificacion">
                                        <option value="" disabled selected>Tipo de usuario</option>
                                        <option value="1" selected>1 estrellas</option>
                                        <option value="2" selected>2 estrellas</option>
                                        <option value="3" selected>3 estrellas</option>
                                        <option value="4" selected>4 estrellas</option>
                                        <option value="5" selected>5 estrellas</option>
                                    </select>
                                    <label for="calificacion">Ingrese una calificación</label>
                                </div>
                                <div class="input-field col s12 m12">
                                    <h6>Escribe tu comentario:</h6>
                                    <textarea id="comentario" name="comentario" class="materialize-textarea black-text"></textarea>
                                </div>                                                                    
                            
                                <button type="submit" class="waves-effect blue-grey btn center" data-tooltip="Añadir Calificación"><i class="material-icons right">grade</i>Añadir Calificación</button>
                            </form>
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
            <ul class="collection" id="seccion_comentarios">
                <!--Se crean los comentarios que tiene el producto-->
                <li class="collection-item avatar">
                    <i class="material-icons circle green">person</i>
                    <span class="title"><b>Andres02</b></span>
                    <p>10/03/2021 <br>
                        Lo recomiendo mucho, es uno de los productos que más me ha gustado, y lo mejor es que se
                        encuentra en la relación calidad/precio.
                    </p>

                    <div class="ec-stars-wrapper" id="estrellas1">
                        <a href="#" class="secondary-content" data-value="1" title="Votar con 1 estrellas">&#9733;&#9733;&#9733;&#9733;&#9733;</a>
                        <a href="#" class="secondary-content" data-value="2" title="Votar con 2 estrellas">&#9733;&#9733;&#9733;&#9733;</a>
                        <a href="#" class="secondary-content" data-value="3" title="Votar con 3 estrellas">&#9733;&#9733;&#9733;</a>
                        <a href="#" class="secondary-content" data-value="4" title="Votar con 4 estrellas">&#9733;&#9733;</a>
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