<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Generar buen código o poner frases graciosas? ¡La frase! ¡La frase!  \\

include_once realpath('../dao/interfaz/ICalificacionDao.php');
include_once realpath('../dto/Calificacion.php');
include_once realpath('../dto/Fundacion.php');
include_once realpath('../dto/Usuario.php');

class CalificacionDao implements ICalificacionDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Calificacion en la base de datos.
     * @param calificacion objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($calificacion){
      $idCalificacion=$calificacion->getIdCalificacion();
$fundacion_idFundacion=$calificacion->getFundacion_idFundacion()->getIdFundacion();
$usuario_idUsuario=$calificacion->getUsuario_idUsuario()->getIdUsuario();
$calificacion=$calificacion->getCalificacion();

      try {
          $sql= "INSERT INTO `calificacion`( `idCalificacion`, `Fundacion_idFundacion`, `Usuario_idUsuario`, `calificacion`)"
          ."VALUES ('$idCalificacion','$fundacion_idFundacion','$usuario_idUsuario','$calificacion')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Calificacion en la base de datos.
     * @param calificacion objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($calificacion){
      $idCalificacion=$calificacion->getIdCalificacion();

      try {
          $sql= "SELECT `idCalificacion`, `Fundacion_idFundacion`, `Usuario_idUsuario`, `calificacion`"
          ."FROM `calificacion`"
          ."WHERE `idCalificacion`='$idCalificacion'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $calificacion->setIdCalificacion($data[$i]['idCalificacion']);
           $fundacion = new Fundacion();
           $fundacion->setIdFundacion($data[$i]['Fundacion_idFundacion']);
           $calificacion->setFundacion_idFundacion($fundacion);
           $usuario = new Usuario();
           $usuario->setIdUsuario($data[$i]['Usuario_idUsuario']);
           $calificacion->setUsuario_idUsuario($usuario);
          $calificacion->setCalificacion($data[$i]['calificacion']);

          }
      return $calificacion;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Calificacion en la base de datos.
     * @param calificacion objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($calificacion){
      $idCalificacion=$calificacion->getIdCalificacion();
$fundacion_idFundacion=$calificacion->getFundacion_idFundacion()->getIdFundacion();
$usuario_idUsuario=$calificacion->getUsuario_idUsuario()->getIdUsuario();
$calificacion=$calificacion->getCalificacion();

      try {
          $sql= "UPDATE `calificacion` SET`idCalificacion`='$idCalificacion' ,`Fundacion_idFundacion`='$fundacion_idFundacion' ,`Usuario_idUsuario`='$usuario_idUsuario' ,`calificacion`='$calificacion' WHERE `idCalificacion`='$idCalificacion' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Calificacion en la base de datos.
     * @param calificacion objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($calificacion){
      $idCalificacion=$calificacion->getIdCalificacion();

      try {
          $sql ="DELETE FROM `calificacion` WHERE `idCalificacion`='$idCalificacion'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Calificacion en la base de datos.
     * @return ArrayList<Calificacion> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idCalificacion`, `Fundacion_idFundacion`, `Usuario_idUsuario`, `calificacion`"
          ."FROM `calificacion`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $calificacion= new Calificacion();
          $calificacion->setIdCalificacion($data[$i]['idCalificacion']);
           $fundacion = new Fundacion();
           $fundacion->setIdFundacion($data[$i]['Fundacion_idFundacion']);
           $calificacion->setFundacion_idFundacion($fundacion);
           $usuario = new Usuario();
           $usuario->setIdUsuario($data[$i]['Usuario_idUsuario']);
           $calificacion->setUsuario_idUsuario($usuario);
          $calificacion->setCalificacion($data[$i]['calificacion']);

          array_push($lista,$calificacion);
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