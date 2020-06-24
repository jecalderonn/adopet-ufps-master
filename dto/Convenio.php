<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿En serio? ¿Tantos buenos frameworks y estás usando Anarchy?  \\


class Convenio {

  private $idConvenio;
  private $Veterinaria_idVeterinaria;
  private $Fundacion_idFundacion;
  private $fechaConvenio;
  private $nombreConvenio;
  private $duracionConvenio;
  private $estado;

    /**
     * Constructor de Convenio
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idConvenio
     * @return idConvenio
     */
  public function getIdConvenio(){
      return $this->idConvenio;
  }

    /**
     * Modifica el valor correspondiente a idConvenio
     * @param idConvenio
     */
  public function setIdConvenio($idConvenio){
      $this->idConvenio = $idConvenio;
  }
    /**
     * Devuelve el valor correspondiente a Veterinaria_idVeterinaria
     * @return Veterinaria_idVeterinaria
     */
  public function getVeterinaria_idVeterinaria(){
      return $this->Veterinaria_idVeterinaria;
  }

    /**
     * Modifica el valor correspondiente a Veterinaria_idVeterinaria
     * @param Veterinaria_idVeterinaria
     */
  public function setVeterinaria_idVeterinaria($veterinaria_idVeterinaria){
      $this->Veterinaria_idVeterinaria = $veterinaria_idVeterinaria;
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
     * Devuelve el valor correspondiente a fechaConvenio
     * @return fechaConvenio
     */
  public function getFechaConvenio(){
      return $this->fechaConvenio;
  }

    /**
     * Modifica el valor correspondiente a fechaConvenio
     * @param fechaConvenio
     */
  public function setFechaConvenio($fechaConvenio){
      $this->fechaConvenio = $fechaConvenio;
  }
    /**
     * Devuelve el valor correspondiente a nombreConvenio
     * @return nombreConvenio
     */
  public function getNombreConvenio(){
      return $this->nombreConvenio;
  }

    /**
     * Modifica el valor correspondiente a nombreConvenio
     * @param nombreConvenio
     */
  public function setNombreConvenio($nombreConvenio){
      $this->nombreConvenio = $nombreConvenio;
  }
    /**
     * Devuelve el valor correspondiente a duracionConvenio
     * @return duracionConvenio
     */
  public function getDuracionConvenio(){
      return $this->duracionConvenio;
  }

    /**
     * Modifica el valor correspondiente a duracionConvenio
     * @param duracionConvenio
     */
  public function setDuracionConvenio($duracionConvenio){
      $this->duracionConvenio = $duracionConvenio;
  }
    /**
     * Devuelve el valor correspondiente a estado
     * @return estado
     */
  public function getEstado(){
      return $this->estado;
  }

    /**
     * Modifica el valor correspondiente a estado
     * @param estado
     */
  public function setEstado($estado){
      $this->estado = $estado;
  }


}
//That`s all folks!