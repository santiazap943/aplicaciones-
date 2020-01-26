<?php
$filtro = $_GET['filtro'];
$reserva = new Reserva();
$reservas = $reserva -> buscar($filtro);
if(count($reservas)>0){
?>
<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th scope="col">Fecha de llegada</th>
                                <th scope="col">Fecha de salida</th>
                                <th scope="col">Acomodacion</th>
                                <th scope="col">Hotel</th>
                                <th scope="col">Usuario</th>
							</tr>
						</thead>
						<tbody>
						<?php 
							foreach ($reservas as $a){
								
							    echo "<tr>";
							    echo "<td>" . $a -> getFecha_entrada() . "</td>";
								echo "<td>" . $a ->  getFecha_salida() . "</td>";
                                echo "<td>" . $a -> getCantidad_personas() . "</td>";  
                                echo "<td>" . $a -> getHotel_idhotel() -> getNombre() . "</td>";  
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
<?php } ?>
<script>
$(document).ready(function(){
<?php 
foreach ($reservas as $e) {
    echo "$(\"#cambiarEstado".$e->getId()."\").click(function(){\n";
    echo "var ruta = \"indexAjax.php?pid=" . base64_encode("presentacion/administrador/cambiarEstadoreserva	Ajax.php") . "&idreserva	=".$e->getId()."\";\n";
    echo "$(\"#estado".$e->getId()."\").load(ruta);\n";
    echo "});\n";
}
?>
});
</script>



