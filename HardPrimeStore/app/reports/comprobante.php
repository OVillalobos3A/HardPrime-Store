<?php
// Se verifica si existe el parámetro id en la url, de lo contrario se direcciona a la página web de origen.
if (isset($_GET['id'])) {
    require('../helpers/dashboard/report.php');
    require('../models/pedidos.php');

    // Se instancia el módelo Categorias para procesar los datos.
    $comprobante = new Pedidos;

    // Se verifica si el parámetro es un valor correcto, de lo contrario se direcciona a la página web de origen.
    if ($comprobante->setId($_GET['id'])) {        
        // Se verifica si la categoría del parametro existe, de lo contrario se direcciona a la página web de origen.
        if ($rowComprobante = $comprobante->readOne()) {            
            // Se instancia la clase para crear el reporte.
            $pdf = new Report;
            // Se inicia el reporte con el encabezado del documento.
            $pdf->startReport2('Pedido #' . $rowComprobante['id_pedido']);
            //Se agrega el texto que indica el estado del pedido.
            $pdf->Cell(166, 10, 'Estado: '.$rowComprobante['estado'], 0, 1);
            // Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
            if ($dataComprobante = $comprobante->readComprobante()) {
                // Se establece un color de relleno para los encabezados.
                $pdf->SetFillColor(233, 148, 52);
                // Se establece la fuente para los encabezados.
                $pdf->SetFont('Times', 'B', 11);
                // Se imprimen las celdas con los encabezados.
                $pdf->Cell(76, 10, utf8_decode('Fecha del pedido: ' . $rowComprobante['fecha_pedido']), 1, 0, 'C', 1);
                $pdf->Cell(100, 10, utf8_decode('Cliente: ' . $rowComprobante['cliente']), 1, 1, 'C', 1);
                $pdf->SetFillColor(248, 197, 152);
                $pdf->Cell(50, 10, utf8_decode('Nombre'), 1, 0, 'C', 1);
                $pdf->Cell(26, 10, utf8_decode('Cantidad'), 1, 0, 'C', 1);
                $pdf->Cell(50, 10, utf8_decode('Precio'), 1, 0, 'C', 1);
                $pdf->Cell(50, 10, utf8_decode('Subtotal'), 1, 1, 'C', 1);
                // Se establece la fuente para los datos de los productos.
                $pdf->SetFont('Times', '', 11);
                // Se recorren los registros ($dataProductos) fila por fila ($rowProducto).
                foreach ($dataComprobante as $rowProducto) {
                    // Se imprimen las celdas con los datos de los productos.
                    $pdf->Cell(50, 10, utf8_decode($rowProducto['nombre']), 1, 0, 'C');
                    $pdf->Cell(26, 10, utf8_decode($rowProducto['cantidad']), 1, 0, 'C');
                    $pdf->Cell(50, 10, '$' . $rowProducto['precio'], 1, 0, 'C');
                    $pdf->Cell(50, 10, '$' . $rowProducto['subtotal'], 1, 1, 'C');
                }
                //Se verifica si se ha podido obtener el total del pedido, de lo contrario muestra un mensaje de error.
                if ($rowTotal = $comprobante->readTotal()) {
                    $pdf->SetFont('Times', 'B', 11);
                    $pdf->SetFillColor(233, 148, 52);
                    $pdf->Cell(126, 10, 'Total', 1, 0, 'C', 1);
                    $pdf->SetFillColor(248, 197, 152);
                    $pdf->Cell(50, 10, $rowTotal['total'], 1, 1, 'C', 1);
                } else {
                    $pdf->Cell(0, 10, utf8_decode('Hubo un error al obtener el total del pedido'), 1, 1);
                }
            } else {
                $pdf->Cell(0, 10, utf8_decode('No hay productos para esta pedido'), 1, 1);
            }
            // Se envía el documento al navegador y se llama al método Footer()
            $pdf->Output();
        } else {
            header('location: ../../views/public/mi_cuenta.php');
        }
    } else {
        header('location: ../../views/public/mi_cuenta.php');
    }
} else {
    header('location: ../../views/public/mi_cuenta.php');
}
