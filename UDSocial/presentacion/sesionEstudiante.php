<?php 
$estudiante = new Estudiante($_SESSION['id']);
$estudiante -> consultar();
?>
<h1>Bienvenido estudiante: <?php echo $estudiante -> getNombre() . " " . $estudiante -> getApellido(); ?></h1>
<img src="<?php echo $estudiante -> getFoto() ?>" width="150px" >
