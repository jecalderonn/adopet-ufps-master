<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Le he dedicado más tiempo a las frases que al software interno  \\

include_once realpath('../dao/interfaz/ISolicitudDao.php');
include_once realpath('../dto/Solicitud.php');
include_once realpath('../dto/Usuario.php');
include_once realpath('../dto/Mascota.php');

class SolicitudDao implements ISolicitudDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Solicitud en la base de datos.
     * @param solicitud objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($solicitud){
      $idSolicitud=$solicitud->getIdSolicitud();
$usuario_idUsuario=$solicitud->getUsuario_idUsuario()->getIdUsuario();
$descripcion=$solicitud->getDescripcion();
$aprobacion=$solicitud->getAprobacion();
$tipoSolucitud=$solicitud->getTipoSolucitud();
$mascota_idMascota=$solicitud->getMascota_idMascota()->getIdMascota();

      try {
          $sql= "INSERT INTO `solicitud`( `idSolicitud`, `Usuario_idUsuario`, `descripcion`, `aprobacion`, `tipoSolucitud`, `Mascota_idMascota`)"
          ."VALUES ('$idSolicitud','$usuario_idUsuario','$descripcion','$aprobacion','$tipoSolucitud','$mascota_idMascota')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Solicitud en la base de datos.
     * @param solicitud objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($solicitud){
      $idSolicitud=$solicitud->getIdSolicitud();

      try {
          $sql= "SELECT `idSolicitud`, `Usuario_idUsuario`, `descripcion`, `aprobacion`, `tipoSolucitud`, `Mascota_idMascota`"
          ."FROM `solicitud`"
          ."WHERE `idSolicitud`='$idSolicitud'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $solicitud->setIdSolicitud($data[$i]['idSolicitud']);
           $usuario = new Usuario();
           $usuario->setIdUsuario($data[$i]['Usuario_idUsuario']);
           $solicitud->setUsuario_idUsuario($usuario);
          $solicitud->setDescripcion($data[$i]['descripcion']);
          $solicitud->setAprobacion($data[$i]['aprobacion']);
          $solicitud->setTipoSolucitud($data[$i]['tipoSolucitud']);
           $mascota = new Mascota();
           $mascota->setIdMascota($data[$i]['Mascota_idMascota']);
           $solicitud->setMascota_idMascota($mascota);

          }
      return $solicitud;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Solicitud en la base de datos.
     * @param solicitud objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($solicitud){
      $idSolicitud=$solicitud->getIdSolicitud();
$usuario_idUsuario=$solicitud->getUsuario_idUsuario()->getIdUsuario();
$descripcion=$solicitud->getDescripcion();
$aprobacion=$solicitud->getAprobacion();
$tipoSolucitud=$solicitud->getTipoSolucitud();
$mascota_idMascota=$solicitud->getMascota_idMascota()->getIdMascota();

      try {
          $sql= "UPDATE `solicitud` SET`idSolicitud`='$idSolicitud' ,`Usuario_idUsuario`='$usuario_idUsuario' ,`descripcion`='$descripcion' ,`aprobacion`='$aprobacion' ,`tipoSolucitud`='$tipoSolucitud' ,`Mascota_idMascota`='$mascota_idMascota' WHERE `idSolicitud`='$idSolicitud' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Solicitud en la base de datos.
     * @param solicitud objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($solicitud){
      $idSolicitud=$solicitud->getIdSolicitud();

      try {
          $sql ="DELETE FROM `solicitud` WHERE `idSolicitud`='$idSolicitud'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Solicitud en la base de datos.
     * @return ArrayList<Solicitud> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idSolicitud`, `Usuario_idUsuario`, `descripcion`, `aprobacion`, `tipoSolucitud`, `Mascota_idMascota`"
          ."FROM `solicitud`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $solicitud= new Solicitud();
          $solicitud->setIdSolicitud($data[$i]['idSolicitud']);
           $usuario = new Usuario();
           $usuario->setIdUsuario($data[$i]['Usuario_idUsuario']);
           $solicitud->setUsuario_idUsuario($usuario);
          $solicitud->setDescripcion($data[$i]['descripcion']);
          $solicitud->setAprobacion($data[$i]['aprobacion']);
          $solicitud->setTipoSolucitud($data[$i]['tipoSolucitud']);
           $mascota = new Mascota();
           $mascota->setIdMascota($data[$i]['Mascota_idMascota']);
           $solicitud->setMascota_idMascota($mascota);

          array_push($lista,$solicitud);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

      public function insertarConsulta($sql){
          $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sentencia=$this->cn->prepare($sql);
          $sentencia->execute(); 
          $sentencia = null;
          return $this->cn->lastInsertId();
    }
      public function ejecutarConsulta($sql){
          $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sentencia=$this->cn->prepare($sql);
          $sentencia->execute(); 
          $data = $sentencia->fetchAll();
          $sentencia = null;
          return $data;
    }
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close(){
      $cn=null;
  }
}
//That`s all folks!