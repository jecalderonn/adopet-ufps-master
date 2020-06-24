<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La vie est composé de combien de fois nous rions avant de mourir  \\

include_once realpath('../dao/interfaz/IRedsocialDao.php');
include_once realpath('../dto/Redsocial.php');
include_once realpath('../dto/Fundacion.php');

class RedsocialDao implements IRedsocialDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Redsocial en la base de datos.
     * @param redsocial objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($redsocial){
      $idRedesSociales=$redsocial->getIdRedesSociales();
$nombre=$redsocial->getNombre();
$url=$redsocial->getUrl();
$fundacion_idFundacion=$redsocial->getFundacion_idFundacion()->getIdFundacion();

      try {
          $sql= "INSERT INTO `redsocial`(`nombre`, `url`, `Fundacion_idFundacion`)"
          ."VALUES ('$nombre','$url','$fundacion_idFundacion')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Redsocial en la base de datos.
     * @param redsocial objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($redsocial){
      $idRedesSociales=$redsocial->getIdRedesSociales();

      try {
          $sql= "SELECT `idRedesSociales`, `nombre`, `url`, `Fundacion_idFundacion`"
          ."FROM `redsocial`"
          ."WHERE `idRedesSociales`='$idRedesSociales'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $redsocial->setIdRedesSociales($data[$i]['idRedesSociales']);
          $redsocial->setNombre($data[$i]['nombre']);
          $redsocial->setUrl($data[$i]['url']);
           $fundacion = new Fundacion();
           $fundacion->setIdFundacion($data[$i]['Fundacion_idFundacion']);
           $redsocial->setFundacion_idFundacion($fundacion);

          }
      return $redsocial;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Redsocial en la base de datos.
     * @param redsocial objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($redsocial){
      $idRedesSociales=$redsocial->getIdRedesSociales();
$nombre=$redsocial->getNombre();
$url=$redsocial->getUrl();
$fundacion_idFundacion=$redsocial->getFundacion_idFundacion()->getIdFundacion();

      try {
          $sql= "UPDATE `redsocial` SET`idRedesSociales`='$idRedesSociales' ,`nombre`='$nombre' ,`url`='$url' ,`Fundacion_idFundacion`='$fundacion_idFundacion' WHERE `idRedesSociales`='$idRedesSociales' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Redsocial en la base de datos.
     * @param redsocial objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($redsocial){
      $idRedesSociales=$redsocial->getIdRedesSociales();

      try {
          $sql ="DELETE FROM `redsocial` WHERE `idRedesSociales`='$idRedesSociales'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Redsocial en la base de datos.
     * @return ArrayList<Redsocial> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idRedesSociales`, `nombre`, `url`, `Fundacion_idFundacion`"
          ."FROM `redsocial`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $redsocial= new Redsocial();
          $redsocial->setIdRedesSociales($data[$i]['idRedesSociales']);
          $redsocial->setNombre($data[$i]['nombre']);
          $redsocial->setUrl($data[$i]['url']);
           $fundacion = new Fundacion();
           $fundacion->setIdFundacion($data[$i]['Fundacion_idFundacion']);
           $redsocial->setFundacion_idFundacion($fundacion);

          array_push($lista,$redsocial);
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