<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Estadistas informan que una linea de código equivale a un sorbo de café  \\
include_once realpath('../facade/TipodonacionFacade.php');


class TipodonacionController {

    public static function insert(){
        $idTipoDonacion = strip_tags($_POST['idTipoDonacion']);
        $TipoDonacion = strip_tags($_POST['TipoDonacion']);
        $Descripcion = strip_tags($_POST['Descripcion']);
        TipodonacionFacade::insert($idTipoDonacion, $TipoDonacion, $Descripcion);
return true;
    }

    public static function listAll(){
        $list=TipodonacionFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Tipodonacion) {	
	       $rta.="{
	    \"idTipoDonacion\":\"{$Tipodonacion->getidTipoDonacion()}\",
	    \"TipoDonacion\":\"{$Tipodonacion->getTipoDonacion()}\",
	    \"Descripcion\":\"{$Tipodonacion->getDescripcion()}\"
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