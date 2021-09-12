<?php
class Sitio_Publico
{
  public static function headerTemplate($title)
  {
    session_name("clientes");
    session_start();
    print('
            <!DOCTYPE html>
            <html>
            
            <head>
              <!--Import Google Icon Font-->
              <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
              <!--Importar jquery-->   
              <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
              <!--Importar DataTable-->   
              <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">  
              <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
              <!--Import materialize.css-->
              <link type="text/css" rel="stylesheet" href="../../resources/css/materialize.min.css" />
              <!--Let browser know website is optimized for mobile-->
              <meta name="viewport" content="width=device-width, initial-scale=1.0" />
              <link type="text/css" rel="stylesheet" href="../../resources/css/styles.css" />
              <!--Título del documento-->
              <title>' . $title . '</title>
            </head>            
            <body>
            ');
    // Se obtiene el nombre del archivo de la página web actual.
    //$filename = basename($_SERVER['PHP_SELF']);
    // Se comprueba si existe una sesión de cliente para mostrar el menú de opciones, de lo contrario se muestra otro menú.
    if (isset($_SESSION['id_cliente'])) {
      // Se verifica si la página web actual es diferente a login.php y register.php, de lo contrario se direcciona a index.php            
      print('
              <header>
                <div class="navbar-fixed">
                <nav class="nav-extended light-blue darken-4">            
                  <div class="nav-wrapper">
                  <a href="index.php" class="brand-logo hide-on-med-and-down">&nbsp;&nbsp;<img class="responsive-img" src="../../resources/img/public/Logo2.png" width="300"></a>
                  <a href="index.php" class="brand-logo hide-on-large-only"> &nbsp;&nbsp;<img class="responsive-img" src="../../resources/img/public/Logo2.png" width="200"></a>
                  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>                  
                  <ul class="right hide-on-med-and-down">                  
                  <li><a href="mi_cuenta.php" data-target="dropdown"><i class="material-icons left">account_circle</i>Usuario: <b>' . $_SESSION['user'] . '</b></a></li>
                  <a class="waves-effect waves-light btn blue-grey" onclick="cerrarSesion()"><i class="material-icons right">exit_to_app</i> Cerrar Sesión</a>
              </ul>
                  <ul id="dropdown" class="dropdown-content">                                        
                      
                  </ul> 
                                      
                  </div>
                  <div class="nav-content nav-wrapper">
                    <ul class="tabs tabs-transparent hide-on-med-and-down" id="nav-mobile">
                      <li class="tab"><a class="active" href="index.php">Inicio</a></li>
                      <li class="tab"><a class="active" href="buscar_productos.php">Productos</a></li>
                      <li class="tab"><a class="active" href="sobre_nosotros.php">Sobre nosotros</a></li>                      
                      <li class="tab"><a class="active" href="mi_cuenta.php">Mi cuenta</a></li>
                      <!--Formulario para el buscador-->
                      <li class="tab">
                        <form class="hide">
                          <div class="input-field">
                            <input id="search" type="search" required>
                            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                            <i class="material-icons">close</i>
                          </div>
                        </form>
                      </li>
            
                      <li class="right"><a class="waves-effect light-blue darken-4 btn-large btn-flat white-text tooltipped" href="carrito_compras.php" data-position="bottom" data-tooltip="' . $_SESSION['numcarrito'] . ' productos"><i class="material-icons left">shopping_cart</i>Carrito de compras</a></li>
                    </ul>
            
                  </div>
                </nav>
                </div>
            
                <ul id="slide-out" class="sidenav">
                  <li>
                    <div class="user-view">
                      <div class="background light-blue darken-4">
                      </div>
                      <img class="circle" src="../../resources/img/productos/' . $_SESSION['imagen'] . '">
                      <span class="white-text name">' . $_SESSION['user'] . '</span>
                      <span class="white-text email">' . $_SESSION['correo'] . '</span>
                    </div>
                  </li>
                  <li><a href="index.php"><i class="material-icons">home</i>Inicio</a></li>
                  <li>
                    <div class="divider"></div>
                  </li>
                  <li><a href="mi_cuenta.php"><i class="material-icons">person</i>Mi cuenta</a></li>
                  <li>
                    <div class="divider"></div>
                  </li>
                  <li><a href="carrito_compras.php"><i class="material-icons">shopping_cart</i>Carrito de compras</a></li>
                  <li>
                    <div class="divider"></div>
                  </li>
                  <li><a href="buscar_productos.php"><i class="material-icons">keyboard</i>Productos</a></li>
                  <li>
                    <div class="divider"></div>
                  </li>
                  <li><a href="sobre_nosotros.php"><i class="material-icons">import_contacts</i>Sobre nosotros</a></li>
                  <li>
                    <div class="divider"></div>
                  </li>
                  <li><a class="waves-effect waves-light btn blue-grey" onclick="logOut()"> Cerrar Sesión</a></li>
                </ul>
              </header>
            ');
    } else {
      print('
              <header>
                <div class="navbar-fixed">
                <nav class="nav-extended light-blue darken-4">            
                  <div class="nav-wrapper">
                  <a href="index.php" class="brand-logo hide-on-med-and-down">&nbsp;&nbsp;<img class="responsive-img" src="../../resources/img/public/Logo2.png" width="300"></a>
                  <a href="index.php" class="brand-logo hide-on-large-only"> &nbsp;&nbsp;<img class="responsive-img" src="../../resources/img/public/Logo2.png" width="200"></a>
                  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                   
                    <ul id="btnlogin" class="right hide-on-med-and-down">
                      <li ><a href="login.php"><i class="material-icons left">person</i>Iniciar Sesion</a></li>
                    </ul>
                  </div>
                  <div class="nav-content nav-wrapper">
                    <ul class="tabs tabs-transparent hide-on-med-and-down">
                      <li class="tab"><a class="active" href="index.php">Inicio</a></li>
                      <li class="tab"><a class="active" href="buscar_productos.php">Productos</a></li>
                      <li class="tab"><a class="active" href="sobre_nosotros.php">Sobre nosotros</a></li>                      
            
                      <!--Formulario para el buscador-->
                      <li class="tab">
                        <form class="hide">
                          <div class="input-field">
                            <input id="search" type="search" required>
                            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                            <i class="material-icons">close</i>
                          </div>
                        </form>
                      </li>
            
                      
                    </ul>
            
                  </div>
                </nav>
                </div>
            
                <ul id="slide-out" class="sidenav">
                  <li>
                    <div class="user-view">
                      <div class="background light-blue darken-4">
                      </div>
                      <span class="white-text name">¡Bienvenido a HardPrime Store!</span>
                      <span class="white-text email">Por favor, inicia sesión para disfrutar de nuestros servicios.</span>
                    </div>
                  </li>
                  <li><a href="index.php"><i class="material-icons">home</i>Inicio</a></li>
                  <li>
                    <div class="divider"></div>
                  </li>
                  <li><a href="login.php"><i class="material-icons">person</i>Iniciar sesión</a></li>
                  <li>
                    <div class="divider"></div>
                  </li>
                  <li><a href="buscar_productos.php"><i class="material-icons">keyboard</i>Productos</a></li>
                  <li>
                    <div class="divider"></div>
                  </li>
                  <li><a href="sobre_nosotros.php"><i class="material-icons">import_contacts</i>Sobre nosotros</a></li>
                  <li>
                    <div class="divider"></div>
                  </li>
                </ul>
              </header>
            ');
    }
  }

  public static function footerTemplate($controller)
  {
    // Se obtiene el nombre del archivo de la página web actual.
    $filename = basename($_SERVER['PHP_SELF']);

    if ($filename != 'login.php' && $filename != 'registro_clientes.php' && $filename != 'recuperar_contra.php') {
      print('<footer class="page-footer light-blue darken-4">
      <div>
        <div class="container">        
          <div class="row">
            <div class="col s12 m6">
            <h6>HardPrime Store - 2021 todos los derechos reservados</h6>                  
            </div>
            <div class="col s12 m2">
            <a class="grey-text text-lighten-4 right" href="#!"><h6></h6></a>  
             </div>
             <div class="col s12 m4">
             <a href=" right">&nbsp;&nbsp;<img class="responsive-img" src="../../resources/img/public/facebook.png" width="35"></a>
             <a href=" right">&nbsp;&nbsp;<img class="responsive-img" src="../../resources/img/public/instagram-logo.png" width="35"></a>
             <a href=" right">&nbsp;&nbsp;<img class="responsive-img" src="../../resources/img/public/twitter.png" width="35"></a>
             </div>
          </div>                
        </div>
      </div>
      
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../resources/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="../../app/helpers/dashboard/components.js"></script>
    
    
    <script type="text/javascript" src="../../app/controllers/public/account.js"></script>
    <script type="text/javascript" src="../../app/controllers/public/initialization.js"></script>
    <script type="text/javascript" src="../../app/controllers/public/' . $controller . '"></script>
  </body>            
  </html>');
    } else {
      print('<footer class="page-footer light-blue darken-4">
      <div>
        <div class="container">        
          <div class="row">
            <div class="col s12 m6">
            <h6>HardPrime Store - 2021 todos los derechos reservados</h6>                  
            </div>
            <div class="col s12 m2">
            <a class="grey-text text-lighten-4 right" href="#!"><h6></h6></a>  
             </div>
             <div class="col s12 m4">
             <a href=" right">&nbsp;&nbsp;<img class="responsive-img" src="../../resources/img/public/facebook.png" width="35"></a>
             <a href=" right">&nbsp;&nbsp;<img class="responsive-img" src="../../resources/img/public/instagram-logo.png" width="35"></a>
             <a href=" right">&nbsp;&nbsp;<img class="responsive-img" src="../../resources/img/public/twitter.png" width="35"></a>
             </div>
          </div>                
        </div>
      </div>
      
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../resources/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="../../app/helpers/dashboard/components.js"></script>
    
        
    <script type="text/javascript" src="../../app/controllers/public/initialization.js"></script>
    <script type="text/javascript" src="../../app/controllers/public/' . $controller . '"></script>
  </body>            
  </html>');
    }
  }
}
