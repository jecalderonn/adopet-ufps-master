<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Alza el puño y ven! ¡En la hoguera hay de beber!  \\
include_once realpath('../facade/HistorialFacade.php');


class HistorialController {

    public static function insert(){
        $idHistorial = strip_tags($_POST['idHistorial']);
        $fechaHistorial = strip_tags($_POST['fechaHistorial']);
        $Descripcion = strip_tags($_POST['Descripcion']);
        $tipo = strip_tags($_POST['tipo']);
        $Usuario_idUsuario = strip_tags($_POST['Usuario_idUsuario']);
        $usuario= new Usuario();
        $usuario->setIdUsuario($Usuario_idUsuario);
        HistorialFacade::insert($idHistorial, $fechaHistorial, $Descripcion, $tipo, $usuario);
return true;
    }

    public static function listAll(){
        $list=HistorialFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Historial) {	
	       $rta.="{
	    \"idHistorial\":\"{$Historial->getidHistorial()}\",
	    \"fechaHistorial\":\"{$Historial->getfechaHistorial()}\",
	    \"Descripcion\":\"{$Historial->getDescripcion()}\",
	    \"tipo\":\"{$Historial->gettipo()}\",
	    \"Usuario_idUsuario_idUsuario\":\"{$Historial->getUsuario_idUsuario()->getidUsuario()}\"
	       },";
        }

        if($rta!=""){
	       $rta = substr($rta, 0, -1);
	       $msg="{\"msg\":\"exito\"}";
        }else{
	       $msg="{\"msg\":\"MANEJO DE EXCEPCIONES AQUÍ\"}";
	       $rta="{\"result\":\"No se encontraron registros.\"}";	
        }
        return "[{$msg},{$rta}]";
    }

}
//That`s all folks!