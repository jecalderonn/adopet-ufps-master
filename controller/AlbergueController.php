<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Pero el ruiseñor no respondió; yacía muerto sobre las altas hierbas, con el corazón traspasado de espinas.  \\
include_once realpath('../facade/AlbergueFacade.php');


class AlbergueController {

    public static function insert(){
        $idAlbergue = strip_tags($_POST['idAlbergue']);
        $nombreAlbergue = strip_tags($_POST['nombreAlbergue']);
        $telefonoAlbergue = strip_tags($_POST['telefonoAlbergue']);
        $direccionAlbergue = strip_tags($_POST['direccionAlbergue']);
        $Fundacion_idFundacion = strip_tags($_POST['Fundacion_idFundacion']);
        $fundacion= new Fundacion();
        $fundacion->setIdFundacion($Fundacion_idFundacion);
        AlbergueFacade::insert($idAlbergue, $nombreAlbergue, $telefonoAlbergue, $direccionAlbergue, $fundacion);
return true;
    }

    public static function listAll(){
        $list=AlbergueFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Albergue) {	
	       $rta.="{
	    \"idAlbergue\":\"{$Albergue->getidAlbergue()}\",
	    \"nombreAlbergue\":\"{$Albergue->getnombreAlbergue()}\",
	    \"telefonoAlbergue\":\"{$Albergue->gettelefonoAlbergue()}\",
	    \"direccionAlbergue\":\"{$Albergue->getdireccionAlbergue()}\",
	    \"Fundacion_idFundacion_idFundacion\":\"{$Albergue->getFundacion_idFundacion()->getidFundacion()}\"
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