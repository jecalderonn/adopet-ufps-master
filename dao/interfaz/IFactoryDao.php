<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');
//header("Access-Control-Allow-Headers: X-Requested-With");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");  
header('Content-Type: text/html; charset=utf-8');
header("content-type: application/json; charset=utf-8");
header('P3P: CP="IDC DSP COR CURa ADMa OUR IND PHY ONL COM STA"'); 

//    La gente siempre me pregunta si conozco a Tyler Durden.  \\

include_once realpath('../dao/entities/AlbergueDao.php');
include_once realpath('../dao/entities/CalificacionDao.php');
include_once realpath('../dao/entities/ConvenioDao.php');
include_once realpath('../dao/entities/DocumentoDao.php');
include_once realpath('../dao/entities/DonacionDao.php');
include_once realpath('../dao/entities/EspecieDao.php');
include_once realpath('../dao/entities/FavoritomascotausuarioDao.php');
include_once realpath('../dao/entities/Foto_mascotaDao.php');
include_once realpath('../dao/entities/FundacionDao.php');
include_once realpath('../dao/entities/Fundacion_fotoDao.php');
include_once realpath('../dao/entities/FundacionvinculacionDao.php');
include_once realpath('../dao/entities/HistorialDao.php');
include_once realpath('../dao/entities/HistorialmascotaDao.php');
include_once realpath('../dao/entities/MascotaDao.php');
include_once realpath('../dao/entities/NotificacionDao.php');
include_once realpath('../dao/entities/RedsocialDao.php');
include_once realpath('../dao/entities/SolicitudDao.php');
include_once realpath('../dao/entities/TipodonacionDao.php');
include_once realpath('../dao/entities/TipousuarioDao.php');
include_once realpath('../dao/entities/UsuarioDao.php');
include_once realpath('../dao/entities/VinculacionDao.php');


interface IFactoryDao {
	
     /**
     * Devuelve una instancia de AlbergueDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de AlbergueDao
     */
     public function getAlbergueDao($dbName);
     /**
     * Devuelve una instancia de CalificacionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de CalificacionDao
     */
     public function getCalificacionDao($dbName);
     /**
     * Devuelve una instancia de ConvenioDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ConvenioDao
     */
     public function getConvenioDao($dbName);
     /**
     * Devuelve una instancia de DocumentoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de DocumentoDao
     */
     public function getDocumentoDao($dbName);
     /**
     * Devuelve una instancia de DonacionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de DonacionDao
     */
     public function getDonacionDao($dbName);
     /**
     * Devuelve una instancia de EspecieDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de EspecieDao
     */
     public function getEspecieDao($dbName);
     /**
     * Devuelve una instancia de FavoritomascotausuarioDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de FavoritomascotausuarioDao
     */
     public function getFavoritomascotausuarioDao($dbName);
     /**
     * Devuelve una instancia de Foto_mascotaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Foto_mascotaDao
     */
     public function getFoto_mascotaDao($dbName);
     /**
     * Devuelve una instancia de FundacionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de FundacionDao
     */
     public function getFundacionDao($dbName);
     /**
     * Devuelve una instancia de Fundacion_fotoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Fundacion_fotoDao
     */
     public function getFundacion_fotoDao($dbName);
     /**
     * Devuelve una instancia de FundacionvinculacionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de FundacionvinculacionDao
     */
     public function getFundacionvinculacionDao($dbName);
     /**
     * Devuelve una instancia de HistorialDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de HistorialDao
     */
     public function getHistorialDao($dbName);
     /**
     * Devuelve una instancia de HistorialmascotaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de HistorialmascotaDao
     */
     public function getHistorialmascotaDao($dbName);
     /**
     * Devuelve una instancia de MascotaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de MascotaDao
     */
     public function getMascotaDao($dbName);
     /**
     * Devuelve una instancia de NotificacionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de NotificacionDao
     */
     public function getNotificacionDao($dbName);
     /**
     * Devuelve una instancia de RedsocialDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de RedsocialDao
     */
     public function getRedsocialDao($dbName);
     /**
     * Devuelve una instancia de SolicitudDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de SolicitudDao
     */
     public function getSolicitudDao($dbName);
     /**
     * Devuelve una instancia de TipodonacionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de TipodonacionDao
     */
     public function getTipodonacionDao($dbName);
     /**
     * Devuelve una instancia de TipousuarioDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de TipousuarioDao
     */
     public function getTipousuarioDao($dbName);
     /**
     * Devuelve una instancia de UsuarioDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de UsuarioDao
     */
     public function getUsuarioDao($dbName);
     /**
     * Devuelve una instancia de VinculacionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de VinculacionDao
     */
     public function getVinculacionDao($dbName);

}
//That`s all folks!