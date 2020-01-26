<?php
include 'presentacion/validacionAdministrador.php';
include 'presentacion/menuadmin.php';
$error = 0;
if (isset($_POST['registrar'])) {
	$producto = new Producto("",$_POST['nombre'], $_POST['precio'], $_POST['palcohol'],$_POST['stock'], $_POST['volumen']);
	$producto->insertar();
	header("Location:index.php?pid=" . base64_encode("presentacion/administrador/registrarProducto.php"));
	}

	?>
	<div class="container">
		<div class="row">
			<div class="col-3"></div>
			<div class="col-6">
				<div class="card ">
					<div class="card-header bg-primary text-white">Registro producto</div>
					<div class="card-body">
						<?php if (isset($_POST['registrar'])) { ?>
							<div class="alert alert-<?php echo ($error == 0) ? "success" : "danger" ?> alert-dismissible fade show" role="alert">
								<?php echo ($error == 0) ? "Registro exitoso" : $_POST['correo'] . " ya existe"; ?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						<?php } ?>
						<form method="post" autocomplete="off">
							<div class="form-group">
								<label>Nombre</label> <input name="nombre" type="text" class="form-control" placeholder="Digite Nombre" required="required" autocomplete="off">
							</div>
							<div class="form-group">
								<label>precio</label> <input name="precio" type="text" class="form-control" placeholder="Digite Precio" required="required">
							</div>
							<div class="form-group">
								<label>Disponibilidad</label> <input name="stock" type="text" class="form-control" placeholder="Digite Disponibilidad" required="required">
							</div>
							<div class="form-group">
								<label>Porcentaje de alcohol</label> <input name="palcohol" type="text" class="form-control" placeholder="Digite Numero" required="required">
							</div>
							<select class='custom-select' name='volumen' id='volumen'>
								<?php
								$volumen = new Volumen();
								$volumen = $volumen -> consultarTodos();
								foreach ($volumen as $v)
									echo "<option value='" . $v -> getId() . "'>" . $v -> getDescripcion() . "</option>";
								?>
								</select>
						</div>

								<button type="submit" name="registrar" id="registrar" class="btn btn-primary">Registrar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>