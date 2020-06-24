<?php

/*
  -------Creado por-------
  \(x.x )/ Anarchy \( x.x)/
  ------------------------
 */

//    La segunda regla de Anarchy es no hablar de Anarchy  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Convenio.php');
require_once realpath('../dao/interfaz/IConvenioDao.php');
require_once realpath('../dto/Vinculacion.php');
require_once realpath('../dto/Fundacion.php');

class ConvenioFacade {

    /**
     * Para su comodidad, defina aquí el gestor de conexión predilecto para esta entidad
     * @return idGestor Devuelve el identificador del gestor de conexión
     */
    private static function getGestorDefault() {
        return DEFAULT_GESTOR;
    }

    /**
     * Para su comodidad, defina aquí el nombre de base de datos predilecto para esta entidad
     * @return dbName Devuelve el nombre de la base de datos a emplear
     */
    private static function getDataBaseDefault() {
        return DEFAULT_DBNAME;
    }

    /**
     * Crea un objeto Convenio a partir de sus parámetros y lo guarda en base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param idConvenio
     * @param veterinaria_idVeterinaria
     * @param fundacion_idFundacion
     * @param fechaConvenio
     * @param nombreConvenio
     * @param duracionConvenio
     * @param estado
     */
    public static function insert($veterinaria_idVeterinaria, $fundacion_idFundacion, $fechaConvenio, $nombreConvenio, $duracionConvenio) {
        $convenio = new Convenio();
        $convenio->setVeterinaria_idVeterinaria($veterinaria_idVeterinaria);
        $convenio->setFundacion_idFundacion($fundacion_idFundacion);
        $convenio->setFechaConvenio($fechaConvenio);
        $convenio->setNombreConvenio($nombreConvenio);
        $convenio->setDuracionConvenio($duracionConvenio);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $convenioDao = $FactoryDao->getconvenioDao(self::getDataBaseDefault());
        $rtn = $convenioDao->insert($convenio);
        $convenioDao->close();
        return $rtn;
    }

    /**
     * Selecciona un objeto Convenio de la base de datos a partir de su(s) llave(s) primaria(s).
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param idConvenio
     * @return El objeto en base de datos o Null
     */
    public static function select($idConvenio) {
        $convenio = new Convenio();
        $convenio->setIdConvenio($idConvenio);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $convenioDao = $FactoryDao->getconvenioDao(self::getDataBaseDefault());
        $result = $convenioDao->select($convenio);
        $convenioDao->close();
        return $result;
    }

    /**
     * Modifica los atributos de un objeto Convenio  ya existente en base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param idConvenio
     * @param veterinaria_idVeterinaria
     * @param fundacion_idFundacion
     * @param fechaConvenio
     * @param nombreConvenio
     * @param duracionConvenio
     * @param estado
     */
    public static function update($idConvenio, $veterinaria_idVeterinaria, $fundacion_idFundacion, $fechaConvenio, $nombreConvenio, $duracionConvenio) {
        $convenio = self::select($idConvenio);
        $convenio->setVeterinaria_idVeterinaria($veterinaria_idVeterinaria);
        $convenio->setFundacion_idFundacion($fundacion_idFundacion);
        $convenio->setFechaConvenio($fechaConvenio);
        $convenio->setNombreConvenio($nombreConvenio);
        $convenio->setDuracionConvenio($duracionConvenio);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $convenioDao = $FactoryDao->getconvenioDao(self::getDataBaseDefault());
        $convenioDao->update($convenio);
        $convenioDao->close();
    }

    /**
     * Cambia el estado un objeto Convenio de la base de datos a partir de su(s) llave(s) primaria(s).
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param idConvenio
     */
    public static function updateEliminar($idConvenio) {
        $convenio = self::select($idConvenio);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $convenioDao = $FactoryDao->getconvenioDao(self::getDataBaseDefault());
        $convenioDao->updateEliminar($convenio);
        $convenioDao->close();
    }

    /**
     * Elimina un objeto Convenio de la base de datos a partir de su(s) llave(s) primaria(s).
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param idConvenio
     */
    public static function delete($idConvenio) {
        $convenio = new Convenio();
        $convenio->setIdConvenio($idConvenio);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $convenioDao = $FactoryDao->getconvenioDao(self::getDataBaseDefault());
        $convenioDao->delete($convenio);
        $convenioDao->close();
    }

    /**
     * Lista todos los objetos Convenio de la base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @return $result Array con los objetos Convenio en base de datos o Null
     */
    public static function listAll() {
        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $convenioDao = $FactoryDao->getconvenioDao(self::getDataBaseDefault());
        $result = $convenioDao->listAll();
        $convenioDao->close();
        return $result;
    }

}

//That`s all folks!