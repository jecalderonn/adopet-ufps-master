<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Esta es una frase de prueba ¿Quieres ver la de verdad? ( ͡~ ͜ʖ ͡°)  \\
include_once realpath('../facade/CalificacionFacade.php');


class CalificacionController {

    public static function insert(){
        $idCalificacion = strip_tags($_POST['idCalificacion']);
        $Fundacion_idFundacion = strip_tags($_POST['Fundacion_idFundacion']);
        $fundacion= new Fundacion();
        $fundacion->setIdFundacion($Fundacion_idFundacion);
        $Usuario_idUsuario = strip_tags($_POST['Usuario_idUsuario']);
        $usuario= new Usuario();
        $usuario->setIdUsuario($Usuario_idUsuario);
        $calificacion = strip_tags($_POST['calificacion']);
        CalificacionFacade::insert($idCalificacion, $fundacion, $usuario, $calificacion);
return true;
    }

    public static function listAll(){
        $list=CalificacionFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Calificacion) {	
	       $rta.="{
	    \"idCalificacion\":\"{$Calificacion->getidCalificacion()}\",
	    \"Fundacion_idFundacion_idFundacion\":\"{$Calificacion->getFundacion_idFundacion()->getidFundacion()}\",
	    \"Usuario_idUsuario_idUsuario\":\"{$Calificacion->getUsuario_idUsuario()->getidUsuario()}\",
	    \"calificacion\":\"{$Calificacion->getcalificacion()}\"
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