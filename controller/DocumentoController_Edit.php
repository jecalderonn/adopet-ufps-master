<?php

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');
//header("Access-Control-Allow-Headers: X-Requested-With");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: text/html; charset=utf-8');
header("content-type: application/json; charset=utf-8");
header('P3P: CP="IDC DSP COR CURa ADMa OUR IND PHY ONL COM STA"');
include_once realpath('../facade/DocumentoFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$idDocumento = strip_tags($dataObject->idDocumento);
$nombreDocumento = strip_tags($dataObject->nombreDocumento);
$rutaDocumento = strip_tags($dataObject->rutaDocumento);
$respuesta = 0;

if ($idDocumento === '' || $nombreDocumento === '' || $rutaDocumento === '') {
    echo $respuesta;
} else {
    $respuesta = DocumentoFacade::update($idDocumento, $nombreDocumento, $rutaDocumento);

    if ($respuesta > 0) {
        echo $respuesta = true;
    } else {
        echo $respuesta;
    }
}
