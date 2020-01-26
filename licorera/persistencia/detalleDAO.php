<?php
class DetalleDAO{
    private $iddetalle;
    private $idventa;
    private $idproducto;
    private $cantidad;
    private $precio;
    
    function DetalleDAO($iddetalle="", $idventa="", $idproducto="", $cantidad="", $precio=""){
        $this -> iddetalle = $iddetalle;
        $this -> idventa = $idventa;
        $this -> idproducto = $idproducto;
        $this -> cantidad = $cantidad;
        $this -> precio = $precio;
    }
    function consultar(){        
        return "select *
                from detalle d
                where d.detalle = '" . $this -> idetalle . "'";
    }
    function insertar(){
        return "insert into `detalle` (`idventa`, `idproducto`, `cantidad`, `precio`)
                values ('1', '" . $this -> idproducto . "', '" . $this -> cantidad . "', '" . $this -> precio ."')";
        }
    function consultarVenta(){
        return "select *
                from detalle d
                where d.idventa='".$this->idventa."'";
    }
    function actualizar($venta){
        return "update detalle
                set idventa='" . $venta ."'
                where idventa='1'";
    }
}?>