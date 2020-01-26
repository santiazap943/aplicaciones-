<?php
require 'logica/Persona.php';
require 'persistencia/AdministradorDAO.php';
class Administrador extends Persona{
    private $conexion;
    private $administradorDAO;
    
    function Administrador($id="", $nombre="", $apellido="", $correo="", $clave="", $estado=""){
        $this -> Persona($id, $nombre, $apellido, $correo, $clave, $estado);
        $this -> conexion = new Conexion();
        $this -> administradorDAO = new AdministradorDAO($id, $nombre, $apellido, $correo, $clave, $estado);
    }
    
    function autenticar(){
        $this -> conexion -> abrir();        
        $this -> conexion -> ejecutar($this -> administradorDAO -> autenticar());
        if($this -> conexion -> numFilas() == 1){
            $registro = $this -> conexion -> extraer();                        
            $this -> id = $registro[0];
            $this -> estado = $registro[1];
            $this -> conexion -> cerrar();
            return true;
        }else{
            $this -> conexion -> cerrar();
            return false;
        }
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> administradorDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> id = $registro[0];
        $this -> nombre = $registro[1];
        $this -> apellido = $registro[2];
        $this -> correo = $registro[3];
        $this -> estado = $registro[5];
        $this -> conexion -> cerrar();
    }
    
    function existeCorreo(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> administradorDAO -> existeCorreo());
        if($this -> conexion -> numFilas() == 1){
            $this -> conexion -> cerrar();
            return true;
        }else{
            $this -> conexion -> cerrar();
            return false;
        }
    }
    
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> administradorDAO -> consultarTodos());
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $registros[$i] = new Administrador($registro[0], $registro[1], $registro[2], $registro[3],"",$registro[4]);
        }
        return $registros;
    }
    
    function cambiarEstado() {
        $this -> conexion -> abrir();
        $this->conexion->ejecutar($this->administradorDAO -> cambiarEstado());
        $this -> conexion -> cerrar();
    }
}
