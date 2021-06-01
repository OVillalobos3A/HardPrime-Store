<!DOCTYPE html>
<html>

<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="../../resources/css/materialize.min.css" />
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link type="text/css" rel="stylesheet" href="../../resources/css/styles.css" />
</head>

<body>
  <header>
    <div class="navbar-fixed">
      <nav class="nav-extended light-blue darken-4">
        <div class="nav-wrapper">
          <a href="index.php" class="brand-logo hide-on-med-and-down">&nbsp;&nbsp;<img class="responsive-img" src="../../resources/img/public/Logo2.png" width="300"></a>
          <a href="index.php" class="brand-logo hide-on-large-only"> &nbsp;&nbsp;<img class="responsive-img" src="../../resources/img/public/Logo2.png" width="200"></a>
          <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>

          <ul id="btnlogin" class="right hide-on-med-and-down">
            <li><a href="login.php"><i class="material-icons left">person</i>Iniciar Sesion</a></li>
          </ul>
        </div>
        <div class="nav-content nav-wrapper">
          <ul class="tabs tabs-transparent hide-on-med-and-down" id="nav-mobile">
            <li class="tab"><a href="repuestos.php">Categorías</a></li>
            <li class="tab"><a class="active" href="sobre_nosotros.php">Sobre nosotros</a></li>
            <li class="tab"><a href="servicio_al_cliente.php">Servicio al cliente</a></li>
            <li class="tab"><a href="mi_cuenta.php">Mi cuenta</a></li>



            <!--Formulario para el buscador-->
            <li class="tab">
              <form>
                <div class="input-field">
                  <input id="search" type="search" required>
                  <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                  <i class="material-icons">close</i>
                </div>
              </form>
            </li>

            <li class="right"><a class="waves-effect light-blue darken-4 btn-large btn-flat white-text tooltipped" href="carrito_compras.php" data-position="bottom" data-tooltip="0 productos"><i class="material-icons left">shopping_cart</i>Carrito de compras</a></li>
          </ul>

        </div>
      </nav>
    </div>

    <ul id="slide-out" class="sidenav">
      <li>
        <div class="user-view">
          <div class="background light-blue darken-4">
          </div>
          <img class="circle" src="../../resources/img/public/Monitor.jpg">
          <span class="white-text name">John Doe</span>
          <span class="white-text email">jdandturk@gmail.com</span>
        </div>
      </li>
      <li><a href="login.php"><i class="material-icons">person</i>Iniciar sesion</a></li>
      <li><a href="mi_cuenta.php"><i class="material-icons">person</i>Mi cuenta</a></li>
      <li><a href="carrito_compras.php"><i class="material-icons">shopping_cart</i>Carrito de compras</a></li>
      <li>
        <div class="divider"></div>
      </li>
      <li>
        <form>
          <div class="input-field">
            <input id="search" type="search" required>
            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
            <i class="material-icons">close</i>
          </div>
        </form>
      </li>

      <li><a class="waves-effect" href="servicio_al_cliente.php">Servicio al cliente</a></li>
      <li><a class="waves-effect" href="sobre_nosotros.php">Sobre Nosotros</a></li>

      <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
          <li>
            <a class="collapsible-header">Categorías<i class="material-icons">arrow_drop_down</i></a>
            <div class="collapsible-body">
              <ul>
                <li class="no-padding">
                  <ul class="collapsible collapsible-accordion">
                    <li>
                      <a class="collapsible-header">Perifericos<i class="material-icons">arrow_drop_down</i></a>
                      <div class="collapsible-body">
                        <ul>
                          <li><a href="buscar_productos.php">Teclados</a></li>
                          <li><a href="buscar_productos.php">Mouse</a></li>
                          <li><a href="buscar_productos.php">Camaras</a></li>
                          <li><a href="buscar_productos.php">Microfonos</a></li>
                          <li><a href="buscar_productos.php">Audifonos</a></li>
                        </ul>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="no-padding">
                  <ul class="collapsible collapsible-accordion">
                    <li>
                      <a class="collapsible-header">Repuestos<i class="material-icons">arrow_drop_down</i></a>
                      <div class="collapsible-body">
                        <ul>
                          <li><a href="buscar_productos.php">Disco Duro</a></li>
                          <li><a href="buscar_productos.php">Tarjeta Gráfica</a></li>
                          <li><a href="buscar_productos.php">Memorias</a></li>
                          <li><a href="buscar_productos.php">Baterías</a></li>
                          <li><a href="buscar_productos.php">Pantallas</a></li>
                          <li><a href="buscar_productos.php">Cargadores</a></li>
                        </ul>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="no-padding">
                  <ul class="collapsible collapsible-accordion">
                    <li>
                      <a class="collapsible-header">Componentes<i class="material-icons">arrow_drop_down</i></a>
                      <div class="collapsible-body">
                        <ul>
                          <li><a href="buscar_productos.php">Tarjetas de video</a></li>
                          <li><a href="buscar_productos.php">Fuentes de poder</a></li>
                          <li><a href="buscar_productos.php">Cases</a></li>
                        </ul>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="no-padding">
                  <ul class="collapsible collapsible-accordion">
                    <li>
                      <a class="collapsible-header">Marcas<i class="material-icons">arrow_drop_down</i></a>
                      <div class="collapsible-body">
                        <ul>
                          <li><a href="buscar_productos.php">HP</a></li>
                          <li><a href="buscar_productos.php">Dell</a></li>
                          <li><a href="buscar_productos.php">Logitech</a></li>
                          <li><a href="buscar_productos.php">Lenovo</a></li>
                          <li><a href="buscar_productos.php">Acer</a></li>
                        </ul>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </li>
    </ul>


  </header>