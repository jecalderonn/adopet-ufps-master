<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    NEVERMORE  \\


class Historialmascota {

  private $idHistorialMascota;
  private $fechaHistorialMascota;
  private $descripcion;
  private $Observacion;
  private $Mascota_idMascota;

    /**
     * Constructor de Historialmascota
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idHistorialMascota
     * @return idHistorialMascota
     */
  public function getIdHistorialMascota(){
      return $this->idHistorialMascota;
  }

    /**
     * Modifica el valor correspondiente a idHistorialMascota
     * @param idHistorialMascota
     */
  public function setIdHistorialMascota($idHistorialMascota){
      $this->idHistorialMascota = $idHistorialMascota;
  }
    /**
     * Devuelve el valor correspondiente a fechaHistorialMascota
     * @return fechaHistorialMascota
     */
  public function getFechaHistorialMascota(){
      return $this->fechaHistorialMascota;
  }

    /**
     * Modifica el valor correspondiente a fechaHistorialMascota
     * @param fechaHistorialMascota
     */
  public function setFechaHistorialMascota($fechaHistorialMascota){
      $this->fechaHistorialMascota = $fechaHistorialMascota;
  }
    /**
     * Devuelve el valor correspondiente a descripcion
     * @return descripcion
     */
  public function getDescripcion(){
      return $this->descripcion;
  }

    /**
     * Modifica el valor correspondiente a descripcion
     * @param descripcion
     */
  public function setDescripcion($descripcion){
      $this->descripcion = $descripcion;
  }
    /**
     * Devuelve el valor correspondiente a Observacion
     * @return Observacion
     */
  public function getObservacion(){
      return $this->Observacion;
  }

    /**
     * Modifica el valor correspondiente a Observacion
     * @param Observacion
     */
  public function setObservacion($observacion){
      $this->Observacion = $observacion;
  }
    /**
     * Devuelve el valor correspondiente a Mascota_idMascota
     * @return Mascota_idMascota
     */
  public function getMascota_idMascota(){
      return $this->Mascota_idMascota;
  }

    /**
     * Modifica el valor correspondiente a Mascota_idMascota
     * @param Mascota_idMascota
     */
  public function setMascota_idMascota($mascota_idMascota){
      $this->Mascota_idMascota = $mascota_idMascota;
  }


}
//That`s all folks!