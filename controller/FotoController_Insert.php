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

$Especie_idEspecie = strip_tags($dataObject->idEspecie);

  // $idfoto_mascota = strip_tags($_POST['idfoto_mascota']);
        $foto_mascota_nombre = 'foto';
        $foto_mascota_ruta = strip_tags($dataObject->foto_mascota_ruta);
        $Mascota_idMascota = strip_tags($dataObject->idMascota);
        $mascota= new Mascota();
        $mascota->setIdMascota($Mascota_idMascota);
     $respuesta =  Foto_mascotaFacade::insert( $foto_mascota_nombre, $foto_mascota_ruta, $mascota);
//return true;

   if ($respuesta > 0) {
   
    $rta ="{\"result\":\"ok\"}";
    $msg = "{\"msg\":\"exito\"}";
    echo "[{$rta}]";
   
    } else {
    $msg = "{\"msg\":\"MANEJO DE EXCEPCIONES AQUÍ\"}";
    $rta = "{\"result\":\"false\"}";
    echo "[{$rta}]";
}