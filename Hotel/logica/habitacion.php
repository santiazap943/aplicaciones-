<?php
require 'persistencia/habitacionDAO.php';

class Habitacion{
    private $numhabitacion;
    private $idhotel; 
    private $nummax;
    private $precio;
    private $habitacionDAO;
    private $conexion;

    function getId(){
        return $this -> numhabitacion;
    }
    
    function getHotel(){
        return $this -> idhotel;
    }

    function getNummax(){
        return $this -> nummax;
    }

    function getPrecio(){
        return $this -> precio;
    }

    function Habitacion($numhabitacion="",$idhotel="",$nummax="",$precio=""){
        $this -> numhabitacion = $numhabitacion;
        $this -> idhotel = $idhotel; 
        $this -> nummax = $nummax;
        $this -> precio = $precio;
        $this -> conexion = new Conexion();
        $this -> habitacionDAO = new HabitacionDAO ($numhabitacion,$idhotel,$nummax,$precio);
    }

    function insertar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> habitacionDAO -> insertar());
        $this -> conexion -> cerrar();
    }

    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> habitacionDAO -> consultarTodos());
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $hotel = new Hotel ($registro[1]);
            $hotel -> consultar();
            $registros[$i] = new Habitacion($registro[0], $hotel, $registro[2],$registro[3]);
        }
        return $registros;
    }
    function consultarDisp(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> habitacionDAO -> consultarDisp());
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $registros[$i] = new Habitacion($registro[0],$registro[1],$registro[2],$registro[3]);
        }
        return $registros;
    }
}
?>