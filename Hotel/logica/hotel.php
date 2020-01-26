<?php
require 'persistencia/hotelDAO.php';
class Hotel{
    private $idhotel;
    private $nombre ;
    private $correo ;
    private $direccion ;
    private $habitacionesdisp;
    private $ciudad ;
    private $proveedor;
    private $conexion;
    private $hotelDAO;

    function Hotel($idhotel="",$nombre="",$correo="",$direccion="",$habitacionesdisp="",$ciudad="",$proveedor=""){
        $this -> conexion = new Conexion();
        $this -> idhotel = $idhotel;
        $this -> nombre = $nombre;
        $this -> correo = $correo;
        $this -> direccion = $direccion;
        $this -> habitacionesdisp = $habitacionesdisp;
        $this -> ciudad= $ciudad;
        $this -> proveedor = $proveedor;
        $this -> hotelDAO = new HotelDAO($idhotel, $nombre, $correo, $direccion,$habitacionesdisp, $ciudad, $proveedor );
    }
    
    function insertar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> hotelDAO -> insertar());
        $this -> conexion -> cerrar();
    }
    function existeCorreo(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> hotelDAO -> existeCorreo());
        if($this -> conexion -> numFilas() == 1){
            $this -> conexion -> cerrar();
            return true;
        }else{
            $this -> conexion -> cerrar();
            return false;
        }
    }
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> hotelDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> idhotel = $registro[0];
        $this -> nombre = $registro[1];
        $this -> correo = $registro[2];
        $this -> direccion = $registro[3];
        $this -> habitacionesdisp = $registro[4];
        $this -> ciudad = $registro[5];
        $this -> pais = $registro[6];
        $this -> conexion -> cerrar();
    }
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar ($this -> hotelDAO -> consultarTodos());
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $registros[$i] = new Hotel($registro[0], $registro[1], $registro[2],$registro[3],$registro[4]);
        }
        $this -> conexion ->cerrar();
        return $registros;
    }
    function editarPerfiL(){
        $this -> conexion -> abrir();
        $this -> conexion ->  ejecutar($this-> hotelDAO -> editarPerfil());
        $this -> conexion -> cerrar();
    }   
    function consultarProveedor($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar ($this -> hotelDAO -> consultarProveedor($filtro));
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $ciudad= new Ciudad($registro[5]);
            $ciudad -> consultar();
            $registros[$i] = new Hotel($registro[0], $registro[1], $registro[2],$registro[3],$registro[4],$ciudad,$registro[6]);
        }
        $this -> conexion ->cerrar();
        return $registros;
    }
    function buscar($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> hotelDAO -> buscar($filtro));
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();           
            $ciudad = new Ciudad($registro[5]);
            $ciudad -> consultar();
            $proveedor = new Proveedor($registro[6]);
            $proveedor -> consultar();
            $registros[$i] = new Hotel($registro[0], $registro[1], $registro[2],$registro[3],$registro[4],$ciudad,$proveedor);
        }
        return $registros;
    } 
    function cambiarEstado() {
        $this -> conexion -> abrir();
        $this->conexion->ejecutar($this->usuarioDAO -> cambiarEstado());
        $this -> conexion -> cerrar();
}
    function consultarCiudad(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> hotelDAO -> consultarCiudad());
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();           
            $registros[$i] = new Hotel($registro[0],$registro[1],"",$registro['3']);
        }
        return $registros;
    }
    
    function getId(){
        return $this -> idhotel;
    }
    function getNombre(){
        return $this -> nombre;
    }
    function getCorreo(){
        return $this -> correo;
    }

    function getDireccion(){
        return $this -> direccion;
    }
    function getHabitacionesdisp(){
        return $this -> habitacionesdisp;
    }

    function getCiudad(){
        return $this -> ciudad;
    }
    function getProveedor(){
        return $this -> proveedor;
    }

}