<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Yo <3 Cúcuta  \\
include_once realpath('../facade/FavoritomascotausuarioFacade.php');


class FavoritomascotausuarioController {

    public static function insert(){
        $Mascota_idMascota = strip_tags($_POST['Mascota_idMascota']);
        $mascota= new Mascota();
        $mascota->setIdMascota($Mascota_idMascota);
        $Usuario_idUsuario = strip_tags($_POST['Usuario_idUsuario']);
        $usuario= new Usuario();
        $usuario->setIdUsuario($Usuario_idUsuario);
        $idFavoritoMascotaUsuario = strip_tags($_POST['idFavoritoMascotaUsuario']);
        FavoritomascotausuarioFacade::insert($mascota, $usuario, $idFavoritoMascotaUsuario);
return true;
    }

    public static function listAll(){
        $list=FavoritomascotausuarioFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Favoritomascotausuario) {	
	       $rta.="{
	    \"Mascota_idMascota_idMascota\":\"{$Favoritomascotausuario->getMascota_idMascota()->getidMascota()}\",
	    \"Usuario_idUsuario_idUsuario\":\"{$Favoritomascotausuario->getUsuario_idUsuario()->getidUsuario()}\",
	    \"idFavoritoMascotaUsuario\":\"{$Favoritomascotausuario->getidFavoritoMascotaUsuario()}\"
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