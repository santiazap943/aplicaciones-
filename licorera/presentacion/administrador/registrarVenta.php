<?php
require 'presentacion/menuadmin.php';
if (isset($_POST['carrito'])) {
    $producto = new Producto($_POST['idproducto']);
    $producto->consultar();
    $disponibilidad = $producto -> getStock() - $_POST['cantidad'];
    if($disponibilidad >0){
    $precio = $_POST['cantidad'] * $producto->getPrecio();
    $detalle = new Detalle("","", $_POST['idproducto'], $_POST['cantidad'], $precio);
    $detalle->insertar();
    $producto -> restarStock($disponibilidad);
    }
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
                            <label>Producto</label>
                            <input type="text" class="form-control rounded-pill" placeholder="ingresa Producto" name="producto" id="producto">
                        </div>
                        <input name="idproducto" id="idproducto" type="hidden" class="form-control ">
                        <div id="resultados"></div>
                </div>
                <div class="form-group">
                    <label>Cantidad</label> <input name="cantidad" id="cantidad" type="text" class="form-control" placeholder="Digite cantidad" required="required">
                </div>
                <div class="form-group">
                    <button type="submit" name="carrito" id="carrito" class="btn btn-primary">Añadir al carrito</button>
                    </div>
                    <div class="form-group">
                        <a name="finalizar" id="finalizar" href='index.php?pid=<?php echo base64_encode("presentacion/administrador/terminarVenta.php");?>' class="btn btn-primary">Ternimar venta</a>
                </div>
                </form>

            <?php
            $detalle = new Detalle("",1);
            $detalles = $detalle-> consultarVenta();
            if (count($detalles) > 0) {
                ?>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        }
                        foreach($detalles as $d){
                            echo "<tr>";
                            echo "<td>" . $d -> getProducto() -> getNombre() . "</td>";
                            echo "<td>" . $d -> getCantidad() . "</td>";
                            echo "<td>" . $d -> getPrecio() . "</td>";

                        }

                        ?>
                        </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#producto").keyup(function() {
                if ($("#producto").val() != "") {
                    var ruta = "indexAjax.php?pid=<?php echo base64_encode("presentacion/administrador/consultarproductoventaAjax.php"); ?>&producto=" + $("#producto").val();
                    $("#resultados").load(ruta);
                }
            });
            $("#producto").focusout(function() {
                var ruta = "indexAjax.php?pid=<?php echo base64_encode("presentacion/administrador/consultarproductoventaAjax.php"); ?>&producto=-1";
                $("#resultados").load();
            });

        });
    </script>