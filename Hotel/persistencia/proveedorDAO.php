<?php
class ProveedorDAO {
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $estado;

    
    function ProveedorDAO($id="", $nombre="", $apellido="", $correo="", $clave="",$estado=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> clave = $clave;  
        $this -> estado = $estado;     
    }    
    
    function autenticar(){
        return "select p.idproveedor, p.correo, p.clave
                from proveedor p
                where p.correo = '" . $this -> correo . "' and p.clave =   md5('".$this->clave."')  ";
    }
    
    function consultar(){        
        return "select *
                from proveedor p
                where p.idproveedor = '" . $this -> id . "'";
    }

    function existeCorreo(){
        return "select correo
                from proveedor
                where correo = '" . $this -> correo . "'";
    }

    function consultarTodos(){
        return "select idproveedor, nombre, apellido, correo, estado
                from proveedor";
    }
    
    function cambiarEstado() {
        return "update proveedor
                set estado= NOT estado 
                where idproveedor ='" . $this->id . "'";
    }

    function insertar(){
        return "insert into proveedor(nombre, apellido, correo, clave, estado) 
                values('" . $this -> nombre . "', '" . $this -> apellido."', '"
                . $this -> correo . "',  MD5('" . $this -> clave . "'), '0')";
    }
    function buscar($filtro){
        return "select idproveedor, nombre, apellido, correo, estado
                from proveedor
                where nombre like '" . $filtro . "%' or apellido like '" . $filtro . "%'";
    }
    function consultarClave(){
        return "select clave 
                from proveedor";
    }
    function actualizarClave($clave){
        return "update proveedor
                set clave=MD5('" . $clave. "')
                where idproveedor ='" . $this->id . "'";
    }
    
}
?>