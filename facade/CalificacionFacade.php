<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ...con el mayor de los disgustos, el benévolo señor Arciniegas.  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Calificacion.php');
require_once realpath('../dao/interfaz/ICalificacionDao.php');
require_once realpath('../dto/Fundacion.php');
require_once realpath('../dto/Usuario.php');

class CalificacionFacade {

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
   * Crea un objeto Calificacion a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idCalificacion
   * @param fundacion_idFundacion
   * @param usuario_idUsuario
   * @param calificacion
   */
  public static function insert( $idCalificacion,  $fundacion_idFundacion,  $usuario_idUsuario,  $calificacion){
      $calificacion = new Calificacion();
      $calificacion->setIdCalificacion($idCalificacion); 
      $calificacion->setFundacion_idFundacion($fundacion_idFundacion); 
      $calificacion->setUsuario_idUsuario($usuario_idUsuario); 
      $calificacion->setCalificacion($calificacion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $calificacionDao =$FactoryDao->getcalificacionDao(self::getDataBaseDefault());
     $rtn = $calificacionDao->insert($calificacion);
     $calificacionDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Calificacion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idCalificacion
   * @return El objeto en base de datos o Null
   */
  public static function select($idCalificacion){
      $calificacion = new Calificacion();
      $calificacion->setIdCalificacion($idCalificacion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $calificacionDao =$FactoryDao->getcalificacionDao(self::getDataBaseDefault());
     $result = $calificacionDao->select($calificacion);
     $calificacionDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Calificacion  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idCalificacion
   * @param fundacion_idFundacion
   * @param usuario_idUsuario
   * @param calificacion
   */
  public static function update($idCalificacion, $fundacion_idFundacion, $usuario_idUsuario, $calificacion){
      $calificacion = self::select($idCalificacion);
      $calificacion->setFundacion_idFundacion($fundacion_idFundacion); 
      $calificacion->setUsuario_idUsuario($usuario_idUsuario); 
      $calificacion->setCalificacion($calificacion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $calificacionDao =$FactoryDao->getcalificacionDao(self::getDataBaseDefault());
     $calificacionDao->update($calificacion);
     $calificacionDao->close();
  }

  /**
   * Elimina un objeto Calificacion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idCalificacion
   */
  public static function delete($idCalificacion){
      $calificacion = new Calificacion();
      $calificacion->setIdCalificacion($idCalificacion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $calificacionDao =$FactoryDao->getcalificacionDao(self::getDataBaseDefault());
     $calificacionDao->delete($calificacion);
     $calificacionDao->close();
  }

  /**
   * Lista todos los objetos Calificacion de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Calificacion en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $calificacionDao =$FactoryDao->getcalificacionDao(self::getDataBaseDefault());
     $result = $calificacionDao->listAll();
     $calificacionDao->close();
     return $result;
  }


}
//That`s all folks!