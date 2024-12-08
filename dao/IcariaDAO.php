<?php
require_once('config/Conexiondb.php');
require_once('modelo/icaria.php');

class IcariaDao{

     private $db;

     public function __construct(){

          $this->db = new Conexion();
     }

     public function listarIcaria(){
          try
          {
               $sql = "SELECT
               (SELECT COUNT(id_cliente) FROM clientes) AS cantCli,
               (SELECT COUNT(id_usuario) FROM usuarios) AS cantUsu,
               (SELECT COUNT(id_doctor) FROM doctores WHERE especialidad = 'doctor') AS cantDoc,
               (SELECT COUNT(id_doctor) FROM doctores WHERE especialidad = 'Enfermera estética ') AS cantDocEnfermera;";
               $query = $this->db->conectar()->prepare($sql);
               $query->execute();
               $icaria = $query->fetch(PDO::FETCH_OBJ);
               return $icaria;
          }
          catch(Exception $e)
          {
               die($e->getMessage());
          }
     }

     public function ganaciasHoy(){
          try{
               $sql = "SELECT ROUND(SUM(df.cantidad * df.precio) * 1.18, 2) AS totalVentasHoy
                         FROM factura f
                         INNER JOIN detalle_factura df ON df.id_factura = f.id_factura
                         WHERE DATE(f.fechaemision) = CURDATE();";
               $query = $this->db->conectar()->prepare($sql);
               $query->execute();
               $icaria = $query->fetch(PDO::FETCH_OBJ);
               return $icaria;
          }
          catch(Exception $e)
          {
               die($e->getMessage());
          }
     }

     public function ganaciasSemana(){
          try{
               $sql = "SELECT ROUND(SUM(df.cantidad * df.precio) * 1.18, 2) AS totalVentasSemana
                         FROM factura f
                         INNER JOIN detalle_factura df ON df.id_factura = f.id_factura
                         WHERE WEEK(fechaemision) = WEEK(CURDATE());";
               $query = $this->db->conectar()->prepare($sql);
               $query->execute();
               $icaria = $query->fetch(PDO::FETCH_OBJ);
               return $icaria;
          }catch(PDOException $e){
               die($e->getMessage());
          }
     }

     public function ganaciasMes(){
          try{
               $sql = "SELECT ROUND(SUM(df.cantidad * df.precio) * 1.18, 2) AS totalVentasMes
                         FROM factura f
                         INNER JOIN detalle_factura df ON df.id_factura = f.id_factura
                         WHERE MONTH(fechaemision) = MONTH(CURDATE());";
               $query = $this->db->conectar()->prepare($sql);
               $query->execute();
               $icaria = $query->fetch(PDO::FETCH_OBJ);
               return $icaria;
          }catch(PDOException $e){
               die($e->getMessage());
          }
     }

     public function ganaciasAnio(){
          
          try{
               $sql = "SELECT ROUND(SUM(df.cantidad * df.precio) * 1.18, 2) AS totalVentasAnio
                         FROM factura f
                         INNER JOIN detalle_factura df ON df.id_factura = f.id_factura
                         WHERE YEAR(fechaemision) = YEAR(CURDATE());";
               $query = $this->db->conectar()->prepare($sql);
               $query->execute();
               $icaria = $query->fetch(PDO::FETCH_OBJ);
               return $icaria;
          }catch(PDOException $e){
               die($e->getMessage());
          }
     }

     public function graficosGancias(){
          try{
               $sql = "SELECT
                              DATE_FORMAT(fechaemision, '%Y-%m') AS periodo,
                              ROUND(SUM(df.cantidad * df.precio) * 1.18, 2) AS totalVentas
                         FROM factura f
                         INNER JOIN detalle_factura df ON df.id_factura = f.id_factura
                         GROUP BY periodo
                         ORDER BY periodo;";
               $query = $this->db->conectar()->prepare($sql);
               $query->execute();
               $icaria = $query->fetch(PDO::FETCH_OBJ);
               return $icaria;
          }catch(PDOException $e){
               die($e->getMessage());
          }
     }
     
     public function grafico7(){
          try{
               $sql = "SELECT MONTH(f.fechaemision) AS mes, SUM(df.precio * df.cantidad)*1.18 AS ingresos
                         FROM factura f JOIN detalle_factura df ON f.id_factura = df.id_factura
                         WHERE YEAR(f.fechaemision) = YEAR(NOW()) GROUP BY
                              mes;";
               $query = $this->db->conectar()->prepare($sql);
               $query->execute();
               $icaria = $query->fetch(PDO::FETCH_OBJ);
               return $icaria;
          }catch(PDOException $e){
               die($e->getMessage());
          }
     }

     public function grafico8(){
          try{
               $sql = "SELECT MONTH(s.fechaRegistro) AS mes, COUNT(*) AS cantidad_servicios
                       FROM servicios s
                       WHERE YEAR(s.fechaRegistro) = YEAR(NOW()) GROUP BY mes;";

               $query = $this->db->conectar()->prepare($sql);
               $query->execute();
               $icaria = $query->fetch(PDO::FETCH_OBJ);
               return $icaria;
          }catch(PDOException $e){
               die($e->getMessage());
          }
     }
}