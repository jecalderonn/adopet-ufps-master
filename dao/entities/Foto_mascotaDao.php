<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Cuantas frases como esta crees que puedo escribir?  \\

include_once realpath('../dao/interfaz/IFoto_mascotaDao.php');
include_once realpath('../dto/Foto_mascota.php');
include_once realpath('../dto/Mascota.php');
include_once realpath('../dao/entities/conexion3.php');

class Foto_mascotaDao implements IFoto_mascotaDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Foto_mascota en la base de datos.
     * @param foto_mascota objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($foto_mascota){
   //   $idfoto_mascota=$foto_mascota->getIdfoto_mascota();
$foto_mascota_nombre=$foto_mascota->getFoto_mascota_nombre();
$foto_mascota_ruta=$foto_mascota->getFoto_mascota_ruta();
$mascota_idMascota=$foto_mascota->getMascota_idMascota()->getIdMascota();

      try {
          $sql= "INSERT INTO `foto_mascota`(  `foto_mascota_nombre`, `foto_mascota_ruta`, `Mascota_idMascota`)"
          ."VALUES ('$foto_mascota_nombre','$foto_mascota_ruta','$mascota_idMascota')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Foto_mascota en la base de datos.
     * @param foto_mascota objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($foto_mascota){
      $idfoto_mascota=$foto_mascota->getIdfoto_mascota();

      try {
          $sql= "SELECT `idfoto_mascota`, `foto_mascota_nombre`, `foto_mascota_ruta`, `Mascota_idMascota`"
          ."FROM `foto_mascota`"
          ."WHERE `idfoto_mascota`='$idfoto_mascota'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $foto_mascota->setIdfoto_mascota($data[$i]['idfoto_mascota']);
          
          $foto_mascota->setFoto_mascota_nombre($data[$i]['foto_mascota_nombre']);
          $foto_mascota->setFoto_mascota_ruta($data[$i]['foto_mascota_ruta']);
           $mascota = new Mascota();
           $mascota->setIdMascota($data[$i]['Mascota_idMascota']);
           $foto_mascota->setMascota_idMascota($mascota);

          }
      return $foto_mascota;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Foto_mascota en la base de datos.
     * @param foto_mascota objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($foto_mascota){
      $idfoto_mascota=$foto_mascota->getIdfoto_mascota();
$foto_mascota_nombre=$foto_mascota->getFoto_mascota_nombre();
$foto_mascota_ruta=$foto_mascota->getFoto_mascota_ruta();
$mascota_idMascota=$foto_mascota->getMascota_idMascota()->getIdMascota();

      try {
          $sql= "UPDATE `foto_mascota` SET`idfoto_mascota`='$idfoto_mascota' ,`foto_mascota_nombre`='$foto_mascota_nombre' ,`foto_mascota_ruta`='$foto_mascota_ruta' ,`Mascota_idMascota`='$mascota_idMascota' WHERE `idfoto_mascota`='$idfoto_mascota' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Foto_mascota en la base de datos.
     * @param foto_mascota objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($foto_mascota){
      $idfoto_mascota=$foto_mascota->getIdfoto_mascota();

      try {
          $sql ="DELETE FROM `foto_mascota` WHERE `idfoto_mascota`='$idfoto_mascota'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Foto_mascota en la base de datos.
     * @return ArrayList<Foto_mascota> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idfoto_mascota`, `foto_mascota_nombre`, `foto_mascota_ruta`, `Mascota_idMascota`"
          ."FROM `foto_mascota`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $foto_mascota= new Foto_mascota();
          $foto_mascota->setIdfoto_mascota($data[$i]['idfoto_mascota']);
          $foto_mascota->setFoto_mascota_nombre($data[$i]['foto_mascota_nombre']);
          $foto_mascota->setFoto_mascota_ruta($data[$i]['foto_mascota_ruta']);
           $mascota = new Mascota();
           $mascota->setIdMascota($data[$i]['Mascota_idMascota']);
           $foto_mascota->setMascota_idMascota($mascota);

          array_push($lista,$foto_mascota);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

  
  public function listAll_Random(){
      $lista = array();
      try {
          $sql ="SELECT `idfoto_mascota`, `foto_mascota_nombre`, `foto_mascota_ruta`, `Mascota_idMascota`"
                  . "FROM `foto_mascota` ORDER BY RAND()LIMIT 6" ;
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $foto_mascota= new Foto_mascota();
          $foto_mascota->setIdfoto_mascota($data[$i]['idfoto_mascota']);
          $foto_mascota->setEdad_mascota($data[$i]['edad_mascota']);
          $foto_mascota->setFoto_mascota_nombre($data[$i]['foto_mascota_nombre']);
          $foto_mascota->setFoto_mascota_ruta($data[$i]['foto_mascota_ruta']);
           $mascota = new Mascota();
           $mascota->setIdMascota($data[$i]['Mascota_idMascota']);
           $foto_mascota->setMascota_idMascota($mascota);

          array_push($lista,$foto_mascota);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Busca un objeto Foto_mascota en la base de datos.
     * @return ArrayList<Foto_mascota> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  
  
  public function listAllById($idMascota){
      $lista = array();
      try {
          $sql ="SELECT `idfoto_mascota`, `foto_mascota_nombre`, `foto_mascota_ruta`, `Mascota_idMascota`"
          ."FROM `foto_mascota`"
          ."WHERE `Mascota_idMascota`= '$idMascota' ";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $foto_mascota= new Foto_mascota();
          $foto_mascota->setIdfoto_mascota($data[$i]['idfoto_mascota']);
          $foto_mascota->setFoto_mascota_nombre($data[$i]['foto_mascota_nombre']);
          $foto_mascota->setFoto_mascota_ruta($data[$i]['foto_mascota_ruta']);
           $mascota = new Mascota();
           $mascota->setIdMascota($data[$i]['Mascota_idMascota']);
           $foto_mascota->setMascota_idMascota($mascota);

          array_push($lista,$foto_mascota);
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