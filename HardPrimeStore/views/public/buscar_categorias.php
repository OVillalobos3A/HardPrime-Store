<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/public/sitio_publico.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Sitio_Publico::headerTemplate('HardPrimeStore - Categorías');
?>
<main>
    <div class="row">

        <div class="col s12 m12">
            <!--Encabezado y paginación-->
            <div id="titulo_pag">        
                
            </div>            
            <hr>          
            <!--Creacion de la cards-->
            <!--Creacion del div para la primera fila de productos-->
            <div class="row" id="contenido">
            </div>
            <!--Div para la segunda fila de productos-->
            
        </div>
    </div>
</main>
<?php
Sitio_Publico::footerTemplate('buscar_categorias.js');
?>

</html>