<?php

require_once 'dao/ServiciosDAO.php';

class Servicios {
    private $idServicio;
    private $nomServicio;
    private $descripcion;
    private $cantidad;
    private $precio;
    private $estado;
    private $fechaCreacion;

    private $servicioDao;

    public function __construct() {
        $this->servicioDao = new ServiciosDAO;
    }

    public function getIdServicio() {
        return $this->idServicio;
    }

    public function setIdServicio($idServicio) {
        $this->idServicio = $idServicio;
    }

    public function getNomServicio() {
        return $this->nomServicio;
    }

    public function setNomServicio($nomServicio) {
        $this->nomServicio = $nomServicio;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }
    public function getPrecio() {
        return $this->precio;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getFechaCreacion() {
        return $this->fechaCreacion;
    }

    public function setFechaCreacion($fechaCreacion) {
        $this->fechaCreacion = $fechaCreacion;
    }

    public function ObtenerServicios() {
        return $this->servicioDao->obtenerTodosLosServicios();        
    }

// Servicio.php

// Método para obtener servicios temporales
public function ObtenerServiciosTmp() {
    return $this->servicioDao->ListarServiciosTmp();
}



    public function ServicioTmp($id){
        return $this->servicioDao->EliminarServicioTmp($id);
    }
}
?>
