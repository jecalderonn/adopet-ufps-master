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


//    Si he visto más lejos es porque estoy sentado sobre los hombros de gigantes.  \\
//include_once realpath('../dao/interfaz/IConexion.php');

class Conexion3 {
   private $cnx;
   private $gestor;
    private $servidor = "3.19.155.48"; //"localhost o 161.18.233.43";
    private $usuario = "mascota";//"root o certiret
    private $constrasena = "Soporte";
    private $bd = "mascotas";
    private $conexion;

     function __construct($gestor) {
           $this->cnx = null ;
           switch ($gestor) {
             case "FactoryDao::MYSQL_FACTORY":
               $this->gestor="mysql";
               break;
             case "FactoryDao::POSTGRESQL_FACTORY":
               $this->gestor="pgsql";
               break;
             case "FactoryDao::ORACLE_FACTORY":
               $this->gestor="oci";
               break;
             case "FactoryDao::DERBY_FACTORY":
               $this->gestor="odbc";
               break;
             default:
               $this->gestor="NULL_GESTOR";
               break;
           }           
    }
    /**     
     * Crea una conexiÃ³n si no se ha establecido antes; en caso contrario, devuelve la ya existente
     * Toma los parÃ¡metros de conexiÃ³n de la clase Properties y usa el driver mysql.jdbc para establecer una conexiÃ³n. 
     * @return ConexiÃ³n a base de datos mySql
     * @param dbName Nombre de la base de datos que se desea conectar
     */
   public function obtener($servidor,$usuario,$constrasena,$bd){
      if ($this->cnx == null) {
         try {
             $ini_array = parse_ini_file(realpath('../dao/properties/Properties.ini'),true);
             $host = $servidor;
             $username = $usuario;
             $password = $constrasena;
             $dbName =$bd;
             $this->cnx = new PDO($this->gestor.":host=$host;dbname=$dbName;charset=utf8",$username,$password);
         }catch(Exception $e){
            die('Error : '.$e->getMessage());
        }
      }
      return $this->cnx;
   }

     /**
     * Cierra la conexiÃ³n a la base de datos
     * @throws SQLException
     */
   public function cerrar(){
      if ($this->cnx != null) {
         $this->cnx=null;
      }
   }

}
//That`s all folks!
