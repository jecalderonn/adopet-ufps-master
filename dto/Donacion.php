<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Caminante no hay camino, se hace camino al andar  \\


class Donacion {

  private $idDonacion;
  private $Mascota_idMascota;
  private $Fundacion_idFundacion;
  private $fechaDonacion;
  private $cantidad;
  private $descripcion;
  private $TipoDonacion_idTipoDonacion;

    /**
     * Constructor de Donacion
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idDonacion
     * @return idDonacion
     */
  public function getIdDonacion(){
      return $this->idDonacion;
  }

    /**
     * Modifica el valor correspondiente a idDonacion
     * @param idDonacion
     */
  public function setIdDonacion($idDonacion){
      $this->idDonacion = $idDonacion;
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
    /**
     * Devuelve el valor correspondiente a Fundacion_idFundacion
     * @return Fundacion_idFundacion
     */
  public function getFundacion_idFundacion(){
      return $this->Fundacion_idFundacion;
  }

    /**
     * Modifica el valor correspondiente a Fundacion_idFundacion
     * @param Fundacion_idFundacion
     */
  public function setFundacion_idFundacion($fundacion_idFundacion){
      $this->Fundacion_idFundacion = $fundacion_idFundacion;
  }
    /**
     * Devuelve el valor correspondiente a fechaDonacion
     * @return fechaDonacion
     */
  public function getFechaDonacion(){
      return $this->fechaDonacion;
  }

    /**
     * Modifica el valor correspondiente a fechaDonacion
     * @param fechaDonacion
     */
  public function setFechaDonacion($fechaDonacion){
      $this->fechaDonacion = $fechaDonacion;
  }
    /**
     * Devuelve el valor correspondiente a cantidad
     * @return cantidad
     */
  public function getCantidad(){
      return $this->cantidad;
  }

    /**
     * Modifica el valor correspondiente a cantidad
     * @param cantidad
     */
  public function setCantidad($cantidad){
      $this->cantidad = $cantidad;
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
     * Devuelve el valor correspondiente a TipoDonacion_idTipoDonacion
     * @return TipoDonacion_idTipoDonacion
     */
  public function getTipoDonacion_idTipoDonacion(){
      return $this->TipoDonacion_idTipoDonacion;
  }

    /**
     * Modifica el valor correspondiente a TipoDonacion_idTipoDonacion
     * @param TipoDonacion_idTipoDonacion
     */
  public function setTipoDonacion_idTipoDonacion($tipoDonacion_idTipoDonacion){
      $this->TipoDonacion_idTipoDonacion = $tipoDonacion_idTipoDonacion;
  }


}
//That`s all folks!