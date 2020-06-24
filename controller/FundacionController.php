<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Mi satisfacción es hacerte un poco más vago  \\
include_once realpath('../facade/FundacionFacade.php');


class FundacionController {

    public static function insert(){
        $idFundacion = strip_tags($_POST['idFundacion']);
        $nombreFundacion = strip_tags($_POST['nombreFundacion']);
        $direccionFundacion = strip_tags($_POST['direccionFundacion']);
        $telefonoFundacion = strip_tags($_POST['telefonoFundacion']);
        $nit = strip_tags($_POST['nit']);
        $correo = strip_tags($_POST['correo']);
        $nombrepropietario = strip_tags($_POST['nombrepropietario']);
        $Usuario_idUsuario = strip_tags($_POST['Usuario_idUsuario']);
        $usuario= new Usuario();
        $usuario->setIdUsuario($Usuario_idUsuario);
        FundacionFacade::insert($idFundacion, $nombreFundacion, $direccionFundacion, $telefonoFundacion, $nit, $correo, $nombrepropietario, $usuario);
return true;
    }

    public static function listAll(){
        $list=FundacionFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Fundacion) {	
	       $rta.="{
	    \"idFundacion\":\"{$Fundacion->getidFundacion()}\",
	    \"nombreFundacion\":\"{$Fundacion->getnombreFundacion()}\",
	    \"direccionFundacion\":\"{$Fundacion->getdireccionFundacion()}\",
	    \"telefonoFundacion\":\"{$Fundacion->gettelefonoFundacion()}\",
	    \"nit\":\"{$Fundacion->getnit()}\",
	    \"correo\":\"{$Fundacion->getcorreo()}\",
	    \"nombrepropietario\":\"{$Fundacion->getnombrepropietario()}\",
	    \"Usuario_idUsuario_idUsuario\":\"{$Fundacion->getUsuario_idUsuario()->getidUsuario()}\"
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