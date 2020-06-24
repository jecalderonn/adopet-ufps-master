<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No se fije en el corte de cabello, soy mucho muy rico  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Albergue.php');
require_once realpath('../dao/interfaz/IAlbergueDao.php');
require_once realpath('../dto/Fundacion.php');

class AlbergueFacade {

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
   * Crea un objeto Albergue a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idAlbergue
   * @param nombreAlbergue
   * @param telefonoAlbergue
   * @param direccionAlbergue
   * @param fundacion_idFundacion
   */
  public static function insert($nombreAlbergue,  $telefonoAlbergue,  $direccionAlbergue,  $fundacion_idFundacion){
      $albergue = new Albergue(); 
      $albergue->setNombreAlbergue($nombreAlbergue); 
      $albergue->setTelefonoAlbergue($telefonoAlbergue); 
      $albergue->setDireccionAlbergue($direccionAlbergue); 
      $albergue->setFundacion_idFundacion($fundacion_idFundacion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $albergueDao =$FactoryDao->getalbergueDao(self::getDataBaseDefault());
     $rtn = $albergueDao->insert($albergue);
     $albergueDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Albergue de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idAlbergue
   * @return El objeto en base de datos o Null
   */
  public static function select($idAlbergue){
      $albergue = new Albergue();
      $albergue->setIdAlbergue($idAlbergue); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $albergueDao =$FactoryDao->getalbergueDao(self::getDataBaseDefault());
     $result = $albergueDao->select($albergue);
     $albergueDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Albergue  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idAlbergue
   * @param nombreAlbergue
   * @param telefonoAlbergue
   * @param direccionAlbergue
   * @param fundacion_idFundacion
   */
  public static function update($idAlbergue, $nombreAlbergue, $telefonoAlbergue, $direccionAlbergue, $fundacion_idFundacion){
      $albergue = self::select($idAlbergue);
      $albergue->setNombreAlbergue($nombreAlbergue); 
      $albergue->setTelefonoAlbergue($telefonoAlbergue); 
      $albergue->setDireccionAlbergue($direccionAlbergue); 
      $albergue->setFundacion_idFundacion($fundacion_idFundacion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $albergueDao =$FactoryDao->getalbergueDao(self::getDataBaseDefault());
     $albergueDao->update($albergue);
     $albergueDao->close();
  }

  /**
   * Elimina un objeto Albergue de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idAlbergue
   */
  public static function delete($idAlbergue){
      $albergue = new Albergue();
      $albergue->setIdAlbergue($idAlbergue); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $albergueDao =$FactoryDao->getalbergueDao(self::getDataBaseDefault());
     $albergueDao->delete($albergue);
     $albergueDao->close();
  }

  /**
   * Lista todos los objetos Albergue de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Albergue en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $albergueDao =$FactoryDao->getalbergueDao(self::getDataBaseDefault());
     $result = $albergueDao->listAll();
     $albergueDao->close();
     return $result;
  }


}
//That`s all folks!