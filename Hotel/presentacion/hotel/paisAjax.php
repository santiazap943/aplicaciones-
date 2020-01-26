<label>Ciudad</label> 
<?php
$pais = $_GET['pais'];
$ciudad = new ciudad("",$pais);
$ciudades = $ciudad -> consultarTodos();
if(count($ciudades)>0){
    echo "<select class='custom-select' name='ciudad' id='ciudad'>";
	    foreach ($ciudades as $e) {
            echo "<option value='" . $e -> getId() . "'>" . $e -> getNombre() . "</option>";
        }
        echo "</select>";
}

?>




