<?php
require 'presentacion/menuadmin.php';
$producto = new producto($_GET['idproducto']);
if (isset($_POST['Editar'])) {
	$productoEdit = new Producto($_GET['idproducto'], $_POST['nombre'], $_POST['precio'],$_POST['palcohol'],$_POST['stock'], $_POST['volumen']);
	$productoEdit -> editarProducto();
	//header("Location: index.php?pid=" . base64_encode("presentacion/administrador/editarProducto.php") . "&idproducto=" . $productoEdit -> getId() );
}
$registros = $producto->consultar();
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
							<label>Nombre</label> <input name="nombre" type="text" class="form-control" value="<?php echo $producto->getNombre() ?>" required="required">
						</div>
						<div class="form-group">
							<label>precio</label> <input name="precio" type="text" class="form-control" value="<?php echo $producto->getPrecio() ?>" required="required">
						</div>
						<div class="form-group">
							<label>Disponibilidad</label> <input name="stock" type="text" class="form-control" value="<?php echo $producto->getStock() ?>" required="required">
						</div>
                        
                        <div class="form-group">
							<label>porcentaje de alcohol</label> <input name="palcohol" type="text" class="form-control" value="<?php echo $producto->getPalcohol() ?>" required="required">
						</div>
                        <div class="form-group">
								<label>Tamaño</label> 
        						<select class='custom-select' name='volumen' id='volumen'>
								<?php
								$volumen = new Volumen();
								$volumen = $volumen -> consultarTodos();
								foreach ($volumen as $v)
									echo "<option value='" . $v -> getId() . "'>" . $v -> getDescripcion() . "</option>";
								?>
								</select>
						</div>
						<button type="submit" name="Editar" id="Editar" class="btn btn-primary">Guardar cambios</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>