<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Cuando la gente cree que está muriendo, te escucha en lugar de esperar su turno para hablar.  \\
include_once realpath('../facade/FundacionvinculacionFacade.php');


class FundacionvinculacionController {

    public static function insert(){
        $idFundacionVinculacion = strip_tags($_POST['idFundacionVinculacion']);
        $Fundacion_idFundacion = strip_tags($_POST['Fundacion_idFundacion']);
        $fundacion= new Fundacion();
        $fundacion->setIdFundacion($Fundacion_idFundacion);
        $Vinculacion_idVeterinaria = strip_tags($_POST['Vinculaciones_idVeterinaria']);
        $vinculacion= new Vinculacion();
        $vinculacion->setIdVeterinaria($Vinculacion_idVeterinaria);
        FundacionvinculacionFacade::insert($idFundacionVinculacion, $fundacion, $vinculacion);
return true;
    }

    public static function listAll(){
        $list=FundacionvinculacionFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Fundacionvinculacion) {	
	       $rta.="{
	    \"idFundacionVinculacion\":\"{$Fundacionvinculacion->getidFundacionVinculacion()}\",
	    \"Fundacion_idFundacion_idFundacion\":\"{$Fundacionvinculacion->getFundacion_idFundacion()->getidFundacion()}\",
	    \"Vinculaciones_idVeterinaria_idVeterinaria\":\"{$Fundacionvinculacion->getVinculaciones_idVeterinaria()->getidVeterinaria()}\"
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