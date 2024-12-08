<?php

class ServiciosDAO {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function InsertarServicio( Servicios $s ) {
        try {
            $consulta = 'INSERT INTO Servicios (nomServicio, descripcion, precio, estado) VALUES ( ?, ?, ?, ?);';
            $stmt = $this->conexion->conectar()->prepare( $consulta );
            $stmt->execute( array(
                $s->getNomServicio(),
                $s->getDescripcion(),
                $s->getPrecio(),
                $s->getEstado()
            ) );
        } catch ( Exception $e ) {
            die( $e->getMessage() );
        }
    }

    public function ActualizarServicio( Servicios $s ) {
        try {
            $consulta = 'UPDATE Servicios SET nomServicio = ?, descripcion = ?, precio = ? WHERE Id_servicio = ?;';
            $stmt = $this->conexion->conectar()->prepare( $consulta );
            $stmt->execute( array(
                $s->getNomServicio(),
                $s->getDescripcion(),
                $s->getPrecio(),
                $s->getIdServicio()
            ) );
        } catch ( Exception $e ) {
            die( $e->getMessage() );
        }
    }

    public function EliminarServicio( $id ) {
        try {
            $estado = 'Inactivo';
            $query = 'UPDATE Servicios SET estado = ? WHERE Id_Servicio = ?;';
            $stmt = $this->conexion->conectar()->prepare( $query );
            $stmt->execute( array(
                $estado,
                $id
            ) );
        } catch ( Exception $e ) {
            die( $e->getMessage() );
        }
    }

    public function obtenerTodosLosServicios() {
        try {
            $consulta = $this->conexion->conectar()->query( 'SELECT * FROM servicios;' );
            $consulta->execute();
            return $consulta->fetchAll( PDO::FETCH_OBJ );
        } catch ( Exception $e ) {
            die( $e->getMessage() );
        }
    }

    public function ObtenerS( $id ) {
        try {
            $consulta = $this->conexion->conectar()->prepare( 'SELECT * FROM servicios WHERE Id_servicio = ?;' );
            $consulta->execute( array( $id ) );
            $r = $consulta->fetch( PDO::FETCH_OBJ );

            if ( $r ) {
                $s = new Servicios();
                $s->setIdServicio( $r->id_servicio );
                $s->setNomServicio( $r->nomServicio );
                $s->setDescripcion( $r->descripcion );
                $s->setPrecio( $r->precio );
                return $s;
            } else {
                return null;
            }
        } catch ( Exception $e ) {
            die( $e->getMessage() );
        }
    }
    //landing page consultas

    public function ListarCategorias(){
        try{
            $consulta = $this->conexion->conectar()->query('SELECT nombreCategoria FROM categorias');
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    public function ListarServicios($nomCategoria){
        //$nomCategoria='Procedimientos faciales';
        try {
            $consulta = $this->conexion->conectar()->prepare('SELECT nomServicio FROM servicios s INNER JOIN categorias c ON s.id_categoria = c.id_categoria WHERE c.nombreCategoria = ?');
            $consulta->execute([$nomCategoria]);
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch(Exception $e) {
            throw new Exception("Error al obtener servicios: " . $e->getMessage());
        }
    }

    public function MostrarServicioDet($nombreServicio){
        try {
            $consulta = $this->conexion->conectar()->prepare('SELECT nombreCategoria, nomServicio, precio, descripcion FROM servicios s 
                                                            INNER JOIN categorias c ON s.id_categoria = c.id_categoria 
                                                            WHERE s.nomServicio = ?');
            $consulta->execute([$nombreServicio]);
            return $consulta->fetch(PDO::FETCH_OBJ);
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function InsertarServicioTmp($idServicio, $idUsuario){
        try {
            $consulta = $this->conexion->conectar()->prepare('CALL sp_DetalleFacturaServicio(?, ?)');
            $consulta->execute([$idServicio, $idUsuario]);  // Corregido aquí
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }
    

// ServicioDao.php

public function ListarServiciosTmp() {
    try {
        $consulta = $this->conexion->conectar()->prepare('CALL sp_ListarServiciosTmp()');
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC); // Cambiado a FETCH_ASSOC
    } catch(Exception $e) {
        die($e->getMessage());
    }
}


    public function EliminarServicioTmp($id){
        try {
            $consulta = $this->conexion->conectar()->prepare('CALL sp_EliminarServicioTmp(?)');
            $consulta->execute([$id]);
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }
    
    
}
?>