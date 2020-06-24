<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    -¡UNO! -¡¡ +4 !!  \\


class Albergue {

  private $idAlbergue;
  private $nombreAlbergue;
  private $telefonoAlbergue;
  private $direccionAlbergue;
  private $Fundacion_idFundacion;

    /**
     * Constructor de Albergue
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idAlbergue
     * @return idAlbergue
     */
  public function getIdAlbergue(){
      return $this->idAlbergue;
  }

    /**
     * Modifica el valor correspondiente a idAlbergue
     * @param idAlbergue
     */
  public function setIdAlbergue($idAlbergue){
      $this->idAlbergue = $idAlbergue;
  }
    /**
     * Devuelve el valor correspondiente a nombreAlbergue
     * @return nombreAlbergue
     */
  public function getNombreAlbergue(){
      return $this->nombreAlbergue;
  }

    /**
     * Modifica el valor correspondiente a nombreAlbergue
     * @param nombreAlbergue
     */
  public function setNombreAlbergue($nombreAlbergue){
      $this->nombreAlbergue = $nombreAlbergue;
  }
    /**
     * Devuelve el valor correspondiente a telefonoAlbergue
     * @return telefonoAlbergue
     */
  public function getTelefonoAlbergue(){
      return $this->telefonoAlbergue;
  }

    /**
     * Modifica el valor correspondiente a telefonoAlbergue
     * @param telefonoAlbergue
     */
  public function setTelefonoAlbergue($telefonoAlbergue){
      $this->telefonoAlbergue = $telefonoAlbergue;
  }
    /**
     * Devuelve el valor correspondiente a direccionAlbergue
     * @return direccionAlbergue
     */
  public function getDireccionAlbergue(){
      return $this->direccionAlbergue;
  }

    /**
     * Modifica el valor correspondiente a direccionAlbergue
     * @param direccionAlbergue
     */
  public function setDireccionAlbergue($direccionAlbergue){
      $this->direccionAlbergue = $direccionAlbergue;
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


}
//That`s all folks!