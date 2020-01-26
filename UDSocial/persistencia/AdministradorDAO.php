<?php
class AdministradorDAO {
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $estado;
    
    function AdministradorDAO($id="", $nombre="", $apellido="", $correo="", $clave="", $estado=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> estado = $estado;        
    }    
    
    function autenticar(){
        return "select a.idadministrador, a.estado
                from administrador a
                where a.correo = '" . $this -> correo . "' and a.clave = '" . md5($this->clave) . "'";
    }
    
    function consultar(){        
        return "select *
                from administrador a
                where a.idadministrador = '" . $this -> id . "'";
    }

    function existeCorreo(){
        return "select correo
                from administrador
                where correo = '" . $this -> correo . "'";
    }

    function consultarTodos(){
        return "select idadministrador, nombre, apellido, correo, estado
                from administrador";
    }
    
    function cambiarEstado() {
        return "update administrador
                set estado='" . $this->estado . "' 
                where idadministrador ='" . $this->id . "'";
    }
    
}
?>