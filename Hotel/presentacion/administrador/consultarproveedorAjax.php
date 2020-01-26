<?php
$filtro = $_GET['filtro'];
$proveedor = new Proveedor();
$proveedors = $proveedor -> buscar($filtro);
if(count($proveedors)>0){
?>
<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Apellido</th>
            <th>Correo</th>
			<th>Estado</th> 
			<th></th>
		</tr>
	</thead>
	<tbody>
	<?php
	    foreach ($proveedors as $e) {
	        echo "<tr>";
	        echo "<td>" . $e -> getNombre() . "</td>";
	        echo "<td>" . $e -> getApellido() . "</td>";
            echo "<td>" . $e -> getCorreo() . "</td>";
	        echo "<td><div id='estado".$e->getId()."'>" . $e -> getEstado() . "</div></td>";
	        echo "<td>";
	        if($e -> getEstado() == 1){
	            echo "<a id='cambiarEstado".$e->getId()."' href='#'>";
	            echo "<i class='fas fa-user-times' data-toggle='tooltip' data-placement='left' title='Deshabilitar'></i>";
	            echo "</a>";
	        }else{
	            echo "<a id='cambiarEstado".$e->getId()."' href='#'>";
	            echo "<i class='fas fa-user-check' data-toggle='tooltip' data-placement='left' title='Habilitar'></i>";
	            echo "</a>";
	        }
	        echo "</td>";
	        
	        echo "</tr>";
	    }				
	    echo "<tr><td colspan='6'><strong>" . count($proveedors) . " registros encontrados</strong></td></tr>";
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
foreach ($proveedors as $e) {
    echo "$(\"#cambiarEstado".$e->getId()."\").click(function(){\n";
    echo "var ruta = \"indexAjax.php?pid=" . base64_encode("presentacion/administrador/cambiarEstadoproveedorAjax.php") . "&idproveedor=".$e->getId()."\";\n";
    echo "$(\"#estado".$e->getId()."\").load(ruta);\n";
    echo "});\n";
}
?>
});
</script>



