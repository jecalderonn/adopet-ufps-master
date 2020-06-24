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
//    Yo <3 Cúcuta  \\

include_once realpath('../dao/conexion/Conexion.php');
include_once realpath('../dao/interfaz/IFactoryDao.php');

class FactoryDao implements IFactoryDao{
	
     private $conn;
     public static $NULL_GESTOR = -1;
    public static $MYSQL_FACTORY = 0;
    public static $POSTGRESQL_FACTORY = 1;
    public static $ORACLE_FACTORY = 2;
    public static $DERBY_FACTORY = 3;

     public function __construct($gestor){
        $this->conn=new Conexion($gestor);
     }
     /**
     * Devuelve una instancia de AlbergueDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de AlbergueDao
     */
     public function getAlbergueDao($dbName){
        return new AlbergueDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de CalificacionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de CalificacionDao
     */
     public function getCalificacionDao($dbName){
        return new CalificacionDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de ConvenioDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ConvenioDao
     */
     public function getConvenioDao($dbName){
        return new ConvenioDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de DocumentoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de DocumentoDao
     */
     public function getDocumentoDao($dbName){
        return new DocumentoDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de DonacionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de DonacionDao
     */
     public function getDonacionDao($dbName){
        return new DonacionDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de EspecieDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de EspecieDao
     */
     public function getEspecieDao($dbName){
        return new EspecieDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de FavoritomascotausuarioDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de FavoritomascotausuarioDao
     */
     public function getFavoritomascotausuarioDao($dbName){
        return new FavoritomascotausuarioDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Foto_mascotaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Foto_mascotaDao
     */
     public function getFoto_mascotaDao($dbName){
        return new Foto_mascotaDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de FundacionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de FundacionDao
     */
     public function getFundacionDao($dbName){
        return new FundacionDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Fundacion_fotoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Fundacion_fotoDao
     */
     public function getFundacion_fotoDao($dbName){
        return new Fundacion_fotoDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de FundacionvinculacionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de FundacionvinculacionDao
     */
     public function getFundacionvinculacionDao($dbName){
        return new FundacionvinculacionDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de HistorialDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de HistorialDao
     */
     public function getHistorialDao($dbName){
        return new HistorialDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de HistorialmascotaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de HistorialmascotaDao
     */
     public function getHistorialmascotaDao($dbName){
        return new HistorialmascotaDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de MascotaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de MascotaDao
     */
     public function getMascotaDao($dbName){
        return new MascotaDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de NotificacionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de NotificacionDao
     */
     public function getNotificacionDao($dbName){
        return new NotificacionDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de RedsocialDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de RedsocialDao
     */
     public function getRedsocialDao($dbName){
        return new RedsocialDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de SolicitudDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de SolicitudDao
     */
     public function getSolicitudDao($dbName){
        return new SolicitudDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de TipodonacionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de TipodonacionDao
     */
     public function getTipodonacionDao($dbName){
        return new TipodonacionDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de TipousuarioDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de TipousuarioDao
     */
     public function getTipousuarioDao($dbName){
        return new TipousuarioDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de UsuarioDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de UsuarioDao
     */
     public function getUsuarioDao($dbName){
        return new UsuarioDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de VinculacionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de VinculacionDao
     */
     public function getVinculacionDao($dbName){
        return new VinculacionDao($this->conn->obtener($dbName));
    }

}
//That`s all folks!