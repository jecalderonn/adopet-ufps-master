<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No hay de qué so no más de papa  \\
include_once realpath('../facade/Fundacion_fotoFacade.php');


$fundacion_fotonombre = 'foto';
$Fundacion_idFundacion = strip_tags($_POST['idFundacion']);
$mascota= new Mascota();
$mascota->setIdMascota($Mascota_idMascota);
     
//Recorro todos los elementos

for($i = 1 ; $i <= 3; $i++){
    $foto =  strip_tags($_POST['fundacion_foto_ruta_'.$i]);
    
    if(isset($foto) && !empty($foto)){
//    $respuesta= Foto_mascotaFacade::insert( $foto_mascota_nombre, $foto, $mascota);
    $respuesta= Fundacion_fotoFacade::insert( $fundacion_fotonombre, $foto, $fundacion);
    }
}



//That`s all folks!