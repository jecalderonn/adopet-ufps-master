<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Me ayudas con la tesis?  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Tipodonacion.php');
require_once realpath('../dao/interfaz/ITipodonacionDao.php');

class TipodonacionFacade {

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
   * Crea un objeto Tipodonacion a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idTipoDonacion
   * @param tipoDonacion
   * @param descripcion
   */
  public static function insert( $idTipoDonacion,  $tipoDonacion,  $descripcion){
      $tipodonacion = new Tipodonacion();
      $tipodonacion->setIdTipoDonacion($idTipoDonacion); 
      $tipodonacion->setTipoDonacion($tipoDonacion); 
      $tipodonacion->setDescripcion($descripcion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $tipodonacionDao =$FactoryDao->gettipodonacionDao(self::getDataBaseDefault());
     $rtn = $tipodonacionDao->insert($tipodonacion);
     $tipodonacionDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Tipodonacion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idTipoDonacion
   * @return El objeto en base de datos o Null
   */
  public static function select($idTipoDonacion){
      $tipodonacion = new Tipodonacion();
      $tipodonacion->setIdTipoDonacion($idTipoDonacion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $tipodonacionDao =$FactoryDao->gettipodonacionDao(self::getDataBaseDefault());
     $result = $tipodonacionDao->select($tipodonacion);
     $tipodonacionDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Tipodonacion  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idTipoDonacion
   * @param tipoDonacion
   * @param descripcion
   */
  public static function update($idTipoDonacion, $tipoDonacion, $descripcion){
      $tipodonacion = self::select($idTipoDonacion);
      $tipodonacion->setTipoDonacion($tipoDonacion); 
      $tipodonacion->setDescripcion($descripcion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $tipodonacionDao =$FactoryDao->gettipodonacionDao(self::getDataBaseDefault());
     $tipodonacionDao->update($tipodonacion);
     $tipodonacionDao->close();
  }

  /**
   * Elimina un objeto Tipodonacion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idTipoDonacion
   */
  public static function delete($idTipoDonacion){
      $tipodonacion = new Tipodonacion();
      $tipodonacion->setIdTipoDonacion($idTipoDonacion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $tipodonacionDao =$FactoryDao->gettipodonacionDao(self::getDataBaseDefault());
     $tipodonacionDao->delete($tipodonacion);
     $tipodonacionDao->close();
  }

  /**
   * Lista todos los objetos Tipodonacion de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Tipodonacion en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $tipodonacionDao =$FactoryDao->gettipodonacionDao(self::getDataBaseDefault());
     $result = $tipodonacionDao->listAll();
     $tipodonacionDao->close();
     return $result;
  }


}
//That`s all folks!