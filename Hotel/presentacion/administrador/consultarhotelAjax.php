<?php
$filtro = $_GET['filtro'];
$hotel = new Hotel();
$hotels = $hotel -> buscar($filtro);
if(count($hotels)>0){
?>
<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>Nombre</th>
            <th>Correo</th>
            <th>direccion</th>
			<th>habitaciones disponibles</th>
			<th>Ciudad</th>
			<th>proveedor</th> 
			<th></th>
		</tr>
	</thead>
	<tbody>
	<?php
	    foreach ($hotels as $e) {
	        echo "<tr>";
	        echo "<td>" . $e -> getNombre() . "</td>";
	        echo "<td>" . $e -> getCorreo() . "</td>";
            echo "<td>" . $e -> getDireccion() . "</td>";
            echo "<td>" . $e -> getHabitacionesdisp() . "</td>";
			echo "<td>" . $e -> getCiudad() -> getNombre() . "</td>";
			echo "<td>" . $e -> getProveedor() -> getNombre() . "</td>";
	        echo "<td>";
	        echo "</td>";
	        
	        echo "</tr>";
	    }				
	    echo "<tr><td colspan='6'><strong>" . count($hotels) . " registros encontrados</strong></td></tr>";
    ?>
	</tbody>
</table>
<?php } else { ?>
<div class="alert alert-danger alert-dismissible fade show"
	role="alert">
	No se encontraron resultados
	<button type="button" class="close" data-dismiss="alert"
		aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<?php } ?>
<script>
$(document).ready(function(){
<?php 
foreach ($hotels as $e) {
    echo "$(\"#cambiarEstado".$e->getId()."\").click(function(){\n";
    echo "var ruta = \"indexAjax.php?pid=" . base64_encode("presentacion/hotel/cambiarEstadohotelAjax.php") . "&idhotel=".$e->getId()."\";\n";
    echo "$(\"#estado".$e->getId()."\").load(ruta);\n";
    echo "});\n";
}
?>
});
</script>



