<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No se fije en el corte de cabello, soy mucho muy rico  \\
header("Access-Control-Allow-Origin: *");  
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");  
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("content-type: application/json; charset=utf-8");



require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Mascota.php');
require_once realpath('../dao/interfaz/IMascotaDao.php');
require_once realpath('../dto/Especie.php');
require_once realpath('../dto/Fundacion.php');
require_once realpath('../dto/Vinculacion.php');

class MascotaFacade {

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
   * Crea un objeto Mascota a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idMascota
   * @param especie_idEspecie
   * @param nombreMascota
   * @param edadMascota
   * @param sexoMascota
   * @param disponibilidadMascota
   * @param fundacion_idFundacion
   * @param fechaIngreso
   * @param fechaSalida
   * @param veterinaria_idVeterinaria
   */
  public static function insert($especie_idEspecie,  $nombreMascota,  $edadMascota,  $sexoMascota,  $disponibilidadMascota,  $fundacion_idFundacion,  $fechaIngreso, $fechaSalida, $veterinaria_idVeterinaria){
      $mascota = new Mascota();
      $mascota->setEspecie_idEspecie($especie_idEspecie); 
      $mascota->setNombreMascota($nombreMascota); 
      $mascota->setEdadMascota($edadMascota); 
      $mascota->setSexoMascota($sexoMascota); 
      $mascota->setDisponibilidadMascota($disponibilidadMascota); 
      $mascota->setFundacion_idFundacion($fundacion_idFundacion); 
      $mascota->setFechaIngreso($fechaIngreso); 
      $mascota->setFechaSalida($fechaSalida); 
      $mascota->setVeterinaria_idVeterinaria($veterinaria_idVeterinaria); 
      $FactoryDao=new FactoryDao(self::getGestorDefault());
      $mascotaDao =$FactoryDao->getmascotaDao(self::getDataBaseDefault());
      $rtn = $mascotaDao->insert($mascota);
      $mascotaDao->close();
      return $rtn;
  }
  
  /**
   * Selecciona un objeto Mascota de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idMascota
   * @return El objeto en base de datos o Null
   */
  public static function select($idMascota){
      $mascota = new Mascota();
      $mascota->setIdMascota($idMascota); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $mascotaDao =$FactoryDao->getmascotaDao(self::getDataBaseDefault());
     $result = $mascotaDao->select($mascota);
     $mascotaDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Mascota  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idMascota
   * @param especie_idEspecie
   * @param nombreMascota
   * @param edadMascota
   * @param sexoMascota
   * @param disponibilidadMascota
   * @param fundacion_idFundacion
   * @param fechaIngreso
   * @param fechaSalida
   * @param veterinaria_idVeterinaria
   */
  public static function update($idMascota, $especie_idEspecie, $nombreMascota, $edadMascota, $sexoMascota, $disponibilidadMascota, $fundacion_idFundacion, $fechaIngreso, $veterinaria_idVeterinaria){
      $mascota = self::select($idMascota);
      $mascota->setEspecie_idEspecie($especie_idEspecie); 
      $mascota->setNombreMascota($nombreMascota); 
      $mascota->setEdadMascota($edadMascota); 
      $mascota->setSexoMascota($sexoMascota); 
      $mascota->setDisponibilidadMascota($disponibilidadMascota); 
      $mascota->setFundacion_idFundacion($fundacion_idFundacion); 
      $mascota->setFechaIngreso($fechaIngreso); 
      //$mascota->setFechaSalida($fechaSalida); 
      $mascota->setVeterinaria_idVeterinaria($veterinaria_idVeterinaria); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $mascotaDao =$FactoryDao->getmascotaDao(self::getDataBaseDefault());
     $mascotaDao->update($mascota);
     $mascotaDao->close();
  }

  /**
   * Elimina un objeto Mascota de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idMascota
   */
  
  public static function updateEliminar($idMascota){
      
        $mascota = self::select($idMascota);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $mascotaDao = $FactoryDao->getmascotaDao(self::getDataBaseDefault());
        $mascotaDao->updateEliminar($mascota);
        $mascotaDao->close();
  }
  
  public static function delete($idMascota){
      $mascota = new Mascota();
      $mascota->setIdMascota($idMascota); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $mascotaDao =$FactoryDao->getmascotaDao(self::getDataBaseDefault());
     $mascotaDao->delete($mascota);
     $mascotaDao->close();
  }

  /**
   * Lista todos los objetos Mascota de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Mascota en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $mascotaDao =$FactoryDao->getmascotaDao(self::getDataBaseDefault());
     $result = $mascotaDao->listAll();
     $mascotaDao->close();
     return $result;
  }
  /**
   * Lista todos los objetos Mascota de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Mascota en base de datos o Null
   */
  public static function listByFundacion($fundacion){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $mascotaDao =$FactoryDao->getmascotaDao(self::getDataBaseDefault());
     $result = $mascotaDao->listByFundacion($fundacion);
     $mascotaDao->close();
     return $result;
  }
  public static function listByFundacion_User($user){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $mascotaDao =$FactoryDao->getmascotaDao(self::getDataBaseDefault());
     $result = $mascotaDao->listByFundacion_User($user);
     $mascotaDao->close();
     return $result;
  }
  
  public static function listAll_Random(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $mascotaDao =$FactoryDao->getmascotaDao(self::getDataBaseDefault());
     $result = $mascotaDao->listAll_Random();
     $mascotaDao->close();
     return $result;
  }
  
  public static function ListMoreAdoptedByFundation($idFundacion) {
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $mascotaDao =$FactoryDao->getmascotaDao(self::getDataBaseDefault());
     $result = $mascotaDao->ListMoreAdoptedByFundation($idFundacion);
     $mascotaDao->close();
     return $result; 
  }
  
  public static function ListByType($tipoMascota){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $mascotaDao =$FactoryDao->getmascotaDao(self::getDataBaseDefault());
     $result = $mascotaDao->ListByType($tipoMascota);
     $mascotaDao->close();
     return $result;
      
  }


}
//That`s all folks!