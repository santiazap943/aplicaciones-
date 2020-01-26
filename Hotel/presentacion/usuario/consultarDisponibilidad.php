<?php
include 'presentacion/menuus.php';
$hotel = new Hotel("","","","","",$_GET['idCiudad']);
$reserva = new Reserva($_GET['checkin'], $_GET['checkout'],$_GET['habitaciones']);
$hoteles = $hotel -> consultarCiudad();
$hotelesDisp = array();

$fecha1 = new DateTime($_GET["checkin"]);
$fecha2 = new DateTime($_GET["checkout"]);
$resultado = $fecha1->diff($fecha2);
$dias = $resultado->format('%r%a');
$precio=0;

foreach ($hoteles as $h){
    $habitacion = new Habitacion("", $h -> getId(),$_GET['habitaciones']);
    $h2 = $habitacion  -> consultarDisp();
    $habitTotal = count($h2);
    $reserva = new Reserva($_GET['checkin'], $_GET['checkout'],$_GET['habitaciones'], $h -> getId());
    $habitOcupadas = count($reserva ->  consultarDisp());
    $disp=$habitTotal - $habitOcupadas;
    if($disp != 0){
        array_push($hotelesDisp,$h);
    }

}
if(isset($_POST['reservar'])){
    $reservaing = new Reserva($_GET['checkin'], $_GET['checkout'],$_GET['habitaciones'],$_POST['reservar'],$_SESSION['id'] );
    $reservaing -> insertar();
    header("Location:index.php?pid=" . base64_encode("presentacion/usuario/crearReserva.php"));
}

?>
<br/>
<br/>
<div class="container">
    <div class="row">
		<div class="col-12">
        <?php
            foreach($hotelesDisp as $h){
                $habitacion = new Habitacion("", $h -> getId(),$_GET['habitaciones']);
                $h2 = $habitacion  -> consultarDisp();
                foreach($h2 as $x){
                    $precio = $dias * $x -> getPrecio();

                }
                
                echo "<div class='card'>";
                echo " <div class='card-group'>";
                echo " <div class='card-body col-8'>";
                echo " <h5 class='card-title text-primary'>". $h -> getNombre() ."</h5>";
                echo " <p class='card-text'>" . $h -> getDireccion() . "</p>";
                echo " </div>";
                echo " <div class='card-body col-xs-6 col-sm-6 col-md-3 text-right leftspan'>";
                echo " <p class='card-text'><strong>Precio total: $" . $precio . "</strong></p>";
                echo "<form method='post'>";
                echo "<button type='submit' name='reservar' value='". $h -> getId() ."' class='btn btn-primary'>Reservar</button>";
                echo "</form> </div>";
                echo " </div>";
            }
             ?>
             <br/>
             
    </div>
    </div>
    
</div>
