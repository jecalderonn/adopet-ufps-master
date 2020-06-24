<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Damos paso a la anarquía...  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Foto_mascota.php');
require_once realpath('../dao/interfaz/IFoto_mascotaDao.php');
require_once realpath('../dto/Mascota.php');

class Foto_mascotaFacade {

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
   * Crea un objeto Foto_mascota a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idfoto_mascota
   * @param foto_mascota_nombre
   * @param foto_mascota_ruta
   * @param mascota_idMascota
   */
  public static function insert(   $foto_mascota_nombre,  $foto_mascota_ruta,  $mascota_idMascota){
      $foto_mascota = new Foto_mascota();
  //    $foto_mascota->setIdfoto_mascota($idfoto_mascota); 
      $foto_mascota->setFoto_mascota_nombre($foto_mascota_nombre); 
      $foto_mascota->setFoto_mascota_ruta($foto_mascota_ruta); 
      $foto_mascota->setMascota_idMascota($mascota_idMascota); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $foto_mascotaDao =$FactoryDao->getfoto_mascotaDao(self::getDataBaseDefault());
     $rtn = $foto_mascotaDao->insert($foto_mascota);
     $foto_mascotaDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Foto_mascota de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idfoto_mascota
   * @return El objeto en base de datos o Null
   */
  public static function select($idfoto_mascota){
      $foto_mascota = new Foto_mascota();
      $foto_mascota->setIdfoto_mascota($idfoto_mascota); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $foto_mascotaDao =$FactoryDao->getfoto_mascotaDao(self::getDataBaseDefault());
     $result = $foto_mascotaDao->select($foto_mascota);
     $foto_mascotaDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Foto_mascota  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idfoto_mascota
   * @param foto_mascota_nombre
   * @param foto_mascota_ruta
   * @param mascota_idMascota
   */
  public static function update($idfoto_mascota, $foto_mascota_nombre, $foto_mascota_ruta, $mascota_idMascota){
      $foto_mascota = self::select($idfoto_mascota);
      $foto_mascota->setFoto_mascota_nombre($foto_mascota_nombre); 
      $foto_mascota->setFoto_mascota_ruta($foto_mascota_ruta); 
      $foto_mascota->setMascota_idMascota($mascota_idMascota); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $foto_mascotaDao =$FactoryDao->getfoto_mascotaDao(self::getDataBaseDefault());
     $foto_mascotaDao->update($foto_mascota);
     $foto_mascotaDao->close();
  }

  /**
   * Elimina un objeto Foto_mascota de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idfoto_mascota
   */
  public static function delete($idfoto_mascota){
      $foto_mascota = new Foto_mascota();
      $foto_mascota->setIdfoto_mascota($idfoto_mascota); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $foto_mascotaDao =$FactoryDao->getfoto_mascotaDao(self::getDataBaseDefault());
     $foto_mascotaDao->delete($foto_mascota);
     $foto_mascotaDao->close();
  }

  /**
   * Lista todos los objetos Foto_mascota de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Foto_mascota en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $foto_mascotaDao =$FactoryDao->getfoto_mascotaDao(self::getDataBaseDefault());
     $result = $foto_mascotaDao->listAll();
     $foto_mascotaDao->close();
     return $result;
  }
  public static function listAll_Random(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $foto_mascotaDao =$FactoryDao->getfoto_mascotaDao(self::getDataBaseDefault());
     $result = $foto_mascotaDao->listAll_Random();
     $foto_mascotaDao->close();
     return $result;
  }

  /**
   * Lista todos los objetos Foto_mascota de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Foto_mascota en base de datos o Null
   */
  public static function listAllById($idMascota){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $foto_mascotaDao =$FactoryDao->getfoto_mascotaDao(self::getDataBaseDefault());
     $result = $foto_mascotaDao->listAllById($idMascota);
     $foto_mascotaDao->close();
     return $result;
  }


}
//That`s all folks!