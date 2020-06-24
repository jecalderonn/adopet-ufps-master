<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Traigo una pizza para ¿y se la creyó?  \\


class Favoritomascotausuario {

  private $Mascota_idMascota;
  private $Usuario_idUsuario;
  private $idFavoritoMascotaUsuario;

    /**
     * Constructor de Favoritomascotausuario
    */
     public function __construct(){}

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
     * Devuelve el valor correspondiente a idFavoritoMascotaUsuario
     * @return idFavoritoMascotaUsuario
     */
  public function getIdFavoritoMascotaUsuario(){
      return $this->idFavoritoMascotaUsuario;
  }

    /**
     * Modifica el valor correspondiente a idFavoritoMascotaUsuario
     * @param idFavoritoMascotaUsuario
     */
  public function setIdFavoritoMascotaUsuario($idFavoritoMascotaUsuario){
      $this->idFavoritoMascotaUsuario = $idFavoritoMascotaUsuario;
  }


}
//That`s all folks!