<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    gravitaban alrededor del astro de la noche, y por primera vez podía la vista penetrar todos sus misterios.  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Solicitud.php');
require_once realpath('../dao/interfaz/ISolicitudDao.php');
require_once realpath('../dto/Usuario.php');
require_once realpath('../dto/Mascota.php');

class SolicitudFacade {

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
   * Crea un objeto Solicitud a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idSolicitud
   * @param usuario_idUsuario
   * @param descripcion
   * @param aprobacion
   * @param tipoSolucitud
   * @param mascota_idMascota
   */
  public static function insert( $idSolicitud,  $usuario_idUsuario,  $descripcion,  $aprobacion,  $tipoSolucitud,  $mascota_idMascota){
      $solicitud = new Solicitud();
      $solicitud->setIdSolicitud($idSolicitud); 
      $solicitud->setUsuario_idUsuario($usuario_idUsuario); 
      $solicitud->setDescripcion($descripcion); 
      $solicitud->setAprobacion($aprobacion); 
      $solicitud->setTipoSolucitud($tipoSolucitud); 
      $solicitud->setMascota_idMascota($mascota_idMascota); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $solicitudDao =$FactoryDao->getsolicitudDao(self::getDataBaseDefault());
     $rtn = $solicitudDao->insert($solicitud);
     $solicitudDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Solicitud de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idSolicitud
   * @return El objeto en base de datos o Null
   */
  public static function select($idSolicitud){
      $solicitud = new Solicitud();
      $solicitud->setIdSolicitud($idSolicitud); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $solicitudDao =$FactoryDao->getsolicitudDao(self::getDataBaseDefault());
     $result = $solicitudDao->select($solicitud);
     $solicitudDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Solicitud  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idSolicitud
   * @param usuario_idUsuario
   * @param descripcion
   * @param aprobacion
   * @param tipoSolucitud
   * @param mascota_idMascota
   */
  public static function update($idSolicitud, $usuario_idUsuario, $descripcion, $aprobacion, $tipoSolucitud, $mascota_idMascota){
      $solicitud = self::select($idSolicitud);
      $solicitud->setUsuario_idUsuario($usuario_idUsuario); 
      $solicitud->setDescripcion($descripcion); 
      $solicitud->setAprobacion($aprobacion); 
      $solicitud->setTipoSolucitud($tipoSolucitud); 
      $solicitud->setMascota_idMascota($mascota_idMascota); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $solicitudDao =$FactoryDao->getsolicitudDao(self::getDataBaseDefault());
     $solicitudDao->update($solicitud);
     $solicitudDao->close();
  }

  /**
   * Elimina un objeto Solicitud de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idSolicitud
   */
  public static function delete($idSolicitud){
      $solicitud = new Solicitud();
      $solicitud->setIdSolicitud($idSolicitud); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $solicitudDao =$FactoryDao->getsolicitudDao(self::getDataBaseDefault());
     $solicitudDao->delete($solicitud);
     $solicitudDao->close();
  }

  /**
   * Lista todos los objetos Solicitud de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Solicitud en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $solicitudDao =$FactoryDao->getsolicitudDao(self::getDataBaseDefault());
     $result = $solicitudDao->listAll();
     $solicitudDao->close();
     return $result;
  }


}
//That`s all folks!