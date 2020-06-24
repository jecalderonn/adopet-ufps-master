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

include_once realpath('../facade/Foto_mascotaFacade.php');


$foto_mascota_nombre = 'foto';
$Mascota_idMascota = strip_tags($_POST['idMascota']);
$mascota= new Mascota();
$mascota->setIdMascota($Mascota_idMascota);
     
//Recorro todos los elementos

for($i = 1 ; $i <= 3; $i++){
    $foto =  strip_tags($_POST['foto_mascota_ruta_'.$i]);
    
    if(isset($foto) && !empty($foto)){
    $respuesta= Foto_mascotaFacade::insert( $foto_mascota_nombre, $foto, $mascota);
    }
}

 

   //if ($respuesta > 0) {
   
  ///  $rta ="{\"result\":\"ok\"}";
//    $msg = "{\"msg\":\"exito\"}";
 //   echo "[{$rta}]";
   
  //  } else {
  //  $msg = "{\"msg\":\"MANEJO DE EXCEPCIONES AQUÍ\"}";
  //  $rta = "{\"result\":\"false\"}";
  //  echo "[{$rta}]";
//}