<?php
require_once('modelo/Servicios.php'); 
require_once('modelo/usuarios.php');
require_once('modelo/Doctores.php');
require_once('dao/ServiciosDAO.php'); 
require_once('dao/CategoriaDAO.php');
require_once('modelo/Cita.php');

class ServicioController {
    private $dao;
    private $catDAO;
    private $doc;
    private $se;
    private $cita;
    private $usuario;

    public function __construct() {
        $this->dao = new ServiciosDAO;
        $this->catDAO = new CategoriasDAO;
        $this->doc = new Doctores;
        $this->se = new Servicios;
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
        require_once 'vista/Admin-DashBoard/includes/sidebar.php';
        require_once 'vista/Admin-DashBoard/includes/header.php';
        require_once 'vista/Admin-DashBoard/servicios/administrar-servicio.php';
        require_once 'vista/Admin-DashBoard/includes/footer.php';
    }

    public function FormServicio() {
        $titulo="Registrar";
        $s=new Servicios();
        if(isset($_GET['id'])){
            $s=$this->dao->ObtenerS($_GET['id']);
            $titulo="Actualizar";
        }
        require_once 'vista/Admin-DashBoard/includes/sidebar.php';
        require_once 'vista/Admin-DashBoard/includes/header.php';
        require_once 'vista/Admin-DashBoard/servicios/agregar-servicio.php';
        require_once 'vista/Admin-DashBoard/includes/footer.php';
    }

    public function CapturarServicio() {
        $s = new Servicios();
        // Obtener datos del formulario
        $s->setIdServicio($_POST['id_servicio']);
        $s->setNomServicio($_POST['nomServicio']);
        $s->setDescripcion($_POST['descripcion']);
        $s->setPrecio($_POST['precio']);
        $s->setEstado('Activo');

        $s->getIdServicio() > 0 ? $this->dao->ActualizarServicio($s) : $this->dao->InsertarServicio($s);
        header("location: ?c=servicio");
    }
    public function ListarCategoria() {
        return $this->catDAO->ObtenerNomCat();
    }
    
    public function ListarServicioDet() {
        // Verificar si se ha pasado el parámetro 'nomServicio' en la URL
        if (isset($_GET['nomServicio'])) {
            // Obtener el valor de 'nomServicio' desde la URL
            $nombreServicio = $_GET['nomServicio'];
    
            // Imprimir un mensaje en JavaScript
           echo 'alert("Se ha capturado el nombre de servicio: ' . $nombreServicio . '");';
           $serviceDet = $this->dao->MostrarServicioDet($nombreServicio);

           echo'los detalles del servicio son:'.$serviceDet->nombreCategoria;

        } else {
            // Si nomServicio no está presente en la URL
            echo 'alert("El parámetro \'nomServicio\' no se ha pasado en la URL.");';
        }

         $this->Inicio('servicio', ['s' => $serviceDet]);
        header("location: ?c=servicio&a=Servicios");
    }
    
    
    
    
    public function EliminarServicio() {
        $estado='Inactivo';
        $this->dao->EliminarServicio($_GET['id']);    
        header("location: ?c=servicio");
    }

    public function Servicios() {
        require_once 'vista/LandingPage/includes/header.php';
        require_once 'vista/LandingPage/servicios.php';
        require_once 'vista/LandingPage/includes/footer.php';
    }

    public function ListarServicios() {
        return $this->se->ObtenerServicios();
    }
    public function ListarDoctores() {
        return $this->doc->ObtenerDoc(null);
    }
}
?>
