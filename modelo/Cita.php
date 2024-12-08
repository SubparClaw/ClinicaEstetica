<?php

// Modelo
require_once 'dao/CitaDAO.php';

class Cita {

    private $id_cita;
    private $id_cliente;
    private $id_doctor;
    private $id_servicio;
    private $citanum;
    private $nombres;
    private $telefono;
    private $correo;
    private $fecha;
    private $hora;
    private $estado;
    private $fechaRegistro;
    private $citadao;

    public function __construct() {
        $this->citadao = new CitaDAO();
    }

    public function setId_cita($id_cita) {
        $this->id_cita = $id_cita;
    }

    public function getId_cita() {
        return $this->id_cita;
    }

    public function setId_cliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

    public function getId_cliente() {
        return $this->id_cliente;
    }

    public function setId_doctor($id_doctor) {
        $this->id_doctor = $id_doctor;
    }

    public function getId_doctor() {
        return $this->id_doctor;
    }
    
    public function setId_servicio($id_servicio) {
        $this->id_servicio = $id_servicio;
    }

    public function getId_servicio() {
        return $this->id_servicio;
    }

    public function setCitanum($citanum) {
        $this->citanum = $citanum;
    }

    public function getCitanum() {
        return $this->citanum; 
    }

    public function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    public function getNombres() {
        return $this->nombres;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setHora($hora) {
        $this->hora = $hora;
    }

    public function getHora() {
        return $this->hora;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setFechaRegistro($fechaRegistro) {
        $this->fechaRegistro = $fechaRegistro;
    }

    public function getFechaRegistro() {
        return $this->fechaRegistro;
    }

    public function citaNotificacion() {
        return $this->citadao->citaNotificada();
    }
    
    public function ListarCitas() {
        return $this->citadao->getCitas();
    }

    public function DetalleCita($id_cita) {
        return $this->citadao->ObtenerDetalleCita($id_cita);
    }
    



}