<?php
require 'persistencia/ProgramaDAO.php';
class Programa {
    private $id;
    private $nombre;
    private $facultad;
    private $conexion;
    private $programaDAO;
    
    public function getId(){
        return $this -> id;
    }
    
    function getNombre(){
        return $this -> nombre;
    }
    
    function getFacultad(){
        return $this -> facultad;
    }
    
    function Programa($id="", $nombre="", $facultad=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> facultad = $facultad;
        $this -> conexion = new Conexion();
        $this -> programaDAO = new ProgramaDAO($id, $nombre, $facultad);
    }
    
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> programaDAO -> consultarTodos());
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $f = new Facultad($registro[2]);
            $f -> consultar();            
            $registros[$i] = new Programa($registro[0], $registro[1], $f);
        }
        return $registros;
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> programaDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> id = $registro[0];
        $this -> nombre = $registro[1];
        $this -> facultad = new Facultad($registro[2]);
        $this -> facultad -> consultar();
        $this -> conexion -> cerrar();
    }
    
    function buscar($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> programaDAO -> buscar($filtro));
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $registros[$i] = new Programa($registro[0], $registro[1]);
        }
        return $registros;
    }
}
?>
