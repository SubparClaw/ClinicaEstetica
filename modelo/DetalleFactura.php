<?php

class DetalleFactura {
    private $num_detalle;
    private $id_factura;
    private $id_servicio;
    private $cantidad;
    private $precio;


    public function __construct() {

    }

    public function getNum_detalle() {
        return $this->num_detalle;
    }

    public function setNum_detalle( $num_detalle ) {
        $this->num_detalle = $num_detalle;
    }

    public function getId_factura() {
        return $this->id_factura;
    }

    public function setId_factura( $id_factura ) {
        $this->id_factura = $id_factura;
    }

    public function getId_servicio() {
        return $this->id_servicio;
    }

    public function setId_servicio( $id_servicio ) {
        $this->id_servicio = $id_servicio;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function setCantidad( $cantidad ) {
        $this->cantidad = $cantidad;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setPrecio( $precio ) {
        $this->precio = $precio;
    }

}