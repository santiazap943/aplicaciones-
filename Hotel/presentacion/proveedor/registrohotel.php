<?php
include 'presentacion/menupr.php';
$error = 0;
$pais = new Pais();
								
if (isset($_POST['registrar'])) {
	$proveedor = new Proveedor("", "", "", $_POST['correo'], "", "");
	$hotel = new Hotel("", $_POST['nombre'], $_POST['correo'], $_POST['direccion'], $_POST['habitaciones'], $_POST['ciudad'],$_SESSION['id']);
	$administrador = new Administrador("", "", "", $_POST['correo']);
	$usuario = new Usuario("", "", "", $_POST['correo']);

	if (!$administrador->existeCorreo()) {

		if (!$usuario->existeCorreo()) {

			if (!$proveedor->existeCorreo()) {

				if (!$hotel->existeCorreo()) {
					$hotel->insertar();
					header("Location:index.php?pid=" . base64_encode("presentacion/proveedor/registroHotel.php"));
				} else {
					$error = 1;
				}
			} else {
				$error = 1;
			}
		} else {
			$error = 1;
		}
	} else {
		$error = 1;
	}
}



?>
<div class="container">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card ">
				<div class="card-header bg-primary text-white">Registro hotel</div>
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
							<label>Correo</label> <input name="correo" type="email" class="form-control" placeholder="Digite Correo" required="required">
						</div>
						<div class="form-group">
							<label>Direccion</label> <input name="direccion" type="text" class="form-control" placeholder="Digite direccion">
						</div>
						<div class="form-group">
							<label>Cantidad de habitaciones</label> <input name="habitaciones" type="text" class="form-control" placeholder="# habitaciones">
							</div>
						
						<div class="form-group">
						<label>Pais</label> 
							<select class="form-control" id="pais" name="pais" >
								<?php
								$paises = $pais->consultarTodos();
								foreach ($paises as $p) {
									
									echo "<option value='" . $p->getId() . "'>" . $p->getNombre() . "</option>";
								}
								?>
							</select>
								</div>
								<div id="resultados"></div>

								<script type="text/javascript">
									$(document).ready(function() {
										$("#pais").on('click',function() {
											if ($("#pais").val() != "") {
												var ruta = "indexAjax.php?pid=<?php echo base64_encode("presentacion/hotel/paisAjax.php"); ?>&pais="+$("#pais").val();
												$("#resultados").load(ruta);
											}
										});
									});
								</script>
							</select>
						
							<div class="form-group">
									<br/>
								<button type="submit" name="registrar" id="registrar" class="btn btn-primary">Registrar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>