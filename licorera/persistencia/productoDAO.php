<?php
class ProductoDAO{
    private $idproducto;
    private $nombre;
    private $precio;
    private $palcohol;
    private $stock;
    private $idvolumen;
    
    function ProductoDAO($idproducto="", $nombre="", $precio="", $palcohol="",$stock="",$idvolumen=""){
        $this -> idproducto = $idproducto;
        $this -> nombre = $nombre;
        $this -> precio = $precio;
        $this -> palcohol = $palcohol;
        $this -> stock = $stock;
        $this -> idvolumen = $idvolumen;
    }
    function consultar(){        
        return "select *
                from producto p
                where p.idproducto = '" . $this -> idproducto . "'";
    }
    function insertar(){
        return "insert into `producto` (`nombre`, `precio`, `palcohol`,`stock`, `idvolumen`) 
                values ('" . $this -> nombre . "', '" . $this -> precio . "', '" . $this -> palcohol . "', '" . $this -> stock . "', '" . $this -> idvolumen . "')";
    }
    function consultarTodos(){
        return "select *
                from producto";
    }
    function editarProducto(){
        return "update producto
                set nombre='" . $this -> nombre . "', precio='" . $this -> precio . "',
                palcohol='" . $this -> palcohol . "', stock='" . $this -> stock ."', idvolumen='" . $this -> idvolumen ."'
                where idproducto='" . $this -> idproducto . "'";
    }
    function buscar($filtro){
        return "select *
                from producto
                where nombre like '" . $filtro . "%'";
    }
    function restarStock($disponibilidad){
        return "update producto
                set stock='" . $disponibilidad ."'
                where idproducto='" . $this -> idproducto ."'";
    }

}
?>