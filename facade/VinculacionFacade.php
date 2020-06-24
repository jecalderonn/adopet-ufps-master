<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La vie est composé de combien de fois nous rions avant de mourir  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Vinculacion.php');
require_once realpath('../dao/interfaz/IVinculacionDao.php');

class VinculacionFacade {

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
   * Crea un objeto Vinculacion a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idVeterinaria
   * @param nombreVinculacion
   * @param direccion
   * @param nit
   * @param telefono
   */
  public static function insert( $idVeterinaria,  $nombreVinculacion,  $direccion,  $nit,  $telefono){
      $vinculacion = new Vinculacion();
      $vinculacion->setIdVeterinaria($idVeterinaria); 
      $vinculacion->setNombreVinculacion($nombreVinculacion); 
      $vinculacion->setDireccion($direccion); 
      $vinculacion->setNit($nit); 
      $vinculacion->setTelefono($telefono); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $vinculacionDao =$FactoryDao->getvinculacionDao(self::getDataBaseDefault());
     $rtn = $vinculacionDao->insert($vinculacion);
     $vinculacionDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Vinculacion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idVeterinaria
   * @return El objeto en base de datos o Null
   */
  public static function select($idVeterinaria){
      $vinculacion = new Vinculacion();
      $vinculacion->setIdVeterinaria($idVeterinaria); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $vinculacionDao =$FactoryDao->getvinculacionDao(self::getDataBaseDefault());
     $result = $vinculacionDao->select($vinculacion);
     $vinculacionDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Vinculacion  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idVeterinaria
   * @param nombreVinculacion
   * @param direccion
   * @param nit
   * @param telefono
   */
  public static function update($idVeterinaria, $nombreVinculacion, $direccion, $nit, $telefono){
      $vinculacion = self::select($idVeterinaria);
      $vinculacion->setNombreVinculacion($nombreVinculacion); 
      $vinculacion->setDireccion($direccion); 
      $vinculacion->setNit($nit); 
      $vinculacion->setTelefono($telefono); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $vinculacionDao =$FactoryDao->getvinculacionDao(self::getDataBaseDefault());
     $vinculacionDao->update($vinculacion);
     $vinculacionDao->close();
  }

  /**
   * Elimina un objeto Vinculacion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idVeterinaria
   */
  public static function delete($idVeterinaria){
      $vinculacion = new Vinculacion();
      $vinculacion->setIdVeterinaria($idVeterinaria); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $vinculacionDao =$FactoryDao->getvinculacionDao(self::getDataBaseDefault());
     $vinculacionDao->delete($vinculacion);
     $vinculacionDao->close();
  }

  /**
   * Lista todos los objetos Vinculacion de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Vinculacion en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $vinculacionDao =$FactoryDao->getvinculacionDao(self::getDataBaseDefault());
     $result = $vinculacionDao->listAll();
     $vinculacionDao->close();
     return $result;
  }


}
//That`s all folks!