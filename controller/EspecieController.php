<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Sabías que Anarchy se generó a sí mismo?  \\
include_once realpath('../facade/EspecieFacade.php');


class EspecieController {

    public static function insert(){
        $idEspecie = strip_tags($_POST['idEspecie']);
        $nombreEspecie = strip_tags($_POST['nombreEspecie']);
        EspecieFacade::insert($idEspecie, $nombreEspecie);
return true;
    }

    public static function listAll(){
        $list=EspecieFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Especie) {	
	       $rta.="{
	    \"idEspecie\":\"{$Especie->getidEspecie()}\",
	    \"nombreEspecie\":\"{$Especie->getnombreEspecie()}\"
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