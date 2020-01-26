<?php
require 'persistencia/detalleDAO.php';
class Detalle{
    private $iddetalle;
    private $idventa;
    private $idproducto;
    private $cantidad;
    private $precio;
    private $conexion;
    private $detalleDAO;
    
    function Detalle($iddetalle="", $idventa="", $idproducto="", $cantidad="", $precio=""){
        $this -> iddetalle = $iddetalle;
        $this -> idventa = $idventa;
        $this -> idproducto = $idproducto;
        $this -> cantidad = $cantidad;
        $this -> precio = $precio;
        $this -> conexion = new Conexion();
        $this -> detalleDAO = new DetalleDAO($iddetalle, $idventa, $idproducto, $cantidad, $precio);
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> detalleDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> iddetalle = $registro[0];
        $this -> idventa = $registro[1];
        $this -> idproducto = $registro[2];
        $this -> cantidad = $registro[3];
        $this -> precio = $registro[4];
        $this -> conexion -> cerrar();
    }
    function insertar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> detalleDAO -> insertar());
        echo $this -> detalleDAO -> insertar();
        $this -> conexion -> cerrar();
    }
    function consultarVenta(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> detalleDAO -> consultarVenta());
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $producto = new producto($registro[2]);
            $producto -> consultar();
            $registros[$i] = new detalle($registro[0],$registro[1], $producto , $registro[3],$registro[4]);
        }
        return $registros;
    }
    function consultarVenta2(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> detalleDAO -> consultarVenta());
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $registros[$i] = new detalle($registro[0],$registro[1],$registro[2] , $registro[3],$registro[4]);
        }
        return $registros;
    }
    function actualizar($venta){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> detalleDAO -> actualizar($venta));
        $this -> conexion -> cerrar();
    }
    function getProducto(){
        return $this -> idproducto;
    }
    function getCantidad(){
        return $this -> cantidad;
    }
    function getPrecio(){
        return $this -> precio;
    }
    
}
