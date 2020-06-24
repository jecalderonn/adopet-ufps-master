<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Tenemos trabajos que odiamos para comprar cosas que no necesitamos.  \\
include_once realpath('../facade/NotificacionFacade.php');


class NotificacionController {

    public static function insert(){
        $idmensaje = strip_tags($_POST['idmensaje']);
        $fechaMensaje = strip_tags($_POST['fechaMensaje']);
        $Fundacion_idFundacion = strip_tags($_POST['Fundacion_idFundacion']);
        $fundacion= new Fundacion();
        $fundacion->setIdFundacion($Fundacion_idFundacion);
        $Usuario_idUsuario = strip_tags($_POST['Usuario_idUsuario']);
        $usuario= new Usuario();
        $usuario->setIdUsuario($Usuario_idUsuario);
        $Descripcion = strip_tags($_POST['Descripcion']);
        NotificacionFacade::insert($idmensaje, $fechaMensaje, $fundacion, $usuario, $Descripcion);
return true;
    }

    public static function listAll(){
        $list=NotificacionFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Notificacion) {	
	       $rta.="{
	    \"idmensaje\":\"{$Notificacion->getidmensaje()}\",
	    \"fechaMensaje\":\"{$Notificacion->getfechaMensaje()}\",
	    \"Fundacion_idFundacion_idFundacion\":\"{$Notificacion->getFundacion_idFundacion()->getidFundacion()}\",
	    \"Usuario_idUsuario_idUsuario\":\"{$Notificacion->getUsuario_idUsuario()->getidUsuario()}\",
	    \"Descripcion\":\"{$Notificacion->getDescripcion()}\"
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