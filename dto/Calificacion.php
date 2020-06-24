<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Trabajo individual singifica ganancia individual  \\


class Calificacion {

  private $idCalificacion;
  private $Fundacion_idFundacion;
  private $Usuario_idUsuario;
  private $calificacion;

    /**
     * Constructor de Calificacion
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idCalificacion
     * @return idCalificacion
     */
  public function getIdCalificacion(){
      return $this->idCalificacion;
  }

    /**
     * Modifica el valor correspondiente a idCalificacion
     * @param idCalificacion
     */
  public function setIdCalificacion($idCalificacion){
      $this->idCalificacion = $idCalificacion;
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
     * Devuelve el valor correspondiente a Usuario_idUsuario
     * @return Usuario_idUsuario
     */
  public function getUsuario_idUsuario(){
      return $this->Usuario_idUsuario;
  }

    /**
     * Modifica el valor correspondiente a Usuario_idUsuario
     * @param Usuario_idUsuario
     */
  public function setUsuario_idUsuario($usuario_idUsuario){
      $this->Usuario_idUsuario = $usuario_idUsuario;
  }
    /**
     * Devuelve el valor correspondiente a calificacion
     * @return calificacion
     */
  public function getCalificacion(){
      return $this->calificacion;
  }

    /**
     * Modifica el valor correspondiente a calificacion
     * @param calificacion
     */
  public function setCalificacion($calificacion){
      $this->calificacion = $calificacion;
  }


}
//That`s all folks!