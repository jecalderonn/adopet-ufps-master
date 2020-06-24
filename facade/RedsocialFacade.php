<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Recuerda, cuando enciendas la molotov, debes arrojarla  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Redsocial.php');
require_once realpath('../dao/interfaz/IRedsocialDao.php');
require_once realpath('../dto/Fundacion.php');

class RedsocialFacade {

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
   * Crea un objeto Redsocial a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idRedesSociales
   * @param nombre
   * @param url
   * @param fundacion_idFundacion
   */
  public static function insert($nombre,  $url,  $fundacion_idFundacion){
      $redsocial = new Redsocial();
      $redsocial->setNombre($nombre); 
      $redsocial->setUrl($url); 
      $redsocial->setFundacion_idFundacion($fundacion_idFundacion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $redsocialDao =$FactoryDao->getredsocialDao(self::getDataBaseDefault());
     $rtn = $redsocialDao->insert($redsocial);
     $redsocialDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Redsocial de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idRedesSociales
   * @return El objeto en base de datos o Null
   */
  public static function select($idRedesSociales){
      $redsocial = new Redsocial();
      $redsocial->setIdRedesSociales($idRedesSociales); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $redsocialDao =$FactoryDao->getredsocialDao(self::getDataBaseDefault());
     $result = $redsocialDao->select($redsocial);
     $redsocialDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Redsocial  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idRedesSociales
   * @param nombre
   * @param url
   * @param fundacion_idFundacion
   */
  public static function update($idRedesSociales, $nombre, $url, $fundacion_idFundacion){
      $redsocial = self::select($idRedesSociales);
      $redsocial->setNombre($nombre); 
      $redsocial->setUrl($url); 
      $redsocial->setFundacion_idFundacion($fundacion_idFundacion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $redsocialDao =$FactoryDao->getredsocialDao(self::getDataBaseDefault());
     $redsocialDao->update($redsocial);
     $redsocialDao->close();
  }

  /**
   * Elimina un objeto Redsocial de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idRedesSociales
   */
  public static function delete($idRedesSociales){
      $redsocial = new Redsocial();
      $redsocial->setIdRedesSociales($idRedesSociales); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $redsocialDao =$FactoryDao->getredsocialDao(self::getDataBaseDefault());
     $redsocialDao->delete($redsocial);
     $redsocialDao->close();
  }

  /**
   * Lista todos los objetos Redsocial de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Redsocial en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $redsocialDao =$FactoryDao->getredsocialDao(self::getDataBaseDefault());
     $result = $redsocialDao->listAll();
     $redsocialDao->close();
     return $result;
  }


}
//That`s all folks!