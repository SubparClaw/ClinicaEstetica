<?php

require_once('dao/IcariaDAO.php');
class Icaria {
     private $id; 
     private $nombre_comercial;
     private $propietario; 
     private $telefono; 
     private $direccion ;
     private $email; 
     private $web; 
     private $iva;

     private $dao;
     public function __construct() {
          
          $this->dao = new IcariaDAO();
     }

     public function getId() {
          return $this->id;
     }

     public function setId( $id ) {
          $this->id = $id;
     }

     public function getNombre_comercial() {
          return $this->nombre_comercial;
     }

     public function setNombre_comercial( $nombre_comercial ) {
          $this->nombre_comercial = $nombre_comercial;
     }

     public function getPropietario() {
          return $this->propietario;
     }

     public function setPropietario( $propietario ) {
          $this->propietario = $propietario;
     }

     public function getTelefono() {
          return $this->telefono;
     }

     public function setTelefono( $telefono ) {
          $this->telefono = $telefono;
     }

     public function getDireccion() {
          return $this->direccion;
     }

     public function setDireccion( $direccion ) {
          $this->direccion = $direccion;
     }

     public function getEmail() {
          return $this->email;
     }

     public function setEmail( $email ) {
          $this->email = $email;
     }

     public function getWeb() {
          return $this->web;
     }

     public function setWeb( $web ) {
          $this->web = $web;
     }

     public function getIva() {
          return $this->iva;
     }

     public function setIva( $iva ) {
          $this->iva = $iva;
     }

     public function listardatos(){
          return $this->dao->listarIcaria();
     }


     public function gananciasHoy(){
          return $this->dao->ganaciasHoy();
     }

     public function gananciaSemana(){
          return $this->dao->ganaciasSemana();
     }

     public function gananciasEsteMes(){
          return $this->dao->ganaciasMes();
     }

     public function ganaciasEsteAnio(){
          return $this->dao->ganaciasAnio();
     }

     public function graficos(){
          return $this->dao->graficosGancias();
     }

     public function grafico7(){
          return $this->dao->grafico7();
     }

     public function grafico8(){
          return $this->dao->grafico8();
     }
}