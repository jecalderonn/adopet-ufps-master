<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Todos los animales son iguales, pero algunos animales son más iguales que otros  \\

include_once realpath('../dao/interfaz/IFundacionDao.php');
include_once realpath('../dto/Fundacion.php');
include_once realpath('../dto/Usuario.php');
include_once realpath('../dao/entities/conexion3.php');

class FundacionDao implements IFundacionDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Fundacion en la base de datos.
     * @param fundacion objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($fundacion){
      //$idFundacion=$fundacion->getIdFundacion();
$nombreFundacion=$fundacion->getNombreFundacion();
$direccionFundacion=$fundacion->getDireccionFundacion();
$telefonoFundacion=$fundacion->getTelefonoFundacion();
$nit=$fundacion->getNit();
$correo=$fundacion->getCorreo();
$nombrepropietario=$fundacion->getNombrepropietario();
$usuario_idUsuario=$fundacion->getUsuario_idUsuario()->getIdUsuario();

      try {
          $sql= "INSERT INTO `fundacion`( `nombreFundacion`, `direccionFundacion`, `telefonoFundacion`, `nit`, `correo`, `nombrepropietario`, `Usuario_idUsuario`)"
          ."VALUES ('$nombreFundacion','$direccionFundacion','$telefonoFundacion','$nit','$correo','$nombrepropietario','$usuario_idUsuario')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Fundacion en la base de datos.
     * @param fundacion objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($fundacion){
      $idFundacion=$fundacion->getIdFundacion();

      try {
          $sql= "SELECT `idFundacion`, `nombreFundacion`, `direccionFundacion`, `telefonoFundacion`, `nit`, `correo`, `nombrepropietario`, `Usuario_idUsuario`"
          ."FROM `fundacion`"
          ."WHERE `idFundacion`='$idFundacion'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $fundacion->setIdFundacion($data[$i]['idFundacion']);
          $fundacion->setNombreFundacion($data[$i]['nombreFundacion']);
          $fundacion->setDireccionFundacion($data[$i]['direccionFundacion']);
          $fundacion->setTelefonoFundacion($data[$i]['telefonoFundacion']);
          $fundacion->setNit($data[$i]['nit']);
          $fundacion->setCorreo($data[$i]['correo']);
          $fundacion->setNombrepropietario($data[$i]['nombrepropietario']);
           $usuario = new Usuario();
           $usuario->setIdUsuario($data[$i]['Usuario_idUsuario']);
           $fundacion->setUsuario_idUsuario($usuario);

          }
      return $fundacion;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Fundacion en la base de datos.
     * @param fundacion objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($fundacion){
      $idFundacion=$fundacion->getIdFundacion();
$nombreFundacion=$fundacion->getNombreFundacion();
$direccionFundacion=$fundacion->getDireccionFundacion();
$telefonoFundacion=$fundacion->getTelefonoFundacion();
$nit=$fundacion->getNit();
$correo=$fundacion->getCorreo();
$nombrepropietario=$fundacion->getNombrepropietario();
$usuario_idUsuario=$fundacion->getUsuario_idUsuario()->getIdUsuario();

      try {
          $sql= "UPDATE `fundacion` SET`idFundacion`='$idFundacion' ,`nombreFundacion`='$nombreFundacion' ,`direccionFundacion`='$direccionFundacion' ,`telefonoFundacion`='$telefonoFundacion' ,`nit`='$nit' ,`correo`='$correo' ,`nombrepropietario`='$nombrepropietario' ,`Usuario_idUsuario`='$usuario_idUsuario' WHERE `idFundacion`='$idFundacion' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

/**
     * Elimina un objeto Fundacion en la base de datos.
     * @param fundacion objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function updateEliminar($fundacion){
      $idFundacion=$fundacion->getIdFundacion();

      try {
          $sql ="UPDATE `fundacion` SET `estado` = 0  WHERE `idFundacion`='$idFundacion'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }
    /**
     * Elimina un objeto Fundacion en la base de datos.
     * @param fundacion objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($fundacion){
      $idFundacion=$fundacion->getIdFundacion();

      try {
          $sql ="DELETE FROM `fundacion` WHERE `idFundacion`='$idFundacion'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Fundacion en la base de datos.
     * @return ArrayList<Fundacion> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idFundacion`, `nombreFundacion`, `direccionFundacion`, `telefonoFundacion`, `nit`, `correo`, `nombrepropietario`, `Usuario_idUsuario`"
          ."FROM `fundacion`"
          ."WHERE estado = 1 ";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $fundacion= new Fundacion();
          $fundacion->setIdFundacion($data[$i]['idFundacion']);
          $fundacion->setNombreFundacion($data[$i]['nombreFundacion']);
          $fundacion->setDireccionFundacion($data[$i]['direccionFundacion']);
          $fundacion->setTelefonoFundacion($data[$i]['telefonoFundacion']);
          $fundacion->setNit($data[$i]['nit']);
          $fundacion->setCorreo($data[$i]['correo']);
          $fundacion->setNombrepropietario($data[$i]['nombrepropietario']);
           $usuario = new Usuario();
           $usuario->setIdUsuario($data[$i]['Usuario_idUsuario']);
           $fundacion->setUsuario_idUsuario($usuario);

          array_push($lista,$fundacion);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Busca un objeto Fundacion en la base de datos.
     * @return ArrayList<Fundacion> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll_ByUser($user){
      $lista = array();
      try {
          $sql ="SELECT `idFundacion`, `nombreFundacion`, `direccionFundacion`, `telefonoFundacion`, `nit`, `correo`, `nombrepropietario`, `Usuario_idUsuario`"
          ."FROM `fundacion`"
          ."WHERE estado = 1 and `Usuario_idUsuario` = '$user' ";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $fundacion= new Fundacion();
          $fundacion->setIdFundacion($data[$i]['idFundacion']);
          $fundacion->setNombreFundacion($data[$i]['nombreFundacion']);
          $fundacion->setDireccionFundacion($data[$i]['direccionFundacion']);
          $fundacion->setTelefonoFundacion($data[$i]['telefonoFundacion']);
          $fundacion->setNit($data[$i]['nit']);
          $fundacion->setCorreo($data[$i]['correo']);
          $fundacion->setNombrepropietario($data[$i]['nombrepropietario']);
           $usuario = new Usuario();
           $usuario->setIdUsuario($data[$i]['Usuario_idUsuario']);
           $fundacion->setUsuario_idUsuario($usuario);

          array_push($lista,$fundacion);
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