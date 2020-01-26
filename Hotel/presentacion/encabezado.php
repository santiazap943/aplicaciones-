<nav class="navbar navbar-expand-lg navbar-dark " style="background-color:rgba(44, 62, 80,1.0)">
  <a class="navbar-brand" href="index.php?pid=<?php echo base64_encode("presentacion/sesionUsuario.php")?>"><i class="fas fa-home"></i></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">   
        <li class="nav-item ">
        <a class="nav-link active" href="index.php" >Inicio</a>
        </li>
        <li class="nav-item ">
        </li>
      
</ul>    
  <ul class="navbar-nav ">
  <li class="nav-item ">
        <a class="nav-link" href="index.php?pid=<?php echo base64_encode("presentacion/registrousuario.php")?>">Registrar usuario</a>
        </li>
        <li class="nav-item">
    <a class="nav-link" href="index.php?pid=<?php echo base64_encode('presentacion/login.php')?>">Ingreso</a>
  </li >

      </ul>      
  </div>
</nav>
<br/>
								