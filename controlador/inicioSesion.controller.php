<?php
require_once('modelo/Persona.php');
require_once('modelo/usuarios.php');
require_once('dao/UsuarioDao.php');
class InicioSesionController {
    private $usuario;
    private $usuarioDao;
    public function __construct()
    {
        
    }

    public function Inicio(){
        require_once 'vista/Admin-DashBoard/iniciarSesion/registroInicioSesion.php';
    }

    public function ContrasenaOlvidada() {
        // Crear una instancia de la clase Conexion
        $conexion = new Conexion();

        // Obtener la conexión utilizando el método conectar()
        $pdo = $conexion->conectar();
        require_once 'vista/Admin-DashBoard/iniciarSesion/contrasena-olvidada.php';
    }

    public function nuevaContrasena() {

        if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {

            $idusuario= $_POST['idusuario'];
            $nuevacontra= $_POST['nuevacontrasena'];

            $this->usuarioDao = new UsuarioDao();

            $this->usuarioDao->cambiarContrasenia($idusuario, $nuevacontra);

        }
        require_once 'vista/Admin-DashBoard/iniciarSesion/nuevacontrasena.php';
    }

    public function CrearCuenta() {
        $estado= "Activo";
        $u=$this->usuario = new Usuarios();
        $this->usuarioDao = new UsuarioDao();
        $u->setNombre($_POST['nombre']);
        $u->setApellido($_POST['apellido']);
        $u->setFechaNacimiento($_POST['fecha_nacimiento']);
        $u->setGenero($_POST['genero']);
        $u->setDni($_POST['dni']);
        $u->setTelefono($_POST['telefono']);
        $u->setCorreo($_POST['correo']);
        $u->setNombreUsuario($_POST['nombreUsuario']);
        $u->setContrasenia($_POST['contrasenia']);
        $u->setRol($_POST['rol']);
        $u->setEstado($estado);

        $this->usuarioDao->CrearUsuario($u);

    }

    public function ValidarUsuario() {
        $nombreUsuario = $_POST['nombreUsuario'];
        $contrasenia = $_POST['contrasenia'];
    
        // Crear una instancia de Usuarios
        $usuario = new Usuarios();
    
        if ($usuario->IniciarSesion($nombreUsuario, $contrasenia)) {
            // La contraseña es válida, el usuario está autenticado
             header("Location: ?c=paneladmin");
             exit();
        } else {
            // La contraseña es incorrecta o el usuario no existe
            header("Location: ?c=Inicio&a=IniciarSesion");
            exit();
        }
    }
    
    public function comprobarCredenciales() {
        $this->usuarioDao = new UsuarioDao();
        $correo=$_POST['correo'];
        $telefono=$_POST['telefono'];

        $this->usuarioDao->comprobarCredenciales($correo, $telefono);

        header("Location: ?c=Inicio&a=nuevaContrasena");
        
    }

    
    public function CerrarSesion() {
        session_start();
        session_destroy();

        header("Location: ?c=Inicio&a=IniciarSesion");
        exit();
    }
}
?>