<?php

require_once 'modelo/usuarios.php';
require_once 'modelo/Icaria.php';
require_once 'modelo/Cita.php';
class PaneladminController {
    private $cita;
    private $usuario;
    private $icaria;
    public function __construct()
    {
        $this->icaria = new Icaria();
    }

    public function Inicio(){
        
        $icaria = $this->icaria->listardatos();
        $gananciasHoy = $this->icaria->gananciasHoy();
        $gananciasSemana = $this->icaria->gananciaSemana();
        $gananciasMes = $this->icaria->gananciasEsteMes();
        $gananciasAnio = $this->icaria->ganaciasEsteAnio();
        require_once 'vista/Admin-DashBoard/includes/sidebar.php';
        require_once 'vista/Admin-DashBoard/includes/header.php';
        require_once 'vista/Admin-DashBoard/index.php';
        require_once 'vista/Admin-DashBoard/includes/footer.php';
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
    
    public function graficos(){
        $datos = $this->icaria->graficos();
        header('Content-Type: application/json');
        echo json_encode($datos);
        exit;
    }

    public function grafico7(){
        return $datos = $this->icaria->grafico7();
        header('Content-Type: application/json');
        echo json_encode($datos);
        exit; 
    }

    public function grafico8(){
        $datos = $this->icaria->grafico8();
        header('Content-Type: application/json');
        echo json_encode($datos);
        exit;
    }
    
    
    
}
?>