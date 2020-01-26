<?php
$venta = new Venta();
$ventaNueva = $venta -> consultarUltimo() -> getId();
$ventaNueva = $ventaNueva + 1;
$detalles = array();
if(isset($_POST['carrito'])){
    $producto = new Producto($_POST['idproducto']);
    $producto -> consultar();
    echo  $_POST['can'];
    $precio = $producto -> getPrecio() ;
    $detalle = new Detalle("",$ventaNueva,$producto -> getId(),$_POST['can'],$precio);
    $detalle -> insertar();
    array_push($detalles,$detalle);
}
if(isset($_POST['finalizar'])){
    $venta = new Venta("",$_POST['nombre'],date('y-m-d'));
    $venta -> insertar();
    foreach($detalles as $d){
        $d -> insertar();
    }
}
?>

<div class="form-group">
						    <label>Producto</label>
						    <input type="text" class="form-control rounded-pill" placeholder="ingresa Producto"name="producto" id="producto">
                        </div>
						<input name="idproducto" id="idproducto" type="hidden" class="form-control ">
						<div id="resultados"></div>
						</div>
						<div class="form-group">
							<label>Cantidad</label> <input name="can" id="can" type="text" class="form-control" placeholder="Digite cantidad" required="required">
							</div>
						<div class="col">
                        <label></label><br/>
                        <button type="submit" name="carrito" id="carrito" class="btn btn-primary">Añadir al carrito</button>
                        <button type="submit" name="finalizar" id="finalizar" class="btn btn-primary">Ternimar venta</button>
						</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("#producto")
        
        
        
        
        
        
        .keyup(function(){
            if($("#producto").val()!=""){
                var ruta = "indexAjax.php?pid=<?php echo base64_encode("presentacion/administrador/consultarproductoventaAjax.php"); ?>&producto="+$("#producto").val();
                $("#resultados").load(ruta);
            }
        });
        $("#producto").focusout(function(){
            var ruta = "indexAjax.php?pid=<?php echo base64_encode("presentacion/administrador/consultarproductoventaAjax.php"); ?>&producto=-1";
            $("#resultados").load();
        });
        
    });
</script>

