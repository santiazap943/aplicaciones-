<?php
require 'persistencia/productoDAO.php';
class Producto{
    private $idproducto;
    private $nombre;
    private $precio;
    private $palcohol;
    private $stock;
    private $idvolumen;
    private $conexion;
    private $productoDAO;
    
    function Producto($idproducto="", $nombre="", $precio="",$palcohol="",$stock="", $idvolumen=""){
        $this -> idproducto = $idproducto;
        $this -> nombre = $nombre;
        $this -> precio = $precio;
        $this -> palcohol = $palcohol;
        $this -> stock = $stock;
        $this -> idvolumen = $idvolumen;
        $this -> conexion = new Conexion();
        $this -> productoDAO = new ProductoDAO($idproducto, $nombre, $precio,$palcohol,$stock, $idvolumen);
    }
    function insertar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> productoDAO -> insertar());
        $this -> conexion -> cerrar();
    }
    function restarStock($disponibilidad){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> productoDAO -> restarStock($disponibilidad));
        $this -> conexion -> cerrar();
    }
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> productoDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> idproducto = $registro[0];
        $this -> nombre = $registro[1];
        $this -> precio = $registro[2];
        $this -> palcohol = $registro[3];
        $this -> stock = $registro[4];
        $this -> idvolumen = $registro[5];
        $this -> conexion -> cerrar();
    }
    
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> productoDAO -> consultarTodos());
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){

            $registro = $this -> conexion -> extraer();
            $registros[$i] = new Producto($registro[0], $registro[1], $registro[2], $registro[3],$registro[4],$registro[5]);
        }
        return $registros;
    }
    function editarProducto(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> productoDAO -> editarProducto());
        $this -> conexion -> cerrar();
    }
    function buscar($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> productoDAO -> buscar($filtro));
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer(); 
            $volumen = new Volumen($registro[5]);
            $volumen -> consultar();
            $registros[$i] = new Producto($registro[0], $registro[1], $registro[2], $registro[3],$registro[4],$volumen);
        }
        return $registros;
    }
    function getId(){
        return $this -> idproducto;
    }
    function getNombre(){
        return $this -> nombre;
    }
    function getPrecio(){
        return $this -> precio;
    }
    
    function getPalcohol(){
        return $this -> palcohol;
    }
    function getStock(){
        return $this -> stock;
    }
    
    function getVolumen(){
        return $this -> idvolumen;
    }
}
