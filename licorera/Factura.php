<?php
$ventaNueva = $_GET['ventaNueva'];
$venta= new Venta ($ventaNueva);
$venta -> consultar();
$detalle = new Detalle("",$venta -> getId());
$detalles = $detalle -> consultarVenta2();
$total = 0;
$pdf = new Cezpdf('LETTER');
$pdf -> selectFont('pdf/fonts/Helvetica.afm');
$pdf -> ezSetCmMargins(1, 1, 2, 1);
$tletra=10;
$pdf -> setColor(0,0,0);
$texto = "LIQUOR EXPRESS";
$pdf -> ezText($texto, $tletra, array('justification' => 'center'));    
$texto = $venta -> getFecha();
$pdf -> ezText($texto, $tletra, array('justification' => 'center'));
$texto = "Cliente: " . $venta -> getCliente();
$pdf -> ezText($texto, $tletra, array('justification' => 'center'));    
$texto = "----------------------------------------------------";
$pdf -> ezText($texto, $tletra, array('justification' => 'center'));    
$texto =  "Producto..................Cantidad.................Precio";
$pdf -> ezText($texto, $tletra, array('justification' => 'center'));       

foreach ($detalles as $e){
    $producto = new Producto($e -> getProducto());
    $producto -> consultar();
    $precio = $producto -> getPrecio() * $e -> getCantidad();
    $total = $total + $precio;
    $texto =  $producto -> getNombre(). "........................" . $e -> getCantidad() . "......................" . $precio;
    $pdf -> ezText($texto, $tletra, array('justification' => 'center'));       
}
$texto = "TOTAL........................................................." . $total;
$pdf -> ezText($texto, $tletra, array('justification' => 'center'));       
$pdf -> ezStream();
//ob_end_flush();
?>