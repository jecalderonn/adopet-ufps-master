<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ya están los patrones implementados, ahora sí viene lo chido...  \\

include_once realpath('../dao/interfaz/IUsuarioDao.php');
include_once realpath('../dto/Usuario.php');
include_once realpath('../dto/Tipousuario.php');

class UsuarioDao implements IUsuarioDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Usuario en la base de datos.
     * @param usuario objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($usuario){
//      $idUsuario=$usuario->getIdUsuario();
$tipoUsuario_idTipoUsuario=$usuario->getTipoUsuario_idTipoUsuario()->getIdTipoUsuario();
$nombreUsuario=$usuario->getNombreUsuario();
$apellidoUsuario=$usuario->getApellidoUsuario();
$cedula=$usuario->getCedula();
$direccion=$usuario->getDireccion();
$correo=$usuario->getCorreo();
//$password=$usuario->getPassword();
$estado=$usuario->getEstado();
//$fechaNacimiento=$usuario->getFechaNacimiento();
//$fechaIngreso=$usuario->getFechaIngreso();
//$foto=$usuario->getFoto();

      try {
          $sql= "INSERT INTO `usuario`( `TipoUsuario_idTipoUsuario`, `nombreUsuario`, `apellidoUsuario`, `cedula`, `direccion`, `correo`,  `estado`)"
          ."VALUES ('$tipoUsuario_idTipoUsuario','$nombreUsuario','$apellidoUsuario','$cedula','$direccion','$correo','$estado')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Usuario en la base de datos.
     * @param usuario objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($usuario){
      $idUsuario=$usuario->getIdUsuario();

      try {
          $sql= "SELECT `idUsuario`, `TipoUsuario_idTipoUsuario`, `nombreUsuario`, `apellidoUsuario`, `cedula`, `direccion`, `correo`, `password`, `estado`, `fechaNacimiento`, `fechaIngreso`, `foto`"
          ."FROM `usuario`"
          ."WHERE `idUsuario`='$idUsuario'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $usuario->setIdUsuario($data[$i]['idUsuario']);
           $tipousuario = new Tipousuario();
           $tipousuario->setIdTipoUsuario($data[$i]['TipoUsuario_idTipoUsuario']);
           $usuario->setTipoUsuario_idTipoUsuario($tipousuario);
          $usuario->setNombreUsuario($data[$i]['nombreUsuario']);
          $usuario->setApellidoUsuario($data[$i]['apellidoUsuario']);
          $usuario->setCedula($data[$i]['cedula']);
          $usuario->setDireccion($data[$i]['direccion']);
          $usuario->setCorreo($data[$i]['correo']);
          $usuario->setPassword($data[$i]['password']);
          $usuario->setEstado($data[$i]['estado']);
          $usuario->setFechaNacimiento($data[$i]['fechaNacimiento']);
          $usuario->setFechaIngreso($data[$i]['fechaIngreso']);
          $usuario->setFoto($data[$i]['foto']);

          }
      return $usuario;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Usuario en la base de datos.
     * @param usuario objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($usuario){
      $idUsuario=$usuario->getIdUsuario();
$tipoUsuario_idTipoUsuario=$usuario->getTipoUsuario_idTipoUsuario()->getIdTipoUsuario();
$nombreUsuario=$usuario->getNombreUsuario();
$apellidoUsuario=$usuario->getApellidoUsuario();
$cedula=$usuario->getCedula();
$direccion=$usuario->getDireccion();
$correo=$usuario->getCorreo();
//$password=$usuario->getPassword();
$estado=$usuario->getEstado();
$fechaNacimiento=$usuario->getFechaNacimiento();
//$fechaIngreso=$usuario->getFechaIngreso();
//$foto=$usuario->getFoto();

      try {
          $sql= "UPDATE `usuario` SET `TipoUsuario_idTipoUsuario`='$tipoUsuario_idTipoUsuario' ,`nombreUsuario`='$nombreUsuario' ,`apellidoUsuario`='$apellidoUsuario' ,`cedula`='$cedula' ,`direccion`='$direccion' ,`correo`='$correo' , `estado`='$estado' ,`fechaNacimiento`='$fechaNacimiento'  WHERE `idUsuario`='$idUsuario' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }
  
  
    /**
     * Modifica un objeto Usuario en la base de datos.
     * @param usuario objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function DeleteById($usuario){
      $idUsuario=$usuario->getIdUsuario();
      $estado=$usuario->getEstado();


      try {
          $sql= "UPDATE `usuario` SET `estado`='$estado'  WHERE `idUsuario`='$idUsuario' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Usuario en la base de datos.
     * @param usuario objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($usuario){
      $idUsuario=$usuario->getIdUsuario();

      try {
          $sql ="DELETE FROM `usuario` WHERE `idUsuario`='$idUsuario'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Usuario en la base de datos.
     * @return ArrayList<Usuario> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idUsuario`, `TipoUsuario_idTipoUsuario`, `nombreUsuario`, `apellidoUsuario`, `cedula`, `direccion`, `correo`, `password`, `estado`, `fechaNacimiento`, `fechaIngreso`, `foto`"
          ."FROM `usuario`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $usuario= new Usuario();
          $usuario->setIdUsuario($data[$i]['idUsuario']);
           $tipousuario = new Tipousuario();
           $tipousuario->setIdTipoUsuario($data[$i]['TipoUsuario_idTipoUsuario']);
           $usuario->setTipoUsuario_idTipoUsuario($tipousuario);
          $usuario->setNombreUsuario($data[$i]['nombreUsuario']);
          $usuario->setApellidoUsuario($data[$i]['apellidoUsuario']);
          $usuario->setCedula($data[$i]['cedula']);
          $usuario->setDireccion($data[$i]['direccion']);
          $usuario->setCorreo($data[$i]['correo']);
          $usuario->setPassword($data[$i]['password']);
          $usuario->setEstado($data[$i]['estado']);
          $usuario->setFechaNacimiento($data[$i]['fechaNacimiento']);
          $usuario->setFechaIngreso($data[$i]['fechaIngreso']);
          $usuario->setFoto($data[$i]['foto']);

          array_push($lista,$usuario);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
  
  
  public function buscarCorreo($usuario){
      
     $correo=$usuario->getCorreo();
          
      try {
          $sql ="SELECT `idUsuario` "
          ."FROM `usuario`"
          ."WHERE `correo` = '$correo'";
          $data = $this->ejecutarConsulta($sql);
          if (!empty($data)) {
                return true;
            } else {
                return false;
            }
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return false;
        }
      }
  
  
    public function validar_cc($persona) {

        $cedula = $persona->getCedula();
        $nacionalidad = $persona->getNacionalidad();

        try {
            $sql = "SELECT `id`"
                    . "FROM `persona`"
                    . "WHERE `cedula`='$cedula' AND `nacionalidad`='$nacionalidad'";
            $data = $this->ejecutarConsulta($sql);

            if (!empty($data)) {
                return true;
            } else {
                return false;
            }
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return false;
        }
    }

    /**
     * Busca un objeto Usuario en la base de datos. por idUsuario
     * @return ArrayList<Usuario> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAllById($idUsuario){
      $lista = array();
      try {
          $sql ="SELECT `idUsuario`, `TipoUsuario_idTipoUsuario`, `nombreUsuario`, `apellidoUsuario`, `cedula`, `direccion`, `correo`, `password`, `estado`, `fechaNacimiento`, `fechaIngreso`, `foto`"
          ."FROM `usuario`"
          ."WHERE `idUsuario` = $idUsuario";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $usuario= new Usuario();
          $usuario->setIdUsuario($data[$i]['idUsuario']);
           $tipousuario = new Tipousuario();
           $tipousuario->setIdTipoUsuario($data[$i]['TipoUsuario_idTipoUsuario']);
           $usuario->setTipoUsuario_idTipoUsuario($tipousuario);
          $usuario->setNombreUsuario($data[$i]['nombreUsuario']);
          $usuario->setApellidoUsuario($data[$i]['apellidoUsuario']);
          $usuario->setCedula($data[$i]['cedula']);
          $usuario->setDireccion($data[$i]['direccion']);
          $usuario->setCorreo($data[$i]['correo']);
          $usuario->setPassword($data[$i]['password']);
          $usuario->setEstado($data[$i]['estado']);
          $usuario->setFechaNacimiento($data[$i]['fechaNacimiento']);
          $usuario->setFechaIngreso($data[$i]['fechaIngreso']);
          $usuario->setFoto($data[$i]['foto']);

          array_push($lista,$usuario);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Busca un objeto Usuario en la base de datos. por idUsuario
     * @return ArrayList<Usuario> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAllByCorreo($correo){
      $lista = array();
      try {
          $sql ="SELECT `idUsuario`, `TipoUsuario_idTipoUsuario`, `nombreUsuario`, `apellidoUsuario`, `cedula`, `direccion`, `correo`, `password`, `estado`, `fechaNacimiento`, `fechaIngreso`, `foto`"
          ."FROM `usuario`"
          ."WHERE `correo` = '$correo'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $usuario= new Usuario();
          $usuario->setIdUsuario($data[$i]['idUsuario']);
           $tipousuario = new Tipousuario();
           $tipousuario->setIdTipoUsuario($data[$i]['TipoUsuario_idTipoUsuario']);
           $usuario->setTipoUsuario_idTipoUsuario($tipousuario);
          $usuario->setNombreUsuario($data[$i]['nombreUsuario']);
          $usuario->setApellidoUsuario($data[$i]['apellidoUsuario']);
          $usuario->setCedula($data[$i]['cedula']);
          $usuario->setDireccion($data[$i]['direccion']);
          $usuario->setCorreo($data[$i]['correo']);
          $usuario->setPassword($data[$i]['password']);
          $usuario->setEstado($data[$i]['estado']);
          $usuario->setFechaNacimiento($data[$i]['fechaNacimiento']);
          $usuario->setFechaIngreso($data[$i]['fechaIngreso']);
          $usuario->setFoto($data[$i]['foto']);

          array_push($lista,$usuario);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

      public function insertarConsulta($sql){
          $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sentencia=$this->cn->prepare($sql);
          $sentencia->execute(); 
          $sentencia = null;
          return $this->cn->lastInsertId();
    }
      public function ejecutarConsulta($sql){
          $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sentencia=$this->cn->prepare($sql);
          $sentencia->execute(); 
          $data = $sentencia->fetchAll();
          $sentencia = null;
          return $data;
    }
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close(){
      $cn=null;
  }
}
//That`s all folks!