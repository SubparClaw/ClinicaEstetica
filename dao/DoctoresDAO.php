<?php
require_once 'config/Conexiondb.php';
require_once 'modelo/Doctores.php';
require_once 'modelo/Persona.php';

class DoctoresDAO {
    private $conexion;
    private $doctor;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function ObtenerDoc( $id ) {
        try {
            $consulta = 'SELECT doc.id_doctor, p.nombre, p.apellido, p.fecha_nacimiento, p.genero, p.dni, p.telefono, p.correo, p.telefono, doc.especialidad, doc.nacionalidad, doc.descripcion 
                        FROM doctores doc 
                        INNER JOIN persona p ON doc.id_persona = p.id_persona
                        WHERE id_doctor = ?';
            $stmt = $this->conexion->conectar()->prepare( $consulta );
            $stmt->execute( array( $id ) );
            $doctores = $stmt->fetch( PDO::FETCH_OBJ );

            $doc = new Doctores();
            $doc->setIdDoctor( $doctores->id_doctor );
            $doc->setEspecialidad( $doctores->especialidad );
            $doc->setNombre( $doctores->nombre );
            $doc->setApellido( $doctores->apellido );
            $doc->setGenero( $doctores->genero );
            $doc->setDni( $doctores->dni );
            $doc->setNacionalidad( $doctores->nacionalidad );
            $doc->setFechaNacimiento( $doctores->fecha_nacimiento );
            $doc->setDescripcion( $doctores->descripcion );
            $doc->setCorreo( $doctores->correo );
            $doc->setTelefono( $doctores->telefono );

            return $doc;

        } catch ( Exception $e ) {
            die( $e->getMessage() );
        }
    }

    public function InsertarDoctor( Doctores $doc ) {
        try {
            $consulta = 'CALL sp_InsertarPersonaDoctores(?,?,?,?,?,?,?,?,?,?,?)';
            $stmt = $this->conexion->conectar()->prepare( $consulta );
            $stmt->execute( array(
                $doc->getNombre(),
                $doc->getApellido(),
                $doc->getFechaNacimiento(),
                $doc->getGenero(),
                $doc->getDni(),
                $doc->getTelefono(),
                $doc->getCorreo(),
                $doc->getEspecialidad(),
                $doc->getNacionalidad(),
                $doc->getDescripcion(),
                /*$doc->getFacebook_link(),
                $doc->getTwitter_link(),
                $doc->getInstagram_link(),
                $doc->getDribbble_link(), */
                $doc->getEstado()
            ) );
        } catch( Exception $e ) {
            die( $e->getMessage() );
        }
    }

    public function ObtenerTodosLosDoctores() {
        try {
            $consulta = 'CALL obtenerInformacionDoctores();';
            $stmt = $this->conexion->conectar()->prepare( $consulta );
            $stmt->execute();

            $resultados = $stmt->fetchAll( PDO::FETCH_OBJ );
            $doctores = [];

            foreach ( $resultados as $row ) {
                $doctor = new Doctores();
                $doctor->setIdDoctor( $row->id_doctor );
                $doctor->setEspecialidad( $row->especialidad );
                $doctor->setNombre( $row->nombre );
                $doctor->setGenero( $row->genero );
                $doctor->setDni( $row->dni );
                $doctor->setNacionalidad( $row->nacionalidad );
                $doctor->setTelefono( $row->telefono );
                $doctor->setCorreo( $row->correo );
                $doctor->setEstado( $row->estado );

                $doctores[] = $doctor;
            }

            return $doctores;
        } catch( Exception $e ) {
            die( $e->getMessage() );
        }
    }

    public function ActualizarDoctores( Doctores $doc ) {
        try {
            $consulta = 'CALL sp_ActualizarPersonaDoctores(?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
            $stmt = $this->conexion->conectar()->prepare( $consulta );
            $stmt->execute( array(
                $doc->getNombre(),
                $doc->getApellido(),
                $doc->getFechaNacimiento(),
                $doc->getGenero(),
                $doc->getDni(),
                $doc->getTelefono(),
                $doc->getCorreo(),
                $doc->getEspecialidad(),
                $doc->getNacionalidad(),
                $doc->getDescripcion(),
                $doc->getFacebook_link(),
                $doc->getTwitter_link(),
                $doc->getInstagram_link(),
                $doc->getDribbble_link(),
                $doc->getEstado(),
                $doc->getIdDoctor()

            ) );
        } catch( Exception $e ) {
            die( $e->getMessage() );
        }
    }

    public function EliminarDoctores( $id ) {
        try {
            $estado = 'Inactivo';
            $consulta = 'CALL sp_EliminarPersonaDoctores(?,?)';
            $stmt = $this->conexion->conectar()->prepare( $consulta );
            $stmt->execute( array( $id, $estado ) );
        } catch( Exception $e ) {
            die( $e->getMessage() );
        }
    }

    public function ObtenerNombreApellido($nombres) {
        try {
            $consulta = 'SELECT doc.id_doctor, p.nombre, p.apellido, doc.especialidad FROM doctores doc INNER JOIN persona p ON doc.id_persona = p.id_persona';
           
            if (!empty($nombres)) {
                $consulta .= ' WHERE CONCAT(p.nombre, p.apellido) LIKE :nombres';
            }
        
            $stmt = $this->conexion->conectar()->prepare($consulta);
        
            if (!empty($nombres)) {
                $nombres = '%' . $nombres . '%';
                $stmt->bindParam(':nombres', $nombres, PDO::PARAM_STR);
            }
    
            $stmt->execute();
    
            // Utiliza fetchAll para obtener todos los resultados
            $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
            $doctores = [];
    
            // Crear un array para almacenar los resultados
            foreach ($resultados as $row) {
                $doctor = new Doctores();
                $doctor->setIdDoctor($row->id_doctor);
                $doctor->setNombre($row->nombre);
                $doctor->setApellido($row->apellido);
                $doctor->setEspecialidad($row->especialidad);
                
                $doctores[] = $doctor; // Agrega cada objeto Doctor al array
            }
            
            return $doctores;
            // Devolver el array de doctores
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    

}
?>