<?php
require_once 'modelo/Persona.php';
require_once 'dao/DoctoresDAO.php';

class Doctores extends Persona {
    protected $idDoctor;
    protected $especialidad;
    protected $nacionalidad;
    protected $descripcion;
    protected $facebook_link;
    protected $twitter_link;
    protected $instagram_link;
    protected $dribbble_link;
    protected $estado;
    protected $fechaRegistro;

    private $docDao;

    public function __construct() {
        parent::__construct();
        $this->docDao = new DoctoresDAO;
    }

    public function getIdDoctor() {
        return $this->idDoctor;
    }

    public function setIdDoctor($idDoctor) {
        $this->idDoctor = $idDoctor;
    }

    public function getEspecialidad() {
        return $this->especialidad;
    }

    public function setEspecialidad($especialidad) {
        $this->especialidad = $especialidad;
    }

    public function getNacionalidad() {
        return $this->nacionalidad;
    }

    public function setNacionalidad($nacionalidad) {
        $this->nacionalidad = $nacionalidad;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getFacebook_link() {
        return $this->facebook_link;
    }

    public function setFacebook_link($facebook_link) {
        $this->facebook_link = $facebook_link;
    }

    public function getTwitter_link() {
        return $this->twitter_link;
    }

    public function setTwitter_link($twitter_link) {
        $this->twitter_link = $twitter_link;
    }

    public function getInstagram_link() {
        return $this->instagram_link;
    }

    public function setInstagram_link($instagram_link) {
        $this->instagram_link = $instagram_link;
    }

    public function getDribbble_link() {
        return $this->dribbble_link;
    }

    public function setDribbble_link($dribbble_link) {
        $this->dribbble_link = $dribbble_link;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getFechaRegistro() {
        return $this->fechaRegistro;
    }

    public function setFechaRegistro($fechaRegistro) {
        $this->fechaRegistro = $fechaRegistro;
    }

    public function __toString(){
        return $this->getNombre() . " " . $this->getApellido();
    }

    public function ListarDoctores() {

        return $this->docDao->ObtenerTodosLosDoctores();
    }

    public function ObtenerDoc($nombre) {
        return $this->docDao->ObtenerNombreApellido($nombre);
    }

    public function ListarDoc($id) {
        return $this->docDao->ObtenerDoc($id);
    }
    
}
?>