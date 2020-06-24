<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Recuerda, cuando enciendas la molotov, debes arrojarla  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Fundacion.php');
require_once realpath('../dao/interfaz/IFundacionDao.php');
require_once realpath('../dto/Usuario.php');

class FundacionFacade {

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
   * Crea un objeto Fundacion a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idFundacion
   * @param nombreFundacion
   * @param direccionFundacion
   * @param telefonoFundacion
   * @param nit
   * @param correo
   * @param nombrepropietario
   * @param usuario_idUsuario
   */
  public static function insert(  $nombreFundacion,  $direccionFundacion,  $telefonoFundacion,  $nit,  $correo,  $nombrepropietario,  $usuario_idUsuario){
      $fundacion = new Fundacion();
      //$fundacion->setIdFundacion($idFundacion); 
      $fundacion->setNombreFundacion($nombreFundacion); 
      $fundacion->setDireccionFundacion($direccionFundacion); 
      $fundacion->setTelefonoFundacion($telefonoFundacion); 
      $fundacion->setNit($nit); 
      $fundacion->setCorreo($correo); 
      $fundacion->setNombrepropietario($nombrepropietario); 
      $fundacion->setUsuario_idUsuario($usuario_idUsuario); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fundacionDao =$FactoryDao->getfundacionDao(self::getDataBaseDefault());
     $rtn = $fundacionDao->insert($fundacion);
     $fundacionDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Fundacion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idFundacion
   * @return El objeto en base de datos o Null
   */
  public static function select($idFundacion){
      $fundacion = new Fundacion();
      $fundacion->setIdFundacion($idFundacion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fundacionDao =$FactoryDao->getfundacionDao(self::getDataBaseDefault());
     $result = $fundacionDao->select($fundacion);
     $fundacionDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Fundacion  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idFundacion
   * @param nombreFundacion
   * @param direccionFundacion
   * @param telefonoFundacion
   * @param nit
   * @param correo
   * @param nombrepropietario
   * @param usuario_idUsuario
   */
  public static function update($idFundacion, $nombreFundacion, $direccionFundacion, $telefonoFundacion, $nit, $correo, $nombrepropietario, $usuario_idUsuario){
      $fundacion = self::select($idFundacion);
      $fundacion->setNombreFundacion($nombreFundacion); 
      $fundacion->setDireccionFundacion($direccionFundacion); 
      $fundacion->setTelefonoFundacion($telefonoFundacion); 
      $fundacion->setNit($nit); 
      $fundacion->setCorreo($correo); 
      $fundacion->setNombrepropietario($nombrepropietario); 
      $fundacion->setUsuario_idUsuario($usuario_idUsuario); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fundacionDao =$FactoryDao->getfundacionDao(self::getDataBaseDefault());
     $fundacionDao->update($fundacion);
     $fundacionDao->close();
  }

/**
   * Elimina un objeto Fundacion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idFundacion
   */
  public static function updateEliminar($idFundacion){
      $fundacion = new Fundacion();
      $fundacion->setIdFundacion($idFundacion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fundacionDao =$FactoryDao->getfundacionDao(self::getDataBaseDefault());
     $fundacionDao->updateEliminar($fundacion);
     $fundacionDao->close();
  }
  
  /**
   * Elimina un objeto Fundacion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idFundacion
   */
  public static function delete($idFundacion){
      $fundacion = new Fundacion();
      $fundacion->setIdFundacion($idFundacion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fundacionDao =$FactoryDao->getfundacionDao(self::getDataBaseDefault());
     $fundacionDao->delete($fundacion);
     $fundacionDao->close();
  }

  /**
   * Lista todos los objetos Fundacion de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Fundacion en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fundacionDao =$FactoryDao->getfundacionDao(self::getDataBaseDefault());
     $result = $fundacionDao->listAll();
     $fundacionDao->close();
     return $result;
  }
  /**
   * Lista todos los objetos Fundacion de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Fundacion en base de datos o Null
   */
  public static function listAll_ByUser($user){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fundacionDao =$FactoryDao->getfundacionDao(self::getDataBaseDefault());
     $result = $fundacionDao->listAll_ByUser($user);
     $fundacionDao->close();
     return $result;
  }


}
//That`s all folks!