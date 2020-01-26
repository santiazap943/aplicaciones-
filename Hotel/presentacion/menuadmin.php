

<nav class="navbar navbar-expand-lg navbar-dark "style="background-color:rgba(44, 62, 80,1.0)">
  <a class="navbar-brand" href="index.php?pid=<?php echo base64_encode("presentacion/sesionAdministrador.php")?>"><i class="fas fa-home"></i></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">   
        <li class="nav-item ">
        <a class="nav-link active" href="index.php?pid=<?php echo base64_encode('presentacion/administrador/consultarusuario.php')?>" >Usuario</a>
        </li>
        <li class="nav-item ">
        <a class="nav-link" href="index.php?pid=<?php echo base64_encode('presentacion/administrador/consultarhotel.php')?>">Hoteles</a>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Proveedor
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode('presentacion/administrador/consultarproveedor.php')?>">Consultar proveedores</a>
      <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode('presentacion/administrador/registroProveedor.php')?>">Registrar proveedor</a>
        </div>
      </li>
        <li class="nav-item ">
        <a class="nav-link" href="index.php?pid=<?php echo base64_encode('presentacion/administrador/consultarReserva.php')?>">Reservas</a>
        </li>
        
        <!--<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Reservas
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="index.php?pid=<?php //echo base64_encode('presentacion/consultarDisponibilidad.php')?>">Reservas hoteles</a>
      <a class="dropdown-item" href="index.php?pid=<?php //echo base64_encode('presentacion/consultarDisponibilidad.php')?>">Reservas usuario</a>
      <a class="dropdown-item" href="index.php?pid=<?php //echo base64_encode('presentacion/administrador/registroProveedor.php')?>">Registrar proveedor</a>
        </div>
      </li>-->
</ul>    
  <ul class="navbar-nav ">
       <li class="nav-item">
        <a class="nav-link" href="index.php?salir=1" tabindex="-1" >Salida</a>
      </li>
      </ul>
    
      
      
  </div>
</nav>
<br/>