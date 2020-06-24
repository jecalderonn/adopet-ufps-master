<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Bastará decir que soy Juan Pablo Castel, el pintor que mató a María Iribarne...  \\

include_once realpath('../dao/interfaz/IEspecieDao.php');
include_once realpath('../dto/Especie.php');
include_once realpath('../dao/entities/conexion3.php');

class EspecieDao implements IEspecieDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Especie en la base de datos.
     * @param especie objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($especie){
$nombreEspecie=$especie->getNombreEspecie();

      try {
          $sql= "INSERT INTO `especie`( `nombreEspecie`)"
          ."VALUES ('$nombreEspecie')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Especie en la base de datos.
     * @param especie objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($especie){
      $idEspecie=$especie->getIdEspecie();

      try {
          $sql= "SELECT `idEspecie`, `nombreEspecie`"
          ."FROM `especie`"
          ."WHERE `idEspecie`='$idEspecie'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $especie->setIdEspecie($data[$i]['idEspecie']);
          $especie->setNombreEspecie($data[$i]['nombreEspecie']);

          }
      return $especie;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Especie en la base de datos.
     * @param especie objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($especie){
      $idEspecie=$especie->getIdEspecie();
$nombreEspecie=$especie->getNombreEspecie();

      try {
          $sql= "UPDATE `especie` SET`idEspecie`='$idEspecie' ,`nombreEspecie`='$nombreEspecie' WHERE `idEspecie`='$idEspecie' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Especie en la base de datos.
     * @param especie objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($especie){
      $idEspecie=$especie->getIdEspecie();

      try {
          $sql ="DELETE FROM `especie` WHERE `idEspecie`='$idEspecie'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Especie en la base de datos.
     * @return ArrayList<Especie> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idEspecie`, `nombreEspecie`"
          ."FROM `especie`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $especie= new Especie();
          $especie->setIdEspecie($data[$i]['idEspecie']);
          $especie->setNombreEspecie($data[$i]['nombreEspecie']);

          array_push($lista,$especie);
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