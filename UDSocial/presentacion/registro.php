<?php
include 'presentacion/encabezado.php';
$error = 0;
if(isset($_POST['registrar'])){
    $estudiante = new Estudiante("", $_POST['nombre'], $_POST['apellido'], $_POST['correo'], $_POST['clave'], "", "", $_POST['programa'] );
    $administrador = new Administrador("", "", "", $_POST['correo']);
    if (!$estudiante -> existeCorreo() && !$administrador -> existeCorreo()){
        $estudiante -> insertar();
    }else{
        $error = 1;
    }
}

?>
<div class="container">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card ">
				<div class="card-header bg-primary text-white">Registro Estudiante UD</div>
				<div class="card-body">
					<?php if (isset($_POST['registrar'])) { ?>
					<div class="alert alert-<?php echo ($error==0) ? "success" : "danger" ?> alert-dismissible fade show"
						role="alert">
						<?php echo ($error==0) ? "Registro exitoso" : $_POST['correo'] . " ya existe"; ?>
						<button type="button" class="close" data-dismiss="alert"
							aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form method="post" action="index.php?pid=<?php echo base64_encode("presentacion/registro.php") ?>">
						<div class="form-group">
							<label>Nombre</label> <input name="nombre" type="text"
								class="form-control" placeholder="Digite Nombre"
								required="required">
						</div>
						<div class="form-group">
							<label>Apellido</label> <input name="apellido" type="text"
								class="form-control" placeholder="Digite Apellido"
								required="required">
						</div>
						<div class="form-group">
							<label>Correo</label> <input name="correo" type="email"
								class="form-control" placeholder="Digite Correo"
								required="required">
						</div>
						<div class="form-group">
							<label>Clave</label> <input name="clave" type="password"
								class="form-control" placeholder="Clave" required="required">
						</div>
						<div class="form-group">
							<label>Programa</label> 
							<input name="programa" id="programa" type="text" class="form-control" required="required">
							<input name="idPrograma" id="idPrograma" type="hidden" class="form-control">
							<div id="resultados"></div>
						</div>
						<button type="submit" name="registrar" class="btn btn-primary">Registrar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$("#programa").keyup(function(){
		if($("#programa").val()!=""){
			var ruta = "indexAjax.php?pid=<?php echo base64_encode("presentacion/registroAjax.php"); ?>&programa="+$("#programa").val();
			$("#resultados").load(ruta);
		}
	});
 	$("#programa").focusout(function(){
		var ruta = "indexAjax.php?pid=<?php echo base64_encode("presentacion/registroAjax.php"); ?>&programa=-1";
 		$("#resultados").load();
 	});
});
</script>

