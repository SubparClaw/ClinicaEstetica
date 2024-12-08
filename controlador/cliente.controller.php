<?php

require_once 'dao/ClienteDAO.php';
require_once 'modelo/Usuarios.php';
require_once 'modelo/Cliente.php';
require_once 'modelo/Cita.php';

class ClienteController {
    private $dao;
    private $cita;
    private $usuario;
    private $c;

    public function __construct() {
        $this->dao = new ClienteDAO;
        $this->c = new Cliente();
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
        $clientes=$this->c->ListarNombreCli( null );
        require_once 'vista/Admin-DashBoard/includes/sidebar.php';
        require_once 'vista/Admin-DashBoard/includes/header.php';
        require_once 'vista/Admin-DashBoard/clientes/administrar-cliente.php';
        require_once 'vista/Admin-DashBoard/includes/footer.php';
    }

    public function FormCliente() {
        $titulo = 'Registrar';
        $c = new Cliente();
        if ( isset( $_GET[ 'id' ] ) ) {
            $c = $this->dao->ObtenerC( $_GET[ 'id' ] );
            $titulo = 'Actualizar';
        }
        require_once 'vista/Admin-DashBoard/includes/sidebar.php';
        require_once 'vista/Admin-DashBoard/includes/header.php';
        require_once 'vista/Admin-DashBoard/clientes/agregar-cliente.php';
        require_once 'vista/Admin-DashBoard/includes/footer.php';
    }

    public function CapturarCliente() {
        $c = new Cliente();
        // Obtener datos del formulario
        $c->setIdCliente( $_POST[ 'id_cliente' ] );
        $c->setNombre( $_POST[ 'nombre' ] );
        $c->setApellido( $_POST[ 'apellido' ] );
        $c->setFechaNacimiento( $_POST[ 'fecha_nacimiento' ] );
        $c->setGenero( $_POST[ 'genero' ] );
        $c->setDni( $_POST[ 'dni' ] );
        $c->setTelefono( $_POST[ 'telefono' ] );
        $c->setCorreo( $_POST[ 'correo' ] );
        $c->setDireccion( $_POST[ 'direccion' ] );
        $c->setEstado( 'Activo' );

        $c->getIdCliente() > 0 ? $this->dao->ActualizarCliente( $c ) : $this->dao->InsertarCliente( $c );

        header( 'Location: ?c=cliente' );
    }

    public function EliminarCliente() {
        $estado = 'Inactivo';
        $this->dao->EliminarCliente( $_GET[ 'id' ] );

        header("location: ?c=cliente");
    }

}
