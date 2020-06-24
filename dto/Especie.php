<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Santos frameworks Batman!  \\


class Especie {

  private $idEspecie;
  private $nombreEspecie;

    /**
     * Constructor de Especie
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idEspecie
     * @return idEspecie
     */
  public function getIdEspecie(){
      return $this->idEspecie;
  }

    /**
     * Modifica el valor correspondiente a idEspecie
     * @param idEspecie
     */
  public function setIdEspecie($idEspecie){
      $this->idEspecie = $idEspecie;
  }
    /**
     * Devuelve el valor correspondiente a nombreEspecie
     * @return nombreEspecie
     */
  public function getNombreEspecie(){
      return $this->nombreEspecie;
  }

    /**
     * Modifica el valor correspondiente a nombreEspecie
     * @param nombreEspecie
     */
  public function setNombreEspecie($nombreEspecie){
      $this->nombreEspecie = $nombreEspecie;
  }


}
//That`s all folks!