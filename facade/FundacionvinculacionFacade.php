<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Proletarios del mundo ¡Uníos!  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Fundacionvinculacion.php');
require_once realpath('../dao/interfaz/IFundacionvinculacionDao.php');
require_once realpath('../dto/Fundacion.php');
require_once realpath('../dto/Vinculacion.php');

class FundacionvinculacionFacade {

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
   * Crea un objeto Fundacionvinculacion a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idFundacionVinculacion
   * @param fundacion_idFundacion
   * @param vinculaciones_idVeterinaria
   */
  public static function insert( $idFundacionVinculacion,  $fundacion_idFundacion,  $vinculaciones_idVeterinaria){
      $fundacionvinculacion = new Fundacionvinculacion();
      $fundacionvinculacion->setIdFundacionVinculacion($idFundacionVinculacion); 
      $fundacionvinculacion->setFundacion_idFundacion($fundacion_idFundacion); 
      $fundacionvinculacion->setVinculaciones_idVeterinaria($vinculaciones_idVeterinaria); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fundacionvinculacionDao =$FactoryDao->getfundacionvinculacionDao(self::getDataBaseDefault());
     $rtn = $fundacionvinculacionDao->insert($fundacionvinculacion);
     $fundacionvinculacionDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Fundacionvinculacion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idFundacionVinculacion
   * @return El objeto en base de datos o Null
   */
  public static function select($idFundacionVinculacion){
      $fundacionvinculacion = new Fundacionvinculacion();
      $fundacionvinculacion->setIdFundacionVinculacion($idFundacionVinculacion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fundacionvinculacionDao =$FactoryDao->getfundacionvinculacionDao(self::getDataBaseDefault());
     $result = $fundacionvinculacionDao->select($fundacionvinculacion);
     $fundacionvinculacionDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Fundacionvinculacion  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idFundacionVinculacion
   * @param fundacion_idFundacion
   * @param vinculaciones_idVeterinaria
   */
  public static function update($idFundacionVinculacion, $fundacion_idFundacion, $vinculaciones_idVeterinaria){
      $fundacionvinculacion = self::select($idFundacionVinculacion);
      $fundacionvinculacion->setFundacion_idFundacion($fundacion_idFundacion); 
      $fundacionvinculacion->setVinculaciones_idVeterinaria($vinculaciones_idVeterinaria); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fundacionvinculacionDao =$FactoryDao->getfundacionvinculacionDao(self::getDataBaseDefault());
     $fundacionvinculacionDao->update($fundacionvinculacion);
     $fundacionvinculacionDao->close();
  }

  /**
   * Elimina un objeto Fundacionvinculacion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idFundacionVinculacion
   */
  public static function delete($idFundacionVinculacion){
      $fundacionvinculacion = new Fundacionvinculacion();
      $fundacionvinculacion->setIdFundacionVinculacion($idFundacionVinculacion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fundacionvinculacionDao =$FactoryDao->getfundacionvinculacionDao(self::getDataBaseDefault());
     $fundacionvinculacionDao->delete($fundacionvinculacion);
     $fundacionvinculacionDao->close();
  }

  /**
   * Lista todos los objetos Fundacionvinculacion de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Fundacionvinculacion en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fundacionvinculacionDao =$FactoryDao->getfundacionvinculacionDao(self::getDataBaseDefault());
     $result = $fundacionvinculacionDao->listAll();
     $fundacionvinculacionDao->close();
     return $result;
  }

    /**
     * Lista todos los objetos vinculacion asociados con una fundacion.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @return $result Array con los objetos vinculacion en base de datos relaciondados con fundacion o Null
     */
    public static function ListByID($Fundacion_idFundacion) {
        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $fundacionvinculacionDao = $FactoryDao->getfundacionvinculacionDao(self::getDataBaseDefault());
        $result = $fundacionvinculacionDao->ListByID($Fundacion_idFundacion);
        $fundacionvinculacionDao->close();
        return $result;
    }

}
//That`s all folks!