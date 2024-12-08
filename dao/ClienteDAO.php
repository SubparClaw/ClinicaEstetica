<?php
require_once 'config/Conexiondb.php';
require_once 'modelo/Cliente.php';
require_once 'modelo/Persona.php';

class ClienteDAO {
    private $conexion;
    private $cliente;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function ObtenerC($id) {
        try {
            $consulta = 'SELECT c.id_cliente, p.nombre, p.apellido, p.fecha_nacimiento, p.genero, p.dni, p.telefono, p.correo, p.telefono, c.direccion  
                        FROM clientes c 
                        INNER JOIN persona p ON c.id_persona = p.id_persona
                        WHERE id_cliente = ?';
            $stmt = $this->conexion->conectar()->prepare($consulta);
            $stmt->execute(array($id));
            $cliente = $stmt->fetch(PDO::FETCH_OBJ);
            
            $c = new Cliente();
            $c->setIdCliente($cliente->id_cliente);
            $c->setNombre($cliente->nombre);
            $c->setApellido($cliente->apellido);
            $c->setFechaNacimiento($cliente->fecha_nacimiento);
            $c->setGenero($cliente->genero);
            $c->setDni($cliente->dni);
            $c->setCorreo($cliente->correo);
            $c->setTelefono($cliente->telefono);
            $c->setDireccion($cliente->direccion);
    
            return $c; // Asegúrate de devolver el objeto $c al final del método
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    

    public function InsertarCliente( Cliente $c ) {
        try {
            $consulta = 'CALL sp_InsertarPersonaCliente(?,?,?,?,?,?,?,?,?)';
            $stmt = $this->conexion->conectar()->prepare( $consulta );
            $stmt->execute( array(
                $c->getNombre(),
                $c->getApellido(),
                $c->getFechaNacimiento(),
                $c->getGenero(),
                $c->getDni(),
                $c->getTelefono(),
                $c->getCorreo(),
                $c->getDireccion(),
                $c->getEstado()
            ) );
        } catch( Exception $e ) {
            die( $e->getMessage() );
        }
    }

    /*public function ObtenerTodosLosClientes() {
        try {
            $consulta = 'SELECT c.id_cliente, p.nombre, p.apellido, p.genero, p.dni, p.telefono, p.correo, c.direccion, c.estado 
                        FROM clientes c 
                        INNER JOIN persona p ON c.id_persona = p.id_persona';

            $stmt = $this->conexion->conectar()->prepare($consulta);
            $stmt->execute();
    
            $clientes = [];
    
            while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                $cliente = new Cliente();
                $cliente->setIdCliente($row->id_cliente);
                $cliente->setNombre($row->nombre);
                $cliente->setApellido($row->apellido);
                $cliente->setGenero($row->genero);
                $cliente->setDni($row->dni);
                $cliente->setCorreo($row->correo);
                $cliente->setTelefono($row->telefono);
                $cliente->setDireccion($row->direccion);
                $cliente->setEstado($row->estado);
    
                $clientes[] = $cliente;
            }
    
            return $clientes;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }*/
    
    public function ObtenerTodosLosClientes($nombres = null) {
       // var_dump($nombres);
        try {
            $consulta = 'SELECT c.id_cliente, p.nombre, p.apellido, p.genero, p.dni, p.telefono, p.correo, c.direccion, c.estado 
                        FROM clientes c 
                        INNER JOIN persona p ON c.id_persona = p.id_persona';
        
            if (!empty($nombres)) {
                $consulta .= ' WHERE CONCAT(p.nombre, p.apellido) LIKE :nombres';
            }
        
            $stmt = $this->conexion->conectar()->prepare($consulta);
        
            if (!empty($nombres)) {
                $nombres = '%' . $nombres . '%';
                $stmt->bindParam(':nombres', $nombres, PDO::PARAM_STR);
            }
        
            $stmt->execute();
        
            $clientes = [];
        
            while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                $cliente = new Cliente();
                $cliente->setIdCliente($row->id_cliente);
                $cliente->setNombre($row->nombre);
                $cliente->setApellido($row->apellido);
                $cliente->setGenero($row->genero);
                $cliente->setDni($row->dni);
                $cliente->setCorreo($row->correo);
                $cliente->setTelefono($row->telefono);
                $cliente->setDireccion($row->direccion);
                $cliente->setEstado($row->estado);
        
                $clientes[] = $cliente;
            }
            //var_dump($clientes);
            return $clientes;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ActualizarCliente( Cliente $c ) {
        try {
            $consulta = 'CALL sp_ActualizarPersonaCliente(?,?,?,?,?,?,?,?,?)';
            $stmt = $this->conexion->conectar()->prepare( $consulta );
            $stmt->execute( array(
                $c->getNombre(),
                $c->getApellido(),
                $c->getFechaNacimiento(),
                $c->getGenero(),
                $c->getDni(),
                $c->getTelefono(),
                $c->getCorreo(),
                $c->getDireccion(),
                $c->getIdCliente()

            ) );
        } catch( Exception $e ) {
            die( $e->getMessage() );
        }
    }

    public function EliminarCliente( $id ) {
        try {
            $estado = 'Inactivo';
            $consulta = 'CALL sp_EliminarPersonaCliente(?,?)';
            $stmt = $this->conexion->conectar()->prepare( $consulta );
            $stmt->execute( array( $id, $estado ) );
        } catch( Exception $e ) {
            die( $e->getMessage() );
        }
    }

    public function ListarNombreCliente(){
        try {
            $consulta = "SELECT CONCAT(p.nombre,' ',p.apellido) as nombres FROM clientes c INNER JOIN persona p ON c.id_persona = p.id_persona ;";
            $stmt = $this->conexion->conectar()->prepare( $consulta );
            $stmt->execute();
            return $stmt->fetchAll( PDO::FETCH_OBJ );
        } catch( Exception $e ) {
            die( $e->getMessage() );
        }
    }
}
?>