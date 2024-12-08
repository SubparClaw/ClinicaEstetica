<?php

require_once('modelo/Persona.php');
require_once('dao/UsuarioDao.php');
class Usuarios extends Persona {
    protected $idUsuario;
    protected $idpersona;
    protected $nombreUsuario;
    protected $contrasenia;
    protected $rol;
    protected $estado;
    protected $fechaCreacion;
    protected $nomrol;
    private $usuarioDao;
    
    public function __construct() {
        parent::__construct();
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function getIdpersona() {
        return $this->idpersona;
    }

    public function setIdpersona($persona) {
        $this->idpersona = $persona;
    }

    public function getNombreUsuario() {
        return $this->nombreUsuario;
    }

    public function setNombreUsuario($nombreUsuario) {
        $this->nombreUsuario = $nombreUsuario;
    }

    public function getContrasenia() {
        return $this->contrasenia;
      }
      
      public function setContrasenia($contrasenia) {
        $this->contrasenia = $contrasenia;
      }
      

    public function getRol() {
        return $this->rol;
    }

    public function setRol($rol) {
        $this->rol = $rol;
    }

    public function getNomrol() {
        return $this->nomrol;
    }

    public function setNomrol($nomrol) {
        $this->nomrol = $nomrol;
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


    public function IniciarSesion($nombreUsuario, $contrasenia) {
        $this->usuarioDao = new UsuarioDao();
        $usuario = $this->usuarioDao->Login($nombreUsuario, $contrasenia);
    
        if ($usuario) {
            // Iniciar sesión aquí o devolver el usuario para que el controlador lo maneje
            session_start();
            $_SESSION['idusuario'] = $usuario->id_usuario;
            $_SESSION['usuario'] = $usuario->nombreUsuario;
            $_SESSION['rol'] = $usuario->nombre_rol;
            
            return true;
        } else {
            return false;
        }
    }

    public function ObtenerUsuarios() {
        $this->usuarioDao = new UsuarioDao();
        return $this->usuarioDao->ObtenerTodos();
        
    }

    public function ObtenerUsuarioporId($id){
        //var_dump($id);
        $this->usuarioDao = new UsuarioDao();
        return $this->usuarioDao->ObtenerUsuario($id);
    }

    public function ListaRoles(){
        $this->usuarioDao = new UsuarioDao();
        return $this->usuarioDao->ListarRoles();
    }
    
}
?>