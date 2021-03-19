<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../../resources/css/materialize.min.css" />
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link type="text/css" rel="stylesheet" href="../../resources/css/sidenav.css" />

</head>

<body>
    <header>
        <div class="navbar-fixed">
            <nav class="nav-extended light-blue darken-4">
                <div class="nav-wrapper">
                <a href="index.php" class="brand-logo hide-on-med-and-down"> &nbsp;&nbsp;<img class="responsive-img" src="../../resources/img/public/Logo2.png" width="300"></a>
                <a href="index.php" class="brand-logo hide-on-large-only"> &nbsp;&nbsp;<img class="responsive-img" src="../../resources/img/public/Logo2.png" width="200"></a>
                    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="login.php"><i class="material-icons left">person</i>Iniciar Sesion</a></li>
                    </ul>
                </div>
                <div class="nav-content nav-wrapper">                
                    <ul class="tabs tabs-transparent hide-on-med-and-down">
                        <li class="tab"><a href="buscar_productos.php">Categorías</a></li>
                        <li class="tab"><a class="active" href="sobre_nosotros.php">Sobre nosotros</a></li>
                        <li class="tab"><a href="servicio_al_cliente.php">Servicio al cliente</a></li>
                        <li class="tab"><a href="mi_cuenta.php">Mi cuenta</a></li>

                        <!--Formulario para el buscador-->
                        <li class="tab">
                            <form>
                                <div class="input-field">
                                    <input id="search" type="search" required>
                                    <label class="label-icon" for="search" href="carrito_compras.php"><i class="material-icons">search</i></label>
                                    <i class="material-icons">close</i>
                                </div>
                            </form>
                        </li>
                        <li class="right"><a class="waves-effect light-blue darken-4 btn-large btn-flat white-text tooltipped" href="carrito_compras.php" data-position="bottom" data-tooltip="0 productos"><i class="material-icons left">shopping_cart</i>Carrito de compras</a></li>
                    </ul>

                </div>
            </nav>

        </div>
        <!--Menu lateral para la vista de pequeña-->
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
    <main>
    <div class="row">
        <div class="col s12 m2">
            <!--Menu lateral para ver las categorías-->
                <ul class="sidenav sidenav-fixed invesible-top blue-grey" id="mobile-nav">
                    <li>
                        <h6 class="orange-text">&nbsp;&nbsp;&nbsp;<b>Perifericos</b></h6>
                    </li>
                    <li><a href="perifericos.php" class="white-text">Teclados</a></li>
                    <li><a href="#!" class="white-text">Mouse</a></li>
                    <li><a href="#!" class="white-text">Camaras</a></li>
                    <li><a href="#!" class="white-text">Microfonos</a></li>
                    <li><a href="#!" class="white-text">Audifonos</a></li>
                    <li>
                        <h6 class="orange-text">&nbsp;&nbsp;&nbsp;<b>Repuestos</b></a>
                    </li>
                    <li><a href="repuestos.php" class="white-text">Disco Duro</a></li>
                    <li><a href="#!" class="white-text">Tarjeta Gráfica</a></li>
                    <li><a href="#!" class="white-text">Memorias</a></li>
                    <li><a href="#!" class="white-text">Baterías</a></li>
                    <li><a href="#!" class="white-text">Pantallas</a></li>
                    <li><a href="#!" class="white-text">Cargadores</a></li>                    

                    <li>
                        <h6 class="orange-text">&nbsp;&nbsp;&nbsp;<b>Marcas</b></a>
                    </li>
                    <li><a href="marcas.php" class="white-text">HP</a></li>
                    <li><a href="#!" class="white-text">Dell</a></li>
                    <li><a href="#!" class="white-text">Logitech</a></li>
                    <li><a href="#!" class="white-text">Sony</a></li>
                    <li><a href="#!" class="white-text">Lenovo</a></li>
                    <li><a href="#!" class="white-text">Acer</a></li>  
                    <li><a href="#!" class="white-text"></a></li>
                    <li><a href="#!" class="white-text"></a></li>
                    <li><a href="#!" class="white-text"></a></li>
                    <li><a href="#!" class="white-text"></a></li>
                </ul>            

        </div>
        <div class="col s12 m10">            
                <!--Encabezado y paginación-->

                <h5> &nbsp;&nbsp;&nbsp;Discos duros</h5>
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
                <div class="row">
                    <div class="col s12 m3">
                        <div class="card">
                            <div class="card-image">
                                <img src="../../resources/img/public/DiscoInterno.jpg" width="100" height="200">
                                <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add_shopping_cart</i></a>
                            </div>

                            <div class="card-content">
                                <span class="card-title indigo-text text-darken-4"><b>Disco duro interno</b></span>
                                <h6 class="orange-text text-darken-4"><b>$200</b></h6>
                                <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                                <a href="vista_producto.php" id="link1">Ver producto</a>
                            </div>
                        </div>
                    </div>

                    <div class="col s12 m3">
                        <div class="card">
                            <div class="card-image">
                                <img src="../../resources/img/public/Disco2.jpg" width="100" height="200">
                                <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add_shopping_cart</i></a>
                            </div>
                            <div class="card-content">
                                <span class="card-title indigo-text text-darken-4"><b>Disco duro 2TB</b></span>
                                <h6 class="orange-text text-darken-4"><b>$200</b></h6>
                                <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                                <a href="vista_producto.php" id="link1">Ver producto</a>
                            </div>
                        </div>
                    </div>

                    <div class="col s12 m3">
                        <div class="card">
                            <div class="card-image">
                                <img src="../../resources/img/public/Disco3.jpg" width="100" height="200">
                                <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add_shopping_cart</i></a>
                            </div>
                            <div class="card-content">
                                <span class="card-title indigo-text text-darken-4"><b>Disco duro Toshiba</b></span>
                                <h6 class="orange-text text-darken-4"><b>$200</b></h6>
                                <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                                <a href="vista_producto.php" id="link1">Ver producto</a>
                            </div>
                        </div>
                    </div>

                    <div class="col s12 m3">
                        <div class="card">
                            <div class="card-image">
                                <img src="../../resources/img/public/Disco4.jpg" width="100" height="200">
                                <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add_shopping_cart</i></a>
                            </div>
                            <div class="card-content">
                                <span class="card-title indigo-text text-darken-4"><b>Disco duro 1TB</b></span>
                                <h6 class="orange-text text-darken-4"><b>$200</b></h6>
                                <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                                <a href="vista_producto.php" id="link1">Ver producto</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m3">
                        <div class="card">
                            <div class="card-image">
                                <img src="../../resources/img/public/Disco5.jpg" width="100" height="200">
                                <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add_shopping_cart</i></a>
                            </div>
                            <div class="card-content">
                                <span class="card-title indigo-text text-darken-4"><b>Disco duro PC P300</b></span>
                                <h6 class="orange-text text-darken-4"><b>$200</b></h6>
                                <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                                <a href="vista_producto.php" id="link1">Ver producto</a>
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
    </div>
</main>
    <footer class="page-footer light-blue darken-4">
        <div class="container">

            <h6 id="footer_text">HardPrime Store - 2021 todos los derechos reservados - Nuestras redes <a href=" right">&nbsp;&nbsp;&nbsp;&nbsp;<img class="responsive-img" src="../../resources/img/public/facebook.png" width="35"></a>
                <a href=" right">&nbsp;&nbsp;<img class="responsive-img" src="../../resources/img/public/instagram-logo.png" width="35"></a>
                <a href=" right">&nbsp;&nbsp;<img class="responsive-img" src="../../resources/img/public/twitter.png" width="35"></a>
            </h6>
            <br>


        </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../APP/controllers/public/buscar_productos.js"></script>
</body>

</html>