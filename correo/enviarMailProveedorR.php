<?php

//require "lib/class.phpmailer.php";
//require "lib/class.smtp.php";
include("class.phpmailer.php");
include("class.smtp.php");

/**
 * 
 */
class enviarMensajeProveedorR {

    private $mail;


    function __construct() {
        $this->mail = new PHPMailer;

        //indico a la clase que use SMTP
        $this->mail->IsSMTP();

        //permite modo debug para ver mensajes de las cosas que van ocurriendo
        //$this->mail->SMTPDebug = 2;
        //Debo de hacer autenticaci�n SMTP
        $this->mail->SMTPAuth = true;
        $this->mail->SMTPSecure = "ssl";

        //indico el servidor de Gmail para SMTP
        $this->mail->Host = "smtp.gmail.com";

        //indico el puerto que usa Gmail
        $this->mail->Port = 465;

        //Cargamos datos del correo emisor y receptor
        $this->cargarDatos();
    }

    private function cargarDatos() {

  
        $this->mail->Username = "nocontestar.solicitudservicio@gmail.com";

        $this->mail->Password = "soporte201";
       //  $this->mail->Username = "brialx.40@gmail.com";

     //   $this->mail->Password = "globalk_40";

        $this->mail->From = "compras@pescadero.com.co";

        $this->mail->FromName = "Gestion de Proveedores Tejar de Pescadero SAS";

        $this->mail->Subject = "Registro de Proveedor";

        $this->mail->addAddress("");
    }

//    function enviarMensaje($orden,$observacion) {
//        $this->mail->MsgHTML("La empresa ".$observacion." con el Nit ".$orden." se ha registrado como Proveedor  " );
//               
//
//        $this->mail->Send();
//    }
//    
//      function enviarMensajeA($orden,$observacion) {
//        $this->mail->MsgHTML("La empresa ".$observacion." con el Nit ".$orden." se ha Actualizado como Proveedor Correctamente " );
//               
//
//        $this->mail->Send();
//    }

    
       function enviarMensajeProveedor($orden,$observacion) {
            $this->mail->addAddress("$orden");
        $this->mail->MsgHTML("Se Registro como Proveedor de Tejar de Pescadero SAS \n Su Usuario : ".$orden." y la Contraseña : ".$observacion."\n Para realizar el Proceso de Actualizacion de Datos Recuerde que usted es responsable de su Usuario y Contraseña. " );
               

        $this->mail->Send();
    }
}

?>


