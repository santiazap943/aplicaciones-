<?php
require 'presentacion/menuadmin.php';
if (isset($_POST['finalizar'])) {
    $venta = new Venta("", $_POST['nombre'], date('y-m-d'));
    $venta->insertar();
    $detalle = new Detalle(1);
    $detalle->consultarVenta();
    $ventaul = new venta();
    $idventa = $ventaul -> consultarUltimo() ->  getId();
    echo $idventa;
    $detalle->actualizar($idventa); 
    $pid = base64_encode("presentacion/administrador/registrarVenta.php");
		header('Location: index.php?pid='. $pid);
}
?>
<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="card ">
                <div class="card-header bg-primary text-white">Registrar Compra</div>
                <div class="card-body">

                    <form method="post" autocomplete="off">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" class="form-control rounded-pill" placeholder="ingresa nombre" name="nombre" id="nombre">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="finalizar" id="finalizar" class="btn btn-primary">Terminar venta</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>