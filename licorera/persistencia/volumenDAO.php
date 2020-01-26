<?php
class VolumenDAO{
    private $idvolumen;
    private $descripcion;
    
    function VolumenDAO($idvolumen="", $descripcion=""){
        $this -> idvolumen = $idvolumen;
        $this -> descripcion = $descripcion;
       }
       function consultarTodos(){
        return "select *
                from volumen";
    }
    function consultar(){
        return "select * 
                from volumen
                where idvolumen='" . $this -> idvolumen ."'";
    }

}
?>