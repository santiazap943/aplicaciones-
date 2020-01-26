<?php
session_start();
require 'logica/administrador.php';
require 'logica/usuario.php';
require 'logica/proveedor.php';
require 'logica/hotel.php';
require 'logica/pais.php';
require 'logica/habitacion.php';
require 'logica/reserva.php';
require 'persistencia/Conexion.php';
?>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<title>Tu Hotel ya
</title>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script
	src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script type="text/javascript">
$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	})
</script>
<style>
	body{
		background-image:url("img/bg.jpg");
	}
</style>
</head>
<body>
	<?php 
	if(isset($_GET['pid'])){
	    require base64_decode($_GET['pid']);
	}else{
	    if(isset($_GET['salir'])){
	        $_SESSION['id']=null;
	        $_SESSION['rol']=null;
	    }
	    require 'presentacion/encabezado.php';
	    require 'presentacion/inicio.php';	    
	}
	
	
	?>
</body>
</html>