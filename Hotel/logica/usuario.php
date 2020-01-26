<?php
require 'persistencia/usuarioDAO.php';

class Usuario extends Persona{

    private $conexion;
    private $usuarioDAO;
    private $direccion;
    private $telefono;
    private $fecha_registro; 
    private $fecha_actualizacion;
    private $estado;


    function Usuario($id="", $nombre="", $apellido="", $correo="", $clave="",$fecha_registro="",$fecha_actualizacion="",$estado=""){
        $this -> Persona($id, $nombre, $apellido, $correo, $clave);
        $this -> fecha_registro = $fecha_registro;
        $this -> fecha_actualizacion = $fecha_actualizacion;
        $this -> estado = $estado;
        $this -> conexion = new Conexion();
        $this -> usuarioDAO = new UsuarioDAO($id, $nombre, $apellido, $correo, $clave); 
}

    function autenticar(){
        $this -> conexion -> abrir();        
        $this -> conexion -> ejecutar($this -> usuarioDAO -> autenticar());
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
        $this -> conexion -> ejecutar($this -> usuarioDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> id = $registro[0];
        $this -> nombre = $registro[1];
        $this -> apellido = $registro[2];
        $this -> correo = $registro[3];
        $this -> estado =  $registro[7];       
        $this -> conexion -> cerrar();
    }
    
    function existeCorreo(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> usuarioDAO -> existeCorreo());
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
        $this -> conexion -> ejecutar($this -> usuarioDAO -> insertar());
        $this -> conexion -> cerrar();
    }
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar ($this -> usuarioDAO -> consultarTodos());
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $registros[$i] = new Usuario($registro[0], $registro[1], $registro[2], $registro[3],"","","","",$registro[4],$registro[5]);
        }
        $this -> conexion ->cerrar();
        return $registros;
    }
    function editarPerfiL(){
        $this -> conexion -> abrir();
        $this -> conexion ->  ejecutar($this-> usuarioDAO -> editarPerfil());
        $this -> conexion -> cerrar();
    }  
    function buscar($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> usuarioDAO -> buscar($filtro));
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();           
            $registros[$i] = new Usuario($registro[0 ], $registro[1], $registro[2], $registro[3],"","",$registro[4],$registro[5]);
        }
        return $registros;
    } 
    function cambiarEstado() {
        $this -> conexion -> abrir();
        $this->conexion->ejecutar($this->usuarioDAO -> cambiarEstado());
        $this -> conexion -> cerrar();
    }
    function consultarClave(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> usuarioDAO -> consultarClave());
        $registro = $this -> conexion -> extraer();
        $this -> clave = $registro[0];
        $this -> conexion -> cerrar();
        return $this -> clave;
    }
    function actualizarClave($clave){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> usuarioDAO -> actualizarClave($clave));
        $this -> conexion -> cerrar();
    }
    function fechaActualizacion(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> usuarioDAO -> fechaActualizacion());
        $this -> conexion -> cerrar();
    }
    
    function getClave(){
        return $this -> clave;
    }

    function getDireccion(){
        return $this -> direccion;
    }
    function getTelefono(){
        return $this -> telefono;
    }
    function getEstado(){
        return $this -> estado;
    }
    function getFecha_actualizacion(){
        return $this -> fecha_actualizacion;
    }
    
}