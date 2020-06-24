<?php
/*
-------Creado por-------
\(x.x )/ Anarchy \( x.x)/
------------------------
 */

//    Por desgracia, mi epitafio será una frase insulsa y vacía  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Favoritomascotausuario.php');
require_once realpath('../dao/interfaz/IFavoritomascotausuarioDao.php');
require_once realpath('../dto/Mascota.php');
require_once realpath('../dto/Usuario.php');

class FavoritomascotausuarioFacade
{

    /**
     * Para su comodidad, defina aquí el gestor de conexión predilecto para esta entidad
     * @return idGestor Devuelve el identificador del gestor de conexión
     */
    private static function getGestorDefault()
    {
        return DEFAULT_GESTOR;
    }
    /**
     * Para su comodidad, defina aquí el nombre de base de datos predilecto para esta entidad
     * @return dbName Devuelve el nombre de la base de datos a emplear
     */
    private static function getDataBaseDefault()
    {
        return DEFAULT_DBNAME;
    }
    /**
     * Crea un objeto Favoritomascotausuario a partir de sus parámetros y lo guarda en base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param mascota_idMascota
     * @param usuario_idUsuario
     * @param idFavoritoMascotaUsuario
     */
    public static function insert($mascota_idMascota, $usuario_idUsuario)
    {
        $favoritomascotausuario = new Favoritomascotausuario();
        $favoritomascotausuario->setMascota_idMascota($mascota_idMascota);
        $favoritomascotausuario->setUsuario_idUsuario($usuario_idUsuario);

        $FactoryDao                = new FactoryDao(self::getGestorDefault());
        $favoritomascotausuarioDao = $FactoryDao->getfavoritomascotausuarioDao(self::getDataBaseDefault());
        $rtn                       = $favoritomascotausuarioDao->insert($favoritomascotausuario);
        $favoritomascotausuarioDao->close();
        return $rtn;
    }

    /**
     * Selecciona un objeto Favoritomascotausuario de la base de datos a partir de su(s) llave(s) primaria(s).
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param idFavoritoMascotaUsuario
     * @return El objeto en base de datos o Null
     */
    public static function select($idFavoritoMascotaUsuario)
    {
        $favoritomascotausuario = new Favoritomascotausuario();
        $favoritomascotausuario->setIdFavoritoMascotaUsuario($idFavoritoMascotaUsuario);

        $FactoryDao                = new FactoryDao(self::getGestorDefault());
        $favoritomascotausuarioDao = $FactoryDao->getfavoritomascotausuarioDao(self::getDataBaseDefault());
        $result                    = $favoritomascotausuarioDao->select($favoritomascotausuario);
        $favoritomascotausuarioDao->close();
        return $result;
    }

    /**
     * Modifica los atributos de un objeto Favoritomascotausuario  ya existente en base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param mascota_idMascota
     * @param usuario_idUsuario
     * @param idFavoritoMascotaUsuario
     */
    public static function update($mascota_idMascota, $usuario_idUsuario, $idFavoritoMascotaUsuario)
    {
        $favoritomascotausuario = self::select($idFavoritoMascotaUsuario);
        $favoritomascotausuario->setMascota_idMascota($mascota_idMascota);
        $favoritomascotausuario->setUsuario_idUsuario($usuario_idUsuario);

        $FactoryDao                = new FactoryDao(self::getGestorDefault());
        $favoritomascotausuarioDao = $FactoryDao->getfavoritomascotausuarioDao(self::getDataBaseDefault());
        $favoritomascotausuarioDao->update($favoritomascotausuario);
        $favoritomascotausuarioDao->close();
    }

    /**
     * Elimina un objeto Favoritomascotausuario de la base de datos a partir de su(s) llave(s) primaria(s).
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param idFavoritoMascotaUsuario
     */
    public static function delete($idFavoritoMascotaUsuario)
    {
        $favoritomascotausuario = new Favoritomascotausuario();
        $favoritomascotausuario->setIdFavoritoMascotaUsuario($idFavoritoMascotaUsuario);

        $FactoryDao                = new FactoryDao(self::getGestorDefault());
        $favoritomascotausuarioDao = $FactoryDao->getfavoritomascotausuarioDao(self::getDataBaseDefault());
        $favoritomascotausuarioDao->delete($favoritomascotausuario);
        $favoritomascotausuarioDao->close();
    }

    /**
     * Lista todos los objetos Favoritomascotausuario de la base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @return $result Array con los objetos Favoritomascotausuario en base de datos o Null
     */
    public static function listAll()
    {
        $FactoryDao                = new FactoryDao(self::getGestorDefault());
        $favoritomascotausuarioDao = $FactoryDao->getfavoritomascotausuarioDao(self::getDataBaseDefault());
        $result                    = $favoritomascotausuarioDao->listAll();
        $favoritomascotausuarioDao->close();
        return $result;
    }
        /**
     * Lista los objetos Favoritomascotausuario de la base de datos segun el ID del usuario.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param usuario_idUsuario
     * @return $result Array con los objetos Favoritomascotausuario en base de datos o Null
     */
        public static function listByUser($id_user)
    {
        $FactoryDao                = new FactoryDao(self::getGestorDefault());
        $favoritomascotausuarioDao = $FactoryDao->getfavoritomascotausuarioDao(self::getDataBaseDefault());
        $result                    = $favoritomascotausuarioDao->listByUser($id_user);
        $favoritomascotausuarioDao->close();
        return $result;
    }
    /**
     * Lista los objetos Favoritomascotausuario segun la cantidad de usuarios que escogio la mascota como favorito.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @return $result Array con los objetos Favoritomascotausuario en base de datos o Null
     */
    public static function listMostFavorite()
    {
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $favoritomascotausuarioDao =$FactoryDao->getfavoritomascotausuarioDao(self::getDataBaseDefault());
     $result = $favoritomascotausuarioDao->listByMascota_idMascota($favoritomascotausuario);
     $favoritomascotausuarioDao->close();
     return $result;
  }

  /**
   * Lista todos los objetos Favoritomascotausuario de la base de datos a partir de Usuario_idUsuario.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param usuario_idUsuario
   * @return $result Array con los objetos en base de datos o Null
   */
  public static function listByUsuario_idUsuario($usuario_idUsuario){
      $favoritomascotausuario = new Favoritomascotausuario();
      $favoritomascotausuario->setUsuario_idUsuario($usuario_idUsuario); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $favoritomascotausuarioDao =$FactoryDao->getfavoritomascotausuarioDao(self::getDataBaseDefault());
     $result = $favoritomascotausuarioDao->listByUsuario_idUsuario($favoritomascotausuario);
     $favoritomascotausuarioDao->close();
     return $result;
  }
  

}
//That`s all folks!
