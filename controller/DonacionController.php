<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Nada mejor que el código hecho a mano.  \\
include_once realpath('../facade/DonacionFacade.php');


class DonacionController {

    public static function insert(){
        $idDonacion = strip_tags($_POST['idDonacion']);
        $Mascota_idMascota = strip_tags($_POST['Mascota_idMascota']);
        $mascota= new Mascota();
        $mascota->setIdMascota($Mascota_idMascota);
        $Fundacion_idFundacion = strip_tags($_POST['Fundacion_idFundacion']);
        $fundacion= new Fundacion();
        $fundacion->setIdFundacion($Fundacion_idFundacion);
        $fechaDonacion = strip_tags($_POST['fechaDonacion']);
        $cantidad = strip_tags($_POST['cantidad']);
        $descripcion = strip_tags($_POST['descripcion']);
        $Tipodonacion_idTipoDonacion = strip_tags($_POST['TipoDonacion_idTipoDonacion']);
        $tipodonacion= new Tipodonacion();
        $tipodonacion->setIdTipoDonacion($Tipodonacion_idTipoDonacion);
        DonacionFacade::insert($idDonacion, $mascota, $fundacion, $fechaDonacion, $cantidad, $descripcion, $tipodonacion);
return true;
    }

    public static function listAll(){
        $list=DonacionFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Donacion) {	
	       $rta.="{
	    \"idDonacion\":\"{$Donacion->getidDonacion()}\",
	    \"Mascota_idMascota_idMascota\":\"{$Donacion->getMascota_idMascota()->getidMascota()}\",
	    \"Fundacion_idFundacion_idFundacion\":\"{$Donacion->getFundacion_idFundacion()->getidFundacion()}\",
	    \"fechaDonacion\":\"{$Donacion->getfechaDonacion()}\",
	    \"cantidad\":\"{$Donacion->getcantidad()}\",
	    \"descripcion\":\"{$Donacion->getdescripcion()}\",
	    \"TipoDonacion_idTipoDonacion_idTipoDonacion\":\"{$Donacion->getTipoDonacion_idTipoDonacion()->getidTipoDonacion()}\"
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