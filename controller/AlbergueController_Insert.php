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

include_once realpath('../facade/AlbergueFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$nombreAlbergue = strip_tags($dataObject->nombreAlbergue);
$telefonoAlbergue = strip_tags($dataObject->telefonoAlbergue);
$direccionAlbergue = strip_tags($dataObject->direccionAlbergue);
$idFundacion = strip_tags($dataObject->idFundacion);
$fundacion= new Fundacion();
$fundacion->setIdFundacion($idFundacion);

$respuesta = 0;
if ($nombreAlbergue === '' || $telefonoAlbergue === '' || $direccionAlbergue === '' || $idFundacion === '') {
    echo $respuesta;
} else {
    $respuesta = AlbergueFacade::insert($nombreAlbergue, $telefonoAlbergue, $direccionAlbergue, $fundacion);
  if ($respuesta > 0) {
   
    $rta ="{\"result\":\"ok\"}";
    $msg = "{\"msg\":\"exito\"}";
    echo "[{$rta}]";
   
    } else {
    $msg = "{\"msg\":\"MANEJO DE EXCEPCIONES AQUÍ\"}";
    $rta = "{\"result\":\"false\"}";
    echo "[{$rta}]";
}
}
