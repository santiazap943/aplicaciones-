<?php
$usuario = new Usuario($_GET['idusuario']);
$usuario -> cambiarEstado();
$usuario -> consultar();
echo $usuario -> getEstado();
?>