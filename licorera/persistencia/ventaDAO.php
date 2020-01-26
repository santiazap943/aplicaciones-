<?php
class VentaDAO{
    private $idventa;
    private $nombre_cliente;
    private $fecha;
    
    function VentaDAO($idventa="", $nombre_cliente="", $fecha=""){
        $this -> idventa = $idventa;
        $this -> nombre_cliente = $nombre_cliente;
        $this -> fecha = $fecha;
    }
    function consultarTodos(){
        return "select *
                from venta";
    }
    function consultar(){        
        return "select *
                from venta v
                where v.idventa = '" . $this -> idventa . "'";
    }
    function insertar(){
        return "insert into `venta` (`nombre_cliente`, `fecha`)
                values ('" . $this -> nombre_cliente . "', '" . $this -> fecha . "')";
    }
    function consultarUltimo(){
        return "select idventa from venta order by idventa desc limit 1";
    }
    function actualizar($nombre){
        return "update venta
                set nombre_cliente='" . $nombre ."'
                where idventa='" . $this -> idventa ."'";
    }
    function buscar($filtro){
        return "select *
                from venta
                where nombre_cliente like '" . $filtro . "%' or fecha like '" . $filtro . "%'";
    }
    function consultarMes($idmes){
        return "select * from venta where month(fecha) ='" . $idmes . "'";
    }
}
?>
