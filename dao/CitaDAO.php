<?php
require_once( 'config/Conexiondb.php' );
require_once( 'modelo/Cita.php' );

class CitaDAO {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function getCitas() {
        try {
            $query = 'SELECT id_cita, citanum, nombres, telefono, fecha, hora FROM cita';
            $stmt = $this->conexion->conectar()->query( $query );
            #	Número de Cita	Nombre Cliente	Número Celular	Fecha de Cita	Hora de Cita	Acción
            $citas = [];
            while ( $registro = $stmt->fetch() ) {
                $cita = new Cita();
                $cita->setId_cita( $registro['id_cita'] );
                $cita->setCitanum( $registro['citanum'] );
                $cita->setNombres( $registro['nombres'] );
                $cita->setTelefono( $registro['telefono'] );
                $cita->setFecha( $registro['fecha'] );
                $cita->setHora( $registro['hora'] );
                $citas[] = $cita;
            }
            return $citas;
        } catch ( PDOException $e ) {
            throw new Exception( 'Error al obtener citas: ' . $e->getMessage() );
        }
        finally {
            $this->conexion->cerrar();
        }
    }

    public function ObtenerDetalleCita($id) {
        try {
            $query = 'SELECT c.id_cita, c.citanum, c.nombres, c.correo, c.telefono, c.fecha, c.hora, s.nomServicio, c.fechaRegistro, c.estado
            FROM cita c INNER JOIN servicios s ON c.id_servicio=s.id_servicio WHERE c.id_cita= ?';
            $stmt = $this->conexion->conectar()->prepare($query);
            $stmt->execute([$id]);
    
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($data) {
                $cita = new Cita();
                $cita->setId_cita($data['id_cita']);
                $cita->setCitanum($data['citanum']);
                $cita->setNombres($data['nombres']);
                $cita->setCorreo($data['correo']);
                $cita->setTelefono($data['telefono']);
                $cita->setFecha($data['fecha']);
                $cita->setHora($data['hora']);
                $cita->setId_servicio($data['nomServicio']);
                $cita->setFechaRegistro($data['fechaRegistro']);
                $cita->setEstado($data['estado']);
    
                return $cita;
            } else {
                return null; // o lanzar una excepción si prefieres manejar ese caso de otra manera
            }
        } catch (PDOException $e) {
            throw new Exception('Error al obtener cita: ' . $e->getMessage());
        } finally {
            $this->conexion->cerrar();
        }
    }
    

    public function crearCita( Cita $cita ) {
        try {
            /* // Verificar si el id_cliente es un valor válido ( puede ser nulo )
            $idCliente = $cita->getId_cliente();

            // Si id_cliente es null, asignar un valor por defecto
            if ( $idCliente === null ) {
                // Puedes asignar un valor por defecto o manejar este caso según tu lógica de negocio
                $idCliente = 0;
                // Por ejemplo, si 0 representa un cliente 'sin cuenta'
            }
            */

            // El cliente siempre existe en este contexto ( puede ser un cliente sin cuenta )
            $query = 'INSERT INTO cita(id_doctor, id_servicio, citanum, nombres, telefono, correo, fecha, hora, estado) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?)';
            $stmt = $this->conexion->conectar()->prepare( $query );
            $stmt->execute( [ $cita->getId_doctor(), $cita->getId_servicio(), $cita->getCitanum(), $cita->getNombres(), $cita->getTelefono(), $cita->getCorreo(), $cita->getFecha(), $cita->getHora(), $cita->getEstado() ] );
        } catch ( PDOException $e ) {
            throw new Exception( 'Error al crear cita: ' . $e->getMessage() );
        }
        finally {
            // $this->conexion->cerrar();
        }
    }

    public function editarCita( Cita $cita ) {
        try {
            //$query = 'UPDATE  cita SET Observacion=?, estado=? WHERE ID=?;';
            $query = 'UPDATE  cita SET  estado=? WHERE id_cita=?;';
            $stmt = $this->conexion->conectar()->prepare( $query );
            $stmt->execute( [ $cita->getEstado(), $cita->getId_cita() ] );
        } catch ( PDOException $e ) {
            throw new Exception( 'Error al editar cita: ' . $e->getMessage() );
        }
        finally {
            $this->conexion->cerrar();
        }
    }

    public function eliminarCita( Cita $cita ) {
        try {
            $query = 'DELETE FROM cita WHERE id_cita = ?';
            $stmt = $this->conexion->conectar()->prepare( $query );
            $stmt->execute( [ $cita->getId_cita() ] );
        } catch ( PDOException $e ) {
            throw new Exception( 'Error al eliminar cita: ' . $e->getMessage() );
        }
        finally {
            $this->conexion->cerrar();
        }
    }

    public function citaNotificada() {
        try {
            $query = "CALL sp_listarcitassinaceptar()";
            $stmt = $this->conexion->conectar()->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Devolver los resultados como un array asociativo
        } catch (PDOException $e) {
            throw new Exception('Error al notificar cita: ' . $e->getMessage());
        } finally {
            $this->conexion->cerrar();
        }
    }
    

    public function obtenerIdServicio( $nombreServicio ) {
        try {
            $query = 'SELECT id_servicio FROM servicios WHERE nomServicio = ?';
            $stmt = $this->conexion->conectar()->prepare( $query );
            $stmt->execute( [ $nombreServicio ] );
            $idServicio = $stmt->fetchColumn();
            return $idServicio;
        } catch ( PDOException $e ) {
            throw new Exception( 'Error al obtener el id del servicio: ' . $e->getMessage() );
        }
        finally {
            $this->conexion->cerrar();
        }
    }

    public function obtenerIdDoctor( $nombreDoctor ) {
        try {
            $query = "SELECT doc.id_doctor FROM doctores doc INNER JOIN persona p ON doc.id_persona = p.id_persona 
            WHERE CONCAT(p.nombre, ' ', p.apellido)  = ? ";
            $stmt = $this->conexion->conectar()->prepare( $query );
            $stmt->execute( [ $nombreDoctor ] );
            $idDoctor = $stmt->fetchColumn();
            return $idDoctor;
        } catch ( PDOException $e ) {
            throw new Exception( 'Error al obtener el id del doctor: ' . $e->getMessage() );
        }
        finally {
            $this->conexion->cerrar();
        }
    }

    public function obtenerIdCliente( $nombreCliente ) {
        try {
            $query = "SELECT c.id_cliente FROM clientes c INNER JOIN persona p ON c.id_persona = p.id_persona 
            WHERE CONCAT(nombre, ' ', apellido) = ?";
            $stmt = $this->conexion->conectar()->prepare( $query );
            $stmt->execute( [ $nombreCliente ] );
            $idCliente = $stmt->fetchColumn();
            return $idCliente;
        } catch ( PDOException $e ) {
            throw new Exception( 'Error al obtener el id del cliente: ' . $e->getMessage() );
        }
        finally {
            $this->conexion->cerrar();
        }
    }


    public function obtenerHorasOcupadas($fecha) {
        try{
            // Ejemplo: Obtener las horas ocupadas para la fecha proporcionada
            $consulta = "SELECT hora FROM cita WHERE fecha = :fecha";
            $stmt = $this->conexion->conectar()->prepare($consulta);
            $stmt->bindParam(':fecha', $fecha);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            $horasOcupadas = [];
            foreach ($resultados as $resultado) {
                $horasOcupadas[] = $resultado['hora'];
            }
    
            return $horasOcupadas;
        }catch(PDOException $e){
            die($e->getMessage());
        }
        
    }

}
?>
