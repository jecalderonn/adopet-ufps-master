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

include_once realpath('../facade/HistorialmascotaFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$idHistorialMascota = strip_tags($dataObject->idHistorialMascota);
$descripcion = strip_tags($dataObject->descripcion);
$Observacion = strip_tags($dataObject->Observacion);
$Mascota_idMascota = strip_tags($dataObject->idMascota);
$mascota = new Mascota();
$mascota->setIdMascota($Mascota_idMascota);

//formatear la fecha
$originalDate = $dataObject->fechaHistorialMascota;
$newDate = date("Y-m-d", strtotime($originalDate));
$fechaHistorialMascota = strip_tags($newDate);

$respuesta = 0;
if ($idHistorialMascota === "" || $fechaHistorialMascota === "" || $descripcion === "" || $Observacion === "" || $Mascota_idMascota === "") {
    echo $respuesta;
} else {
    $respuesta = HistorialmascotaFacade::update($idHistorialMascota, $fechaHistorialMascota, $descripcion, $Observacion, $mascota);
    if ($respuesta > 0) {
        echo $respuesta = true;
    } else {
        echo $respuesta;
    }
}

