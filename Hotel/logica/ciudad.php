<?php
include 'persistencia/ciudadDAO.php';
include 'logica/pais.php';

class Ciudad{
private $idciudad;
private $idpais; 
private $nombre;
private $conexion;
private $ciudadDAO;

function Ciudad ($idciudad="",$idpais="",$nombre=""){
    $this -> idciudad = $idciudad;
    $this -> idpais = $idpais; 
    $this -> nombre = $nombre;
    $this -> conexion = new Conexion();
    $this -> ciudadDAO = new CiudadDAO($idciudad,$idpais,$nombre);
}
function consultar(){
    $this -> conexion -> abrir();
    $this -> conexion -> ejecutar($this -> ciudadDAO -> consultar());
    $registro = $this -> conexion -> extraer();
    $this -> nombre = $registro[0];   
    $this -> conexion -> cerrar();
}
function consultarTodos(){
    $this -> conexion -> abrir();
    $this -> conexion -> ejecutar($this -> ciudadDAO -> consultarTodos());
    $registros = array();
    for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
        $registro = $this -> conexion -> extraer();
        $f = new Pais($registro[1]);
        $f -> consultar();            
        $registros[$i] = new Ciudad($registro[0],$f, $registro[2]);
    }
    return $registros;
}
function buscar($filtro){
    $this -> conexion -> abrir();
    $this -> conexion -> ejecutar($this -> ciudadDAO -> buscar($filtro));
    $registros = array();
    for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
        $registro = $this -> conexion -> extraer();           
        $registros[$i] = new Ciudad($registro[0], $registro[1], $registro[2]);
    }
    return $registros;
} 
function getId(){
    return $this -> idciudad;
}

function getNombre(){
    return $this->nombre;
}
function getIdpais(){
    return $this -> idpais;
}
}
 ?>