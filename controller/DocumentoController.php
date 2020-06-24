<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Y pensar que Anarchy está hecho en código espagueti...  \\
include_once realpath('../facade/DocumentoFacade.php');


class DocumentoController {

    public static function insert(){
        $idDocumento = strip_tags($_POST['idDocumento']);
        $nombreDocumento = strip_tags($_POST['nombreDocumento']);
        $rutaDocumento = strip_tags($_POST['rutaDocumento']);
        $Usuario_idUsuario = strip_tags($_POST['Usuario_idUsuario']);
        $usuario= new Usuario();
        $usuario->setIdUsuario($Usuario_idUsuario);
        DocumentoFacade::insert($idDocumento, $nombreDocumento, $rutaDocumento, $usuario);
return true;
    }

    public static function listAll(){
        $list=DocumentoFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Documento) {	
	       $rta.="{
	    \"idDocumento\":\"{$Documento->getidDocumento()}\",
	    \"nombreDocumento\":\"{$Documento->getnombreDocumento()}\",
	    \"rutaDocumento\":\"{$Documento->getrutaDocumento()}\",
	    \"Usuario_idUsuario_idUsuario\":\"{$Documento->getUsuario_idUsuario()->getidUsuario()}\"
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