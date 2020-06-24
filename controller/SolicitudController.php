<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Mi satisfacción es hacerte un poco más vago  \\
include_once realpath('../facade/SolicitudFacade.php');


class SolicitudController {

    public static function insert(){
        $idSolicitud = strip_tags($_POST['idSolicitud']);
        $Usuario_idUsuario = strip_tags($_POST['Usuario_idUsuario']);
        $usuario= new Usuario();
        $usuario->setIdUsuario($Usuario_idUsuario);
        $descripcion = strip_tags($_POST['descripcion']);
        $aprobacion = strip_tags($_POST['aprobacion']);
        $tipoSolucitud = strip_tags($_POST['tipoSolucitud']);
        $Mascota_idMascota = strip_tags($_POST['Mascota_idMascota']);
        $mascota= new Mascota();
        $mascota->setIdMascota($Mascota_idMascota);
        SolicitudFacade::insert($idSolicitud, $usuario, $descripcion, $aprobacion, $tipoSolucitud, $mascota);
return true;
    }

    public static function listAll(){
        $list=SolicitudFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Solicitud) {	
	       $rta.="{
	    \"idSolicitud\":\"{$Solicitud->getidSolicitud()}\",
	    \"Usuario_idUsuario_idUsuario\":\"{$Solicitud->getUsuario_idUsuario()->getidUsuario()}\",
	    \"descripcion\":\"{$Solicitud->getdescripcion()}\",
	    \"aprobacion\":\"{$Solicitud->getaprobacion()}\",
	    \"tipoSolucitud\":\"{$Solicitud->gettipoSolucitud()}\",
	    \"Mascota_idMascota_idMascota\":\"{$Solicitud->getMascota_idMascota()->getidMascota()}\"
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