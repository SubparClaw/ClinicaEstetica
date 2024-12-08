<?php
require_once('modelo/Producto.php'); 
require_once('modelo/Cita.php');
require_once('modelo/usuarios.php');
require_once('dao/ProductoDAO.php'); 

class ProductoController {
    private $producto;
    private $usuario;
    private $dao;
    private $cita;
    

    public function __construct() {
        $this->dao = new ProductoDAO;
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
        require_once 'vista/Admin-DashBoard/productos/administrar-producto.php';
        require_once 'vista/Admin-DashBoard/includes/footer.php';
    }


    public function FormProducto() {
        $titulo="Registrar";
        $p=new Producto();
        if(isset($_GET['id'])){
            $p=$this->dao->ObtenerP($_GET['id']);
            $titulo="Actualizar";
        }
        require_once 'vista/Admin-DashBoard/includes/sidebar.php';
        require_once 'vista/Admin-DashBoard/includes/header.php';
        require_once 'vista/Admin-DashBoard/productos/agregar-producto.php';
        require_once 'vista/Admin-DashBoard/includes/footer.php';
    }

    public function CapturarProducto() {
        $p = new Producto();
        // Obtener datos del formulario
        $p->setIdProducto($_POST['id_producto']);
        $p->setNombre($_POST['nombre']);
        $p->setDescripcion($_POST['descripcion']);
        $p->setPrecio($_POST['precio']);
        $p->setCantidad($_POST['cantidad']);
        $p->setEstado('Activo');
        
        $p->getIdProducto() > 0 ? $this->dao->ActualizarProducto($p) : $this->dao->InsertarProducto($p);

        header("location: ?c=producto");
    }
    

    public function listarProductos() {
        // Tu código para listar productos
    }

    public function EliminarProducto() {
        $estado = 'Inactivo';
        $this->dao->EliminarProducto($_GET['id']);
    
        // Definir el color basado en el estado
        $color = '';
        if ($_GET['estado'] == 'Inactivo') {
            $color = 'background: red;';
        } else {
            $color = 'background: #05d34e;';
        }
    
        header("location: ?c=producto");
    }
    
}
?>
