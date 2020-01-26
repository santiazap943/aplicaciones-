<?php
require 'persistencia/FacultadDAO.php';
class Facultad {
    private $id;
    private $nombre;
    private $conexion;
    private $facultadDAO;
    
    function getNombre(){
        return $this -> nombre;
    }
    
    function Facultad($id="", $nombre=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> conexion = new Conexion();
        $this -> facultadDAO = new FacultadDAO($id, $nombre);
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> facultadDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> id = $registro[0];
        $this -> nombre = $registro[1];        
    }
}
?>
