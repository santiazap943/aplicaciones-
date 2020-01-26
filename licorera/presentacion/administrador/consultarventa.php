<?php
$venta = new venta();
$ventas = $venta -> consultarTodos();
include 'presentacion/validacionAdministrador.php';
include 'presentacion/menuadmin.php';
if(count($ventas)>0){
?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-info text-white">Facturas</div>
				<div class="card-body">
					<div class="form-group">
					
<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>Cliente</th>
			<th>Fecha</th>
            <th></th>
		</tr>
	</thead>
	<tbody>
	<?php
	    foreach ($ventas as $e) {
	        echo "<tr>";
	        echo "<td>" . $e -> getCliente() . "</td>";
			echo "<td>" . $e -> getFecha() . "</td>";
	        echo "<td>";
	            echo "<a id='editar".$e->getId()."' href='index.php?pid=". base64_encode('Factura.php') . "&ventaNueva=" . $e -> getId() . "'>";
	            echo "<i class='fas fa-pen-fancy' data-toggle='tooltip' data-placement='left' title='Deshabilitar'></i>";
	            echo "</a>";
	        echo "</td>";
	        
	        echo "</tr>";
	    }				
	    echo "<tr><td colspan='6'><strong>" . count($ventas) . " registros encontrados</strong></td></tr>";
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
</div>
		</div>
	</div>
</div>
<?php } ?>
