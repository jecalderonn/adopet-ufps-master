<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Bastará decir que soy Juan Pablo Castel, el pintor que mató a María Iribarne...  \\


class Usuario {

  private $idUsuario;
  private $TipoUsuario_idTipoUsuario;
  private $nombreUsuario;
  private $apellidoUsuario;
  private $cedula;
  private $direccion;
  private $correo;
  private $password;
  private $estado;
  private $fechaNacimiento;
  private $fechaIngreso;
  private $foto;

    /**
     * Constructor de Usuario
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idUsuario
     * @return idUsuario
     */
  public function getIdUsuario(){
      return $this->idUsuario;
  }

    /**
     * Modifica el valor correspondiente a idUsuario
     * @param idUsuario
     */
  public function setIdUsuario($idUsuario){
      $this->idUsuario = $idUsuario;
  }
    /**
     * Devuelve el valor correspondiente a TipoUsuario_idTipoUsuario
     * @return TipoUsuario_idTipoUsuario
     */
  public function getTipoUsuario_idTipoUsuario(){
      return $this->TipoUsuario_idTipoUsuario;
  }

    /**
     * Modifica el valor correspondiente a TipoUsuario_idTipoUsuario
     * @param TipoUsuario_idTipoUsuario
     */
  public function setTipoUsuario_idTipoUsuario($tipoUsuario_idTipoUsuario){
      $this->TipoUsuario_idTipoUsuario = $tipoUsuario_idTipoUsuario;
  }
    /**
     * Devuelve el valor correspondiente a nombreUsuario
     * @return nombreUsuario
     */
  public function getNombreUsuario(){
      return $this->nombreUsuario;
  }

    /**
     * Modifica el valor correspondiente a nombreUsuario
     * @param nombreUsuario
     */
  public function setNombreUsuario($nombreUsuario){
      $this->nombreUsuario = $nombreUsuario;
  }
    /**
     * Devuelve el valor correspondiente a apellidoUsuario
     * @return apellidoUsuario
     */
  public function getApellidoUsuario(){
      return $this->apellidoUsuario;
  }

    /**
     * Modifica el valor correspondiente a apellidoUsuario
     * @param apellidoUsuario
     */
  public function setApellidoUsuario($apellidoUsuario){
      $this->apellidoUsuario = $apellidoUsuario;
  }
    /**
     * Devuelve el valor correspondiente a cedula
     * @return cedula
     */
  public function getCedula(){
      return $this->cedula;
  }

    /**
     * Modifica el valor correspondiente a cedula
     * @param cedula
     */
  public function setCedula($cedula){
      $this->cedula = $cedula;
  }
    /**
     * Devuelve el valor correspondiente a direccion
     * @return direccion
     */
  public function getDireccion(){
      return $this->direccion;
  }

    /**
     * Modifica el valor correspondiente a direccion
     * @param direccion
     */
  public function setDireccion($direccion){
      $this->direccion = $direccion;
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
     * Devuelve el valor correspondiente a password
     * @return password
     */
  public function getPassword(){
      return $this->password;
  }

    /**
     * Modifica el valor correspondiente a password
     * @param password
     */
  public function setPassword($password){
      $this->password = $password;
  }
    /**
     * Devuelve el valor correspondiente a estado
     * @return estado
     */
  public function getEstado(){
      return $this->estado;
  }

    /**
     * Modifica el valor correspondiente a estado
     * @param estado
     */
  public function setEstado($estado){
      $this->estado = $estado;
  }
    /**
     * Devuelve el valor correspondiente a fechaNacimiento
     * @return fechaNacimiento
     */
  public function getFechaNacimiento(){
      return $this->fechaNacimiento;
  }

    /**
     * Modifica el valor correspondiente a fechaNacimiento
     * @param fechaNacimiento
     */
  public function setFechaNacimiento($fechaNacimiento){
      $this->fechaNacimiento = $fechaNacimiento;
  }
    /**
     * Devuelve el valor correspondiente a fechaIngreso
     * @return fechaIngreso
     */
  public function getFechaIngreso(){
      return $this->fechaIngreso;
  }

    /**
     * Modifica el valor correspondiente a fechaIngreso
     * @param fechaIngreso
     */
  public function setFechaIngreso($fechaIngreso){
      $this->fechaIngreso = $fechaIngreso;
  }
    /**
     * Devuelve el valor correspondiente a foto
     * @return foto
     */
  public function getFoto(){
      return $this->foto;
  }

    /**
     * Modifica el valor correspondiente a foto
     * @param foto
     */
  public function setFoto($foto){
      $this->foto = $foto;
  }


}
//That`s all folks!