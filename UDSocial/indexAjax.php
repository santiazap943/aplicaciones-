<?php
require 'logica/Administrador.php';
require 'logica/Programa.php';
require 'logica/Facultad.php';
require 'logica/Estudiante.php';
require 'persistencia/Conexion.php';
include base64_decode($_GET['pid']);
?>
    <script type="text/javascript">
    $(function () {
    	  $('[data-toggle="tooltip"]').tooltip()
    	})
    </script>
