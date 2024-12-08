<?php
class Conexion {
    private $host = 'localhost';
    private $usuario = 'root';
    private $contrasena = '';
    private $base_datos = 'bdicaria';
    private $conexion; 

    public function conectar() {
        try {
            $this->conexion = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->base_datos, $this->usuario, $this->contrasena);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conexion;
        } catch (PDOException $e) {
            throw new Exception("Falló la conexión: " . $e->getMessage());
        }
    }

    public function cerrar() {
        $this->conexion = null;
    }
}
?>
