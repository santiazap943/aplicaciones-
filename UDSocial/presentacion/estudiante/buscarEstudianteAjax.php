<?php
$filtro = $_GET['filtro'];
$estudiante = new Estudiante();
$estudiantes = $estudiante -> buscar($filtro);
if(count($estudiantes)>0){
?>
<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Correo</th>
			<th>Estado</th>
			<th>Programa</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	<?php
	    foreach ($estudiantes as $e) {
	        echo "<tr>";
	        echo "<td>" . $e -> getNombre() . "</td>";
	        echo "<td>" . $e -> getApellido() . "</td>";
	        echo "<td>" . $e -> getCorreo() . "</td>";
	        echo "<td><div id='estado".$e->getId()."'>" . $e -> getEstado() . "</div></td>";
	        echo "<td>" . $e -> getPrograma() -> getNombre() . "</td>";
	        echo "<td nowrap='nowrap'>";
	        if($e -> getEstado() == 1){
	            echo "<a id='cambiarEstado".$e->getId()."' href='#'>";
	            echo "<div id='iconoEstado".$e->getId()."'><i id='icono".$e->getId()."' class='fas fa-user-times' data-toggle='tooltip' data-placement='left' title='Deshabilitar'></i></div>";
	            echo "</a>";
	        }else{
	            echo " <a id='cambiarEstado".$e->getId()."' href='#'>";
	            echo "<div id='iconoEstado".$e->getId()."'><i id='icono".$e->getId()."' class='fas fa-user-check' data-toggle='tooltip' data-placement='left' title='Habilitar'></i></div>";
	            echo "</a>";
	        }
	        echo "<a href='index.php?pid=".base64_encode("presentacion/estudiante/cambiarFotoEstudiante.php")."&idEstudiante=".$e->getId()."'>";
	        echo "<div><i id='icono".$e->getId()."' class='fas fa-camera-retro' data-toggle='tooltip' data-placement='left' title='Cambiar Foto'></i></div>";
	        echo "</a>";
	        echo "</td>";
	        echo "</tr>";
	    }				
	    echo "<tr><td colspan='6'><strong>" . count($estudiantes) . " registros encontrados</strong></td></tr>";
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
foreach ($estudiantes as $e) {
    echo "$(\"#cambiarEstado".$e->getId()."\").click(function(){\n";
    echo "var ruta = \"indexAjax.php?pid=" . base64_encode("presentacion/estudiante/cambiarEstadoEstudianteAjax.php") . "&idEstudiante=".$e->getId()."\";\n";
    echo "$(\"#estado".$e->getId()."\").load(ruta);\n";
    echo "$(\"#icono".$e->getId()."\").tooltip('hide');\n";
    echo "ruta = \"indexAjax.php?pid=" . base64_encode("presentacion/estudiante/cambiarIconoEstadoEstudianteAjax.php") . "&idEstudiante=".$e->getId()."\";\n";
    echo "$(\"#iconoEstado".$e->getId()."\").load(ruta);\n";
    echo "});\n";
}
?>
});
</script>



