<?php

require_once 'dao/DoctoresDAO.php';
require_once 'modelo/Doctores.php';
require_once 'modelo/Usuarios.php';
require_once 'modelo/Cita.php';

class DoctoresController {
    private $docDao;
    private $doc;
    private $cita;
    private $usuario;

    public function __construct() {
        $this->docDao = new DoctoresDAO;
        $this->doc = new Doctores();
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

        $doctores=$this->doc->ListarDoctores();
        require_once 'vista/Admin-DashBoard/includes/sidebar.php';
        require_once 'vista/Admin-DashBoard/includes/header.php';
        require_once 'vista/Admin-DashBoard/doctores/administrar-doctores.php';
        require_once 'vista/Admin-DashBoard/includes/footer.php';
    }

    public function FormDoctor() {
        $titulo = 'Registrar';
        $doc = new Doctores();
        if ( isset( $_GET[ 'id' ] ) ) {
            $doc = $this->docDao->ObtenerDoc( $_GET[ 'id' ] );
            $titulo = 'Actualizar';
        }
        require_once 'vista/Admin-DashBoard/includes/sidebar.php';
        require_once 'vista/Admin-DashBoard/includes/header.php';
        require_once 'vista/Admin-DashBoard/doctores/agregar-doctores.php';
        require_once 'vista/Admin-DashBoard/includes/footer.php';
    }


    public function CapturarDoctor() {
        $doc = new Doctores();
        // Obtener datos del formulario
        $doc->setIdDoctor( $_POST[ 'id_doctor' ] );
        $doc->setNombre( $_POST[ 'nombre' ] );
        $doc->setApellido( $_POST[ 'apellido' ] );
        $doc->setFechaNacimiento( $_POST[ 'fecha_nacimiento' ] );
        $doc->setGenero( $_POST[ 'genero' ] );
        $doc->setDni( $_POST[ 'dni' ] );
        $doc->setCorreo( $_POST[ 'correo' ] );
        $doc->setTelefono( $_POST[ 'telefono' ] );
        $doc->setEspecialidad( $_POST[ 'especialidad' ] );
        $doc->setNacionalidad( $_POST[ 'nacionalidad' ] );
        $doc->setDescripcion($_POST[ 'descripcion' ]);
        /*$doc->setFacebook_link( $_POST[ 'facebook_link' ] );
        $doc->setTwitter_link( $_POST[ 'twitter_link' ] );
        $doc->setInstagram_link( $_POST[ 'instagram_link' ] );
        $doc->setDribbble_link( $_POST[ 'dribbble_link' ] );*/
        $doc->setEstado( 'Activo' );

        $doc->getIdDoctor() > 0 ? $this->docDao->ActualizarDoctores( $doc ) : $this->docDao->InsertarDoctor( $doc );

        header( 'Location: ?c=doctores' );
    }

    public function EliminarDoctor() {
        $estado = 'Inactivo';
        $this->docDao->EliminarDoctores( $_GET[ 'id' ] );

        header("location: ?c=doctores");
    }


}
?>