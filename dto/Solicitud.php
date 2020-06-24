<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Por desgracia, mi epitafio será una frase insulsa y vacía  \\


class Solicitud {

  private $idSolicitud;
  private $Usuario_idUsuario;
  private $descripcion;
  private $aprobacion;
  private $tipoSolucitud;
  private $Mascota_idMascota;

    /**
     * Constructor de Solicitud
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idSolicitud
     * @return idSolicitud
     */
  public function getIdSolicitud(){
      return $this->idSolicitud;
  }

    /**
     * Modifica el valor correspondiente a idSolicitud
     * @param idSolicitud
     */
  public function setIdSolicitud($idSolicitud){
      $this->idSolicitud = $idSolicitud;
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
     * Devuelve el valor correspondiente a aprobacion
     * @return aprobacion
     */
  public function getAprobacion(){
      return $this->aprobacion;
  }

    /**
     * Modifica el valor correspondiente a aprobacion
     * @param aprobacion
     */
  public function setAprobacion($aprobacion){
      $this->aprobacion = $aprobacion;
  }
    /**
     * Devuelve el valor correspondiente a tipoSolucitud
     * @return tipoSolucitud
     */
  public function getTipoSolucitud(){
      return $this->tipoSolucitud;
  }

    /**
     * Modifica el valor correspondiente a tipoSolucitud
     * @param tipoSolucitud
     */
  public function setTipoSolucitud($tipoSolucitud){
      $this->tipoSolucitud = $tipoSolucitud;
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


}
//That`s all folks!