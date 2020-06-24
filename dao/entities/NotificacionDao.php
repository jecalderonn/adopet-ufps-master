<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Todo lo que alguna vez amaste te rechazará o morirá.  \\

include_once realpath('../dao/interfaz/INotificacionDao.php');
include_once realpath('../dto/Notificacion.php');
include_once realpath('../dto/Fundacion.php');
include_once realpath('../dto/Usuario.php');
include_once realpath('../dao/entities/conexion3.php');

class NotificacionDao implements INotificacionDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Notificacion en la base de datos.
     * @param notificacion objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($notificacion){
      $idmensaje=$notificacion->getIdmensaje();
$fechaMensaje=$notificacion->getFechaMensaje();
$fundacion_idFundacion=$notificacion->getFundacion_idFundacion()->getIdFundacion();
$usuario_idUsuario=$notificacion->getUsuario_idUsuario()->getIdUsuario();
$descripcion=$notificacion->getDescripcion();

      try {
          $sql= "INSERT INTO `notificacion`( `idmensaje`, `fechaMensaje`, `Fundacion_idFundacion`, `Usuario_idUsuario`, `Descripcion`)"
          ."VALUES ('$idmensaje','$fechaMensaje','$fundacion_idFundacion','$usuario_idUsuario','$descripcion')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Notificacion en la base de datos.
     * @param notificacion objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($notificacion){
      $idmensaje=$notificacion->getIdmensaje();

      try {
          $sql= "SELECT `idmensaje`, `fechaMensaje`, `Fundacion_idFundacion`, `Usuario_idUsuario`, `Descripcion`"
          ."FROM `notificacion`"
          ."WHERE `idmensaje`='$idmensaje'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $notificacion->setIdmensaje($data[$i]['idmensaje']);
          $notificacion->setFechaMensaje($data[$i]['fechaMensaje']);
           $fundacion = new Fundacion();
           $fundacion->setIdFundacion($data[$i]['Fundacion_idFundacion']);
           $notificacion->setFundacion_idFundacion($fundacion);
           $usuario = new Usuario();
           $usuario->setIdUsuario($data[$i]['Usuario_idUsuario']);
           $notificacion->setUsuario_idUsuario($usuario);
          $notificacion->setDescripcion($data[$i]['Descripcion']);

          }
      return $notificacion;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Notificacion en la base de datos.
     * @param notificacion objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($notificacion){
      $idmensaje=$notificacion->getIdmensaje();
$fechaMensaje=$notificacion->getFechaMensaje();
$fundacion_idFundacion=$notificacion->getFundacion_idFundacion()->getIdFundacion();
$usuario_idUsuario=$notificacion->getUsuario_idUsuario()->getIdUsuario();
$descripcion=$notificacion->getDescripcion();

      try {
          $sql= "UPDATE `notificacion` SET`idmensaje`='$idmensaje' ,`fechaMensaje`='$fechaMensaje' ,`Fundacion_idFundacion`='$fundacion_idFundacion' ,`Usuario_idUsuario`='$usuario_idUsuario' ,`Descripcion`='$descripcion' WHERE `idmensaje`='$idmensaje' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Notificacion en la base de datos.
     * @param notificacion objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($notificacion){
      $idmensaje=$notificacion->getIdmensaje();

      try {
          $sql ="DELETE FROM `notificacion` WHERE `idmensaje`='$idmensaje'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Notificacion en la base de datos.
     * @return ArrayList<Notificacion> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idmensaje`, `fechaMensaje`, `Fundacion_idFundacion`, `Usuario_idUsuario`, `Descripcion`"
          ."FROM `notificacion`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $notificacion= new Notificacion();
          $notificacion->setIdmensaje($data[$i]['idmensaje']);
          $notificacion->setFechaMensaje($data[$i]['fechaMensaje']);
           $fundacion = new Fundacion();
           $fundacion->setIdFundacion($data[$i]['Fundacion_idFundacion']);
           $notificacion->setFundacion_idFundacion($fundacion);
           $usuario = new Usuario();
           $usuario->setIdUsuario($data[$i]['Usuario_idUsuario']);
           $notificacion->setUsuario_idUsuario($usuario);
          $notificacion->setDescripcion($data[$i]['Descripcion']);

          array_push($lista,$notificacion);
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