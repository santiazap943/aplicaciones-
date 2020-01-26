<?php
include 'presentacion/validacionAdministrador.php';
include 'presentacion/menuadmin.php';
include 'logica/hotel.php';


$hotel = new Hotel();
$registros = $hotel->consultarTodos();
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
                                <th scope="col">Correo</th>
                                <th scope="col">Direccion</th>
								<th scope="col"># Habitaciones</th>
                                <th scope="col"># Disponibles</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Ciudad</th>
                                <th scope="col">Pais</th>>
								<th></th>
							</tr>
						</thead>
						<tbody>
						<?php 

							foreach ($registros as $a){
								
							    echo "<tr>";
							    echo "<td>" . $a -> getNombre() . "</td>";
							    echo "<td>" . $a -> getCorreo() . "</td>";
								echo "<td>" . $a -> getDireccion() . "</td>";
								echo "<td>" . $a -> getHabitaciones() . "</td>";
                                echo "<td>" . $a -> getHabitacionesdisp() . "</td>";
                                echo "<td>" . $a -> getprecio() . "</td>";
                                echo "<td>" . $a -> getCiudad() . "</td>";
                                echo "<td>" . $a -> getPais() . "</td>";                               
							    echo "<td>";

								echo "</td>";
								echo "<td>";
								echo "<a href='index.php?pid=" . base64_encode("presentacion/editarhotel.php")."&idhotel=" . $a -> getIdhotel() . "'>";
								echo "<i class='fas fa-user-times' data-toggle='tooltip' data-placement='left' title='Editar perfil'></i>";
								echo "</a>";
								echo "</td>";
								echo "</tr>";
								

								
							}							
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>