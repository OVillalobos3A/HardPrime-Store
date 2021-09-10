<?php
require('../helpers/dashboard/report.php');
require('../models/valoraciones.php');

// Se instancia la clase para crear el reporte.
$pdf = new Report;
// Se inicia el reporte con el encabezado del documento.
$pdf->startReport('Valoraciones por producto');

// Se instancia el módelo Categorías para obtener los datos.
$valoracion = new Valoraciones;
// Se verifica si existen registros (categorías) para mostrar, de lo contrario se imprime un mensaje.
if ($dataValoraciones = $valoracion->readAll2()) {
    // Se recorren los registros ($dataCategorias) fila por fila ($rowCategoria).
    foreach ($dataValoraciones as $rowValoracion) {
        // Se establece un color de relleno para mostrar el nombre de la categoría.
        $pdf->SetFillColor(207, 118, 53);
        // Se establece la fuente para el nombre de la categoría.
        $pdf->SetFont('Times', 'B', 12);
        // Se imprime una celda con el nombre de la categoría.
        $pdf->Cell(0, 10, utf8_decode('Producto: '.$rowValoracion['nombre']), 1, 1, 'C', 1);
        // Se establece la categoría para obtener sus productos, de lo contrario se imprime un mensaje de error.
        if ($valoracion->setId($rowValoracion['id_producto'])) {
            // Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
            if ($dataProductos = $valoracion->readProductosValoracion()) {
                // Se establece un color de relleno para los encabezados.
                $pdf->SetFillColor(225);
                // Se establece la fuente para los encabezados.
                $pdf->SetFont('Times', 'B', 11);
                // Se imprimen las celdas con los encabezados.
                $pdf->Cell(21, 10, utf8_decode('Fecha'), 1, 0, 'C', 1);
                $pdf->Cell(45, 10, utf8_decode('Producto'), 1, 0, 'C', 1);
                $pdf->Cell(90, 10, utf8_decode('Comentario'), 1, 0, 'C', 1);
                $pdf->Cell(30, 10, utf8_decode('Calificación'), 1, 1, 'C', 1);
                // Se establece la fuente para los datos de los productos.
                $pdf->SetFont('Times', '', 11);
                // Se recorren los registros ($dataProductos) fila por fila ($rowProducto).
                foreach ($dataProductos as $rowProducto) {
                    // Se imprimen las celdas con los datos de los productos.
                    $pdf->Cell(21, 10, utf8_decode($rowProducto['fecha']), 1, 0);
                    $pdf->Cell(45, 10, utf8_decode($rowProducto['nombre']), 1, 0);
                    $pdf->Cell(90, 10, $rowProducto['comentario'], 1, 0);
                    $pdf->Cell(30, 10, $rowProducto['calificacion'].' Estrellas', 1, 1);
                }
            } else {
                $pdf->Cell(0, 10, utf8_decode('No hay Valoraciones para este producto'), 1, 1);
            }
        } else {
            $pdf->Cell(0, 10, utf8_decode('Producto incorrecto o inexistente'), 1, 1);
        }
    }
} else {
    $pdf->Cell(0, 10, utf8_decode('No hay productos para mostrar'), 1, 1);
}

// Se envía el documento al navegador y se llama al método Footer()
$pdf->Output();
?>