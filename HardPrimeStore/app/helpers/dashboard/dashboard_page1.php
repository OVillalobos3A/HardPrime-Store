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
                    <nav>
                        <div class="nav-wrapper light-blue darken-4">
                            <a href="../../views/dashboard/index.php" class="brand-logo hide-on-med-and-down"><img class="responsive-img" src="../../resources/img/tabla/Logo2.png" width="250"></a>
                            <a href="../../views/dashboard/index.php" class="brand-logo hide-on-large-only"><img class="responsive-img" src="../../resources/img/tabla/Logo2.png" width="200"></a>
                        </div>
                    </nav>
                </header>
                <br>
                <br>
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
                <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
                <script type="text/javascript" src="../../resources/js/materialize.min.js"></script>
                <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
                <script type="text/javascript" src="../../app/helpers/dashboard/components.js"></script>
                <script>
                    M.AutoInit();
                </script>
                <script type="text/javascript" src="../../app/controllers/dashboard/' . $controller . '"></script>
            </body>
            </html>
        ');
    }
}
?>