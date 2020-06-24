<?php
header("Access-Control-Allow-Origin: *");  
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");  
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//este es el import
include_once realpath('../facade/ConvenioFacade.php');

$list = ConvenioFacade::listAll();
$rta = "";

foreach ($list as $obj => $Convenio) {
    $rta .= "{
	    \"idConvenio\":\"{$Convenio->getidConvenio()}\",
	    \"Veterinaria_idVeterinaria_idVeterinaria\":\"{$Convenio->getVeterinaria_idVeterinaria()->getidVeterinaria()}\",
	    \"Fundacion_idFundacion_idFundacion\":\"{$Convenio->getFundacion_idFundacion()->getidFundacion()}\",
	    \"fechaConvenio\":\"{$Convenio->getfechaConvenio()}\",
	    \"nombreConvenio\":\"{$Convenio->getnombreConvenio()}\",
	    \"duracionConvenio\":\"{$Convenio->getduracionConvenio()}\",
	    \"estado\":\"{$Convenio->getestado()}\"
	       },";
}

if ($rta != "") {
    $rta = substr($rta, 0, -1);
    $msg = "{\"msg\":\"exito\"}";
} else {
    $msg = "{\"msg\":\"MANEJO DE EXCEPCIONES AQUÍ\"}";
    $rta = "{\"result\":\"No se encontraron registros.\"}";
}
echo "[{$msg},{$rta}]";
