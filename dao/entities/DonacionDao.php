<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Sólo relájate y deja que alguien más lo haga  \\

include_once realpath('../dao/interfaz/IDonacionDao.php');
include_once realpath('../dto/Donacion.php');
include_once realpath('../dto/Mascota.php');
include_once realpath('../dto/Fundacion.php');
include_once realpath('../dto/Tipodonacion.php');

class DonacionDao implements IDonacionDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Donacion en la base de datos.
     * @param donacion objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($donacion){
      $idDonacion=$donacion->getIdDonacion();
$mascota_idMascota=$donacion->getMascota_idMascota()->getIdMascota();
$fundacion_idFundacion=$donacion->getFundacion_idFundacion()->getIdFundacion();
$fechaDonacion=$donacion->getFechaDonacion();
$cantidad=$donacion->getCantidad();
$descripcion=$donacion->getDescripcion();
$tipoDonacion_idTipoDonacion=$donacion->getTipoDonacion_idTipoDonacion()->getIdTipoDonacion();

      try {
          $sql= "INSERT INTO `donacion`( `idDonacion`, `Mascota_idMascota`, `Fundacion_idFundacion`, `fechaDonacion`, `cantidad`, `descripcion`, `TipoDonacion_idTipoDonacion`)"
          ."VALUES ('$idDonacion','$mascota_idMascota','$fundacion_idFundacion','$fechaDonacion','$cantidad','$descripcion','$tipoDonacion_idTipoDonacion')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Donacion en la base de datos.
     * @param donacion objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($donacion){
      $idDonacion=$donacion->getIdDonacion();

      try {
          $sql= "SELECT `idDonacion`, `Mascota_idMascota`, `Fundacion_idFundacion`, `fechaDonacion`, `cantidad`, `descripcion`, `TipoDonacion_idTipoDonacion`"
          ."FROM `donacion`"
          ."WHERE `idDonacion`='$idDonacion'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $donacion->setIdDonacion($data[$i]['idDonacion']);
           $mascota = new Mascota();
           $mascota->setIdMascota($data[$i]['Mascota_idMascota']);
           $donacion->setMascota_idMascota($mascota);
           $fundacion = new Fundacion();
           $fundacion->setIdFundacion($data[$i]['Fundacion_idFundacion']);
           $donacion->setFundacion_idFundacion($fundacion);
          $donacion->setFechaDonacion($data[$i]['fechaDonacion']);
          $donacion->setCantidad($data[$i]['cantidad']);
          $donacion->setDescripcion($data[$i]['descripcion']);
           $tipodonacion = new Tipodonacion();
           $tipodonacion->setIdTipoDonacion($data[$i]['TipoDonacion_idTipoDonacion']);
           $donacion->setTipoDonacion_idTipoDonacion($tipodonacion);

          }
      return $donacion;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Donacion en la base de datos.
     * @param donacion objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($donacion){
      $idDonacion=$donacion->getIdDonacion();
$mascota_idMascota=$donacion->getMascota_idMascota()->getIdMascota();
$fundacion_idFundacion=$donacion->getFundacion_idFundacion()->getIdFundacion();
$fechaDonacion=$donacion->getFechaDonacion();
$cantidad=$donacion->getCantidad();
$descripcion=$donacion->getDescripcion();
$tipoDonacion_idTipoDonacion=$donacion->getTipoDonacion_idTipoDonacion()->getIdTipoDonacion();

      try {
          $sql= "UPDATE `donacion` SET`idDonacion`='$idDonacion' ,`Mascota_idMascota`='$mascota_idMascota' ,`Fundacion_idFundacion`='$fundacion_idFundacion' ,`fechaDonacion`='$fechaDonacion' ,`cantidad`='$cantidad' ,`descripcion`='$descripcion' ,`TipoDonacion_idTipoDonacion`='$tipoDonacion_idTipoDonacion' WHERE `idDonacion`='$idDonacion' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Donacion en la base de datos.
     * @param donacion objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($donacion){
      $idDonacion=$donacion->getIdDonacion();

      try {
          $sql ="DELETE FROM `donacion` WHERE `idDonacion`='$idDonacion'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Donacion en la base de datos.
     * @return ArrayList<Donacion> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idDonacion`, `Mascota_idMascota`, `Fundacion_idFundacion`, `fechaDonacion`, `cantidad`, `descripcion`, `TipoDonacion_idTipoDonacion`"
          ."FROM `donacion`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $donacion= new Donacion();
          $donacion->setIdDonacion($data[$i]['idDonacion']);
           $mascota = new Mascota();
           $mascota->setIdMascota($data[$i]['Mascota_idMascota']);
           $donacion->setMascota_idMascota($mascota);
           $fundacion = new Fundacion();
           $fundacion->setIdFundacion($data[$i]['Fundacion_idFundacion']);
           $donacion->setFundacion_idFundacion($fundacion);
          $donacion->setFechaDonacion($data[$i]['fechaDonacion']);
          $donacion->setCantidad($data[$i]['cantidad']);
          $donacion->setDescripcion($data[$i]['descripcion']);
           $tipodonacion = new Tipodonacion();
           $tipodonacion->setIdTipoDonacion($data[$i]['TipoDonacion_idTipoDonacion']);
           $donacion->setTipoDonacion_idTipoDonacion($tipodonacion);

          array_push($lista,$donacion);
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