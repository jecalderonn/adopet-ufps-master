<?php

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');
//header("Access-Control-Allow-Headers: X-Requested-With");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");  
header('Content-Type: text/html; charset=utf-8');
header("content-type: application/json; charset=utf-8");
header('P3P: CP="IDC DSP COR CURa ADMa OUR IND PHY ONL COM STA"'); 
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once realpath('../facade/MascotaFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

//$user = strip_tags($dataObject->idUsuario);
$user = "1";

$list = MascotaFacade::listByFundacion_User($user);
$rta = "";
foreach ($list as $obj => $Mascota) {
    $rta .= "{
	    \"idMascota\":\"{$Mascota->getidMascota()}\",
	    \"idEspecie\":\"{$Mascota->getEspecie_idEspecie()->getidEspecie()}\",
	    \"nombreMascota\":\"{$Mascota->getnombreMascota()}\",
	    \"edadMascota\":\"{$Mascota->getedadMascota()}\",
	    \"sexoMascota\":\"{$Mascota->getsexoMascota()}\",
	    \"disponibilidadMascota\":\"{$Mascota->getdisponibilidadMascota()}\",
	    \"idFundacion\":\"{$Mascota->getFundacion_idFundacion()->getidFundacion()}\",
	    \"fechaIngreso\":\"{$Mascota->getfechaIngreso()}\",
	    \"fechaSalida\":\"{$Mascota->getfechaSalida()}\",
	    \"idVeterinaria\":\"{$Mascota->getVeterinaria_idVeterinaria()->getidVeterinaria()}\"
	       },";
}
//
if ($rta != "") {
    $rta = substr($rta, 0, -1);
    echo $rta = "[{$rta}]";
    $msg = "{\"msg\":\"exito\"}";
} else {
    $msg = "{\"msg\":\"MANEJO DE EXCEPCIONES AQUÍ\"}";
    echo $rta = "{\"result\":\"No se encontraron registros.\"}";
}

