<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Mi satisfacción es hacerte un poco más vago  \\

include_once realpath('../dao/interfaz/ITipousuarioDao.php');
include_once realpath('../dto/Tipousuario.php');

class TipousuarioDao implements ITipousuarioDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Tipousuario en la base de datos.
     * @param tipousuario objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($tipousuario){
      $idTipoUsuario=$tipousuario->getIdTipoUsuario();
$nombre=$tipousuario->getNombre();

      try {
          $sql= "INSERT INTO `tipousuario`( `idTipoUsuario`, `nombre`)"
          ."VALUES ('$idTipoUsuario','$nombre')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Tipousuario en la base de datos.
     * @param tipousuario objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($tipousuario){
      $idTipoUsuario=$tipousuario->getIdTipoUsuario();

      try {
          $sql= "SELECT `idTipoUsuario`, `nombre`"
          ."FROM `tipousuario`"
          ."WHERE `idTipoUsuario`='$idTipoUsuario'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $tipousuario->setIdTipoUsuario($data[$i]['idTipoUsuario']);
          $tipousuario->setNombre($data[$i]['nombre']);

          }
      return $tipousuario;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Tipousuario en la base de datos.
     * @param tipousuario objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($tipousuario){
      $idTipoUsuario=$tipousuario->getIdTipoUsuario();
$nombre=$tipousuario->getNombre();

      try {
          $sql= "UPDATE `tipousuario` SET`idTipoUsuario`='$idTipoUsuario' ,`nombre`='$nombre' WHERE `idTipoUsuario`='$idTipoUsuario' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Tipousuario en la base de datos.
     * @param tipousuario objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($tipousuario){
      $idTipoUsuario=$tipousuario->getIdTipoUsuario();

      try {
          $sql ="DELETE FROM `tipousuario` WHERE `idTipoUsuario`='$idTipoUsuario'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Tipousuario en la base de datos.
     * @return ArrayList<Tipousuario> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idTipoUsuario`, `nombre`"
          ."FROM `tipousuario`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $tipousuario= new Tipousuario();
          $tipousuario->setIdTipoUsuario($data[$i]['idTipoUsuario']);
          $tipousuario->setNombre($data[$i]['nombre']);

          array_push($lista,$tipousuario);
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