<?php
require 'persistencia/volumenDAO.php';
class Volumen{
    private $idvolumen;
    private $descripcion;
    private $conexion;
    private $volumenDAO;
    
    function Volumen($idvolumen="", $descripcion=""){
        $this -> idvolumen = $idvolumen;
        $this -> descripcion = $descripcion;
        $this -> conexion = new Conexion();
        $this -> volumenDAO = new VolumenDAO($idvolumen, $descripcion);
    }
     
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> volumenDAO -> consultarTodos());
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $registros[$i] = new Volumen($registro[0], $registro[1]);
        }
        return $registros;
    }
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> volumenDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> idvolumen = $registro[0];
        $this -> descripcion = $registro[1];
        $this -> conexion -> cerrar();
    }
    
    function getId(){
        return $this -> idvolumen;
    }
    function getDescripcion(){
        return $this -> descripcion;
    }
       
}
