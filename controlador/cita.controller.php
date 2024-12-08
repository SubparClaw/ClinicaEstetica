<?php

// Controlador
require_once 'dao/CitaDAO.php';
require_once 'modelo/Cita.php';
require_once 'models/usuarios.php';
require_once 'controlador/inicio.controller.php';
class CitaController {
    private $ini;
    private $citadao;
    private $cita;
    private $usuario;

    public function __construct() {
        // Cambio aquí
        $this->citadao = new CitaDAO();
        $this->ini = new InicioController();

    }

    public function Inicio() {
        return $this->ini->Inicio();
    }

    public function notiCita() {
        $this->cita = new Cita();
        return $this->cita->citaNotificacion();
    }

    public function ListarCitas() {
        $this->cita = new Cita();
        return $this->cita->ListarCitas();
    }

    public function CitaDetalle() {
        $this->cita = new Cita();
        
        if ( isset( $_GET[ 'viewid' ] ) ) {
            $cita = $this->cita->DetalleCita( $_GET[ 'viewid' ] );
        }
        require_once 'vista/Admin-DashBoard/includes/sidebar.php';
        require_once 'vista/Admin-DashBoard/includes/header.php';
        require_once 'vista/Admin-DashBoard/citas/detalle-cita.php';
        require_once 'vista/Admin-DashBoard/includes/footer.php';
    }

    public function VerTodasCitas() {
        require_once 'vista/Admin-DashBoard/includes/sidebar.php';
        require_once 'vista/Admin-DashBoard/includes/header.php';
        require_once 'vista/Admin-DashBoard/citas/administrar-cita.php';
        require_once 'vista/Admin-DashBoard/includes/footer.php';
    }

    public function AceptarCita() {
        require_once 'vista/Admin-DashBoard/includes/sidebar.php';
        require_once 'vista/Admin-DashBoard/includes/header.php';
        require_once 'vista/Admin-DashBoard/citas/aceptar-cita.php';
        require_once 'vista/Admin-DashBoard/includes/footer.php';
    }

    public function cargarVistaCita() {
        $citaDAO = new CitaDAO();

        $fechaActual = $_GET['fecha'];//date('Y-m-d');
        $horasOcupadas = $citaDAO->obtenerHorasOcupadas($fechaActual);

        echo json_encode( $horasOcupadas, JSON_UNESCAPED_UNICODE );

    }

    public function crear() {
        //require_once 'vistas/crear.php';
        $cita = new Cita();
        $c = $this->citadao = new CitaDAO();
        $cita->setId_cita( '' );
        // $cita->setId_cliente( 0 );
        $cita->setId_doctor( $_POST[ 'doctores' ] ) ;
        $cita->setId_servicio( $_POST[ 'tipo_servicio' ] ) ;
        $cita->setCitanum( mt_rand( 100000000, 999999999 ) );
        $cita->setNombres( $_POST[ 'nombres' ] );
        $cita->setTelefono( $_POST[ 'telefono' ] );
        $cita->setCorreo( $_POST[ 'correo' ] );
        $cita->setFecha( $_POST[ 'fecha' ] );
        $cita->setHora( $_POST[ 'hora' ] );
        $cita->setEstado( '' );
        // $cita->setFechaRegistro( '' );

        $this->citadao->crearCita( $cita );
        //var_dump( $cita );
        header( 'Location: ?c=cita' );

    }

    public function editar() {
        $c = $this->cita = new Cita();
        $c->setId_cita( $_GET[ 'viewid' ] );
        $c->setEstado( $_POST[ 'estado' ] );
        $this->citadao->editarCita( $c );
        header( 'Location: ?c=paneladmin' );

    }

    public function eliminar( Cita $cita ) {
        if ( isset( $_POST[ 'confirmar' ] ) ) {
            $this->citadao->eliminarCita( $cita );
            header( 'Location: index.php' );
        } else {
            require_once 'vistas/eliminar.php';
        }
    }
    
    public function ObtenerUnUsuario() {
        $idUsuario = $_SESSION['idusuario'];
        $this->usuario = new Usuarios();
        return $this->usuario->ObtenerUsuarioporId($idUsuario);
    }

}
