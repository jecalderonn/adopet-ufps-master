<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ella no te quiere </3 mejor ponte a programar  \\


class Tipousuario {

  private $idTipoUsuario;
  private $nombre;

    /**
     * Constructor de Tipousuario
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idTipoUsuario
     * @return idTipoUsuario
     */
  public function getIdTipoUsuario(){
      return $this->idTipoUsuario;
  }

    /**
     * Modifica el valor correspondiente a idTipoUsuario
     * @param idTipoUsuario
     */
  public function setIdTipoUsuario($idTipoUsuario){
      $this->idTipoUsuario = $idTipoUsuario;
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


}
//That`s all folks!