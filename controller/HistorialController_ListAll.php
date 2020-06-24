<?php
header("Access-Control-Allow-Origin: *");  
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");  
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once realpath('../facade/HistorialFacade.php');
$list = HistorialFacade::listAll();
$rta = "";
foreach ($list as $obj => $Historial) {
    $rta .= "{
	    \"idHistorial\":\"{$Historial->getidHistorial()}\",
	    \"fechaHistorial\":\"{$Historial->getfechaHistorial()}\",
	    \"Descripcion\":\"{$Historial->getDescripcion()}\",
	    \"tipo\":\"{$Historial->gettipo()}\",
	    \"idUsuario\":\"{$Historial->getUsuario_idUsuario()->getidUsuario()}\"
	       },";
}

if ($rta != "") {
    $rta = substr($rta, 0, -1);
    echo $rta = "[{$rta}]";
    $msg = "{\"msg\":\"exito\"}";
} else {
    $msg = "{\"msg\":\"MANEJO DE EXCEPCIONES AQUÍ\"}";
    echo $rta = "{\"result\":\"No se encontraron registros.\"}";
}
