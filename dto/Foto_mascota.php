<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    NEVERMORE  \\


class Foto_mascota {

  private $idfoto_mascota;
  private $edad_mascota;
  private $foto_mascota_nombre;
  private $foto_mascota_ruta;
  private $Mascota_idMascota;

    /**
     * Constructor de Foto_mascota
    */
     public function __construct(){}

     
function getEdad_mascota() {
    return $this->edad_mascota;
}

function setEdad_mascota($edad_mascota) {
    $this->edad_mascota = $edad_mascota;
}

    /**
     * Devuelve el valor correspondiente a idfoto_mascota
     * @return idfoto_mascota
     */
  public function getIdfoto_mascota(){
      return $this->idfoto_mascota;
  }

    /**
     * Modifica el valor correspondiente a idfoto_mascota
     * @param idfoto_mascota
     */
  public function setIdfoto_mascota($idfoto_mascota){
      $this->idfoto_mascota = $idfoto_mascota;
  }
    /**
     * Devuelve el valor correspondiente a foto_mascota_nombre
     * @return foto_mascota_nombre
     */
  public function getFoto_mascota_nombre(){
      return $this->foto_mascota_nombre;
  }

    /**
     * Modifica el valor correspondiente a foto_mascota_nombre
     * @param foto_mascota_nombre
     */
  public function setFoto_mascota_nombre($foto_mascota_nombre){
      $this->foto_mascota_nombre = $foto_mascota_nombre;
  }
    /**
     * Devuelve el valor correspondiente a foto_mascota_ruta
     * @return foto_mascota_ruta
     */
  public function getFoto_mascota_ruta(){
      return $this->foto_mascota_ruta;
  }

    /**
     * Modifica el valor correspondiente a foto_mascota_ruta
     * @param foto_mascota_ruta
     */
  public function setFoto_mascota_ruta($foto_mascota_ruta){
      $this->foto_mascota_ruta = $foto_mascota_ruta;
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