<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No se fije en el corte de cabello, soy mucho muy rico  \\
include_once realpath('../facade/VinculacionFacade.php');


class VinculacionController {

    public static function insert(){
        $idVeterinaria = strip_tags($_POST['idVeterinaria']);
        $nombreVinculacion = strip_tags($_POST['nombreVinculacion']);
        $direccion = strip_tags($_POST['direccion']);
        $nit = strip_tags($_POST['nit']);
        $telefono = strip_tags($_POST['telefono']);
        VinculacionFacade::insert($idVeterinaria, $nombreVinculacion, $direccion, $nit, $telefono);
return true;
    }

    public static function listAll(){
        $list=VinculacionFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Vinculacion) {	
	       $rta.="{
	    \"idVeterinaria\":\"{$Vinculacion->getidVeterinaria()}\",
	    \"nombreVinculacion\":\"{$Vinculacion->getnombreVinculacion()}\",
	    \"direccion\":\"{$Vinculacion->getdireccion()}\",
	    \"nit\":\"{$Vinculacion->getnit()}\",
	    \"telefono\":\"{$Vinculacion->gettelefono()}\"
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