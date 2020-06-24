<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Proletarios del mundo ¡Uníos!  \\

include_once realpath('../dao/interfaz/IAlbergueDao.php');
include_once realpath('../dto/Albergue.php');
include_once realpath('../dto/Fundacion.php');
include_once realpath('../dao/entities/conexion3.php');

class AlbergueDao implements IAlbergueDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Albergue en la base de datos.
     * @param albergue objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($albergue){
$nombreAlbergue=$albergue->getNombreAlbergue();
$telefonoAlbergue=$albergue->getTelefonoAlbergue();
$direccionAlbergue=$albergue->getDireccionAlbergue();
$fundacion_idFundacion=$albergue->getFundacion_idFundacion()->getIdFundacion();

      try {
          $sql= "INSERT INTO `albergue`(`nombreAlbergue`, `telefonoAlbergue`, `direccionAlbergue`, `Fundacion_idFundacion`)"
          ."VALUES ('$idAlbergue','$nombreAlbergue','$telefonoAlbergue','$direccionAlbergue','$fundacion_idFundacion')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Albergue en la base de datos.
     * @param albergue objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($albergue){
      $idAlbergue=$albergue->getIdAlbergue();

      try {
          $sql= "SELECT `idAlbergue`, `nombreAlbergue`, `telefonoAlbergue`, `direccionAlbergue`, `Fundacion_idFundacion`"
          ."FROM `albergue`"
          ."WHERE `idAlbergue`='$idAlbergue'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $albergue->setIdAlbergue($data[$i]['idAlbergue']);
          $albergue->setNombreAlbergue($data[$i]['nombreAlbergue']);
          $albergue->setTelefonoAlbergue($data[$i]['telefonoAlbergue']);
          $albergue->setDireccionAlbergue($data[$i]['direccionAlbergue']);
           $fundacion = new Fundacion();
           $fundacion->setIdFundacion($data[$i]['Fundacion_idFundacion']);
           $albergue->setFundacion_idFundacion($fundacion);

          }
      return $albergue;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Albergue en la base de datos.
     * @param albergue objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($albergue){
      $idAlbergue=$albergue->getIdAlbergue();
$nombreAlbergue=$albergue->getNombreAlbergue();
$telefonoAlbergue=$albergue->getTelefonoAlbergue();
$direccionAlbergue=$albergue->getDireccionAlbergue();
$fundacion_idFundacion=$albergue->getFundacion_idFundacion()->getIdFundacion();

      try {
          $sql= "UPDATE `albergue` SET`idAlbergue`='$idAlbergue' ,`nombreAlbergue`='$nombreAlbergue' ,`telefonoAlbergue`='$telefonoAlbergue' ,`direccionAlbergue`='$direccionAlbergue' ,`Fundacion_idFundacion`='$fundacion_idFundacion' WHERE `idAlbergue`='$idAlbergue' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Albergue en la base de datos.
     * @param albergue objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($albergue){
      $idAlbergue=$albergue->getIdAlbergue();

      try {
          $sql ="DELETE FROM `albergue` WHERE `idAlbergue`='$idAlbergue'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Albergue en la base de datos.
     * @return ArrayList<Albergue> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idAlbergue`, `nombreAlbergue`, `telefonoAlbergue`, `direccionAlbergue`, `Fundacion_idFundacion`"
          ."FROM `albergue`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $albergue= new Albergue();
          $albergue->setIdAlbergue($data[$i]['idAlbergue']);
          $albergue->setNombreAlbergue($data[$i]['nombreAlbergue']);
          $albergue->setTelefonoAlbergue($data[$i]['telefonoAlbergue']);
          $albergue->setDireccionAlbergue($data[$i]['direccionAlbergue']);
           $fundacion = new Fundacion();
           $fundacion->setIdFundacion($data[$i]['Fundacion_idFundacion']);
           $albergue->setFundacion_idFundacion($fundacion);

          array_push($lista,$albergue);
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