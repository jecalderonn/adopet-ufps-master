<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Somos los amish del software  \\
include_once realpath('../facade/UsuarioFacade.php');


class UsuarioController {

    public static function insert(){
        $idUsuario = strip_tags($_POST['idUsuario']);
        $Tipousuario_idTipoUsuario = strip_tags($_POST['TipoUsuario_idTipoUsuario']);
        $tipousuario= new Tipousuario();
        $tipousuario->setIdTipoUsuario($Tipousuario_idTipoUsuario);
        $nombreUsuario = strip_tags($_POST['nombreUsuario']);
        $apellidoUsuario = strip_tags($_POST['apellidoUsuario']);
        $cedula = strip_tags($_POST['cedula']);
        $direccion = strip_tags($_POST['direccion']);
        $correo = strip_tags($_POST['correo']);
        $password = strip_tags($_POST['password']);
        $estado = strip_tags($_POST['estado']);
        $fechaNacimiento = strip_tags($_POST['fechaNacimiento']);
        $fechaIngreso = strip_tags($_POST['fechaIngreso']);
        $foto = strip_tags($_POST['foto']);
        UsuarioFacade::insert($idUsuario, $tipousuario, $nombreUsuario, $apellidoUsuario, $cedula, $direccion, $correo, $password, $estado, $fechaNacimiento, $fechaIngreso, $foto);
return true;
    }

    public static function listAll(){
        $list=UsuarioFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Usuario) {	
	       $rta.="{
	    \"idUsuario\":\"{$Usuario->getidUsuario()}\",
	    \"TipoUsuario_idTipoUsuario_idTipoUsuario\":\"{$Usuario->getTipoUsuario_idTipoUsuario()->getidTipoUsuario()}\",
	    \"nombreUsuario\":\"{$Usuario->getnombreUsuario()}\",
	    \"apellidoUsuario\":\"{$Usuario->getapellidoUsuario()}\",
	    \"cedula\":\"{$Usuario->getcedula()}\",
	    \"direccion\":\"{$Usuario->getdireccion()}\",
	    \"correo\":\"{$Usuario->getcorreo()}\",
	    \"password\":\"{$Usuario->getpassword()}\",
	    \"estado\":\"{$Usuario->getestado()}\",
	    \"fechaNacimiento\":\"{$Usuario->getfechaNacimiento()}\",
	    \"fechaIngreso\":\"{$Usuario->getfechaIngreso()}\",
	    \"foto\":\"{$Usuario->getfoto()}\"
	       },";
        }

        if($rta!=""){
	       $rta = substr($rta, 0, -1);
	       $msg="{\"msg\":\"exito\"}";
        }else{
	       $msg="{\"msg\":\"MANEJO DE EXCEPCIONES AQUÍ\"}";
	       $rta="{\"result\":\"No se encontraron registros.\"}";	
        }
        return "[{$msg},{$rta}]";
    }

}
//That`s all folks!