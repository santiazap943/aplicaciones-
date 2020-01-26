<?php
$estudiante = new Estudiante($_GET['idEstudiante']);
$estudiante -> cambiarEstado();
$estudiante -> consultar();
echo $estudiante -> getEstado();
?>