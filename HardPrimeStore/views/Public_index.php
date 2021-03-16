<?php
include('../../app/Helpers/public/sitio_publico.php');
Sitio_Publico::headerTemplate('HardPrimeStore - Inicio');
?>

<main>
  <div class="carousel carousel-slider center">
    <div class="carousel-fixed-item center">

    </div>
    <div class="carousel-item blue-grey white-text" href="#one!">    
      <h2>Bienvenido</h2>
      <p class="white-text"><h5>Hardware de calidad al momento</h5></p>
    </div>
    <div class="carousel-item indigo darken-4 white-text" href="#two!">        
      <h2>Second Panel</h2>
      <p class="white-text">This is your second panel</p>
    </div>
    <div class="carousel-item purple darken-4 white-text" href="#three!">
      <h2>Third Panel</h2>
      <p class="white-text">This is your third panel</p>
    </div>
    <div class="carousel-item black white-text" href="#four!">
      <h2>Fourth Panel</h2>
      <p class="white-text">This is your fourth panel</p>
    </div>
  </div>

  <h2>&nbsp;&nbsp;Productos destacados</h2>
  <!--Creacion de la cards-->
  <div class="row">
    <div class="col s12 m3">
      <div class="card">
        <div class="card-image">
          <img src="../../resources/img/DiscoInterno.jpg" width="100" height="200">
          <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add_shopping_cart</i></a>
        </div>
        <div class="card-content">
          <span class="card-title indigo-text text-darken-4"><b>Tarjeta Gráfica</b></span>
          <h6 class="orange-text text-darken-4"><b>$200</b></h6>
          <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
        </div>
      </div>
    </div>

    <div class="col s12 m3">
      <div class="card">
        <div class="card-image">
          <img src="../../resources/img/Monitor.jpg" width="100" height="200">
          <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add_shopping_cart</i></a>
        </div>
        <div class="card-content">
          <span class="card-title indigo-text text-darken-4"><b>Card Title</b></span>
          <h6 class="orange-text text-darken-4"><b>$200</b></h6>
          <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
        </div>
      </div>
    </div>

    <div class="col s12 m3">
      <div class="card">
        <div class="card-image">
          <img src="../../resources/img/TarjetaGrafica.jpg" width="100" height="200">
          <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add_shopping_cart</i></a>
        </div>
        <div class="card-content">
          <span class="card-title indigo-text text-darken-4"><b>Card Title</b></span>
          <h6 class="orange-text text-darken-4"><b>$200</b></h6>
          <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
        </div>
      </div>
    </div>

    <div class="col s12 m3">
      <div class="card">
        <div class="card-image">
          <img src="../../resources/img/Teclado.jpg" width="100" height="200">
          <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add_shopping_cart</i></a>
        </div>
        <div class="card-content">
          <span class="card-title indigo-text text-darken-4"><b>Card Title</b></span>
          <h6 class="orange-text text-darken-4"><b>$200</b></h6>
          <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
        </div>
      </div>
    </div>
  </div>
  </div>

  <!--Card para destacar el producto mas vendido-->
  <div class="col s12 m7">
    <h2 class="header">&nbsp;&nbsp;Producto mas vendido</h2>
    <div class="card horizontal">
      <div class="card-image">
        <img src="../../resources/img/TarjetaGrafica.jpg" width="100" height="250">
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
</main>

<?php
Sitio_Publico::footerTemplate('initialization.js');
?>