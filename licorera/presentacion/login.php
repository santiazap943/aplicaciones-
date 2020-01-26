<?php
$correo = "";
if (isset($_POST['correo'])) {
	$correo = $_POST['correo'];
}
$clave = "";
if (isset($_POST['clave'])) {
	$clave = $_POST['clave'];
}
$error = 0;
$administrador = new Administrador("", "", "", $correo, $clave);
if (isset($_POST['autenticar'])) {


	if ($administrador->autenticar()) {

		$_SESSION['id'] = $administrador->getId();
		$_SESSION['rol'] = "administrador";
		$pid = base64_encode("presentacion/sesionAdministrador.php");
		header('Location: index.php?pid='. $pid);
	}
}
?>

<div class="container ">
	<div class="row row-centered">
		<div class="col-12"></div>
	</div>
	<div class="row">
		<div class="col-10">
			<div class="row">
				<div class="col-4">
				</div>
				<div class="col-6">
					<div class="card" style="background-color:rgba(236, 240, 241,1.0);">
						<div class="card-header text-white " style="background-color:rgba(44, 62, 80,1.0)">Autenticacion</div>
						<div class="card-body">
							<?php if ($error == 1) { ?>
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
									Error de correo o clave
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
							<?php } else if ($error == 2) { ?>
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
									Usuario inhabilitado
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
							<?php } ?>
							<form method="post">
								<div class="form-group">
									<label>Correo</label> <input name="correo" type="email" class="form-control" placeholder="Digite Correo" required="required">
								</div>
								<div class="form-group">
									<label>Clave</label> <input name="clave" type="password" class="form-control" placeholder="Clave" required="required">
								</div>
								<div class="col-10 text-center">
									<button type="submit" name="autenticar" class="btn btn-primary ">Autenticar</button>
									<br />
									<br />
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="col-8 text-center">
				<br /><br />

			</div>

		</div>
	</div>
</div>
