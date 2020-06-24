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

include_once realpath('../facade/UsuarioFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

        $idUsuario = strip_tags($dataObject->idUsuario);
        $Tipousuario_idTipoUsuario = "1";
        $tipousuario= new Tipousuario();
        $tipousuario->setIdTipoUsuario($Tipousuario_idTipoUsuario);
        $nombreUsuario = strip_tags($dataObject->nombreUsuario);
        $apellidoUsuario = strip_tags($dataObject->apellidoUsuario);
        $cedula = strip_tags($dataObject->cedula);
        $direccion = strip_tags($dataObject->direccion);
        $correo = strip_tags($dataObject->correo);
        $estado = "1";
        $originalDate = strip_tags($dataObject->fechaNacimiento);
        $newDate = date("Y-m-d", strtotime($originalDate));
        $fechaNacimiento = strip_tags($newDate);


        $respuesta = 0;

//guiarse por los datos que recibe el insert
if ($tipousuario === '' || $nombreUsuario === '' || $apellidoUsuario === '' || $cedula === '' || $direccion === '' || $correo === '' ||  $estado === ''|| $fechaNacimiento === '') {
    echo $respuesta;
} else {

    //insert devuelve es un numero si incerto   
    $respuesta =  UsuarioFacade::update($idUsuario, $tipousuario, $nombreUsuario, $apellidoUsuario, $cedula, $direccion, $correo,  $estado, $fechaNacimiento);

     if ($respuesta > 0) {
   
    $rta ="{\"result\":\"ok\"}";
    $msg = "{\"msg\":\"exito\"}";
    echo "[{$rta}]";
   
    } else {
    $msg = "{\"msg\":\"MANEJO DE EXCEPCIONES AQUÍ\"}";
    $rta = "{\"result\":\"false\"}";
    echo "[{$rta}]";
}
}    