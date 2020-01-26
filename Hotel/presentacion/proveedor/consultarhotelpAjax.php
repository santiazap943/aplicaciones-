<?php
$filtro = $_GET['filtro'];
$hotel = new Hotel("","","","","","",$_GET['idproveedor']);
$registros = $hotel->consultarProveedor($filtro);
if(count($registros)>0){
	?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-info text-white">Consultar hotel</div>
					<div class="card-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th scope="col">Nombre</th>
                                <th scope="col">Direccion</th>
                                <th scope="col"># Disponibles</th>
                                <th scope="col">Ciudad</th>
							</tr>
						</thead>
						<tbody>
						<?php 
							foreach ($registros as $a){
								
							    echo "<tr>";
							    echo "<td>" . $a -> getNombre() . "</td>";
								echo "<td>" . $a -> getDireccion() . "</td>";
                                echo "<td>" . $a -> getHabitacionesdisp() . "</td>";
								echo "<td>" . $a -> getCiudad() -> getNombre() . "</td>";   
								echo "<td><a href='index.php?pid=".base64_encode('presentacion/proveedor/crearhabitacion.php')."&idhotel=" . $a -> getId() . "'>";
								echo "<i class='fas fa-door-open' data-toggle='tooltip' data-placement='left' title='crear habitacion'></i>";
								echo "</a></td>";
								echo "<td><a href='index.php?pid=".base64_encode('presentacion/proveedor/consultarHabitacion.php')."&idhotel=" . $a -> getId() . "'>";
								echo "<i class='fas fa-hotel' data-toggle='tooltip' data-placement='left' title='consultar habitaciones'></i>";
								echo "</a></td>";                     
								echo "<td><a href='index.php?pid=".base64_encode('presentacion/proveedor/consultarReservas.php')."&idhotel=" . $a -> getId() . "'>";
								echo "<i class='fas fas fa-suitcase-rolling' data-toggle='tooltip' data-placement='left' title='consultar habitaciones'></i>";
								echo "</a></td>";                       
								
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
