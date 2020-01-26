<?php

class CiudadDAO{
private $idciudad;
private $idpais; 
private $nombre;

function CiudadDAO ($idciudad="",$idpais="",$nombre=""){
    $this -> idciudad = $idciudad;
    $this -> idpais = $idpais; 
    $this -> nombre = $nombre;
}
function consultarTodos(){
    return "select * 
            from `ciudad`
            where idpais='".$this -> idpais."'";

}

function consultar(){
    return "select nombre
            from ciudad 
            where idciudad='".$this -> idciudad."'"; 

}
function buscar($filtro){
   return "select *
           from ciudad
           where nombre like '" . $filtro . "%'";
}
}
 ?>     