<?php
class EstudianteDAO {
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $codigo;
    private $foto;
    private $programa;
    
    
    function EstudianteDAO($id="", $nombre="", $apellido="", $correo="", $clave="",$codigo="",$foto="",$programa=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> codigo = $codigo;
        $this -> foto = $foto;
        $this -> programa = $programa;
    }    
    
    function autenticar(){
        return "select *
                from estudiante e
                where e.correo = '" . $this -> correo . "' and e.clave = '" . md5($this->clave) . "'";
    }
    
    function consultar(){        
        return "select *
                from estudiante e
                where e.idestudiante = '" . $this -> id . "'";
    }
    function insertar(){
        return "insert into estudiante(nombre, apellido, correo, clave, programa_idprograma) 
                values('" . $this -> nombre . "', '" . $this -> apellido."', '"
                . $this -> correo . "', '" . md5($this -> clave) . "', '" . $this -> programa . "')";
    }
    
    function existeCorreo(){
        return "select correo 
                from estudiante 
                where correo = '" . $this -> correo . "'";
    }

    function buscar($filtro){
        return "select idestudiante, nombre, apellido, correo, codigo, estado, programa_idprograma
                from estudiante
                where nombre like '" . $filtro . "%' or apellido like '" . $filtro . "%'";
    }
    
    function cambiarEstado() {
        return "update estudiante
                set estado = NOT estado 
                where idestudiante ='" . $this->id . "'";
    }

    function cambiarFoto() {
        return "update estudiante
                set foto = '" . $this -> foto . "'
                where idestudiante ='" . $this -> id . "'";
    }

    function consultarTodos(){
        return "select idestudiante, nombre, apellido, correo, codigo, foto, estado, programa_idprograma
                from estudiante";
    }
    
}
?>