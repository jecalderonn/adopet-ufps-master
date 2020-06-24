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

include_once realpath('../facade/HistorialFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$idHistorial = strip_tags($dataObject->idHistorial);
$Descripcion = strip_tags($dataObject->Descripcion);
$tipo = strip_tags($dataObject->tipo);
$Usuario_idUsuario = strip_tags($dataObject->idUsuario);
$usuario = new Usuario();
$usuario->setIdUsuario($Usuario_idUsuario);

//formatear la fecha
$originalDate = $dataObject->fechaHistorial;
$newDate = date("Y-m-d", strtotime($originalDate));
$fechaHistorial = strip_tags($newDate);

$respuesta = 0;
if ($idHistorial === "" || $fechaHistorial === "" || $Descripcion === "" || $tipo === "" || $Usuario_idUsuario === "") {
    echo $respuesta;
} else {
    $respuesta = HistorialFacade::update($idHistorial, $fechaHistorial, $Descripcion, $tipo, $usuario);

    if ($respuesta > 0) {
        echo $respuesta = true;
    } else {
        echo $respuesta;
    }
}
