<?php

class UsuarioDAO {
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $fecha_registro; 
    private $fecha_actualizacion;
    private $estado;

function UsuarioDAO($id="", $nombre="", $apellido="", $correo="", $clave="", $fecha_registro="",$fecha_actualizacion="",$estado=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> clave = $clave;     
        $this -> fecha_registro = $fecha_registro;
        $this -> fecha_actualizacion = $fecha_actualizacion;
        $this -> estado = $estado;
    }    
    
    function autenticar(){
        return "select a.idusuario, a.estado
                from usuario a
                where a.correo = '" . $this -> correo . "' and a.clave = md5('" . $this->clave . "')";
    }
    
    function consultar(){        
        return "select *
                from usuario a
                where a.idusuario = '" . $this -> id . "'";
    }
    function insertar(){
        return "insert into `usuario` (`idusuario`, `nombre`, `apellido`, `correo`, `clave`,`fecha_registro`,`estado`) 
                values (NULL, '" . $this -> nombre . "', '" . $this -> apellido . "', '" . $this -> correo . "', MD5('" . $this -> clave . "'),'" . date('y-m-d') . "', ' 0')";
    }
    function existeCorreo(){
        return "select correo
                from usuario
                where correo = '" . $this -> correo . "'";
    }
    function consultarTodos(){
        return "select idusuario, nombre, apellido, correo, fecha_actualizacion, estado
                from usuario";
    }
    
    function editarPerfil(){
        return "update usuario
                set nombre='" . $this -> nombre . "', apellido='" . $this -> apellido . "', correo='" . $this -> correo . "'
                where idusuario ='" . $this->id . "'" ;
}
    function buscar($filtro){
        return "select idusuario, nombre, apellido, correo, fecha_actualizacion, estado
                from usuario
                where nombre like '" . $filtro . "%' or apellido like '" . $filtro . "%'";
    }
    function cambiarEstado() {
        return "update usuario
                set estado = NOT estado 
                where idusuario ='" . $this->id . "'";
    }
    function consultarClave(){
        return "select clave 
                from usuario";
    }
    function actualizarClave($clave){
        return "update usuario
                set clave=MD5('" . $clave. "')
                where idusuario ='" . $this->id . "'";
    }
    function fechaActualizacion(){
        return "update usuario
                set fecha_actualizacion='" . date('y-m-d') . "'
                where idusuario ='" . $this->id . "'";
    }
    
}
