<?php
class FacultadDAO {
    private $id;
    private $nombre;
    
    function FacultadDAO($id="", $nombre=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
    }    
      
    function consultar(){        
        return "select *
                from facultad f
                where f.idfacultad = '" . $this -> id . "'";
    }
}
?>