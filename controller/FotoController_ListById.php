<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');
//header("Access-Control-Allow-Headers: X-Requested-With");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");  
header('Content-Type: text/html; charset=utf-8');
header("content-type: application/json; charset=utf-8");
header('P3P: CP="IDC DSP COR CURa ADMa OUR IND PHY ONL COM STA"'); 


include_once realpath('../facade/Foto_mascotaFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);


$idMascota = strip_tags($dataObject->idMascota);
//$idfoto_mascota = '2';

        $list=Foto_mascotaFacade::listAllById($idMascota);
        $rta="";
        foreach ($list as $obj => $Foto_mascota) {	
	       $rta.="{
	    \"idfoto_mascota\":\"{$Foto_mascota->getidfoto_mascota()}\",
	    \"foto_mascota_nombre\":\"{$Foto_mascota->getfoto_mascota_nombre()}\",
	    \"foto_mascota_ruta\":\"{$Foto_mascota->getfoto_mascota_ruta()}\",
	    \"Mascota_idMascota_idMascota\":\"{$Foto_mascota->getMascota_idMascota()->getidMascota()}\"
	       },";
        }

   if ($rta != "") {
    $rta = substr($rta, 0, -1);
    echo $rta = "[{$rta}]";
    $msg = "{\"msg\":\"exito\"}";
} else {
    $msg = "{\"msg\":\"MANEJO DE EXCEPCIONES AQUÍ\"}";
    echo $rta = "{\"result\":\"No se encontraron registros.\"}";
}