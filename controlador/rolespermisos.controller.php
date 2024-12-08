<?php
require_once( 'modelo/Cita.php' );
require_once('modelo/usuarios.php');
class RolespermisosController {
     private $cita;
     private $usuario;

     public function __construct() {
          
     }

     public function notiCita() {
          $this->cita = new Cita();
          return $this->cita->citaNotificacion();
          
     }

     public function ObtenerUnUsuario() {
          $idUsuario = $_SESSION['idusuario'];
          $this->usuario = new Usuarios();
          return $this->usuario->ObtenerUsuarioporId($idUsuario);
      }

     public function Inicio() {
          

          require_once( 'vista/Admin-DashBoard/includes/sidebar.php' );
          require_once( 'vista/Admin-DashBoard/includes/header.php' );
          require_once( 'vista/Admin-DashBoard/rolespermisos/administrar-roles.php' );
          require_once( 'vista/Admin-DashBoard/includes/footer.php' );
     }
}