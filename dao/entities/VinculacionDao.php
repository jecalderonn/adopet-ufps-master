<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Alguna vez Anarchy se llamó Molotov ( u.u) *Nostalgia  \\

include_once realpath('../dao/interfaz/IVinculacionDao.php');
include_once realpath('../dto/Vinculacion.php');

class VinculacionDao implements IVinculacionDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Vinculacion en la base de datos.
     * @param vinculacion objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($vinculacion){
      $idVeterinaria=$vinculacion->getIdVeterinaria();
$nombreVinculacion=$vinculacion->getNombreVinculacion();
$direccion=$vinculacion->getDireccion();
$nit=$vinculacion->getNit();
$telefono=$vinculacion->getTelefono();

      try {
          $sql= "INSERT INTO `vinculacion`( `idVeterinaria`, `nombreVinculacion`, `direccion`, `nit`, `telefono`)"
          ."VALUES ('$idVeterinaria','$nombreVinculacion','$direccion','$nit','$telefono')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Vinculacion en la base de datos.
     * @param vinculacion objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($vinculacion){
      $idVeterinaria=$vinculacion->getIdVeterinaria();

      try {
          $sql= "SELECT `idVeterinaria`, `nombreVinculacion`, `direccion`, `nit`, `telefono`"
          ."FROM `vinculacion`"
          ."WHERE `idVeterinaria`='$idVeterinaria'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $vinculacion->setIdVeterinaria($data[$i]['idVeterinaria']);
          $vinculacion->setNombreVinculacion($data[$i]['nombreVinculacion']);
          $vinculacion->setDireccion($data[$i]['direccion']);
          $vinculacion->setNit($data[$i]['nit']);
          $vinculacion->setTelefono($data[$i]['telefono']);

          }
      return $vinculacion;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Vinculacion en la base de datos.
     * @param vinculacion objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($vinculacion){
      $idVeterinaria=$vinculacion->getIdVeterinaria();
$nombreVinculacion=$vinculacion->getNombreVinculacion();
$direccion=$vinculacion->getDireccion();
$nit=$vinculacion->getNit();
$telefono=$vinculacion->getTelefono();

      try {
          $sql= "UPDATE `vinculacion` SET`idVeterinaria`='$idVeterinaria' ,`nombreVinculacion`='$nombreVinculacion' ,`direccion`='$direccion' ,`nit`='$nit' ,`telefono`='$telefono' WHERE `idVeterinaria`='$idVeterinaria' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Vinculacion en la base de datos.
     * @param vinculacion objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($vinculacion){
      $idVeterinaria=$vinculacion->getIdVeterinaria();

      try {
          $sql ="DELETE FROM `vinculacion` WHERE `idVeterinaria`='$idVeterinaria'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Vinculacion en la base de datos.
     * @return ArrayList<Vinculacion> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idVeterinaria`, `nombreVinculacion`, `direccion`, `nit`, `telefono`"
          ."FROM `vinculacion`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $vinculacion= new Vinculacion();
          $vinculacion->setIdVeterinaria($data[$i]['idVeterinaria']);
          $vinculacion->setNombreVinculacion($data[$i]['nombreVinculacion']);
          $vinculacion->setDireccion($data[$i]['direccion']);
          $vinculacion->setNit($data[$i]['nit']);
          $vinculacion->setTelefono($data[$i]['telefono']);

          array_push($lista,$vinculacion);
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