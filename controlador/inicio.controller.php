<?php
require_once 'modelo/Doctores.php';
require_once 'modelo/Servicios.php';

class InicioController {
    private $doctores;
    private $servicios;

    public function __construct() {
        $this->doctores = new Doctores();
        $this->servicios = new Servicios();

    }

    public function Inicio() {
        require_once 'vista/LandingPage/includes/header.php';
        require_once 'vista/LandingPage/index.php';
        require_once 'vista/LandingPage/includes/footer.php';

    }

    public function Nosotros() {
        // Crear una instancia de la clase Conexion
        $conexion = new Conexion();

        // Obtener la conexión utilizando el método conectar()
        $pdo = $conexion->conectar();

        require_once 'vista/LandingPage/includes/header.php';
        require_once 'vista/LandingPage/nosotros.php';
        require_once 'vista/LandingPage/includes/footer.php';
    }

    public function Servicios() {
        require_once 'vista/LandingPage/includes/header.php';
        require_once 'vista/LandingPage/servicios.php';
        require_once 'vista/LandingPage/includes/footer.php';
    }

    public function Precios() {
        // Crear una instancia de la clase Conexion
        $conexion = new Conexion();

        // Obtener la dirección utilizando el método conectar()
        $pdo = $conexion->conectar();

        require_once 'vista/LandingPage/includes/header.php';
        require_once 'vista/LandingPage/precios.php';
        require_once 'vista/LandingPage/includes/footer.php';
    }

    public function Blog() {
        // Crear una instancia de la clase Conexion
        $conexion = new Conexion();

        // Obtener la dirección utilizando el método conectar()

        $pdo = $conexion->conectar();

        require_once 'vista/LandingPage/includes/header.php';
        require_once 'vista/LandingPage/blog.php';
        require_once 'vista/LandingPage/includes/footer.php';
    }


    public function Doctor() {
       
        $conexion = new Conexion();
        $pdo = $conexion->conectar();

        require_once 'vista/LandingPage/includes/header.php';
        require_once 'vista/LandingPage/doctor.php';
        require_once 'vista/LandingPage/includes/footer.php';

    }

    public function Noticias() {
        $conexion = new Conexion();
        $pdo = $conexion->conectar();
         
        require_once 'vista/LandingPage/includes/header.php';
        require_once 'vista/LandingPage/noticias.php';
        require_once 'vista/LandingPage/includes/footer.php';
    }

    public function Contacto() {
        // Crear una instancia de la clase Conexion
        $conexion = new Conexion();

        // Obtener la dirección utilizando el método conectar()
        $pdo = $conexion->conectar();

        require_once 'vista/LandingPage/includes/header.php';
        require_once 'vista/LandingPage/contacto.php';
        require_once 'vista/LandingPage/includes/footer.php';
    }

    public function Productos() {
        
    }

    public function IniciarSesion() {
        require_once 'vista/Admin-DashBoard/IniciarSesion/iniciarSesion.php';
    }

    public function ListarServicios() {
        return $this->servicios->ObtenerServicios();
    }

    public function ListarDoctores() {
        return $this->doctores->ObtenerDoc( null );
    }

}
?>
