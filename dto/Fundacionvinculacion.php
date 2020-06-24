<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Tranquilo, yo tampoco entiendo cómo funciona mi código  \\


class Fundacionvinculacion {

  private $idFundacionVinculacion;
  private $Fundacion_idFundacion;
  private $Vinculaciones_idVeterinaria;

    /**
     * Constructor de Fundacionvinculacion
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idFundacionVinculacion
     * @return idFundacionVinculacion
     */
  public function getIdFundacionVinculacion(){
      return $this->idFundacionVinculacion;
  }

    /**
     * Modifica el valor correspondiente a idFundacionVinculacion
     * @param idFundacionVinculacion
     */
  public function setIdFundacionVinculacion($idFundacionVinculacion){
      $this->idFundacionVinculacion = $idFundacionVinculacion;
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
     * Devuelve el valor correspondiente a Vinculaciones_idVeterinaria
     * @return Vinculaciones_idVeterinaria
     */
  public function getVinculaciones_idVeterinaria(){
      return $this->Vinculaciones_idVeterinaria;
  }

    /**
     * Modifica el valor correspondiente a Vinculaciones_idVeterinaria
     * @param Vinculaciones_idVeterinaria
     */
  public function setVinculaciones_idVeterinaria($vinculaciones_idVeterinaria){
      $this->Vinculaciones_idVeterinaria = $vinculaciones_idVeterinaria;
  }


}
//That`s all folks!