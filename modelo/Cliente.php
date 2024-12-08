<?php
require_once 'modelo/Persona.php';
require_once 'dao/ClienteDAO.php';
require_once 'dao/DoctoresDAO.php';

class Cliente extends Persona {
    protected $idCliente;
    protected $direccion;
    protected $estado;
    protected $fechaRegistro;

    private $clientedao;
    private $doctoresdao;

    public function __construct() {
        parent::__construct();
    }

    public function getIdCliente() {
        return $this->idCliente;
    }

    public function setIdCliente( $idCliente ) {
        $this->idCliente = $idCliente;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion( $direccion ) {
        $this->direccion = $direccion;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado( $estado ) {
        $this->estado = $estado;
    }

    public function getFechaRegistro() {
        return $this->fechaRegistro;
    }

    public function setFechaRegistro( $fechaRegistro ) {
        $this->fechaRegistro = $fechaRegistro;
    }

    public function __toString() {
        return $this->getNombre() . ' ' . $this->getApellido();
    }

    public function ListarNombreCli($nombres) {
        $this->clientedao = new ClienteDAO();
        return $this->clientedao->ObtenerTodosLosClientes($nombres);
    }

    // ClienteModelo.php
    public function ListarCli($id) {
        $this->clientedao = new ClienteDAO();
        $cliente = $this->clientedao->ObtenerC($id);
        return [$cliente];
    }



}

?>