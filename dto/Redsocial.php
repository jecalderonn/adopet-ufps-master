<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Nuestra empresa cuenta con una división sólo para las frases. Disfrútalas  \\


class Redsocial {

  private $idRedesSociales;
  private $nombre;
  private $url;
  private $Fundacion_idFundacion;

    /**
     * Constructor de Redsocial
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idRedesSociales
     * @return idRedesSociales
     */
  public function getIdRedesSociales(){
      return $this->idRedesSociales;
  }

    /**
     * Modifica el valor correspondiente a idRedesSociales
     * @param idRedesSociales
     */
  public function setIdRedesSociales($idRedesSociales){
      $this->idRedesSociales = $idRedesSociales;
  }
    /**
     * Devuelve el valor correspondiente a nombre
     * @return nombre
     */
  public function getNombre(){
      return $this->nombre;
  }

    /**
     * Modifica el valor correspondiente a nombre
     * @param nombre
     */
  public function setNombre($nombre){
      $this->nombre = $nombre;
  }
    /**
     * Devuelve el valor correspondiente a url
     * @return url
     */
  public function getUrl(){
      return $this->url;
  }

    /**
     * Modifica el valor correspondiente a url
     * @param url
     */
  public function setUrl($url){
      $this->url = $url;
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