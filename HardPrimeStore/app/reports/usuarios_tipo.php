<?php
require('../helpers/dashboard/report.php');
require('../models/usuarios.php');

// Se instancia la clase para crear el reporte.
$pdf = new Report;
// Se inicia el reporte con el encabezado del documento.
$pdf->startReport('Usuarios por tipo de usuario');

// Se instancia el módelo Categorías para obtener los datos.
$usuarios = new Usuarios;
// Se verifica si existen registros (categorías) para mostrar, de lo contrario se imprime un mensaje.
if ($dataUsuarios = $usuarios->readTipo()) {
    // Se recorren los registros ($dataCategorias) fila por fila ($rowCategoria).
    foreach ($dataUsuarios as $rowUsuario) {
        // Se establece un color de relleno para mostrar el nombre de la categoría.
        $pdf->SetFillColor(233, 148, 52);
        // Se establece la fuente para el nombre de la categoría.
        $pdf->SetFont('Times', 'B', 12);
        // Se imprime una celda con el nombre de la categoría.
        $pdf->Cell(0, 10, utf8_decode('Tipo de usuario: '.$rowUsuario['tipo_usuario']), 1, 1, 'C', 1);
        // Se establece la categoría para obtener sus productos, de lo contrario se imprime un mensaje de error.
        if ($usuarios->setId($rowUsuario['id_tipo_usuario'])) {
            // Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
            if ($dataProductos = $usuarios->readUsuariosTipo()) {
                // Se establece un color de relleno para los encabezados.
                $pdf->SetFillColor(248, 197, 152);
                // Se establece la fuente para los encabezados.
                $pdf->SetFont('Times', 'B', 11);
                // Se imprimen las celdas con los encabezados.
                $pdf->Cell(26, 10, utf8_decode('Usuario'), 1, 0, 'C', 1);
                $pdf->Cell(28, 10, utf8_decode('Tipo de usuario'), 1, 0, 'C', 1);
                $pdf->Cell(80, 10, utf8_decode('Empleado'), 1, 0, 'C', 1);
                $pdf->Cell(52, 10, utf8_decode('Correo'), 1, 1, 'C', 1);                
                // Se establece la fuente para los datos de los productos.
                $pdf->SetFont('Times', '', 11);
                // Se recorren los registros ($dataProductos) fila por fila ($rowProducto).
                foreach ($dataProductos as $rowProducto) {
                    // Se imprimen las celdas con los datos de los productos.
                    $pdf->Cell(26, 10, utf8_decode($rowProducto['usuario']), 1, 0);
                    $pdf->Cell(28, 10, utf8_decode($rowProducto['tipo_usuario']), 1, 0);
                    $pdf->Cell(80, 10, utf8_decode($rowProducto['empleado']), 1, 0);
                    $pdf->Cell(52, 10, utf8_decode($rowProducto['correo']), 1, 1);                                        
                }
            } else {
                $pdf->Cell(0, 10, utf8_decode('No hay usuarios asignados a este tipo de usuario'), 1, 1);
            }
        } else {
            $pdf->Cell(0, 10, utf8_decode('Tipo de usuario incorrecto o inexistente'), 1, 1);
        }
    }
} else {
    $pdf->Cell(0, 10, utf8_decode('No hay usuarios para mostrar'), 1, 1);
}

// Se envía el documento al navegador y se llama al método Footer()
$pdf->Output();
?>