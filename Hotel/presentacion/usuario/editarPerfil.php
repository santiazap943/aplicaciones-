<?php
require 'presentacion/menuus.php';
$usuario = new Usuario($_SESSION['id']);
if (isset($_POST['Editar'])) {
	$usuarioEdit = new Usuario($_SESSION['id'], $_POST['nombre'], $_POST['apellido'], $_POST['correo']);
	$usuarioEdit -> editarPerfiL();
	$usuarioEdit -> fechaActualizacion();
	header("Location: index.php?pid=" . base64_encode("presentacion/usuario/editarPerfil.php") );
}
$registros = $usuario->consultar();
?>
<div class="container">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card ">
				<div class="card-header bg-primary text-white">Editar perfil</div>
				<div class="card-body">

					<form method="post">
						<div class="form-group">
							<label>Nombre</label> <input name="nombre" type="text" class="form-control" value=" <?php echo $usuario->getNombre() ?>" required="required">
						</div>
						<div class="form-group">
							<label>Apellido</label> <input name="apellido" type="text" class="form-control" value=" <?php echo $usuario->getApellido() ?>" required="required">
						</div>
						<div class="form-group">
							<label>Correo</label> <input name="correo" type="email" class="form-control" value=" <?php echo $usuario->getCorreo() ?>" required="required">
						</div>
						
						<button type="submit" name="Editar" id="Editar" class="btn btn-primary">Guardar cambios</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>