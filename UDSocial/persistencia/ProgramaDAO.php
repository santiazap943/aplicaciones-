<?php
class ProgramaDAO {
    private $id;
    private $nombre;
    private $facultad;
    
    function ProgramaDAO($id="", $nombre="", $facultad=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> facultad = $facultad;
    }    
      
    function consultar(){        
        return "select *
                from programa p
                where p.idprograma = '" . $this -> id . "'";
    }

    function consultarTodos(){
        return "select *
                from programa p";
    }
    function buscar($filtro){
        return "select idprograma, nombre
                from programa
                where nombre like '" . $filtro . "%' limit 5";
    }

}
?>