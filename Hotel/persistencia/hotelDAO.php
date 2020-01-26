<?php
class HotelDAO
{
    private $idhotel;
    private $nombre;
    private $correo;
    private $direccion;
    private $habitacionesdisp;
    private $ciudad;
    private $proveedor;

    function HotelDAO($idhotel = "", $nombre = "", $correo = "", $direccion = "", $habitacionesdisp = "",$ciudad = "", $proveedor = "")
    {

        $this -> idhotel = $idhotel;
        $this -> nombre = $nombre;
        $this -> correo = $correo;
        $this -> direccion = $direccion;
        $this -> habitacionesdisp = $habitacionesdisp;
        $this -> ciudad = $ciudad;
        $this -> proveedor = $proveedor;
    }

    function insertar()
    {
        return " insert into `hotel` (`nombre`, `correo`, `direccion`,`habitaciones_disponibles`,`idciudad`, `idproveedor`) 
                values ('" . $this->nombre . "', '" . $this->correo . "', '"
                    . $this->direccion . "', '" . $this->habitacionesdisp . "', '" . $this->ciudad . "', '" . $this->proveedor . "')";
                    
                }
    function existeCorreo()
    {
        return "select correo
                from hotel
                where correo = '" . $this->correo . "'";
    }
    function consultar()
    {
        return "select *
                from hotel a
                where a.idhotel = '" . $this->idhotel . "'";
    }

    function consultarTodos()
    {
        return "select idhotel, nombre , correo  , direccion , habitaciones_disponibles
         , idciudad
                from hotel";
    }
    function consultarProveedor($filtro)
    {
        return "select *
                from hotel a
                where a.idproveedor = '" . $this->proveedor . "' and nombre like '" . $filtro . "%' ";
    }

    function editarPerfil()
    {
        return "update hotel
                set nombre='" . $this->nombre . "', correo='" . $this->correo .
            "', direccion='" . $this->direccion . "', cantidad_habitaciones='" . $this->habitaciones .
            "', valor_habitacion='" . $this->precio . "'   
                where idhotel ='" . $this->idhotel . "'";
    }
    function buscar($filtro){
        return "select *
                from hotel
                where nombre like '" . $filtro . "%'";
    }
    function consultarCiudad(){
        return "select * 
                from hotel 
                where idciudad='" . $this -> ciudad . "'";
    }
}
