<?php

require_once( 'modelo/usuarios.php' );
require_once( 'modelo/Persona.php' );
require_once( 'config/Conexiondb.php' );

class UsuarioDao {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function CrearUsuario( Usuarios $usuario ) {
        try {
            $this->conexion->conectar()->beginTransaction();
            $sql = 'CALL sp_CrearCuentaUsuario(:nombre, :apellido, :fechaNacimiento, :genero, :dni, :telefono, :correo, :nombreUsuario, :contrasenia, :estado, :rol)';
            $sentencia = $this->conexion->conectar()->prepare( $sql );
            $sentencia->bindParam( ':nombre', $usuario->getNombre() );
            $sentencia->bindParam( ':apellido', $usuario->getApellido() );
            $sentencia->bindParam( ':fechaNacimiento', $usuario->getFechaNacimiento() );
            $sentencia->bindParam( ':genero', $usuario->getGenero() );
            $sentencia->bindParam( ':dni', $usuario->getDni() );
            $sentencia->bindParam( ':telefono', $usuario->getTelefono() );
            $sentencia->bindParam( ':correo', $usuario->getCorreo() );
            $sentencia->bindParam( ':nombreUsuario', $usuario->getNombreUsuario() );
            $sentencia->bindParam( ':contrasenia', password_hash( $usuario->getContrasenia(), PASSWORD_DEFAULT ) );
            $sentencia->bindParam( ':estado', $usuario->getEstado() );
            $sentencia->bindParam( ':rol', $usuario->getRol() );
            $sentencia->execute();
            $this->conexion->conectar()->commit();
            return true;
        } catch( PDOException $e ) {
            die( $e->getMessage() );
        }
    }



    public function EliminarUsuario(Usuarios $usuario) {
          $estado = 'Inactivo';
          try {
          $sql = 'UPDATE usuarios SET estado = :estado WHERE id_usuario = :idUsuario';
          $sentencia = $this->conexion->conectar()->prepare($sql);
          $sentencia->bindParam(':estado', $estado);
          $sentencia->bindParam(':idUsuario', $usuario->getIdUsuario());
          $sentencia->execute();
          return true;
          } catch (PDOException $e) {
          die($e->getMessage());
          }
     }
 

    public function ActualizarUsuario(Usuarios $usuario ) {
        try {
            
            $sql = 'CALL sp_ActualizarUsuario(:nombre, :apellido, :fechaNacimiento, :genero, :dni, :telefono, :correo, :estado, :rol, :idUsuario)';
            $sentencia = $this->conexion->conectar()->prepare( $sql );

            $sentencia->bindParam( ':nombre', $usuario->getNombre() );
            $sentencia->bindParam( ':apellido', $usuario->getApellido() );
            $sentencia->bindParam( ':fechaNacimiento', $usuario->getFechaNacimiento() );
            $sentencia->bindParam( ':genero', $usuario->getGenero() );
            $sentencia->bindParam( ':dni', $usuario->getDni() );
            $sentencia->bindParam( ':telefono', $usuario->getTelefono() );
            $sentencia->bindParam( ':correo', $usuario->getCorreo() );
            $sentencia->bindParam( ':estado', $usuario->getEstado() );
            $sentencia->bindParam( ':rol', $usuario->getRol() );
            $sentencia->bindParam( ':idUsuario', $usuario->getIdUsuario() );
            $sentencia->execute();

            return true;
        } catch( PDOException $e ) {
            die( $e->getMessage() );
        }
    }

