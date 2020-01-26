<?php
class HabitacionDAO {
    private $numhabitacion;
    private $idhotel; 
    private $nummax;
    private $precio;
    
    function HabitacionDAO($numhabitacion="",$idhotel="",$nummax="",$precio=""){
        $this -> numhabitacion = $numhabitacion;
        $this -> idhotel = $idhotel; 
        $this -> nummax = $nummax;
        $this -> precio = $precio;
    }

    function insertar(){
     
        return "insert into habitacion(hotel_idhotel,capacidad, precio) 
                values('" . $this -> idhotel . "', '" . $this -> nummax."', '"
                . $this -> precio . "')";
    }
    function consultarTodos(){
        return "select * 
                from habitacion
                where hotel_idhotel='" . $this -> idhotel . "'";
    
    }
    function consultarDisp(){
        return "select *
                from habitacion
                where hotel_idhotel='" . $this -> idhotel . "' and capacidad='" . $this -> nummax . "'"; 
    }
}
?>