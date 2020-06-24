<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Hecho en sólo 6 días  \\


class Notificacion {

  private $idmensaje;
  private $fechaMensaje;
  private $Fundacion_idFundacion;
  private $Usuario_idUsuario;
  private $Descripcion;

    /**
     * Constructor de Notificacion
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idmensaje
     * @return idmensaje
     */
  public function getIdmensaje(){
      return $this->idmensaje;
  }

    /**
     * Modifica el valor correspondiente a idmensaje
     * @param idmensaje
     */
  public function setIdmensaje($idmensaje){
      $this->idmensaje = $idmensaje;
  }
    /**
     * Devuelve el valor correspondiente a fechaMensaje
     * @return fechaMensaje
     */
  public function getFechaMensaje(){
      return $this->fechaMensaje;
  }

    /**
     * Modifica el valor correspondiente a fechaMensaje
     * @param fechaMensaje
     */
  public function setFechaMensaje($fechaMensaje){
      $this->fechaMensaje = $fechaMensaje;
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
     * Devuelve el valor correspondiente a Descripcion
     * @return Descripcion
     */
  public function getDescripcion(){
      return $this->Descripcion;
  }

    /**
     * Modifica el valor correspondiente a Descripcion
     * @param Descripcion
     */
  public function setDescripcion($descripcion){
      $this->Descripcion = $descripcion;
  }


}
//That`s all folks!