<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Santos frameworks Batman!  \\
include_once realpath('../facade/HistorialmascotaFacade.php');


class HistorialmascotaController {

    public static function insert(){
        $idHistorialMascota = strip_tags($_POST['idHistorialMascota']);
        $fechaHistorialMascota = strip_tags($_POST['fechaHistorialMascota']);
        $descripcion = strip_tags($_POST['descripcion']);
        $Observacion = strip_tags($_POST['Observacion']);
        $Mascota_idMascota = strip_tags($_POST['Mascota_idMascota']);
        $mascota= new Mascota();
        $mascota->setIdMascota($Mascota_idMascota);
        HistorialmascotaFacade::insert($idHistorialMascota, $fechaHistorialMascota, $descripcion, $Observacion, $mascota);
return true;
    }

    public static function listAll(){
        $list=HistorialmascotaFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Historialmascota) {	
	       $rta.="{
	    \"idHistorialMascota\":\"{$Historialmascota->getidHistorialMascota()}\",
	    \"fechaHistorialMascota\":\"{$Historialmascota->getfechaHistorialMascota()}\",
	    \"descripcion\":\"{$Historialmascota->getdescripcion()}\",
	    \"Observacion\":\"{$Historialmascota->getObservacion()}\",
	    \"Mascota_idMascota_idMascota\":\"{$Historialmascota->getMascota_idMascota()->getidMascota()}\"
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