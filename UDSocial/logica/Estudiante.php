<?php
require 'persistencia/EstudianteDAO.php';
class Estudiante extends Persona{
    private $codigo;
    private $foto;
    private $programa;
    private $conexion;
    private $estudianteDAO;
    
    function getCodigo(){
        return $this -> codigo;
    }
    
    function getFoto(){
        return $this -> foto;
    }
    
    function getPrograma(){
        return $this -> programa;
    }
    
    function Estudiante($id="", $nombre="", $apellido="", $correo="", $clave="",$codigo="",$foto="",$estado="",$programa=""){
        $this -> Persona($id, $nombre, $apellido, $correo, $clave, $estado);
        $this -> codigo = $codigo;
        $this -> foto = $foto;
        $this -> programa = $programa;
        $this -> conexion = new Conexion();
        $this -> estudianteDAO = new EstudianteDAO($id, $nombre, $apellido, $correo, $clave, $codigo, $foto, $estado, $programa);
    }
    
    function autenticar(){
        $this -> conexion -> abrir();        
        $this -> conexion -> ejecutar($this -> estudianteDAO -> autenticar());
        if($this -> conexion -> numFilas() == 1){
            $registro = $this -> conexion -> extraer();                        
            $this -> id = $registro[0];
            $this -> nombre = $registro[1];
            $this -> apellido = $registro[2];
            $this -> codigo = $registro[3];
            $this -> foto = $registro[4];
            $this -> programa = new Programa($registro[5]);
            $this -> programa -> consultar();
            $this -> conexion -> cerrar();
            return true;
        }else{
            $this -> conexion -> cerrar();
            return false;
        }
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> estudianteDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> id = $registro[0];
        $this -> nombre = $registro[1];
        $this -> apellido = $registro[2];
        $this -> correo = $registro[3];
        $this -> foto = $registro[6];
        $this -> estado = $registro[7];
        $this -> conexion -> cerrar();
    }
       
    function existeCorreo(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> estudianteDAO -> existeCorreo());
        if($this -> conexion -> numFilas() == 1){
            $this -> conexion -> cerrar();
            return true;
        }else{
            $this -> conexion -> cerrar();
            return false;
        }
    }
    
    function insertar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> estudianteDAO -> insertar());
        $this -> conexion -> cerrar();
    }
    
    function buscar($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> estudianteDAO -> buscar($filtro));
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $programa = new Programa($registro[6]);
            $programa -> consultar();            
            $registros[$i] = new Estudiante($registro[0], $registro[1], $registro[2], $registro[3],"",$registro[4],"",$registro[5],$programa);
        }
        return $registros;
    }
    
    function cambiarEstado() {
        $this -> conexion -> abrir();
        $this->conexion->ejecutar($this->estudianteDAO -> cambiarEstado());
        $this -> conexion -> cerrar();
    }
    
    function cambiarFoto() {
        $this -> conexion -> abrir();
        $this->conexion->ejecutar($this->estudianteDAO -> cambiarFoto());
        $this -> conexion -> cerrar();
    }
    
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> estudianteDAO -> consultarTodos());
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $programa = new Programa($registro[6]);
            $programa -> consultar();
            $registros[$i] = new Estudiante($registro[0], $registro[1], $registro[2], $registro[3],"",$registro[4],$registro[5],$registro[6],$programa);
        }
        return $registros;
    }
    
}
