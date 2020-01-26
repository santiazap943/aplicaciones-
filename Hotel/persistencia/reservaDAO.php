<?php
/*INSERT INTO `reserva` (`fecha_entrada`, `fecha_salida`, `cantidad_personas`, `hotel_idhotel`, `usuario_idusuario`) VALUES ('2019-06-06', '2019-06-13', '4', '3', '1');

select count (fecha_entrada, fecha_salida, cantidad_personas, hotel_idhotel)
from reserva r
where r.fecha_entrada= '2019-06-06' and r.fecha_salida= '2019-06-13' and r.cantidad_personas= '4' and r.hotel_idhotel = '3'*/
class ReservaDAO{
  private $fecha_entrada;
  private $fecha_salida;
  private $cantidad_personas;
  private $hotel_idhotel;
  private $usuario_idusuario;

  function ReservaDAO($fecha_entrada="", $fecha_salida="",$cantidad_personas="",$hotel_idhotel="",$usuario_idusuario=""){
    
    $this -> fecha_entrada = $fecha_entrada;
    $this -> fecha_salida = $fecha_salida;
    $this -> cantidad_personas = $cantidad_personas	;
    $this -> hotel_idhotel = $hotel_idhotel;
    $this -> usuario_idusuario = $usuario_idusuario;
   }
   function consultarDisp(){        
    return "select *
            from reserva r
            where r.fecha_entrada= '" . $this -> fecha_entrada . "' and r.fecha_salida= '" . $this -> fecha_salida . "' and r.cantidad_personas= '" . $this -> cantidad_personas . "' and r.hotel_idhotel     = '" . $this -> hotel_idhotel . "'";
    }
    function consultarTodos(){
        return "select idproveedor, nombre, apellido, correo, estado
                from proveedor";
    }
    function insertar(){
        return "insert into reserva (`fecha_entrada`, `fecha_salida`, `cantidad_personas`, `hotel_idhotel`, `usuario_idusuario`) 
        values ('" . $this -> fecha_entrada . "', '" . $this -> fecha_salida . "', '" . $this -> cantidad_personas . "', '" . $this -> hotel_idhotel . "', '" . $this -> usuario_idusuario . "')";
    }
    function consultarUsuarios(){
        return "select *
                from reserva
                where usuario_idusuario='" . $this -> usuario_idusuario . "'";
    }
    function consultarHotel(){
        return "select *
                from reserva
                where hotel_idhotel='" . $this -> hotel_idhotel . "'";
    }
    function buscar($filtro){
        return "select *
                from reserva
                where usuario_idusuario in (select idusuario from usuario where nombre like '" . $filtro . "%' and apellido like '" . $filtro . "%') or hotel_idhotel in (select idhotel from hotel where nombre like '" . $filtro . "%')";
    }
}