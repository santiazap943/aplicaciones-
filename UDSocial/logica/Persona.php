<?php
class Persona {
    protected $id;
    protected $nombre;
    protected $apellido;
    protected $correo;
    protected $clave;
    protected $estado;
    
    function getId(){
        return $this -> id;
    }
    
    function getNombre(){
        return $this -> nombre;
    }
    
    function getApellido(){
        return $this -> apellido;
    }
    
    function getCorreo(){
        return $this -> correo;
    }
    
    function getEstado(){
        return $this -> estado;
    }
    
    
    function Persona($id="", $nombre="", $apellido="", $correo="", $clave="", $estado=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> estado = $estado;
    } 
    
    
}