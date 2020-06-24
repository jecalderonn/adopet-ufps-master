<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Dispongo de doce horas de adelanto, puedo de decárselas a ella  \\
include_once realpath('../facade/MascotaFacade.php');


class MascotaController {

    public static function insert(){
        $idMascota = strip_tags($_POST['idMascota']);
        $Especie_idEspecie = strip_tags($_POST['Especie_idEspecie']);
        $especie= new Especie();
        $especie->setIdEspecie($Especie_idEspecie);
        $nombreMascota = strip_tags($_POST['nombreMascota']);
        $edadMascota = strip_tags($_POST['edadMascota']);
        $sexoMascota = strip_tags($_POST['sexoMascota']);
        $disponibilidadMascota = strip_tags($_POST['disponibilidadMascota']);
        $Fundacion_idFundacion = strip_tags($_POST['Fundacion_idFundacion']);
        $fundacion= new Fundacion();
        $fundacion->setIdFundacion($Fundacion_idFundacion);
        $fechaIngreso = strip_tags($_POST['fechaIngreso']);
        $fechaSalida = strip_tags($_POST['fechaSalida']);
        $Vinculacion_idVeterinaria = strip_tags($_POST['Veterinaria_idVeterinaria']);
        $vinculacion= new Vinculacion();
        $vinculacion->setIdVeterinaria($Vinculacion_idVeterinaria);
        MascotaFacade::insert($idMascota, $especie, $nombreMascota, $edadMascota, $sexoMascota, $disponibilidadMascota, $fundacion, $fechaIngreso, $fechaSalida, $vinculacion);
return true;
    }

    public static function listAll(){
        $list=MascotaFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Mascota) {	
	       $rta.="{
	    \"idMascota\":\"{$Mascota->getidMascota()}\",
	    \"Especie_idEspecie_idEspecie\":\"{$Mascota->getEspecie_idEspecie()->getidEspecie()}\",
	    \"nombreMascota\":\"{$Mascota->getnombreMascota()}\",
	    \"edadMascota\":\"{$Mascota->getedadMascota()}\",
	    \"sexoMascota\":\"{$Mascota->getsexoMascota()}\",
	    \"disponibilidadMascota\":\"{$Mascota->getdisponibilidadMascota()}\",
	    \"Fundacion_idFundacion_idFundacion\":\"{$Mascota->getFundacion_idFundacion()->getidFundacion()}\",
	    \"fechaIngreso\":\"{$Mascota->getfechaIngreso()}\",
	    \"fechaSalida\":\"{$Mascota->getfechaSalida()}\",
	    \"Veterinaria_idVeterinaria_idVeterinaria\":\"{$Mascota->getVeterinaria_idVeterinaria()->getidVeterinaria()}\"
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