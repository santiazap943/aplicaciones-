<?php
include 'presentacion/menuus.php';
$pais = new Pais();
if(isset($_POST['buscar'])){
    header("Location:index.php?pid=" . base64_encode("presentacion/usuario/consultarDisponibilidad.php") . "&idCiudad=" . $_POST['idCiudad'] . "&checkin=" . $_POST['checkin'] . "&checkout=" . $_POST['checkout'] . "&habitaciones=" . $_POST['habitaciones']);
}
?>
<div class="container">
	<div class="row">
		<div class="col-1"></div>
		<div class="col-10">
			<div class="card ">
				
				<div class="card-body">

					<form method="post">
					<div class="row">
						<div class="col">
						<label>Ciudad</label>
						<input type="text" class="form-control rounded-pill" placeholder="ingresa tu destino"
						name="ciudad" id="ciudad">
						<input name="idCiudad" id="idCiudad" type="hidden" class="form-control ">
						<div id="resultados"></div>
						</div>
						<div class="col">
						<label>Fecha de llegada</label><input type="date" class="form-control rounded-pill" name="checkin">
						</div>
						<div class="col">
						<label>Fecha de salida</label><input type="date" class="form-control rounded-pill" name="checkout">
						</div>
						<div class="col">
							<div class="form-group ">
								<label>Personas</label>
								<select class="form-control rounded-pill" name="habitaciones">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								</select>
							</div>
						</div>
						<div class="col">
                        <label></label><br/>
                        <button type="submit" name="buscar" id="buscar" class="btn btn-primary">Buscar</button>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<br/>
<div class="container-fuid ">
<div class="container">
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/3.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/4.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/5.jpg" class="d-block w-100" alt="...">
	</div>
	<div class="carousel-item">
      <img src="img/6.jpg" class="d-block w-100" alt="...">
    </div>

  </div>
  <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$("#ciudad").keyup(function(){
		if($("#ciudad").val()!=""){
			var ruta = "indexAjax.php?pid=<?php echo base64_encode("presentacion/usuario/ciudadReservaAjax.php"); ?>&ciudad="+$("#ciudad").val();
			$("#resultados").load(ruta);
		}
	});
 	$("#ciudad").focusout(function(){
		var ruta = "indexAjax.php?pid=<?php echo base64_encode("presentacion/usuario/ciudadReservaAjax.php"); ?>&ciudad=-1";
 		$("#resultados").load();
 	});
	
});


</script>
<!--
<div class="container">
	<div class="row">
		<div class="col-1"></div>
		<div class="col-10">
			<div class="card ">
				<div class="card-header bg text-dark text-center  " style="background-color: #BAE6E2;">Reservar </div>
				<div class="card-body">

					<form method="post">
					<div class="row">
						<div class="col">
						<label>Ciudad</label>
						<input type="text" class="form-control" placeholder="¿A dónde vas?"
						name="ciudad" id="ciudad">
						<input name="idCiudad" id="idCiudad" type="hidden" class="form-control">
						<div id="resultados"></div>
						</div>
						
						<div class="col">
						<label>Fecha de llegada</label><input type="date" class="form-control" name="checkin">
						</div>
						<div class="col">
						<label>Fecha de salida</label><input type="date" class="form-control" name="checkout">
						</div>
						<div class="col">
							<div class="form-group">
								<label>Personas</label>
								<select class="form-control" name="habitaciones">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								</select>
							</div>
						</div>
						<div class="col">
                        <label></label><br/>
                        <button  name="buscar" id="buscar" class="btn btn-primary">Buscar</button>
						</div>
					</div>
					</form>
					<div id="resultadosDisp"></div>
				</div>
			</div>

			
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	$("#ciudad").keyup(function(){
		if($("#ciudad").val()!=""){
			var ruta = "indexAjax.php?pid=<?php// echo base64_encode("presentacion/usuario/ciudadReservaAjax.php"); ?>&ciudad="+$("#ciudad").val();
			$("#resultados").load(ruta);
		}
	});
 	$("#ciudad").focusout(function(){
		var ruta = "indexAjax.php?pid=<?php //echo base64_encode("presentacion/usuario/ciudadReservaAjax.php"); ?>&ciudad=-1";
 		$("#resultados").load();
 	});
	
});


</script>
<script type="text/javascript">

$(document).ready(function(){
	var ruta;
	$("#filtro").click(function(){
		if($("#filtro").val()!=""){
			ruta = "indexAjax.php?pid=<?php //echo base64_encode("presentacion/proveedor/consultarDisponibilidadAjax.php"); ?>";
			$("#resultadosDisp").load(ruta);
		
		}
	});
});
</script>

-->