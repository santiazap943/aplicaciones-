<?php
$filtro = $_GET['producto'];
if($filtro != "-1"){
    $producto = new Producto();
    $productos = $producto -> buscar($filtro);
    if(count($productos)>0){
        echo "<div  class='list-group'>";
        foreach ($productos as $c){
            echo "<a id='c". $c->getId() ."' name='idproducto' value =". $c->getId() ." class='list-group-item list-group-item-action'> ". $c -> getNombre(). "    X". $c -> getVolumen() -> getDescripcion() ."</button>";
        }
        echo "</div>";
    }
}else{
    echo "";
}
?>

<script type="text/javascript">
$(document).ready(function(){
	<?php 
	   foreach ($productos as $c){
	       echo "$(\"#c" . $c -> getId() . "\").click(function(){\n";
	       echo "$(\"#producto\").val(\"" . $c -> getNombre() . "\");\n";	       
	       echo "$(\"#idproducto\").val(\"" . $c-> getId() . "\");\n";
	       echo "});\n";
	   }
	   //Aqui se oculta la lista.
	   foreach ($productos as $c){
	       echo "$(\"#c" . $c -> getId() . "\").click(function(){\n";
	       echo "$(\"#resultados\").hide();\n";	       
	       echo "});\n";
	   }
	   
	?>
});
	
</script>