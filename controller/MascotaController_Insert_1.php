<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');
//header("Access-Control-Allow-Headers: X-Requested-With");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");  
header('Content-Type: text/html; charset=utf-8');
header("content-type: application/json; charset=utf-8");
header('P3P: CP="IDC DSP COR CURa ADMa OUR IND PHY ONL COM STA"'); 


include_once realpath('../facade/MascotaFacade.php');
//include_once realpath('../correo/enviarMail.php');
include_once realpath('../facade/Foto_mascotaFacade.php');


 
$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);



$foto= strip_tags($dataObject->foto_mascota_ruta);
$Especie_idEspecie = strip_tags($dataObject->idMascota);

//$especie = new Especie();
//$especie->setIdEspecie($Especie_idEspecie);
//$nombreMascota = strip_tags($dataObject->nombreMascota);
//$edadMascota = strip_tags($dataObject->edadMascota);
//$sexoMascota = strip_tags($dataObject->sexoMascota);
//$disponibilidadMascota = strip_tags($dataObject->disponibilidadMascota);
//$disponibilidadMascota = "1";
//$Fundacion_idFundacion = strip_tags($dataObject->idFundacion);
//$fundacion = new Fundacion();
//$fundacion->setIdFundacion($Fundacion_idFundacion);

//formatear la fecha
//$originalDate = $dataObject->fechaIngreso;
//$newDate = date("Y-m-d", strtotime($originalDate));
//$fechaIngreso = strip_tags($newDate);

//$fechaSalida = strip_tags($dataObject->fechaSalida);
//$fechaSalida = $foto;
//$Vinculacion_idVeterinaria = strip_tags($dataObject->idVeterinaria);
//$vinculacion= new Vinculacion();
//$vinculacion->setIdVeterinaria($Vinculacion_idVeterinaria);

$respuesta = 0;

//guiarse por los datos que recibe el insert
//if ($Especie_idEspecie === '' || $nombreMascota === '' || $edadMascota === '' || $sexoMascota === '' || $disponibilidadMascota === '' || $fundacion === '' || $fechaIngreso === ''  || $vinculacion === '') {
 //   echo $respuesta;
//} else {

    //insert devuelve es un numero si incerto   
///$respuesta = MascotaFacade::insert($especie, $nombreMascota, $edadMascota, $sexoMascota, $disponibilidadMascota, $fundacion, $fechaIngreso,$fechaSalida, $vinculacion);

  ///  if ($respuesta > 0) {
   
   // $rta ="{\"result\":\"ok\"}";
  //  $msg = "{\"msg\":\"exito\"}";
    
        $foto_mascota_nombre = 'foto';
        $foto_mascota_ruta = $foto;
        $Mascota_idMascota = $Especie_idEspecie;
        $mascota= new Mascota();
        $mascota->setIdMascota($Mascota_idMascota);
       $respuesta2 =  Foto_mascotaFacade::insert( $foto_mascota_nombre, $foto_mascota_ruta, $mascota);
    
    echo $respuesta2;
   
  //  } else {
   // $msg = "{\"msg\":\"MANEJO DE EXCEPCIONES AQUÍ\"}";
  //  $rta = "{\"result\":\"false\"}";
   // echo "[{$respuesta2}]";
//}
//}   
    