<?php 
include 'presentacion/menupr.php';
					
if (isset($_POST['registrar'])) {
$habitacion = new Habitacion("",$_GET['idhotel'],$_POST['capacidad'],$_POST['precio']);
$habitacion -> insertar();
}
?>
<div class="container">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card ">
				<div class="card-header bg-primary text-white">Registro habitacion</div>
				<div class="card-body">
					<!--<?php if (isset($_POST['registrar'])) { ?>
						<div class="alert alert-<?php //echo ($error == 0) ? "success" : "danger" ?> alert-dismissible fade show" role="alert">
							<?php //echo ($error == 0) ? "Registro exitoso" : $_POST['correo'] . " ya existe"; ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php } ?>-->
					<form method="post">
						<div class="form-group">
							<label>Capacidad</label> 
							<select class='custom-select' name='capacidad' id='capacidad'>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
						</div>
						<div class="form-group">
							<label>precio</label> <input name="precio" type="text" class="form-control" placeholder="Digite Precio" required="required">
						</div>
						
							<div class="form-group">
									<br/>
								<button type="submit" name="registrar" id="registrar" class="btn btn-primary">Registrar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>