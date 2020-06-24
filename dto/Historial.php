<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Estadistas informan que una linea de código equivale a un sorbo de café  \\


class Historial {

  private $idHistorial;
  private $fechaHistorial;
  private $Descripcion;
  private $tipo;
  private $Usuario_idUsuario;

    /**
     * Constructor de Historial
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idHistorial
     * @return idHistorial
     */
  public function getIdHistorial(){
      return $this->idHistorial;
  }

    /**
     * Modifica el valor correspondiente a idHistorial
     * @param idHistorial
     */
  public function setIdHistorial($idHistorial){
      $this->idHistorial = $idHistorial;
  }
    /**
     * Devuelve el valor correspondiente a fechaHistorial
     * @return fechaHistorial
     */
  public function getFechaHistorial(){
      return $this->fechaHistorial;
  }

    /**
     * Modifica el valor correspondiente a fechaHistorial
     * @param fechaHistorial
     */
  public function setFechaHistorial($fechaHistorial){
      $this->fechaHistorial = $fechaHistorial;
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
    /**
     * Devuelve el valor correspondiente a tipo
     * @return tipo
     */
  public function getTipo(){
      return $this->tipo;
  }

    /**
     * Modifica el valor correspondiente a tipo
     * @param tipo
     */
  public function setTipo($tipo){
      $this->tipo = $tipo;
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