<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Proletarios del mundo ¡Uníos!  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Historialmascota.php');
require_once realpath('../dao/interfaz/IHistorialmascotaDao.php');
require_once realpath('../dto/Mascota.php');

class HistorialmascotaFacade {

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
   * Crea un objeto Historialmascota a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idHistorialMascota
   * @param fechaHistorialMascota
   * @param descripcion
   * @param observacion
   * @param mascota_idMascota
   */
  public static function insert($fechaHistorialMascota,  $descripcion,  $observacion,  $mascota_idMascota){
      $historialmascota = new Historialmascota();
      $historialmascota->setFechaHistorialMascota($fechaHistorialMascota); 
      $historialmascota->setDescripcion($descripcion); 
      $historialmascota->setObservacion($observacion); 
      $historialmascota->setMascota_idMascota($mascota_idMascota); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $historialmascotaDao =$FactoryDao->gethistorialmascotaDao(self::getDataBaseDefault());
     $rtn = $historialmascotaDao->insert($historialmascota);
     $historialmascotaDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Historialmascota de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idHistorialMascota
   * @return El objeto en base de datos o Null
   */
  public static function select($idHistorialMascota){
      $historialmascota = new Historialmascota();
      $historialmascota->setIdHistorialMascota($idHistorialMascota); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $historialmascotaDao =$FactoryDao->gethistorialmascotaDao(self::getDataBaseDefault());
     $result = $historialmascotaDao->select($historialmascota);
     $historialmascotaDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Historialmascota  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idHistorialMascota
   * @param fechaHistorialMascota
   * @param descripcion
   * @param observacion
   * @param mascota_idMascota
   */
  public static function update($idHistorialMascota, $fechaHistorialMascota, $descripcion, $observacion, $mascota_idMascota){
      $historialmascota = self::select($idHistorialMascota);
      $historialmascota->setFechaHistorialMascota($fechaHistorialMascota); 
      $historialmascota->setDescripcion($descripcion); 
      $historialmascota->setObservacion($observacion); 
      $historialmascota->setMascota_idMascota($mascota_idMascota); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $historialmascotaDao =$FactoryDao->gethistorialmascotaDao(self::getDataBaseDefault());
     $historialmascotaDao->update($historialmascota);
     $historialmascotaDao->close();
  }

  /**
   * Elimina un objeto Historialmascota de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idHistorialMascota
   */
  public static function delete($idHistorialMascota){
      $historialmascota = new Historialmascota();
      $historialmascota->setIdHistorialMascota($idHistorialMascota); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $historialmascotaDao =$FactoryDao->gethistorialmascotaDao(self::getDataBaseDefault());
     $historialmascotaDao->delete($historialmascota);
     $historialmascotaDao->close();
  }

  /**
   * Lista todos los objetos Historialmascota de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Historialmascota en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $historialmascotaDao =$FactoryDao->gethistorialmascotaDao(self::getDataBaseDefault());
     $result = $historialmascotaDao->listAll();
     $historialmascotaDao->close();
     return $result;
  }


}
//That`s all folks!