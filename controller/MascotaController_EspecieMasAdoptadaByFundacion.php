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
//$idFundacion = strip_tags($_POST['$idFundacion']);
$idFundacion = strip_tags($dataObject->idFundacion);
$rta = MascotaFacade::ListMoreAdoptedByFundation($idFundacion);
if ($rta != "") {
    echo $rta;
    $msg = "{\"msg\":\"exito\"}";
} else {
    $msg = "{\"msg\":\"MANEJO DE EXCEPCIONES AQUÍ\"}";
    echo $rta = "{\"result\":\"No se encontraron registros.\"}";
}

