<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Me pagan USD 10,000 por cada frase que invento. 20,000 por las más tontas  \\
include_once realpath('../facade/RedsocialFacade.php');


class RedsocialController {

    public static function insert(){
        $idRedesSociales = strip_tags($_POST['idRedesSociales']);
        $nombre = strip_tags($_POST['nombre']);
        $url = strip_tags($_POST['url']);
        $Fundacion_idFundacion = strip_tags($_POST['Fundacion_idFundacion']);
        $fundacion= new Fundacion();
        $fundacion->setIdFundacion($Fundacion_idFundacion);
        RedsocialFacade::insert($idRedesSociales, $nombre, $url, $fundacion);
return true;
    }

    public static function listAll(){
        $list=RedsocialFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Redsocial) {	
	       $rta.="{
	    \"idRedesSociales\":\"{$Redsocial->getidRedesSociales()}\",
	    \"nombre\":\"{$Redsocial->getnombre()}\",
	    \"url\":\"{$Redsocial->geturl()}\",
	    \"Fundacion_idFundacion_idFundacion\":\"{$Redsocial->getFundacion_idFundacion()->getidFundacion()}\"
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