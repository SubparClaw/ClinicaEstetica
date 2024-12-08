<?php

require_once( 'dao/UsuarioDao.php' );
require_once( 'modelo/usuarios.php' );
require_once( 'modelo/Persona.php' );
require_once( 'modelo/Cita.php' );

class UsuarioController {

    private $usuarioDao;
    private $usuario;
    private $persona;
    private $cita;

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

        $this->usuario = new Usuarios();
        $usu = $this->usuario->ObtenerUsuarios();
        require_once( 'vista/Admin-DashBoard/includes/sidebar.php' );
        require_once( 'vista/Admin-DashBoard/includes/header.php' );
        require_once( 'vista/Admin-DashBoard/usuarios/administrar-ususarios.php' );
        require_once( 'vista/Admin-DashBoard/includes/footer.php' );
    }

    public function verPerfil() {
        $usu = $this->usuario = new Usuarios();
        
        require_once( 'vista/Admin-DashBoard/includes/sidebar.php' );
        require_once( 'vista/Admin-DashBoard/includes/header.php' );
        $usu = $this->usuario->ObtenerUsuarioporId( $_SESSION[ 'idusuario' ] );
        require_once( 'vista/Admin-DashBoard/usuarios/perfil-usuario.php' );
        require_once( 'vista/Admin-DashBoard/includes/footer.php' );
    }

    public function CrearCuenta() {
        $estado = 'Activo';
        $u = $this->usuario = new Usuarios();
        $this->usuarioDao = new UsuarioDao();
        $u->setIdUsuario( $_POST[ 'id_usuario' ] );
        $u->setNombre( $_POST[ 'nombre' ] );
        $u->setApellido( $_POST[ 'apellido' ] );
        $u->setFechaNacimiento( $_POST[ 'fecha_nacimiento' ] );
        $u->setGenero( $_POST[ 'genero' ] );
        $u->setDni( $_POST[ 'dni' ] );
        $u->setTelefono( $_POST[ 'telefono' ] );
        $u->setCorreo( $_POST[ 'correo' ] );
        $u->setNombreUsuario( $_POST[ 'nombreusuario' ] );
        $u->setContrasenia( $_POST[ 'contrasenia' ] );
        $u->setRol( $_POST[ 'rol' ] );
        $u->setEstado( $estado );

        $u->getIdUsuario() > 0 ? $this->usuarioDao->ActualizarUsuario( $u ) : $this->usuarioDao->CrearUsuario( $u );

        header( 'Location: ?c=usuario' );

    }

    public function FormUsuario() {
        $titulo = 'Registrar';
        $hidden = 'text';
        $usu = $this->usuario = new Usuarios();
        if ( isset( $_GET[ 'usuid' ] ) ) {
            $usu = $this->usuario->ObtenerUsuarioporId( $_GET[ 'usuid' ] );
            $hidden = 'hidden';
            $titulo = 'Actualizar';
        }

        $rol = $usu->ListaRoles();
        require_once( 'vista/Admin-DashBoard/includes/sidebar.php' );
        require_once( 'vista/Admin-DashBoard/includes/header.php' );
        require_once( 'vista/Admin-DashBoard/usuarios/agregar-usuario.php' );
        require_once( 'vista/Admin-DashBoard/includes/footer.php' );

    }

    public function EliminarUsuario() {
        // Verificar si 'usuid' está presente en la URL
        if ( isset( $_GET[ 'usuid' ] ) ) {
            $u = $this->usuario = new Usuarios();
            $this->usuarioDao = new UsuarioDao();
            $u->setIdUsuario( $_GET[ 'usuid' ] );
            $this->usuarioDao->EliminarUsuario( $u );

            // Redirigir después de eliminar el usuario
            header( 'location: ?c=usuario' );
        } else {
            // Manejar el caso en que 'usuid' no está presente
            echo 'ID de usuario no proporcionado en la URL.';
        }
    }

    public function actualizarPerfil() {
        
        $usu = $this->usuario = new Usuarios();
        require_once( 'vista/Admin-DashBoard/includes/sidebar.php' );
        require_once( 'vista/Admin-DashBoard/includes/header.php' );
        $usu = $this->usuario->ObtenerUsuarioporId( $_SESSION[ 'idusuario' ] );
        require_once( 'vista/Admin-DashBoard/usuarios/configuracion.php' );
        require_once( 'vista/Admin-DashBoard/includes/footer.php' );
    }

}