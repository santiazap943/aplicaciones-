<?php
$estudiante = new Estudiante($_GET['idEstudiante']);
$estudiante -> consultar();
if($estudiante -> getEstado() == 1){
    echo "<i id='icono".$estudiante->getId()."' class='fas fa-user-times' data-toggle='tooltip' data-placement='left' title='Deshabilitar'></i>";
}else{
    echo "<i id='icono".$estudiante->getId()."' class='fas fa-user-check' data-toggle='tooltip' data-placement='left' title='Habilitar'></i>";
}

?>