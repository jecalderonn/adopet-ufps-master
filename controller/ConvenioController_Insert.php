<?php
header("Access-Control-Allow-Origin: *");  
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");  
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once realpath('../facade/ConvenioFacade.php');

$Vinculacion_idVeterinaria = strip_tags($_POST['idVeterinaria']);
$vinculacion = new Vinculacion();

$vinculacion->setIdVeterinaria($Vinculacion_idVeterinaria);
$Fundacion_idFundacion = strip_tags($_POST['idFundacion']);
$fundacion = new Fundacion();
$fundacion->setIdFundacion($Fundacion_idFundacion);
$fechaConvenio = strip_tags($_POST['fechaConvenio']);
$nombreConvenio = strip_tags($_POST['nombreConvenio']);
$duracionConvenio = strip_tags($_POST['duracionConvenio']);
$respuesta = false;

//guiarse por los datos que recibe el insert
if ($vinculacion === '' || $fundacion === '' || $fechaConvenio === '' || $nombreConvenio === '' || $duracionConvenio === '') {
    echo $respuesta;
} else {

    //insert devuelve es un numero si incerto   
    $respuesta = ConvenioFacade::insert($vinculacion, $fundacion, $fechaConvenio, $nombreConvenio, $duracionConvenio);

    if ($respuesta > 0) {
        echo $respuesta = true;
    } else {
        echo $respuesta;
    }
}       
