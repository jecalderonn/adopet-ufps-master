<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Traigo una pizza para ¿y se la creyó?  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Donacion.php');
require_once realpath('../dao/interfaz/IDonacionDao.php');
require_once realpath('../dto/Mascota.php');
require_once realpath('../dto/Fundacion.php');
require_once realpath('../dto/Tipodonacion.php');

class DonacionFacade {

  /**
   * Para su comodidad, defina aquí el gestor de conexión predilecto para esta entidad
   * @return idGestor Devuelve el identificador del gestor de conexión
   */
  private static function getGestorDefault(){
      return DEFAULT_GESTOR;
  }
  /**
   * Para su comodidad, defina aquí el nombre de base de datos predilecto para esta entidad
   * @return dbName Devuelve el nombre de la base de datos a emplear
   */
  private static function getDataBaseDefault(){
      return DEFAULT_DBNAME;
  }
  /**
   * Crea un objeto Donacion a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idDonacion
   * @param mascota_idMascota
   * @param fundacion_idFundacion
   * @param fechaDonacion
   * @param cantidad
   * @param descripcion
   * @param tipoDonacion_idTipoDonacion
   */
  public static function insert( $idDonacion,  $mascota_idMascota,  $fundacion_idFundacion,  $fechaDonacion,  $cantidad,  $descripcion,  $tipoDonacion_idTipoDonacion){
      $donacion = new Donacion();
      $donacion->setIdDonacion($idDonacion); 
      $donacion->setMascota_idMascota($mascota_idMascota); 
      $donacion->setFundacion_idFundacion($fundacion_idFundacion); 
      $donacion->setFechaDonacion($fechaDonacion); 
      $donacion->setCantidad($cantidad); 
      $donacion->setDescripcion($descripcion); 
      $donacion->setTipoDonacion_idTipoDonacion($tipoDonacion_idTipoDonacion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $donacionDao =$FactoryDao->getdonacionDao(self::getDataBaseDefault());
     $rtn = $donacionDao->insert($donacion);
     $donacionDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Donacion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idDonacion
   * @return El objeto en base de datos o Null
   */
  public static function select($idDonacion){
      $donacion = new Donacion();
      $donacion->setIdDonacion($idDonacion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $donacionDao =$FactoryDao->getdonacionDao(self::getDataBaseDefault());
     $result = $donacionDao->select($donacion);
     $donacionDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Donacion  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idDonacion
   * @param mascota_idMascota
   * @param fundacion_idFundacion
   * @param fechaDonacion
   * @param cantidad
   * @param descripcion
   * @param tipoDonacion_idTipoDonacion
   */
  public static function update($idDonacion, $mascota_idMascota, $fundacion_idFundacion, $fechaDonacion, $cantidad, $descripcion, $tipoDonacion_idTipoDonacion){
      $donacion = self::select($idDonacion);
      $donacion->setMascota_idMascota($mascota_idMascota); 
      $donacion->setFundacion_idFundacion($fundacion_idFundacion); 
      $donacion->setFechaDonacion($fechaDonacion); 
      $donacion->setCantidad($cantidad); 
      $donacion->setDescripcion($descripcion); 
      $donacion->setTipoDonacion_idTipoDonacion($tipoDonacion_idTipoDonacion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $donacionDao =$FactoryDao->getdonacionDao(self::getDataBaseDefault());
     $donacionDao->update($donacion);
     $donacionDao->close();
  }

  /**
   * Elimina un objeto Donacion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idDonacion
   */
  public static function delete($idDonacion){
      $donacion = new Donacion();
      $donacion->setIdDonacion($idDonacion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $donacionDao =$FactoryDao->getdonacionDao(self::getDataBaseDefault());
     $donacionDao->delete($donacion);
     $donacionDao->close();
  }

  /**
   * Lista todos los objetos Donacion de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Donacion en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $donacionDao =$FactoryDao->getdonacionDao(self::getDataBaseDefault());
     $result = $donacionDao->listAll();
     $donacionDao->close();
     return $result;
  }


}
//That`s all folks!