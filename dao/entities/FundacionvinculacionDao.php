<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No se fije en el corte de cabello, soy mucho muy rico  \\

include_once realpath('../dao/interfaz/IFundacionvinculacionDao.php');
include_once realpath('../dto/Fundacionvinculacion.php');
include_once realpath('../dto/Fundacion.php');
include_once realpath('../dto/Vinculacion.php');

class FundacionvinculacionDao implements IFundacionvinculacionDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Fundacionvinculacion en la base de datos.
     * @param fundacionvinculacion objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($fundacionvinculacion){
      $idFundacionVinculacion=$fundacionvinculacion->getIdFundacionVinculacion();
$fundacion_idFundacion=$fundacionvinculacion->getFundacion_idFundacion()->getIdFundacion();
$vinculaciones_idVeterinaria=$fundacionvinculacion->getVinculaciones_idVeterinaria()->getIdVeterinaria();

      try {
          $sql= "INSERT INTO `fundacionvinculacion`( `idFundacionVinculacion`, `Fundacion_idFundacion`, `Vinculaciones_idVeterinaria`)"
          ."VALUES ('$idFundacionVinculacion','$fundacion_idFundacion','$vinculaciones_idVeterinaria')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Fundacionvinculacion en la base de datos.
     * @param fundacionvinculacion objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($fundacionvinculacion){
      $idFundacionVinculacion=$fundacionvinculacion->getIdFundacionVinculacion();

      try {
          $sql= "SELECT `idFundacionVinculacion`, `Fundacion_idFundacion`, `Vinculaciones_idVeterinaria`"
          ."FROM `fundacionvinculacion`"
          ."WHERE `idFundacionVinculacion`='$idFundacionVinculacion'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $fundacionvinculacion->setIdFundacionVinculacion($data[$i]['idFundacionVinculacion']);
           $fundacion = new Fundacion();
           $fundacion->setIdFundacion($data[$i]['Fundacion_idFundacion']);
           $fundacionvinculacion->setFundacion_idFundacion($fundacion);
           $vinculacion = new Vinculacion();
           $vinculacion->setIdVeterinaria($data[$i]['Vinculaciones_idVeterinaria']);
           $fundacionvinculacion->setVinculaciones_idVeterinaria($vinculacion);

          }
      return $fundacionvinculacion;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Fundacionvinculacion en la base de datos.
     * @param fundacionvinculacion objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($fundacionvinculacion){
      $idFundacionVinculacion=$fundacionvinculacion->getIdFundacionVinculacion();
$fundacion_idFundacion=$fundacionvinculacion->getFundacion_idFundacion()->getIdFundacion();
$vinculaciones_idVeterinaria=$fundacionvinculacion->getVinculaciones_idVeterinaria()->getIdVeterinaria();

      try {
          $sql= "UPDATE `fundacionvinculacion` SET`idFundacionVinculacion`='$idFundacionVinculacion' ,`Fundacion_idFundacion`='$fundacion_idFundacion' ,`Vinculaciones_idVeterinaria`='$vinculaciones_idVeterinaria' WHERE `idFundacionVinculacion`='$idFundacionVinculacion' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Fundacionvinculacion en la base de datos.
     * @param fundacionvinculacion objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($fundacionvinculacion){
      $idFundacionVinculacion=$fundacionvinculacion->getIdFundacionVinculacion();

      try {
          $sql ="DELETE FROM `fundacionvinculacion` WHERE `idFundacionVinculacion`='$idFundacionVinculacion'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Fundacionvinculacion en la base de datos.
     * @return ArrayList<Fundacionvinculacion> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idFundacionVinculacion`, `Fundacion_idFundacion`, `Vinculaciones_idVeterinaria`"
          ."FROM `fundacionvinculacion`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $fundacionvinculacion= new Fundacionvinculacion();
          $fundacionvinculacion->setIdFundacionVinculacion($data[$i]['idFundacionVinculacion']);
           $fundacion = new Fundacion();
           $fundacion->setIdFundacion($data[$i]['Fundacion_idFundacion']);
           $fundacionvinculacion->setFundacion_idFundacion($fundacion);
           $vinculacion = new Vinculacion();
           $vinculacion->setIdVeterinaria($data[$i]['Vinculaciones_idVeterinaria']);
           $fundacionvinculacion->setVinculaciones_idVeterinaria($vinculacion);

          array_push($lista,$fundacionvinculacion);
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
  
    /**
     * Busca un objeto vinculacion en la base de datos.
     * @return ArrayList<vinculacion> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function ListByID($Fundacion_idFundacion) {
        $lista = array();
        try {
            $sql = "SELECT v.* FROM fundacionvinculacion fv , vinculacion v WHERE  v.idVeterinaria = fv.Vinculaciones_idVeterinaria and fv.Fundacion_idFundacion = '$Fundacion_idFundacion ' ";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $vinculacion = new Vinculacion();
                $vinculacion->setIdVeterinaria($data[$i]['idVeterinaria']);
                $vinculacion->setNombreVinculacion($data[$i]['nombreVinculacion']);
                $vinculacion->setDireccion($data[$i]['direccion']);
                $vinculacion->setNit($data[$i]['nit']);
                $vinculacion->setTelefono($data[$i]['telefono']);
                array_push($lista, $vinculacion);
            }

            return $lista;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }
}
//That`s all folks!
