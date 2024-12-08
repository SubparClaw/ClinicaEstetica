<?php
require_once( 'config/Conexiondb.php' );
require_once( 'modelo/Producto.php' );

class ProductoDAO {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function InsertarProducto( Producto $p ) {
        try {
            $consulta = 'INSERT INTO producto (nombre, descripcion, precio, cantidad, estado) VALUES (?, ?, ?, ?, ?);';
            $stmt = $this->conexion->conectar()->prepare( $consulta );
            $stmt->execute( array(
                $p->getNombre(),
                $p->getDescripcion(),
                $p->getPrecio(),
                $p->getCantidad(),
                $p->getEstado()
            ) );
        } catch ( Exception $e ) {
            die( $e->getMessage() );
        }
    }

    public function ActualizarProducto( Producto $p ) {
        try {
            $consulta = 'UPDATE producto SET nombre = ?, descripcion = ?, precio = ?, cantidad = ? WHERE id_producto = ?;';
            $stmt = $this->conexion->conectar()->prepare( $consulta );
            $stmt->execute( array(
                $p->getNombre(),
                $p->getDescripcion(),
                $p->getPrecio(),
                $p->getCantidad(),
                $p->getIdProducto()
            ) );
        } catch ( Exception $e ) {
            die( $e->getMessage() );
        }
    }

    public function EliminarProducto($id) {
        try {
            $estado = 'Inactivo';
            $query = 'UPDATE producto SET estado = ? WHERE id_producto = ?;';
            $stmt = $this->conexion->conectar()->prepare($query);
            $stmt->execute(array(
                $estado,
                $id
            ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    

    public function obtenerTodosLosProductos() {
        try {
            $consulta = $this->conexion->conectar()->query( 'SELECT * FROM producto;' );
            $consulta->execute();
            return $consulta->fetchAll( PDO::FETCH_OBJ );
        } catch( Exception $e ) {
            die( $e->getMessage() );
        }
    }

    public function ObtenerP($id) {
        try {
            $consulta = $this->conexion->conectar()->prepare('SELECT * FROM producto WHERE Id_producto = ?;');
            $consulta->execute(array($id));
            $r = $consulta->fetch(PDO::FETCH_OBJ);
    
            if ($r) {
                $p = new Producto();
                $p->setIdProducto($r->Id_producto);
                $p->setNombre($r->nombre);
                $p->setDescripcion($r->descripcion);
                $p->setPrecio($r->precio);
                $p->setCantidad($r->cantidad);
                $p->setEstado($r->estado);
                return $p;
            } else {
                return null;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    

}
?>
