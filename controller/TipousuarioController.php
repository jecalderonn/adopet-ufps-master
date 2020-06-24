<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    In Anarchy we trust  \\
include_once realpath('../facade/TipousuarioFacade.php');


class TipousuarioController {

    public static function insert(){
        $idTipoUsuario = strip_tags($_POST['idTipoUsuario']);
        $nombre = strip_tags($_POST['nombre']);
        TipousuarioFacade::insert($idTipoUsuario, $nombre);
return true;
    }

    public static function listAll(){
        $list=TipousuarioFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Tipousuario) {	
	       $rta.="{
	    \"idTipoUsuario\":\"{$Tipousuario->getidTipoUsuario()}\",
	    \"nombre\":\"{$Tipousuario->getnombre()}\"
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