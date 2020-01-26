<?php
include 'presentacion/menupr.php'; 
$habitacion = new Habitacion("",$_GET['idhotel']);
$registros =  $habitacion -> consultarTodos();
if(count($registros)>0){
	?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-info text-white">Consultar habitaciones</div>
					<div class="card-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th scope="col">Numero</th>
                                <th scope="col">Capacidad</th>
                                <th scope="col">Precio</th>
							</tr>
						</thead>
						<tbody>
						<?php 
							foreach ($registros as $a){
								
							    echo "<tr>";
							    echo "<td>" . $a -> getId() . "</td>";
								echo "<td>" . $a ->  getNummax() . "</td>";
                                echo "<td>" . $a -> getPrecio() . "</td>";                    
							}							
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
<?php } 
?>


				</div>
			</div>
		</div>
	</div>
</div>
