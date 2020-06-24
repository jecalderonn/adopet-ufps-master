<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Don´t call me gringo you f%&ing beanner  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Fundacion_foto.php');
require_once realpath('../dao/interfaz/IFundacion_fotoDao.php');
require_once realpath('../dto/Fundacion.php');

class Fundacion_fotoFacade {

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
   * Crea un objeto Fundacion_foto a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idfundacion_foto
   * @param fundacion_fotonombre
   * @param fundacion_foto_ruta
   * @param fundacion_idFundacion
   */
  public static function insert( $idfundacion_foto,  $fundacion_fotonombre,  $fundacion_foto_ruta,  $fundacion_idFundacion){
      $fundacion_foto = new Fundacion_foto();
      $fundacion_foto->setIdfundacion_foto($idfundacion_foto); 
      $fundacion_foto->setFundacion_fotonombre($fundacion_fotonombre); 
      $fundacion_foto->setFundacion_foto_ruta($fundacion_foto_ruta); 
      $fundacion_foto->setFundacion_idFundacion($fundacion_idFundacion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fundacion_fotoDao =$FactoryDao->getfundacion_fotoDao(self::getDataBaseDefault());
     $rtn = $fundacion_fotoDao->insert($fundacion_foto);
     $fundacion_fotoDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Fundacion_foto de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idfundacion_foto
   * @return El objeto en base de datos o Null
   */
  public static function select($idfundacion_foto){
      $fundacion_foto = new Fundacion_foto();
      $fundacion_foto->setIdfundacion_foto($idfundacion_foto); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fundacion_fotoDao =$FactoryDao->getfundacion_fotoDao(self::getDataBaseDefault());
     $result = $fundacion_fotoDao->select($fundacion_foto);
     $fundacion_fotoDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Fundacion_foto  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idfundacion_foto
   * @param fundacion_fotonombre
   * @param fundacion_foto_ruta
   * @param fundacion_idFundacion
   */
  public static function update($idfundacion_foto, $fundacion_fotonombre, $fundacion_foto_ruta, $fundacion_idFundacion){
      $fundacion_foto = self::select($idfundacion_foto);
      $fundacion_foto->setFundacion_fotonombre($fundacion_fotonombre); 
      $fundacion_foto->setFundacion_foto_ruta($fundacion_foto_ruta); 
      $fundacion_foto->setFundacion_idFundacion($fundacion_idFundacion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fundacion_fotoDao =$FactoryDao->getfundacion_fotoDao(self::getDataBaseDefault());
     $fundacion_fotoDao->update($fundacion_foto);
     $fundacion_fotoDao->close();
  }

  /**
   * Elimina un objeto Fundacion_foto de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idfundacion_foto
   */
  public static function delete($idfundacion_foto){
      $fundacion_foto = new Fundacion_foto();
      $fundacion_foto->setIdfundacion_foto($idfundacion_foto); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fundacion_fotoDao =$FactoryDao->getfundacion_fotoDao(self::getDataBaseDefault());
     $fundacion_fotoDao->delete($fundacion_foto);
     $fundacion_fotoDao->close();
  }

  /**
   * Lista todos los objetos Fundacion_foto de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Fundacion_foto en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fundacion_fotoDao =$FactoryDao->getfundacion_fotoDao(self::getDataBaseDefault());
     $result = $fundacion_fotoDao->listAll();
     $fundacion_fotoDao->close();
     return $result;
  }


}
//That`s all folks!