<?php
require 'persistencia/ventaDAO.php';
class Venta{
    private $idventa;
    private $nombre_cliente;
    private $fecha;
   
    private $conexion;
    private $ventaDAO;
    
    function Venta($idventa="", $nombre_cliente="", $fecha=""){
        $this -> idventa = $idventa;
        $this -> nombre_cliente = $nombre_cliente;
        $this -> fecha = $fecha;
        $this -> conexion = new Conexion();
        $this -> ventaDAO = new VentaDAO($idventa, $nombre_cliente, $fecha);
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ventaDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> idventa = $registro[0];
        $this -> nombre_cliente = $registro[1];
        $this -> fecha = $registro[2];
        $this -> conexion -> cerrar();
    }
    
    function insertar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ventaDAO -> insertar());
        $this -> conexion -> cerrar();
    }

    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ventaDAO -> consultarTodos());
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            
            $registro = $this -> conexion -> extraer();
            $registros[$i] = new venta($registro[0], $registro[1], $registro[2]);
        }
        return $registros;
    }
    function consultarMes($idmes){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ventaDAO -> consultarMes($idmes));
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $registros[$i] = new venta($registro[0], $registro[1], $registro[2]);
        }
        return $registros;
    }
    function consultarUltimo(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ventaDAO -> consultarUltimo());          
        $registro = $this -> conexion -> extraer();
        $registros = new venta($registro[0]);
        return $registros;
    }

    function actualizar($nombre){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ventaDAO -> actualizar($nombre));
        $this -> conexion -> cerrar();
    }

    function buscar($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ventaDAO -> buscar($filtro));
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer(); 
           $registros[$i] = new Venta($registro[0],$registro[1],$registro[2]);
        }
        return $registros;
    }

    function getId(){
        return $this -> idventa;
    }
    
    function getCliente(){
        return $this -> nombre_cliente;
    }
    
    function getFecha(){
        return $this -> fecha;
    }
}
