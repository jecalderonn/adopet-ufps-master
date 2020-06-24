<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Santos frameworks Batman!  \\

include_once realpath('../dao/interfaz/IFundacion_fotoDao.php');
include_once realpath('../dto/Fundacion_foto.php');
include_once realpath('../dto/Fundacion.php');

class Fundacion_fotoDao implements IFundacion_fotoDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Fundacion_foto en la base de datos.
     * @param fundacion_foto objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($fundacion_foto){
      $idfundacion_foto=$fundacion_foto->getIdfundacion_foto();
$fundacion_fotonombre=$fundacion_foto->getFundacion_fotonombre();
$fundacion_foto_ruta=$fundacion_foto->getFundacion_foto_ruta();
$fundacion_idFundacion=$fundacion_foto->getFundacion_idFundacion()->getIdFundacion();

      try {
          $sql= "INSERT INTO `fundacion_foto`( `idfundacion_foto`, `fundacion_fotonombre`, `fundacion_foto_ruta`, `Fundacion_idFundacion`)"
          ."VALUES ('$idfundacion_foto','$fundacion_fotonombre','$fundacion_foto_ruta','$fundacion_idFundacion')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Fundacion_foto en la base de datos.
     * @param fundacion_foto objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($fundacion_foto){
      $idfundacion_foto=$fundacion_foto->getIdfundacion_foto();

      try {
          $sql= "SELECT `idfundacion_foto`, `fundacion_fotonombre`, `fundacion_foto_ruta`, `Fundacion_idFundacion`"
          ."FROM `fundacion_foto`"
          ."WHERE `idfundacion_foto`='$idfundacion_foto'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $fundacion_foto->setIdfundacion_foto($data[$i]['idfundacion_foto']);
          $fundacion_foto->setFundacion_fotonombre($data[$i]['fundacion_fotonombre']);
          $fundacion_foto->setFundacion_foto_ruta($data[$i]['fundacion_foto_ruta']);
           $fundacion = new Fundacion();
           $fundacion->setIdFundacion($data[$i]['Fundacion_idFundacion']);
           $fundacion_foto->setFundacion_idFundacion($fundacion);

          }
      return $fundacion_foto;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Fundacion_foto en la base de datos.
     * @param fundacion_foto objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($fundacion_foto){
      $idfundacion_foto=$fundacion_foto->getIdfundacion_foto();
$fundacion_fotonombre=$fundacion_foto->getFundacion_fotonombre();
$fundacion_foto_ruta=$fundacion_foto->getFundacion_foto_ruta();
$fundacion_idFundacion=$fundacion_foto->getFundacion_idFundacion()->getIdFundacion();

      try {
          $sql= "UPDATE `fundacion_foto` SET`idfundacion_foto`='$idfundacion_foto' ,`fundacion_fotonombre`='$fundacion_fotonombre' ,`fundacion_foto_ruta`='$fundacion_foto_ruta' ,`Fundacion_idFundacion`='$fundacion_idFundacion' WHERE `idfundacion_foto`='$idfundacion_foto' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Fundacion_foto en la base de datos.
     * @param fundacion_foto objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($fundacion_foto){
      $idfundacion_foto=$fundacion_foto->getIdfundacion_foto();

      try {
          $sql ="DELETE FROM `fundacion_foto` WHERE `idfundacion_foto`='$idfundacion_foto'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Fundacion_foto en la base de datos.
     * @return ArrayList<Fundacion_foto> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idfundacion_foto`, `fundacion_fotonombre`, `fundacion_foto_ruta`, `Fundacion_idFundacion`"
          ."FROM `fundacion_foto`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $fundacion_foto= new Fundacion_foto();
          $fundacion_foto->setIdfundacion_foto($data[$i]['idfundacion_foto']);
          $fundacion_foto->setFundacion_fotonombre($data[$i]['fundacion_fotonombre']);
          $fundacion_foto->setFundacion_foto_ruta($data[$i]['fundacion_foto_ruta']);
           $fundacion = new Fundacion();
           $fundacion->setIdFundacion($data[$i]['Fundacion_idFundacion']);
           $fundacion_foto->setFundacion_idFundacion($fundacion);

          array_push($lista,$fundacion_foto);
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