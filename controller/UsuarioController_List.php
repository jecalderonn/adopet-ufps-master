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
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include_once realpath('../facade/UsuarioFacade.php');

        $list=UsuarioFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Usuario) {	
	       $rta.="{
	    \"idUsuario\":\"{$Usuario->getidUsuario()}\",
	    \"idTipoUsuario\":\"{$Usuario->getTipoUsuario_idTipoUsuario()->getidTipoUsuario()}\",
	    \"nombreUsuario\":\"{$Usuario->getnombreUsuario()}\",
	    \"apellidoUsuario\":\"{$Usuario->getapellidoUsuario()}\",
	    \"cedula\":\"{$Usuario->getcedula()}\",
	    \"direccion\":\"{$Usuario->getdireccion()}\",
	    \"correo\":\"{$Usuario->getcorreo()}\",
	
	    \"estado\":\"{$Usuario->getestado()}\",
	    \"fechaNacimiento\":\"{$Usuario->getfechaNacimiento()}\"
	  
	       },";
        }

        if($rta!=""){
	       $rta = substr($rta, 0, -1);
	       $msg="{\"msg\":\"exito\"}";
        }else{
	       $msg="{\"msg\":\"MANEJO DE EXCEPCIONES AQUÍ\"}";
	       $rta="{\"result\":\"No se encontraron registros.\"}";	
        }
        echo  "[{$msg},{$rta}]";