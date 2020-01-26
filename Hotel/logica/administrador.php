<?php
require 'logica/persona.php';
require 'persistencia/administradorDAO.php';
class Administrador extends Persona{
    private $conexion;
    private $administradorDAO;
    
    function Administrador($id="", $nombre="", $apellido="", $correo="", $clave=""){
        $this -> Persona($id, $nombre, $apellido, $correo, $clave);
        $this -> conexion = new Conexion();
        $this -> administradorDAO = new AdministradorDAO($id, $nombre, $apellido, $correo, $clave);
    }
    
    function autenticar(){
        
        $this -> conexion -> abrir();        
        $this -> conexion -> ejecutar($this -> administradorDAO -> autenticar());
        if($this -> conexion -> numFilas() == 1){
            $registro = $this -> conexion -> extraer();                        
            $this -> id = $registro[0];
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
    function consultarClave(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> administradorDAO -> consultarClave());
        $registro = $this -> conexion -> extraer();
        $this -> clave = $registro[0];
        $this -> conexion -> cerrar();
        return $this -> clave;
    }
    
}
