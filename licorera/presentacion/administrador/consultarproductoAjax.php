<?php
$filtro = $_GET['filtro'];
$producto = new Producto();
$productos = $producto -> buscar($filtro);
if(count($productos)>0){
?>
<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Precio</th>
            <th>Porcentaje de alcohol</th>
			<th>Disponibilidad</th>
			<th>Tamaño</th> 
			<th></th>
		</tr>
	</thead>
	<tbody>
	<?php
	    foreach ($productos as $e) {
	        echo "<tr>";
	        echo "<td>" . $e -> getNombre() . "</td>";
			echo "<td>" . $e -> getPrecio() . "</td>";
			echo "<td>" . $e -> getPalcohol() . "</td>";
			echo "<td>" . $e -> getStock() . "</td>";
	        echo "<td>" . $e -> getVolumen() -> getDescripcion() . "</td>";
	        echo "<td>";
	            echo "<a id='editar".$e->getId()."' href='index.php?pid=". base64_encode('presentacion/administrador/editarProducto.php') . "&idproducto=" . $e -> getId() . "'>";
	            echo "<i class='fas fa-pen-fancy' data-toggle='tooltip' data-placement='left' title='Deshabilitar'></i>";
	            echo "</a>";
	        echo "</td>";
	        
	        echo "</tr>";
	    }				
	    echo "<tr><td colspan='6'><strong>" . count($productos) . " registros encontrados</strong></td></tr>";
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
