<?php
 if ($_SESSION['rol']=="usuario"){
 include 'presentacion/menuus.php';}
 else if ($_SESSION['rol']=="proveedor"){
	include 'presentacion/menupr.php';
 }
if(isset($_POST['guardar'])){

$pass = md5($_POST['clave_actual']);
if($_POST['clave_nueva']==$_POST['clave_confir']){
    if($_SESSION['rol']=="usuario"){
        $usuario = new Usuario($_SESSION['id']);
        $usuario -> consultarClave();
        if($pass ==  $usuario -> getClave()){
			$usuario -> actualizarClave($_POST['clave_nueva']);
			$usuario -> fechaActualizacion();
			$error=0;			
			$pid = base64_encode("presentacion/sesionUsuario.php");
			header('Location: index.php?pid='. $pid);
}else $error=1;
}else if($_SESSION['rol']=="proveedor"){
	$proveedor= new Proveedor($_SESSION['id']);
	$proveedor -> consultarClave();
	if($pass ==  $proveedor -> getClave()){
		$proveedor -> actualizarClave($_POST['clave_nueva']);
		$error=0;			
		$pid = base64_encode("presentacion/sesionProveedor.php");
		header('Location: index.php?pid='. $pid);
}else $error=1;
}else $error=0;
}
}




?>


<div class="container">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card ">
				<div class="card-header bg-primary text-white">Cambiar clave</div>
				<div class="card-body">
					<?php if (isset($_POST['guardar'])) { ?>
						<div class="alert alert-<?php echo ($error == 0) ? "success" : "danger" ?> alert-dismissible fade show" role="alert">
							<?php echo ($error == 0) ? "Cambio exitoso" : "Datos incorrectos"; ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php } ?>
					<form method="post">
						
						<div class="form-group">
							<label>Clave actual</label> <input name="clave_actual" id="clave_actual" type="password" class="form-control" placeholder="Clave" required="required">
                        </div>
                        <div class="form-group">
							<label>Clave nueva</label> <input name="clave_nueva" id="clave_nueva" type="password" class="form-control" placeholder="Clave" required="required">
                        </div>
                        <div class="form-group">
							<label>Confirme clave</label> <input name="clave_confir" id="clave_confir" type="password" class="form-control" placeholder="Clave" required="required">
						</div>
						<div class="form-group">

                            <button type="submit" name="guardar" id="guardar" class="btn btn-primary">Guardar cambios</button>
                           
					</form>
				</div>
			</div>
		</div>
	</div>
</div>