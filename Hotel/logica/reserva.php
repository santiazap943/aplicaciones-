<?php
require 'persistencia/reservaDAO.php';

class Reserva{
  private $fecha_entrada;
  private $fecha_salida;
  private $cantidad_personas;
  private $hotel_idhotel;
  private $usuario_idusuario;
  private $reservaDAO;
  private $conexion;

  function Reserva($fecha_entrada="", $fecha_salida="",$cantidad_personas="",$hotel_idhotel="",$usuario_idusuario=""){
    $this -> fecha_entrada = $fecha_entrada;
    $this -> fecha_salida = $fecha_salida;
    $this -> cantidad_personas = $cantidad_personas	;
    $this -> hotel_idhotel = $hotel_idhotel;
    $this -> usuario_idusuario = $usuario_idusuario;
    $this -> conexion = new Conexion();
    $this -> reservaDAO = new ReservaDAO($fecha_entrada, $fecha_salida,$cantidad_personas,$hotel_idhotel,$usuario_idusuario);
  }
  function insertar(){
    $this -> conexion -> abrir();
    $this -> conexion -> ejecutar($this -> reservaDAO -> insertar());
    $this -> conexion -> cerrar();
}

function consultarUsuarios(){
    $this -> conexion -> abrir();
    $this -> conexion -> ejecutar($this -> reservaDAO -> consultarUsuarios());
    $registros = array();
    for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
      $registro = $this -> conexion -> extraer();
      $hotel = new Hotel($registro[3]);
      $hotel -> consultar();
      $registros[$i] = new Reserva($registro[0], $registro[1], $registro[2], $hotel , $registro[4]);
    }
    $this -> conexion -> cerrar();
    return $registros;
  }
  function consultarHotel(){
    $this -> conexion -> abrir();
    $this -> conexion -> ejecutar($this -> reservaDAO -> consultarHotel());
    $registros = array();
    for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
      $registro = $this -> conexion -> extraer();
      $usuario = new Usuario($registro[4]);
      $usuario -> consultar();
      $registros[$i] = new Reserva($registro[0], $registro[1], $registro[2], "" , $usuario);
    }
    $this -> conexion -> cerrar();
    return $registros;
  }
function consultarDisp(){
  $this -> conexion -> abrir();
  $this -> conexion -> ejecutar($this -> reservaDAO -> consultarDisp());
  echo $this -> reservaDAO -> consultarDisp();
 
  $registros = array();
  for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
      $registro = $this -> conexion -> extraer();
      $registros[$i] = new Reserva($registro[0]);
  }
  $this -> conexion -> cerrar();
  return $registros;
}
function consultarTodos(){
    $this -> conexion -> abrir();
    $this -> conexion -> ejecutar ($this -> reservaDAO -> consultarTodos());
    $registros = array();
    for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
        $registro = $this -> conexion -> extraer();
        $registros[$i] = new Reserva($registro[0], $registro[1], $registro[2], $registro[3]);
    }
    return $registros;
}

function buscar($filtro){
  $this -> conexion -> abrir();
  $this -> conexion -> ejecutar($this -> reservaDAO -> buscar($filtro));
  $registros = array();
  for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
      $registro = $this -> conexion -> extraer();    
      $hotel = new Hotel($registro[3]);
      $hotel -> consultar();  
      $usuario = new Usuario($registro[4]);
      $usuario -> consultar();     
      $registros[$i] = new Reserva($registro[0], $registro[1], $registro[2], $hotel ,$usuario);
  }
  return $registros;
} 


  function getFecha_entrada(){
    return $this -> fecha_entrada;
  }
  function getFecha_salida(){
    return $this -> fecha_salida;
  }
  function getCantidad_personas(){
    return $this -> cantidad_personas	;
  }
  function getHotel_idhotel(){
    return $this -> hotel_idhotel;
  }
  function getUsuario_idusuario(){
    return $this -> usuario_idusuario;
  }
}