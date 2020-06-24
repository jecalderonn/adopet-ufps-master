<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La segunda regla de Anarchy es no hablar de Anarchy  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Notificacion.php');
require_once realpath('../dao/interfaz/INotificacionDao.php');
require_once realpath('../dto/Fundacion.php');
require_once realpath('../dto/Usuario.php');
require_once realpath('../dao/interfaz/IEspecieDao.php');

class NotificacionFacade {

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
   * Crea un objeto Notificacion a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmensaje
   * @param fechaMensaje
   * @param fundacion_idFundacion
   * @param usuario_idUsuario
   * @param descripcion
   */
  public static function insert( $idmensaje,  $fechaMensaje,  $fundacion_idFundacion,  $usuario_idUsuario,  $descripcion){
      $notificacion = new Notificacion();
      $notificacion->setIdmensaje($idmensaje); 
      $notificacion->setFechaMensaje($fechaMensaje); 
      $notificacion->setFundacion_idFundacion($fundacion_idFundacion); 
      $notificacion->setUsuario_idUsuario($usuario_idUsuario); 
      $notificacion->setDescripcion($descripcion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $notificacionDao =$FactoryDao->getnotificacionDao(self::getDataBaseDefault());
     $rtn = $notificacionDao->insert($notificacion);
     $notificacionDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Notificacion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmensaje
   * @return El objeto en base de datos o Null
   */
  public static function select($idmensaje){
      $notificacion = new Notificacion();
      $notificacion->setIdmensaje($idmensaje); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $notificacionDao =$FactoryDao->getnotificacionDao(self::getDataBaseDefault());
     $result = $notificacionDao->select($notificacion);
     $notificacionDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Notificacion  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmensaje
   * @param fechaMensaje
   * @param fundacion_idFundacion
   * @param usuario_idUsuario
   * @param descripcion
   */
  public static function update($idmensaje, $fechaMensaje, $fundacion_idFundacion, $usuario_idUsuario, $descripcion){
      $notificacion = self::select($idmensaje);
      $notificacion->setFechaMensaje($fechaMensaje); 
      $notificacion->setFundacion_idFundacion($fundacion_idFundacion); 
      $notificacion->setUsuario_idUsuario($usuario_idUsuario); 
      $notificacion->setDescripcion($descripcion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $notificacionDao =$FactoryDao->getnotificacionDao(self::getDataBaseDefault());
     $notificacionDao->update($notificacion);
     $notificacionDao->close();
  }

  /**
   * Elimina un objeto Notificacion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmensaje
   */
  public static function delete($idmensaje){
      $notificacion = new Notificacion();
      $notificacion->setIdmensaje($idmensaje); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $notificacionDao =$FactoryDao->getnotificacionDao(self::getDataBaseDefault());
     $notificacionDao->delete($notificacion);
     $notificacionDao->close();
  }

  /**
   * Lista todos los objetos Notificacion de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Notificacion en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $notificacionDao =$FactoryDao->getnotificacionDao(self::getDataBaseDefault());
     $result = $notificacionDao->listAll();
     $notificacionDao->close();
     return $result;
  }
  
  public static function ListById($id_Usuario){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $notificacionDao =$FactoryDao->getnotificacionDao(self::getDataBaseDefault());
     $result = $notificacionDao->listById($id_Usuario);
     $notificacionDao->close();
     return $result;
  }

}
//That`s all folks!