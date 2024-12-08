<?php
require_once "config/Conexiondb.php";
require_once "modelo/Factura.php";
class FacturaDAO{
     private $conexion;
     public function __construct()
     {
          $this->conexion = new Conexion();
     }

     public function ObtenerFactura($id){
          try{
               $consulta = "SELECT
                              f.id_factura,
                              CONCAT(pc.nombre, ' ', pc.apellido) AS nombreCli,
                              c.direccion,
                              pc.correo,
                              pc.telefono,
                              CONCAT(pd.nombre, ' ', pd.apellido) AS nombreDoc,
                              d.especialidad,
                              f.descripcion,
                              DATE_FORMAT(f.fechaemision, '%Y-%m-%d') AS fecha,
                              DATE_FORMAT(f.fechaemision, '%H:%i:%s') AS hora
                         FROM
                              factura f
                         INNER JOIN clientes c ON f.id_cliente = c.id_cliente
                         INNER JOIN doctores d ON f.id_doctor = d.id_doctor
                         INNER JOIN persona pc ON c.id_persona = pc.id_persona
                         INNER JOIN persona pd ON d.id_persona = pd.id_persona
                         WHERE
                              f.id_factura = ?;";
               $stmt = $this->conexion->conectar()->prepare($consulta);
               $stmt->execute(array($id));
               $result = $stmt->fetch(PDO::FETCH_OBJ);

          return $result;
          } catch (PDOException $e) {
               die($e->getMessage());
          }
     }

     public function ObtenerDetalleFac($id){
          try {
              $consulta = "SELECT
                              LPAD(UPPER(CONCAT(df.id_servicio, SUBSTRING(s.nomServicio , 1, 3))), 6, '0') as cod,
                              s.nomServicio,
                              df.cantidad,
                              df.precio
                          FROM
                              detalle_factura df
                          INNER JOIN servicios s ON df.id_servicio = s.id_servicio
                          WHERE
                              df.id_factura = ?;";
              $stmt = $this->conexion->conectar()->prepare($consulta);
              $stmt->execute([$id]);
              return $stmt->fetchAll(PDO::FETCH_OBJ);
          } catch(PDOException $e) {
              die($e->getMessage());
          }
      }
      

     public function InsertarFactura(Factura $f){
          try{
               $consulta = 'CALL sp_GenerarFactura(?,?,?,?)';
               $stmt = $this->conexion->conectar()->prepare($consulta);
               $stmt->execute(array($f->getId_Cliente(),
                                    $f->getId_usuario(),
                                    $f->getId_Doctor(),
                                    $f->getDescripcion()
                                   ));

          }catch(PDOException $e){
               die($e->getMessage());
          }
     }

     public function ListarFacturas(){
          try{
               $consulta = 'CALL sp_ListarFactura()';
               $stmt = $this->conexion->conectar()->prepare($consulta);
               $stmt->execute();
               return $stmt->fetchAll(PDO::FETCH_OBJ);
          }catch(PDOException $e){
               die($e->getMessage());
          }
     }

     public function ListarPerfil() {
          $this->conexion = new Conexion();
  
          try {
              $query = 'SELECT * FROM perfil WHERE id = 1';
              $stmt = $this->conexion->conectar()->prepare( $query );
              $stmt->execute();
              return $stmt->fetch( PDO::FETCH_ASSOC );
          } catch ( PDOException $e ) {
              die( $e->getMessage() );
          }
      }


}