<?php
$filtro = $_GET['programa'];
if($filtro != "-1"){
    $programa = new Programa();
    $programas = $programa -> buscar($filtro);
    if(count($programas)>0){
        echo "<div class='list-group'>";
        foreach ($programas as $p){
            echo "<button type='button' id='p". $p->getId() ."' class='list-group-item list-group-item-action'> ". $p -> getNombre(). "</button>";
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
	   foreach ($programas as $p){
	       echo "$(\"#p" . $p -> getId() . "\").click(function(){\n";
	       echo "$(\"#programa\").val(\"" . $p -> getNombre() . "\");\n";	       
	       echo "$(\"#idPrograma\").val(\"" . $p -> getId() . "\");\n";
	       echo "});\n";
	   }
	?>
});
</script>


