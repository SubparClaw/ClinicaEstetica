<?php
require_once( 'modelo/Servicios.php' );
require_once( 'modelo/icaria.php' );
require_once( 'dao/FacturaDAO.php' );

class Factura {
    private $id_factura;
    private $id_usuario;
    private $id_estetica;
    private $id_cliente;
    private $id_doctor;
    private $metodoPago;
    private $descripcion;
    private $total;
    private $estado;
    private $fechaPublicacion;

    private $servicio;
    private $factura;

    public function __construct() {
    }

    public function getId_factura() {
        return $this->id_factura;
    }

    public function setId_factura( $id_factura ) {
        $this->id_factura = $id_factura;
    }

    public function getId_usuario() {
        return $this->id_usuario;
    }

    public function setId_usuario( $id_usuario ) {
        $this->id_usuario = $id_usuario;
    }

    public function getId_estetica() {
        return $this->id_estetica;

    }

    public function setId_estetica( $id_estetica ) {
        $this->id_estetica = $id_estetica;
    }

    public function getId_cliente() {
        return $this->id_cliente;
    }

    public function setId_cliente( $id_cliente ) {
        $this->id_cliente = $id_cliente;
    }

    public function getId_doctor() {
        return $this->id_doctor;
    }

    public function setId_doctor( $id_doctor ) {
        $this->id_doctor = $id_doctor;
    }

    public function getMetodoPago() {
        return $this->metodoPago;
    }

    public function setMetodoPago( $metodoPago ) {
        $this->metodoPago = $metodoPago;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion( $descripcion ) {
        $this->descripcion = $descripcion;
    }

    public function getTotal() {
        return $this->total;
    }

    public function setTotal( $total ) {
        $this->total = $total;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado( $estado ) {
        $this->estado = $estado;
    }

    public function getFechaPublicacion() {
        return $this->fechaPublicacion;
    }

    public function setFechaPublicacion( $fechaPublicacion ) {
        $this->fechaPublicacion = $fechaPublicacion;
    }

    public function getServicio() {
        return $this->servicio;
    }

    public function setServicio( $servicio ) {
        $this->servicio = $servicio;
    }

    public function calcularTotalConIVA( $icariaIVA, $neto ) {
        $iva = $icariaIVA / 100;
        $totalIVA = $neto * $iva;
        $this->setTotal( $totalIVA );
        $totalConIVA = $neto + $totalIVA;

        return $totalConIVA;
    }

    public function calcularTotalServicio( $precio, $cantidad ) {
        $total = $cantidad * $precio;
        $total = number_format( $total, 2, '.', '' );
        return $total;
    }

    public function ListarFacturas() {
        $this->factura = new FacturaDAO();
        return $this->factura->ListarFacturas();
    }

    public function obtenerUnaFactura( $id ) {
        $this->factura = new FacturaDAO();
        return $this->factura->ObtenerFactura( $id );

    }

    public function obtenerDetalle( $id ) {
        $this->factura = new FacturaDAO();
        return $this->factura->ObtenerDetalleFac( $id );

    }
}