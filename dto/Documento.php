<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Has escuchado hablar del grandioso señor Arciniegas?  \\


class Documento {

  private $idDocumento;
  private $nombreDocumento;
  private $rutaDocumento;
  private $Usuario_idUsuario;

    /**
     * Constructor de Documento
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idDocumento
     * @return idDocumento
     */
  public function getIdDocumento(){
      return $this->idDocumento;
  }

    /**
     * Modifica el valor correspondiente a idDocumento
     * @param idDocumento
     */
  public function setIdDocumento($idDocumento){
      $this->idDocumento = $idDocumento;
  }
    /**
     * Devuelve el valor correspondiente a nombreDocumento
     * @return nombreDocumento
     */
  public function getNombreDocumento(){
      return $this->nombreDocumento;
  }

    /**
     * Modifica el valor correspondiente a nombreDocumento
     * @param nombreDocumento
     */
  public function setNombreDocumento($nombreDocumento){
      $this->nombreDocumento = $nombreDocumento;
  }
    /**
     * Devuelve el valor correspondiente a rutaDocumento
     * @return rutaDocumento
     */
  public function getRutaDocumento(){
      return $this->rutaDocumento;
  }

    /**
     * Modifica el valor correspondiente a rutaDocumento
     * @param rutaDocumento
     */
  public function setRutaDocumento($rutaDocumento){
      $this->rutaDocumento = $rutaDocumento;
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