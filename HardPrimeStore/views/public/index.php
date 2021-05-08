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
      <div class="card-panel blue-grey lighten-5">
        <h5 class="center-align">Productos destacados</h5>
      </div>
    </div>
  </div>
  <!--Creacion de la cards para los productos-->
  <div class="row">
    <div class="col s12 m3">
      <div class="card">
        <!--Imagen del producto y boton para agregar el producto al carrito-->
        <div class="card-image">
          <img src="../../resources/img/public/DiscoInterno.jpg" width="100" height="200">
          <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add_shopping_cart</i></a>
        </div>
        <div class="card-content">
          <!--Nombre del producto, precio  y descripción-->
          <span class="card-title indigo-text text-darken-4"><b>Tarjeta Gráfica</b></span>
          <h6 class="orange-text text-darken-4"><b>$200</b></h6>
          <p>
              Monitor de 60.45cm (23.8) con un elegante diseño para colocarlo fácilmente en cualquier espacio.
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
          <span class="card-title indigo-text text-darken-4"><b>Card Title</b></span>
          <h6 class="orange-text text-darken-4"><b>$200</b></h6>
          <p>
              Monitor de 60.45cm (23.8) con un elegante diseño para colocarlo fácilmente en cualquier espacio.
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
          <span class="card-title indigo-text text-darken-4"><b>Card Title</b></span>
          <h6 class="orange-text text-darken-4"><b>$200</b></h6>
          <p>
              Monitor de 60.45cm (23.8) con un elegante diseño para colocarlo fácilmente en cualquier espacio.
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
          <span class="card-title indigo-text text-darken-4"><b>Card Title</b></span>
          <h6 class="orange-text text-darken-4"><b>$200</b></h6>
          <p>
              Monitor de 60.45cm (23.8) con un elegante diseño para colocarlo fácilmente en cualquier espacio.
          </p>
          <a href="vista_producto.php" id="link1">Ver producto</a>
        </div>
      </div>
    </div>
  </div>
  </div>

  <!--Card para mostrar el producto destacado-->
  <div class="container">
    <div class="col s12 m6">
      <div class="col s12 m6">
        <div class="card-panel  blue-grey lighten-5">
          <h5 class="center-align">Producto más vendido</h5>
        </div>
      </div>
      <div class="card horizontal">
        <div class="card-image">
          <img src="../../resources/img/public/TarjetaGrafica.jpg" width="100" height="250">
        </div>
        <div class="card-stacked">
          <div class="card-content">
            <h5>Tarjeta gráfica ASUS</h5>
            <h6>TUF Gaming NVIDIA GeForce GTX 1650 OC Edition (PCIe 3.0, memoria GDDR6 de 4GB, HDMI, DisplayPort, DVI-D, 1 conector de alimentación de 6 pines, resistencia al polvo IP5X, lubricante de grado espacial)</h6>
            <h4>$599</h4>
            <a class="waves-effect blue-grey btn"><i class="material-icons right">add_shopping_cart</i>Agregar al carrito</a>
          </div>
          <div class="card-action">
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<!--Llamando la plantilla para el footer-->
<?php
Sitio_Publico::footerTemplate('public_index.js');
?>