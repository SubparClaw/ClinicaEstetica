<?php
class Categorias{
    private $id_categoria;
    private $nomCategoria;
    private $estado;
    private $fechaRegistro;

    public function __construct() {
        
    }

    public function getIdCategoria() {
        return $this->id_categoria;
    }

    public function setIdCategoria($id_categoria) {
        $this->id_categoria = $id_categoria;
    }

    public function getNomCategoria() {
        return $this->nomCategoria;
    }

    public function setNomCategoria($nomCategoria) {
        $this->nomCategoria = $nomCategoria;
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


}
?>