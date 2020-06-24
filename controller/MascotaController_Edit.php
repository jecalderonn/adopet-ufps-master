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

$idMascota = strip_tags($dataObject->idMascota);
$Especie_idEspecie = strip_tags($dataObject->idEspecie);
$especie = new Especie();
$especie->setIdEspecie($Especie_idEspecie);
$nombreMascota = strip_tags($dataObject->nombreMascota);
$edadMascota = strip_tags($dataObject->edadMascota);
$sexoMascota = strip_tags($dataObject->sexoMascota);
//$disponibilidadMascota = strip_tags($dataObject->disponibilidadMascota);
$disponibilidadMascota = "1";
$Fundacion_idFundacion = strip_tags($dataObject->idFundacion);
$fundacion = new Fundacion();
$fundacion->setIdFundacion($Fundacion_idFundacion);

//formatear la fecha
$originalDate = $dataObject->fechaIngreso;
$newDate = date("Y-m-d", strtotime($originalDate));
$fechaIngreso = strip_tags($newDate);
//$fechaSalida = strip_tags($dataObject->fechaSalida);
$Vinculacion_idVeterinaria = strip_tags($dataObject->idVeterinaria);
$vinculacion= new Vinculacion();
$vinculacion->setIdVeterinaria($Vinculacion_idVeterinaria);
$respuesta = 0;

//guiarse por los datos que recibe el insert
if ($idMascota === '' || $especie === '' || $nombreMascota === '' || $edadMascota === '' || $sexoMascota === '' || $disponibilidadMascota === '' || $fundacion === '' || $fechaIngreso === '' || $vinculacion === '') {
    echo $respuesta;
} else {

    //insert devuelve es un numero si incerto   
    $respuesta = MascotaFacade::update($idMascota, $especie, $nombreMascota, $edadMascota, $sexoMascota, $disponibilidadMascota, $fundacion, $fechaIngreso, $vinculacion);
    

    if ($respuesta > 0) {
        echo $respuesta = true;
    } else {
        echo $respuesta;
    }
}