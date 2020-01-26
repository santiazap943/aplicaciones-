<?php
class PaisDAO {
    private $id;
    private $nombre;
    
    function PaisDAO($id="", $nombre=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
    }    
      
    function consultarTodos(){        
        return "select * 
                from pais";
    }
    function consultar(){
        return "select *
                from pais
                where idpais='".$this -> id . "'";
    }
}
?>