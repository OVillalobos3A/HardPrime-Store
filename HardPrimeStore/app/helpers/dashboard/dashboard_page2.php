<?php
//Clase para definir las plantillas de las páginas web del sitio privado
class Dashboard_Page {
    //Método para imprimir el encabezado y establecer el titulo del documento
    public static function headerTemplate($title) {
        print('
            <!DOCTYPE html>
            <html lang="es">
            <head>
                <!--Se establece la codificación de caracteres para el documento-->
                <meta charset="utf-8">
                <!--Se importa la fuente de iconos de Google-->
                <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                <!--Se importan los archivos CSS-->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
                <link type="text/css" rel="stylesheet" href="../../resources/css/dashboard_styles.css" />
                <!--Se informa al navegador que el sitio web está optimizado para dispositivos móviles-->
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <!--Título del documento-->
                <title>Dashboard - '.$title.'</title>
            </head>
            
            <body>
                <!--Encabezado del documento-->
                <header>
                    <div class="navbar-fixed" id="mostrar">
                        <nav>
                            <div class="nav-wrapper light-blue darken-4">
                                <a href="../../views/dashboard/screenprincipal.php" class="brand-logo hide-on-med-and-down"><img class="responsive-img" src="../../resources/img/tabla/Logo2.png" width="250"></a>
                                <a href="../../views/dashboard/screenprincipal.php" class="brand-logo hide-on-large-only"><img class="responsive-img" src="../../resources/img/tabla/Logo2.png" width="200"></a>
                                <ul id="nav-mobile" class="right hide-on-med-and-down">
                                    <a class="waves-effect waves-light btn blue-grey" onclick="logOut()"><i class="material-icons right">exit_to_app</i> Cerrar Sesión</a>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="navbar-fixed">
                        <nav>
                            <div class="nav-wrapper blue-grey">
                                <ul id="dropdown1" class="dropdown-content">
                                    <li><a href="../../views/dashboard/empleados.php">Empleados</a></li>
                                    <li><a href="../../views/dashboard/marcas.php">Marcas</a></li>
                                    <li><a href="../../views/dashboard/categorias.php">Categorías</a></li>
                                </ul>
                                <ul id="dropdown2" class="dropdown-content">
                                    <li><a href="../../views/dashboard/productos.php">Productos</a></li>
                                    <li><a href="../../views/dashboard/proveedor.php">Proveedores</a></li>
                                    <li><a href="../../views/dashboard/entradas.php">Entradas</a></li>
                                </ul>
                                <ul id="dropdown3" class="dropdown-content">
                                    <li><a href="../../views/dashboard/usuarios.php">Gestión de usuarios</a></li>
                                </ul>
                                <ul id="dropdown4" class="dropdown-content">
                                    <li><a href="../../views/dashboard/clientes.php">Clientes</a></li>
                                    <li><a href="../../views/dashboard/pedidos.php">Pedidos</a></li>
                                    <li><a href="../../views/dashboard/valoraciones.php">Valoraciones</a></li>
                                </ul>
                                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                                <ul class="left hide-on-med-and-down">
                                    <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Gestión<i
                                                class="material-icons right">arrow_drop_down</i></a></li>
                                    <li><a class="dropdown-trigger" href="#!" data-target="dropdown2">Inventario<i
                                                class="material-icons right">arrow_drop_down</i></a></li>
                                    <li><a class="dropdown-trigger" href="#!" data-target="dropdown3">Usuarios<i
                                                class="material-icons right">arrow_drop_down</i></a></li>
                                    <li><a class="dropdown-trigger" href="#!" data-target="dropdown4">Clientes<i
                                                class="material-icons right">arrow_drop_down</i></a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <ul class="sidenav" id="mobile-demo">
                        <li class="light-blue darken-4"><a class="white-text">Gestión</a></li>
                        <li><a href="../../views/dashboard/empleados.php" class="center-align">Empleados</a></li>
                        <li><a href="../../views/dashboard/marcas.php" class="center-align">Marcas</a></li>
                        <li><a href="../../views/dashboard/categorias.php" class="center-align">Categorías</a></li>
                        <li class="divider"></li>
                        <li class="light-blue darken-4"><a class="white-text">Inventario</a></li>
                        <li><a href="../../views/dashboard/productos.php" class="center-align">Productos</a></li>
                        <li><a href="../../views/dashboard/proveedor.php" class="center-align">Proveedores</a></li>
                        <li><a href="../../views/dashboard/entradas.php" class="center-align">Entradas</a></li>
                        <li class="divider"></li>
                        <li class="light-blue darken-4"><a class="white-text">Usuarios</a></li>
                        <li><a href="../../views/dashboard/usuarios.php" class="center-align">Gestión de usuarios</a></li>
                        <li class="divider"></li>
                        <li class="light-blue darken-4"><a class="white-text">Clientes</a></li>
                        <li><a href="../../views/dashboard/clientes.php" class="center-align">Visualizar Clientes</a></li>
                        <li><a href="../../views/dashboard/pedidos.php" class="center-align">Pedidos</a></li>
                        <li><a href="../../views/dashboard/valoraciones.php" class="center-align">Valoraciones</a></li>
                        <li class="divider"></li>
                        <br>
                        <li class="blue-grey"><a href="#" class="center-align white-text" onclick="logOut()"><i class="material-icons right">exit_to_app</i>Cerrar Sesión</a></li>
                    </ul>
                </header>
                <br>
                <!--Contenido principal del documento-->
                <main>
        ');
    }

    //Método para imprimir el pie y establecer el controlador del documento
    public static function footerTemplate($controller) {
        print('
                </main>
                <!--Pie del documento-->
                <footer class="page-footer light-blue darken-4">
                    <div class="row">
                        <div class="col s12">
                            HardPrime Store - 2021 todos los derechos reservados
                        </div>
                    </div>
                </footer>
                <!--Importación de archivos JavaScript al final del cuerpo para una carga optimizada-->
                <script type="text/javascript" src="../../resources/js/materialize.min.js"></script>
                <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
                <script type="text/javascript" src="../../app/helpers/dashboard/components.js"></script>
                <script>
                    M.AutoInit();
                </script>
                <script type="text/javascript" src="../../app/controllers/dashboard/account.js"></script>
                <script type="text/javascript" src="../../app/controllers/dashboard/' . $controller . '"></script>
            </body>
            </html>
        ');
    }
}
?>