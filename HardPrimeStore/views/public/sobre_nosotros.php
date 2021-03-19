<?php
include('../../app/Helpers/public/sitio_publico.php');
Sitio_Publico::headerTemplate('Sobre nosotros');
?>
<main>
    <div class="container">
    <!--Apartado de sobre nosotros-->
        <div class="row">
            <div class="col s12">
                <h4>Sobre Nosotros</h4>
                <hr>
                <h5>
                    HardPrime store es un proyecto que fue creado con el fin de ayudar a las personas que tienen la necesidad de comprar repuestos, accesorios de computadoras, a hacer sus compras de manera mas rapida y sin tener la necesidad de salir de casa
                </h5>
            </div>
        </div>

        <!--Apartado en el que se muestra la visión y misión de la pagina-->
        <div class="row">
            <div class="col s12 m6">
                <h4>Misión</h4>
                <h5>Dar la opción a las personas de comprar los repuestos y accesorios para computadoras de una manera más fácil sin tener que ir hasta una tienda fisica.</h5><br><br><br>
                <img class="responsive-img" src="../../resources/img/public/Logo3.png">
            </div>
            <div class="col s12 m6">
                <h4>Visión</h4>
                <h5>Ser una opcion reconocida y confiable a nivel nacional para hacer la compra de accesorios y repuestos de computadora de manera digital.</h5>
                <img class="responsive-img" src="../../resources/img/public/vision.jpg" width="400px">
            </div>
        </div>

        <br><br><br>
    </div>

</main>

<?php
Sitio_Publico::footerTemplate('initialization.js');
?>