<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Recuerda, cuando enciendas la molotov, debes arrojarla  \\


class Fundacion {

  private $idFundacion;
  private $nombreFundacion;
  private $direccionFundacion;
  private $telefonoFundacion;
  private $nit;
  private $correo;
  private $nombrepropietario;
  private $Usuario_idUsuario;

    /**
     * Constructor de Fundacion
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idFundacion
     * @return idFundacion
     */
  public function getIdFundacion(){
      return $this->idFundacion;
  }

    /**
     * Modifica el valor correspondiente a idFundacion
     * @param idFundacion
     */
  public function setIdFundacion($idFundacion){
      $this->idFundacion = $idFundacion;
  }
    /**
     * Devuelve el valor correspondiente a nombreFundacion
     * @return nombreFundacion
     */
  public function getNombreFundacion(){
      return $this->nombreFundacion;
  }

    /**
     * Modifica el valor correspondiente a nombreFundacion
     * @param nombreFundacion
     */
  public function setNombreFundacion($nombreFundacion){
      $this->nombreFundacion = $nombreFundacion;
  }
    /**
     * Devuelve el valor correspondiente a direccionFundacion
     * @return direccionFundacion
     */
  public function getDireccionFundacion(){
      return $this->direccionFundacion;
  }

    /**
     * Modifica el valor correspondiente a direccionFundacion
     * @param direccionFundacion
     */
  public function setDireccionFundacion($direccionFundacion){
      $this->direccionFundacion = $direccionFundacion;
  }
    /**
     * Devuelve el valor correspondiente a telefonoFundacion
     * @return telefonoFundacion
     */
  public function getTelefonoFundacion(){
      return $this->telefonoFundacion;
  }

    /**
     * Modifica el valor correspondiente a telefonoFundacion
     * @param telefonoFundacion
     */
  public function setTelefonoFundacion($telefonoFundacion){
      $this->telefonoFundacion = $telefonoFundacion;
  }
    /**
     * Devuelve el valor correspondiente a nit
     * @return nit
     */
  public function getNit(){
      return $this->nit;
  }

    /**
     * Modifica el valor correspondiente a nit
     * @param nit
     */
  public function setNit($nit){
      $this->nit = $nit;
  }
    /**
     * Devuelve el valor correspondiente a correo
     * @return correo
     */
  public function getCorreo(){
      return $this->correo;
  }

    /**
     * Modifica el valor correspondiente a correo
     * @param correo
     */
  public function setCorreo($correo){
      $this->correo = $correo;
  }
    /**
     * Devuelve el valor correspondiente a nombrepropietario
     * @return nombrepropietario
     */
  public function getNombrepropietario(){
      return $this->nombrepropietario;
  }

    /**
     * Modifica el valor correspondiente a nombrepropietario
     * @param nombrepropietario
     */
  public function setNombrepropietario($nombrepropietario){
      $this->nombrepropietario = $nombrepropietario;
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


}
//That`s all folks!