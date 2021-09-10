<?php
include('../../app/Helpers/public/sitio_publico.php');
Sitio_Publico::headerTemplate('HardPrimeStore - Carrito de compras');
?>
<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" />
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link type="text/css" rel="stylesheet" href="css/styles.css" />
    <!--Título del documento-->
    <title>Página principal</title>
</head>

<body>

    <header>
        <div class="navbar-fixed">
            <nav class="nav-extended light-blue darken-4">
                <div class="nav-wrapper">
                    <a href="index.php" class="brand-logo hide-on-med-and-down">&nbsp;&nbsp;<img class="responsive-img"
                            src="img/public/Logo2.png" width="300"></a>
                    <a href="index.php" class="brand-logo hide-on-large-only"> &nbsp;&nbsp;<img class="responsive-img"
                            src="img/public/Logo2.png" width="200"></a>
                    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="mi_cuenta.php" data-target="dropdown"><i
                                    class="material-icons left">account_circle</i>Usuario: <b>Admin</b></a></li>
                        <a class="waves-effect waves-light btn blue-grey" onclick="logOut()"><i
                                class="material-icons right">exit_to_app</i> Cerrar Sesión</a>
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

                        <li class="right"><a
                                class="waves-effect light-blue darken-4 btn-large btn-flat white-text tooltipped"
                                href="carrito_compras.php" data-position="bottom"
                                data-tooltip="10 productos"><i
                                    class="material-icons left">shopping_cart</i>Carrito de compras</a></li>
                    </ul>
                </div>
            </nav>
        </div>

        <ul id="slide-out" class="sidenav">
            <li>
                <div class="user-view">
                    <div class="background light-blue darken-4">
                    </div>
                    <img class="circle" src="img/productos/60b6a0a5beaee.jpg">
                    <span class="white-text name">Admin</span>
                    <span class="white-text email">admin@gmail.com</span>
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
    <main>
        <!--Creacion del slider para el inicio de la pagina-->
        <div class="carousel carousel-slider center">
            <div class="carousel-fixed-item center">
    
            </div>
            <!--Se crean los elementos del slider-->
            <div class="carousel-item white-text" href="#one!">
                <img src="img/public/slider4.jpg" class="responsive-img">
                <h2>Bienvenido</h2>
                <p class="white-text">
                <h5>Hardware de calidad al momento</h5>
                </p>
            </div>
            <div class="carousel-item indigo darken-4 white-text" href="#two!">
                <img src="img/public/slider2.jpg" width="250" height="500">
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
            <div class="col s12 m6 l3">
                <div class="card">
                    <div class="card-image">
                        <img src="img/marcas/60a75e8e5178e.jpg" width="100" height="200">
                    </div>
                    <div class="card-content center-align">
                        <!--Nombre del producto, precio  y descripción-->
                        <span class="card-title indigo-text text-darken-4"><b>HP</b></span>
                        <a href="${url}">Ver marca</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l3">
                <div class="card">
                    <div class="card-image">
                        <img src="img/marcas/60a7af3e14d1f.jpg" width="100" height="200">
                    </div>
                    <div class="card-content center-align">
                        <!--Nombre del producto, precio  y descripción-->
                        <span class="card-title indigo-text text-darken-4"><b>Acer</b></span>
                        <a href="${url}">Ver marca</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l3">
                <div class="card">
                    <div class="card-image">
                        <img src="img/marcas/60c2f8ee70430.png" width="100" height="200">
                    </div>
                    <div class="card-content center-align">
                        <!--Nombre del producto, precio  y descripción-->
                        <span class="card-title indigo-text text-darken-4"><b>Dell</b></span>
                        <a href="${url}">Ver marca</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l3">
                <div class="card">
                    <div class="card-image">
                        <img src="img/marcas/60c2f94bcee18.png" width="100" height="200">
                    </div>
                    <div class="card-content center-align">
                        <!--Nombre del producto, precio  y descripción-->
                        <span class="card-title indigo-text text-darken-4"><b>Logitech</b></span>
                        <a href="${url}">Ver marca</a>
                    </div>
                </div>
            </div>
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
            <div class="col s12 m3">
                <div class="card">
                    <div class="card-image">
                        <img src="img/categorias/60a75f19481f5.png" width="100" height="200">                                        
                    </div>
                    <div class="card-content">
                        <br>
                        <span class="card-title activator indigo-text text-darken-4"><b>Teclados</b><i class="material-icons right">wysiwyg</i></span>  
                        <a href="${url}">Ver categoría</a>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Teclados<i
                                class="material-icons right">close</i></span>
                        <p>Apartado dedicado a teclados</p>
                    </div>
                </div>
            </div>
            <div class="col s12 m3">
                <div class="card">
                    <div class="card-image">
                        <img src="img/categorias/60a75f013bac8.png" width="100" height="200">                                        
                    </div>
                    <div class="card-content">
                        <br>
                        <span class="card-title activator indigo-text text-darken-4"><b>Mouses</b><i class="material-icons right">wysiwyg</i></span>  
                        <a href="${url}">Ver categoría</a>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Mouses<i
                                class="material-icons right">close</i></span>
                        <p>Apartado dedicado a mouses</p>
                    </div>
                </div>
            </div>
            <div class="col s12 m3">
                <div class="card">
                    <div class="card-image">
                        <img src="img/public/dell2.jpg" width="100" height="200">                                        
                    </div>
                    <div class="card-content">
                        <br>
                        <span class="card-title activator indigo-text text-darken-4"><b>Monitores</b><i class="material-icons right">wysiwyg</i></span>  
                        <a href="${url}">Ver categoría</a>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Monitores<i
                                class="material-icons right">close</i></span>
                        <p>Apartado dedicado a monitores</p>
                    </div>
                </div>
            </div>
            <div class="col s12 m3">
                <div class="card">
                    <div class="card-image">
                        <img src="img/productos/60a789cd8bdb8.jpg" width="100" height="200">                                        
                    </div>
                    <div class="card-content">
                        <br>
                        <span class="card-title activator indigo-text text-darken-4"><b>Baterías</b><i class="material-icons right">wysiwyg</i></span>  
                        <a href="${url}">Ver categoría</a>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Baterías<i
                                class="material-icons right">close</i></span>
                        <p>Apartado dedicado a baterías</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="page-footer light-blue darken-4">
        <div>
            <div class="container">
                <div class="row">
                    <div class="col s12 m6">
                        <h6>HardPrime Store - 2021 todos los derechos reservados</h6>
                    </div>
                    <div class="col s12 m2">
                        <a class="grey-text text-lighten-4 right" href="#!">
                            <h6></h6>
                        </a>
                    </div>
                    <div class="col s12 m4">
                        <a href=" right">&nbsp;&nbsp;<img class="responsive-img"
                                src="img/public/facebook.png" width="35"></a>
                        <a href=" right">&nbsp;&nbsp;<img class="responsive-img"
                                src="img/public/instagram-logo.png" width="35"></a>
                        <a href=" right">&nbsp;&nbsp;<img class="responsive-img"
                                src="img/public/twitter.png" width="35"></a>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/sweetalert.min.js"></script>
    <script type="text/javascript" src="js/components.js"></script>

    <script type="text/javascript" src="js/account.js"></script>
    <script type="text/javascript" src="js/initialization.js"></script>
    <script type="text/javascript" src="js/login.js"></script>
</body>

</html>

<?php
Sitio_Publico::footerTemplate('pmarcas.js');
?>