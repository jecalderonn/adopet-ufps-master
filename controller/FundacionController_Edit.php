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
include_once realpath('../facade/FundacionFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$idFundacion = strip_tags($dataObject->idFundacion);
$nombreFundacion = strip_tags($dataObject->nombreFundacion);
$direccionFundacion = strip_tags($dataObject->direccionFundacion);
$telefonoFundacion = strip_tags($dataObject->telefonoFundacion);
$nit = strip_tags($dataObject->nit);
$correo = strip_tags($dataObject->correo);
$nombrepropietario = strip_tags($dataObject->nombrepropietario);
$Usuario_idUsuario = strip_tags($dataObject->idUsuario);
$usuario = new Usuario();
$usuario->setIdUsuario($Usuario_idUsuario);

$response = 0;

if ($idFundacion === '' || $nombreFundacion === '' || $direccionFundacion === '' || $telefonoFundacion === '' || $nit === '' || $correo === '' || $nombrepropietario === '' || $usuario === '') {
    echo $response;
} else {
    $response = FundacionFacade::update($idFundacion, $nombreFundacion, $direccionFundacion, $telefonoFundacion, $nit, $correo, $nombrepropietario, $usuario);
if ($response > 0) {
    echo $response= true;
} else {
    echo $response;
}
}