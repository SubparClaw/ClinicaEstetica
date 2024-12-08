<?php
class CategoriasDAO {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function ListarCategorias() {
        try {
            $consulta = $this->conexion->conectar()->query('SELECT * FROM categorias;');
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ObtenerCat($id) {
        try {
            $consulta = $this->conexion->conectar()->prepare('SELECT * FROM categorias WHERE id_categoria = ?;');
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);

            if($r){
                $cat = new Categorias();
                $cat->setIdCategoria($r->id_categoria);
                $cat->setNomCategoria($r->nombreCategoria);
                return $cat;
            }

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ObtenerNomCat(){
        try {
            $consulta = $this->conexion->conectar()->query('SELECT nombreCategoria FROM categorias;');
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch(Exception $e) {
            throw new Exception("Error al obtener nombres de categorías: " . $e->getMessage());
        }
    }

    public function InsertarCat($cat) {
        try {
            $consulta = $this->conexion->conectar()->prepare('INSERT INTO categorias (nombreCategoria) VALUES (?)');
            $consulta->execute(array($cat));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ActualizarCat($cat) {
        try {
            $consulta = $this->conexion->conectar()->prepare('UPDATE categorias SET nombreCategoria = ? WHERE id_categoria = ?');
            $consulta->execute(array($cat->getNomCat(), $cat->getIdCat()));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function EliminarCat($id) {
        try {
            $estado = 'Inactivo';
            $consulta = $this->conexion->conectar()->prepare('UPDATE categorias SET estado = ? WHERE id_categoria = ?');
            $consulta->execute(array($estado, $id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



}
?>