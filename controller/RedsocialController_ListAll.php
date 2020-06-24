<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: text/html; charset=utf-8');
header("content-type: application/json; charset=utf-8");
header('P3P: CP="IDC DSP COR CURa ADMa OUR IND PHY ONL COM STA"');

include_once realpath('../facade/RedsocialFacade.php');


$list = RedsocialFacade::listAll();
$rta = "";
foreach ($list as $obj => $Redsocial) {
    $rta .= "{
	    \"idRedesSociales\":\"{$Redsocial->getidRedesSociales()}\",
	    \"nombre\":\"{$Redsocial->getnombre()}\",
	    \"url\":\"{$Redsocial->geturl()}\",
	    \"Fundacion_idFundacion_idFundacion\":\"{$Redsocial->getFundacion_idFundacion()->getidFundacion()}\"
	       },";
}

if ($rta != "") {
    $rta = substr($rta, 0, -1);
    $msg = "{\"msg\":\"exito\"}";
} else {
    $msg = "{\"msg\":\"MANEJO DE EXCEPCIONES AQUÍ\"}";
    $rta = "{\"result\":\"No se encontraron registros.\"}";
}
return "[{$msg},{$rta}]";