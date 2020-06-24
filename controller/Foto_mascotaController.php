<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Bastará decir que soy Juan Pablo Castel, el pintor que mató a María Iribarne...  \\
include_once realpath('../facade/Foto_mascotaFacade.php');


class Foto_mascotaController {

    public static function insert(){
        $idfoto_mascota = strip_tags($_POST['idfoto_mascota']);
        $foto_mascota_nombre = strip_tags($_POST['foto_mascota_nombre']);
        $foto_mascota_ruta = strip_tags($_POST['foto_mascota_ruta']);
        $Mascota_idMascota = strip_tags($_POST['Mascota_idMascota']);
        $mascota= new Mascota();
        $mascota->setIdMascota($Mascota_idMascota);
        Foto_mascotaFacade::insert($idfoto_mascota, $foto_mascota_nombre, $foto_mascota_ruta, $mascota);
return true;
    }

    public static function listAll(){
        $list=Foto_mascotaFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Foto_mascota) {	
	       $rta.="{
	    \"idfoto_mascota\":\"{$Foto_mascota->getidfoto_mascota()}\",
	    \"foto_mascota_nombre\":\"{$Foto_mascota->getfoto_mascota_nombre()}\",
	    \"foto_mascota_ruta\":\"{$Foto_mascota->getfoto_mascota_ruta()}\",
	    \"Mascota_idMascota_idMascota\":\"{$Foto_mascota->getMascota_idMascota()->getidMascota()}\"
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