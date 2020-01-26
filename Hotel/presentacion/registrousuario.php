<?php
include 'presentacion/encabezado.php';
$error = 0;
if (isset($_POST['registrar'])) {
	$usuario = new Usuario("", $_POST['nombre'], $_POST['apellido'], $_POST['correo'], $_POST['clave']);
	$administrador = new Administrador("", "", "", $_POST['correo']);

	if (!$usuario->existeCorreo() && !$administrador->existeCorreo()) 
		$usuario->insertar();
}

?>

<div class="container">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card ">
				<div class="card-header bg-primary text-white">Registro usuario</div>
				<div class="card-body">
					<?php if (isset($_POST['registrar'])) { ?>
						<div class="alert alert-<?php echo ($error == 0) ? "success" : "danger" ?> alert-dismissible fade show" role="alert">
							<?php echo ($error == 0) ? "Registro exitoso" : $_POST['correo'] . " ya existe"; ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php } ?>
					<form method="post">
						<div class="form-group">
							<label>Nombre</label> <input name="nombre" type="text" class="form-control" placeholder="Digite Nombre" required="required">
						</div>
						<div class="form-group">
							<label>Apellido</label> <input name="apellido" type="text" class="form-control" placeholder="Digite Apellido" required="required">
						</div>
						<div class="form-group">
							<label>Correo</label> <input name="correo" type="email" class="form-control" placeholder="Digite Correo" required="required">
						</div>
					
						<div class="form-group">
							<label>Clave</label> <input name="clave" type="password" class="form-control" placeholder="Clave" required="required">
						</div>
						<div class="form-group">

							<button type="submit" name="registrar" id="registrar" class="btn btn-primary">Registrar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>