<?php
include 'presentacion/menupr.php'; 
$reserva = new Reserva("","","",$_GET['idhotel']);
$registros =  $reserva	 -> consultarHotel();
if(count($registros)>0){
	?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-info text-white">Consultar reservas</div>
					<div class="card-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th scope="col">Fecha de llegada</th>
                                <th scope="col">Fecha de salida</th>
                                <th scope="col">Acomodacion</th>
                                <th scope="col">Usuario</th>
							</tr>
						</thead>
						<tbody>
						<?php 
							foreach ($registros as $a){
								
							    echo "<tr>";
							    echo "<td>" . $a -> getFecha_entrada() . "</td>";
								echo "<td>" . $a ->  getFecha_salida() . "</td>";
                                echo "<td>" . $a -> getCantidad_personas() . "</td>";    
                                echo "<td>" . $a -> getUsuario_idusuario() -> getNombre() . "</td>";                    
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
