<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No quiero morir sin tener cicatrices.  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Especie.php');
require_once realpath('../dao/interfaz/IEspecieDao.php');

class EspecieFacade {

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
   * Crea un objeto Especie a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idEspecie
   * @param nombreEspecie
   */
  public static function insert($nombreEspecie){
      $especie = new Especie();
       
      $especie->setNombreEspecie($nombreEspecie); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $especieDao =$FactoryDao->getespecieDao(self::getDataBaseDefault());
     $rtn = $especieDao->insert($especie);
     $especieDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Especie de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idEspecie
   * @return El objeto en base de datos o Null
   */
  public static function select($idEspecie){
      $especie = new Especie();
      $especie->setIdEspecie($idEspecie); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $especieDao =$FactoryDao->getespecieDao(self::getDataBaseDefault());
     $result = $especieDao->select($especie);
     $especieDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Especie  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idEspecie
   * @param nombreEspecie
   */
  public static function update($idEspecie, $nombreEspecie){
      $especie = self::select($idEspecie);
      $especie->setNombreEspecie($nombreEspecie); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $especieDao =$FactoryDao->getespecieDao(self::getDataBaseDefault());
     $especieDao->update($especie);
     $especieDao->close();
  }

  /**
   * Elimina un objeto Especie de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idEspecie
   */
  public static function delete($idEspecie){
      $especie = new Especie();
      $especie->setIdEspecie($idEspecie); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $especieDao =$FactoryDao->getespecieDao(self::getDataBaseDefault());
     $especieDao->delete($especie);
     $especieDao->close();
  }

  /**
   * Lista todos los objetos Especie de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Especie en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $especieDao =$FactoryDao->getespecieDao(self::getDataBaseDefault());
     $result = $especieDao->listAll();
     $especieDao->close();
     return $result;
  }


}
//That`s all folks!