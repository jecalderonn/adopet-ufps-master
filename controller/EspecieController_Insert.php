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

include_once realpath('../facade/EspecieFacade.php');
        
        $JSONData = file_get_contents("php://input");
        $dataObject = json_decode($JSONData);
        
        $nombreEspecie = strip_tags($dataObject->nombreEspecie);
        $respuesta= 0;
        
        if ($nombreEspecie === '' ) {
        
            echo $respuesta;
            
        }else{
            
        $respuesta= EspecieFacade::insert($nombreEspecie);
        
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
            
              
        
