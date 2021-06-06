<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/public/sitio_publico.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Sitio_Publico::headerTemplate('HardPrimeStore - Inicio');
?>

<main>
    <!--Creacion del slider para el inicio de la pagina-->
    <div class="carousel carousel-slider center">
        <div class="carousel-fixed-item center">

        </div>
        <!--Se crean los elementos del slider-->
        <div class="carousel-item white-text" href="#one!">
            <img src="../../resources/img/public/slider4.jpg" width="250" height="500">
            <h2>Bienvenido</h2>
            <p class="white-text">
            <h5>Hardware de calidad al momento</h5>
            </p>
        </div>
        <div class="carousel-item indigo darken-4 white-text" href="#two!">
            <img src="../../resources/img/public/slider2.jpg" width="250" height="500">
            <h2>Second Panel</h2>
            <p class="white-text">This is your second panel</p>
        </div>
    </div>

    <div class="row container">
        <div class="col s12">
            <div class="card-panel light-blue darken-4 white-text">
                <h5 class="center-align">Marcas</h5>
            </div>
        </div>
    </div>
    <!--Creacion de la cards para los productos-->
    <div class="row container" id="marca">
    </div>

    <div class="row container">
        <div class="col s12">
            <div class="card-panel light-blue darken-4 white-text">
                <h5 class="center-align">Categorías</h5>
            </div>
        </div>
    </div>

    <!--Card para mostrar el producto destacado-->
    <div class="row container" id="categoria">
    </div>
</main>

<!--Llamando la plantilla para el footer-->
<?php
Sitio_Publico::footerTemplate('public_index.js');
?>