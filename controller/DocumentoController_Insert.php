<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');
//header("Access-Control-Allow-Headers: X-Requested-With");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");  
header('Content-Type: text/html; charset=utf-8');
header("content-type: application/json; charset=utf-8");
header('P3P: CP="IDC DSP COR CURa ADMa OUR IND PHY ONL COM STA"');

include_once realpath('../facade/DocumentoFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$nombreDocumento = strip_tags($dataObject->nombreDocumento);
$idUsuario = strip_tags($dataObject->idUsuario);
$usuario           = new Usuario();
$usuario->setIdUsuario($idUsuario);
$respuesta = 0;
$nombre_ruta=saveDocument();
if ($nombreDocumento === '' || $nombre_ruta === '' || $idUsuario === '') {
    echo $respuesta;
} else {
    $respuesta = DocumentoFacade::insert($nombreDocumento, $nombre_ruta, $usuario);
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

function saveDocument()
{

    $name = "";
    $directorio = "../../documento";

    if (basename($_FILES["file"]["name"]) == null || basename($_FILES["file"]["name"]) == "") {
        return "";
    }
    $archivo = $directorio . basename($_FILES["file"]["name"]);

    //para validar tamaño del archivo
    $size = $_FILES["file"]["size"];
    $tipoArchivo = end(explode(".", $_FILES['file']['name']));
    //validar tipo de imagen
    if ($tipoArchivo != "pdf") {

    } else if (move_uploaded_file($_FILES["file"]["tmp_name"], $archivo)) {

        $name = basename($_FILES["file"]["name"]);
        return $name;

        echo "El archivo se subió correctamente";
    } else {
        echo "Hubo un error en la subida del archivo";
    }
}