    public function ObtenerUsuario( $id ) {

        try {
          $sql = "CALL sp_ObtenerDatosUsuario( :idUsuario);";


            $sentencia = $this->conexion->conectar()->prepare( $sql );
            $sentencia->bindParam( ':idUsuario', $id );
            $sentencia->execute();
            $ususario=$sentencia->fetch( PDO::FETCH_OBJ );

            $u= new Usuarios();
            $u->setIdUsuario( $ususario->id_usuario );
            $u->setNombre( $ususario->nombre );
            $u->setApellido( $ususario->apellido );
            $u->setFechaNacimiento( $ususario->fecha_nacimiento );
            $u->setGenero( $ususario->genero );
            $u->setDni( $ususario->dni );
            $u->setTelefono( $ususario->telefono );
            $u->setCorreo( $ususario->correo );
            $u->setNombreUsuario( $ususario->nombreusuario );
            $u->setRol( $ususario->id_rol );
            $u->setNomrol( $ususario->nombre_rol );


            return $u; 
            
        } catch( PDOException $e ) {
            die( $e->getMessage() );
        }
    }

    public function ObtenerTodos() {
        try {
            $sql = 'CALL sp_ObtenerUsuarioRol()';
            $sentencia = $this->conexion->conectar()->prepare( $sql );
            $sentencia->execute();
            return $sentencia->fetchAll( PDO::FETCH_OBJ );
        } catch( PDOException $e ) {
            die( $e->getMessage() );
        }
    }

    public function Login( $nombreUsuario, $contrasenia ) {
        try {
            $query = 'SELECT * FROM usuarios WHERE nombreUsuario = :nombreUsuario LIMIT 1';
            $sentencia = $this->conexion->conectar()->prepare( $query );
            $sentencia->bindParam( ':nombreUsuario', $nombreUsuario );
            $sentencia->execute();

            $usuario = $sentencia->fetch(PDO::FETCH_OBJ);


            if ( $usuario && password_verify( $contrasenia, $usuario->contrasenia ) ) {
                // Devuelve el usuario si la contraseña es válida
                return $usuario;
            } else {
                // Devuelve false si el usuario o la contraseña son incorrectos
                return false;
            }
        } catch ( PDOException $e ) {
            die( $e->getMessage() );
        }
    }

    public function ListarRoles() {
        try {
            $sql = 'SELECT * FROM roles';
            $sentencia = $this->conexion->conectar()->prepare( $sql );
            $sentencia->execute();
            return $sentencia->fetchAll( PDO::FETCH_OBJ );
        } catch( PDOException $e ) {
            die( $e->getMessage() );
        }
    }

    public function asignarRol( $idUsuario, $idRol ) {
        try {
            $this->conexion->conectar()->beginTransaction();
            $sql = 'INSERT INTO usuarios_roles (id_usuario, id_rol) VALUES (:id_usuario, :id_rol)';
            $sentencia = $this->conexion->conectar()->prepare( $sql );
            $sentencia->bindParam( ':id_usuario', $idUsuario );
            $sentencia->bindParam( ':id_rol', $idRol );
            $sentencia->execute();

            return true;
        } catch( PDOException $e ) {
            die( $e->getMessage() );
        }
    }

    public function comprobarCredenciales($correo, $telefono) {
        try {
            $sql = 'SELECT u.id_usuario
                    FROM usuarios u
                    INNER JOIN persona p ON u.id_persona = p.id_persona
                    WHERE p.correo = :correo AND p.telefono = :telefono;
                    ';
            $sentencia = $this->conexion->conectar()->prepare( $sql );
            $sentencia->bindParam( ':correo', $correo );
            $sentencia->bindParam( ':telefono', $telefono );
            $sentencia->execute();
    }catch( PDOException $e ) {
            die( $e->getMessage() );
        }
    }

    public function cambiarContrasenia($idUsuario, $contrasenia) {
        try {
            $sql = 'UPDATE usuarios SET contrasenia = :contrasenia WHERE id_usuario = :idUsuario';
            $sentencia = $this->conexion->conectar()->prepare( $sql );
            $sentencia->bindParam( ':contrasenia', password_hash( $contrasenia, PASSWORD_DEFAULT) );
            $sentencia->bindParam( ':idUsuario', $idUsuario );
            $sentencia->execute();
            return true;
        } catch( PDOException $e ) {
            die( $e->getMessage() );
        }
    }

}

