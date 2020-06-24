<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Alza el puño y ven! ¡En la hoguera hay de beber!  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Documento.php');
require_once realpath('../dao/interfaz/IDocumentoDao.php');
require_once realpath('../dto/Usuario.php');

class DocumentoFacade {

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
   * Crea un objeto Documento a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param nombreDocumento
   * @param rutaDocumento
   * @param usuario_idUsuario
   */
  public static function insert($nombreDocumento,  $rutaDocumento,  $usuario_idUsuario){
      $documento = new Documento();
      $documento->setNombreDocumento($nombreDocumento); 
      $documento->setRutaDocumento($rutaDocumento); 
      $documento->setUsuario_idUsuario($usuario_idUsuario); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $documentoDao =$FactoryDao->getdocumentoDao(self::getDataBaseDefault());
     $rtn = $documentoDao->insert($documento);
     $documentoDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Documento de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idDocumento
   * @return El objeto en base de datos o Null
   */
  public static function select($idDocumento){
      $documento = new Documento();
      $documento->setIdDocumento($idDocumento); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $documentoDao =$FactoryDao->getdocumentoDao(self::getDataBaseDefault());
     $result = $documentoDao->select($documento);
     $documentoDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Documento  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idDocumento
   * @param nombreDocumento
   * @param rutaDocumento
   * @param usuario_idUsuario
   */
  public static function update($idDocumento, $nombreDocumento, $rutaDocumento ){
      $documento = self::select($idDocumento);
      $documento->setNombreDocumento($nombreDocumento); 
      $documento->setRutaDocumento($rutaDocumento); 
      

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $documentoDao =$FactoryDao->getdocumentoDao(self::getDataBaseDefault());
     $documentoDao->update($documento);
     $documentoDao->close();
  }

  /**
   * Elimina un objeto Documento de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idDocumento
   */
  public static function delete($idDocumento){
      $documento = new Documento();
      $documento->setIdDocumento($idDocumento); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $documentoDao =$FactoryDao->getdocumentoDao(self::getDataBaseDefault());
     $documentoDao->delete($documento);
     $documentoDao->close();
  }

  /**
   * Lista todos los objetos Documento de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Documento en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $documentoDao =$FactoryDao->getdocumentoDao(self::getDataBaseDefault());
     $result = $documentoDao->listAll();
     $documentoDao->close();
     return $result;
  }
  
    /**
   * Lista el objeto Documento de la base de datos segun el id.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idDocumento
   * @return $result Array con los objetos Documento en base de datos o Null
   */
    public static function ListByIdUser($idDocumento){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $DocumentoDao =$FactoryDao->getDocumentoDao(self::getDataBaseDefault());
     $result = $DocumentoDao->ListByIdUser($idDocumento);
     $DocumentoDao->close();
     return $result;
      
  }

    public static function ListById($idDocumento){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $DocumentoDao =$FactoryDao->getDocumentoDao(self::getDataBaseDefault());
     $result = $DocumentoDao->ListByIdUser($idDocumento);
     $DocumentoDao->close();
     return $result;
      
  }


}
//That`s all folks!