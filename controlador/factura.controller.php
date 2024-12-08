<?php

require_once 'modelo/Cita.php';
require_once 'modelo/Cliente.php';
require_once 'modelo/Doctores.php';
require_once 'modelo/Servicios.php';
require_once 'modelo/Factura.php';
require_once 'modelo/usuarios.php';
require_once 'dao/CitaDAO.php';
require_once 'dao/ServiciosDAO.php';
require_once 'dao/FacturaDAO.php';

require_once( 'config/Conexiondb.php' );

class FacturaController {
    private $citadao;
    private $facdao;
    private $serviciodao;
    private $cita;
    private $modeloCli;
    private $modeloDoc;
    private $usuario;
    private $se;
    private $fact;

    public function __construct() {
        $this->modeloCli = new Cliente();
        $this->modeloDoc = new Doctores();
        $this->se = new Servicios();
        $this->serviciodao = new ServiciosDAO();

    }

    public function notiCita() {
        $this->cita = new Cita();
        return $this->cita->citaNotificacion();
    }

    public function ObtenerUnUsuario() {
        $idUsuario = $_SESSION[ 'idusuario' ];
        $this->usuario = new Usuarios();
        return $this->usuario->ObtenerUsuarioporId( $idUsuario );
    }

    public function Inicio() {
        $this->fact = new Factura();
        $fac = $this->fact->ListarFacturas();
        require_once 'vista/Admin-DashBoard/includes/sidebar.php';
        require_once 'vista/Admin-DashBoard/includes/header.php';
        require_once 'vista/Admin-DashBoard/facturas/administrar-facturas.php';
        require_once 'vista/Admin-DashBoard/includes/footer.php';
    }

    public function FormFactura() {
        $ser = $this->se->ObtenerServicios();
        // Obtener servicios temporales
        $serviciosTmp = $this->se->ObtenerServiciosTmp();

        $cli = $this->modeloCli->ListarNombreCli( null );
        $doc = $this->modeloDoc->ObtenerDoc( null );

        require_once 'vista/Admin-DashBoard/includes/sidebar.php';
        require_once 'vista/Admin-DashBoard/includes/header.php';
        require_once 'vista/Admin-DashBoard/facturas/agregar-factura.php';
        require_once 'vista/Admin-DashBoard/includes/footer.php';
    }

    public function verFactura() {
        if (isset($_GET['id'])) {
            $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
        }
        $this->fact = new Factura();
        $fact = $this->fact->obtenerUnaFactura( $id );
        $factdetalle= $this->fact->obtenerDetalle( $id );
        require_once 'vista/Admin-DashBoard/includes/sidebar.php';
        require_once 'vista/Admin-DashBoard/includes/header.php';
        require_once 'vista/Admin-DashBoard/facturas/detalle-factura.php';
        require_once 'vista/Admin-DashBoard/includes/footer.php';
    }

    public function RegistrarFactura() {
        session_start();
        $factura = new Factura();

        // Captura de datos desde la solicitud POST
        $factura->setId_cliente( $_POST[ 'idcliente' ] );
        $factura->setId_usuario( $_SESSION[ 'idusuario' ] );
        $factura->setId_doctor( $_POST[ 'iddoctor' ] );
        $factura->setDescripcion( $_POST[ 'descripcion' ] );

        // Llamada al método para insertar factura y servicios
        $this->facdao = new FacturaDAO();
        $this->facdao->InsertarFactura( $factura );

        header( 'Location: ?c=factura&a=Inicio' );
    }

    public function listarClientes() {

        if ( isset( $_GET[ 'nom' ] ) ) {
            $nombres = strip_tags( trim( $_GET[ 'nom' ] ) );
            $datos = $this->modeloCli->ListarNombreCli( $nombres );

            // Inicializar el array fuera del bucle
            foreach ( $datos as $cliente ) {
                // Asegúrate de que $cliente sea un objeto Cliente y accede a sus propiedades
                if ( $cliente instanceof Cliente ) {
                    $dataCli[] = array(
                        'id' => $cliente->getIdCliente(),
                        'text' => $cliente->__toString(),
                        'email' => $cliente->getCorreo(),
                        'telefono' => $cliente->getTelefono(),
                        'direccion' => $cliente->getDireccion()
                    );
                }
            }
        }

        echo json_encode( $dataCli );
    }

    public function ListarDoctores() {
        $dataDoc = array();

        if ( isset( $_GET[ 'doc' ] ) ) {
            $nombres = strip_tags( trim( $_GET[ 'doc' ] ) );
            $datos = $this->modeloDoc->ObtenerDoc( $nombres );

            foreach ( $datos as $doctor ) {
                if ( $doctor instanceof Doctores ) {
                    $dataDoc[] = array(
                        'id' => $doctor->getIdDoctor(),
                        'text' => $doctor->__toString(),
                        'especialidad' => $doctor->getEspecialidad()
                    );
                }
            }
        }

        echo json_encode( $dataDoc );
    }

    public function AgregarServicioFTmp() {
        session_start();
        // Verifica si se envió el formulario y el ID del usuario es válido
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['servicio']) && isset($_SESSION['idusuario']) && $_SESSION['idusuario'] > 0) {
            // Obtén y valida el ID del servicio
            $idServicio = intval($_POST['servicio']);
            $idUsuario = $_SESSION['idusuario'];
    
            // Inserta el servicio temporal y maneja errores
            if ($this->serviciodao->InsertarServicioTmp($idServicio, $idUsuario)) {
                // Redirige a la página de éxito
                header('Location: ?c=factura&a=FormFactura');
                exit();
            } else {
                // Redirige a la página de error
                header('Location: ?c=factura&a=FormFactura');
                exit();
            }
        }
    
        // Redirige después de la operación (puede ser una página de error si no se cumplen las condiciones anteriores)
        header('Location: ?c=factura&a=FormFactura');
        exit();
    }
    
    

    public function EliminarServicioFTmp() {
        // Verifica si 'viewid' está presente en la URL
        if ( isset( $_GET[ 'viewid' ] ) ) {
            // Elimina el servicio temporal
            $this->serviciodao->EliminarServicioTmp( $_GET[ 'viewid' ] );
        }
        // Redirige después de la operación
        header( 'Location: ?c=factura&a=FormFactura' );
        exit();
    }

    public function Total_con_IVA( $icariaIVA, $neto ) {
        $this->fact = new Factura();
        return $this->fact->calcularTotalConIVA( $icariaIVA, $neto );
    }

    public function TotalServicio( $precio, $cantidad ) {
        $this->fact = new Factura();
        return $this->fact->calcularTotalServicio( $precio, $cantidad );
    }

    public function ListarPerfil() {
        // Llamada al método para insertar factura y servicios
        $this->facdao = new FacturaDAO();
        return $this->facdao->ListarPerfil();
    }

}