<?php
require 'persistencia/proveedorDAO.php';
class Proveedor extends Persona{
    private $estado;
    private $conexion;
    private $proveedorDAO;
    
    function Proveedor($id="", $nombre="", $apellido="", $correo="", $clave="", $estado=""){
        $this -> Persona($id, $nombre, $apellido, $correo, $clave); 
        $this -> estado = $estado;    
        $this -> conexion = new Conexion();
        $this -> proveedorDAO = new ProveedorDAO($id, $nombre, $apellido, $correo, $clave, $estado);
    }

    function autenticar(){
        $this -> conexion -> abrir();        
        $this -> conexion -> ejecutar($this -> proveedorDAO -> autenticar());
        if($this -> conexion -> numFilas() == 1 ){
            $registro = $this -> conexion -> extraer();                        
            $this -> id = $registro[0];
            $this -> nombre = $registro[1];
            $this -> apellido = $registro[2];
            $this -> correo = $registro[3];
            $this -> estado = $registro[5];
            $this -> conexion -> cerrar();
            return true;
        }else{
            
            $this -> conexion -> cerrar();
            return false;
        }
    }   
    
    function existeCorreo(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> proveedorDAO -> existeCorreo());
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
        $this -> conexion -> ejecutar($this -> proveedorDAO -> insertar());
        $this -> conexion -> cerrar();
    }

    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> proveedorDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> id = $registro[0];
        $this -> nombre = $registro[1];
        $this -> apellido = $registro[2];
        $this -> correo = $registro[3];
        $this -> estado = $registro[5];
        $this -> conexion -> cerrar();
    }

    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar ($this -> proveedorDAO -> consultarTodos());
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $registros[$i] = new Proveedor ($registro[0], $registro[1], $registro[2], $registro[3], "", $registro [5]);
        }
        return $registros;
    }

    function cambiarEstado() {
        $this -> conexion -> abrir();
        $this -> conexion ->  ejecutar($this -> proveedorDAO -> cambiarEstado());
        $this -> conexion -> cerrar();
    }

    function actualizar(){
        $this -> conexion -> abrir();
        $this -> conexion ->  ejecutar($this-> proveedorDAO -> actualizar());
        $datos = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $dato = $this -> conexion -> extraer();
            $datos[$i] = new Proveedor ($dato[0], $dato[1], $dato[2], $dato[3], "", $dato [4]);
        }
        return $datos;
    }
    function buscar($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> proveedorDAO -> buscar($filtro));
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();           
            $registros[$i] = new Proveedor($registro[0], $registro[1], $registro[2], $registro[3],"",$registro[4]);
        }
        return $registros;
    } 
    function consultarClave(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> proveedorDAO -> consultarClave());
        $registro = $this -> conexion -> extraer();
        $this -> clave = $registro[0];
        $this -> conexion -> cerrar();
        return $this -> clave;
    }
    function actualizarClave($clave){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> proveedorDAO -> actualizarClave($clave));
        $this -> conexion -> cerrar();
    }
    function getClave(){
        return $this -> clave;
    }
    function getEstado(){
        return $this -> estado;
    }
    

}
?>