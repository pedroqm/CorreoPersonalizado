<?
  // primero hay que incluir la clase phpmailer para poder instanciar
  //un objeto de la misma
require "class.phpmailer.php";
include("class.smtp.php");

  //instanciamos un objeto de la clase phpmailer al que llamamos 
  //por ejemplo mail



$mail = new phpmailer();


$mail->IsSMTP(); // telling the class to use SMTP

//$mail->Host       = "mail.gmail.com"; // SMTP server
    
//$mail->SMTPDebug  = 1;


// $mail->Mailer = "smtp";

$mail->Host       = 'smtp.1and1.es';   //'smtp.gmail.es   // sets GMAIL as the SMTP server

$mail->Port       = 25; //587 / 465

$mail->SMTPSecure = 'tsl';   //tsl / ssl             // sets the prefix to the servier

$mail->SMTPAuth   = true;                  // enable SMTP authentication

$mail->Username = 'contacto@gmail.com';
$mail->Password = '****';


$mail->From = 'contacto@demo.com';
$mail->FromName = 'random';

//$mail->SetFrom('demo@gmail.com', 'First Last');

 if(isset($_POST['enviar'])){

        $nombre=$_POST['nombre'];
        $observaciones= $_POST['observaciones'];
        $emailContacto=$_POST['email'];
       
    }
  //Indicamos cual es la dirección de destino del correo
  $mail->AddAddress($emailContacto);


  //Asignamos asunto y cuerpo del mensaje
  //El cuerpo del mensaje lo ponemos en formato html, haciendo 
  //que se vea en negrita
$mail->IsHTML(true);



  $mail->Subject = "Prueba de phpmailer";
  $mail->Body ='<div class="container" style="background-color: #EFF3F8; padding: 10px;">
                  <div style="background-color: #FFF; border:1px solid #E1E1E1;">
                    <p align="center" style="padding:20px;"><img src="   Imagen   "></p>
                    <p style="color: #E26A6A; background-color: #DBDBDB; padding:10px 20px;"><b>INSCRIPCION</b></p>
                    <h4 style="padding:0 20px;">Sr./Sra. '.$nombre.'</h4>       
                    <p style="padding: 20px; margin:0;"><b>Muchas gracias por registrarse y por su interés. <br/>
                                Procedemos a valorar su solicitud y próximamente contactaremos con usted, para confirmarle en qué categoría queda                                 registrado.<br/><br/>
                                Un saludo, </b></p>
                    <p style="background-color: #48525E; color:#A2ABB7; padding:10px 20px; margin:0; font-size: 10px;" >AVISO LEGAL: El contenido de este                         mensaje de correo electrónico,                   incluidos los ficheros adjuntos, es confidencial y está protegido por el artículo                         18.3 de la Constitución Española, que garantiza el secreto de             las comunicaciones. Si usted recibe este mensaje por error,                     por favor póngase en contacto con el remitente para informarle de este hecho, y no              difunda su contenido ni haga copias.

                    *** Este mensaje ha sido verificado con herramientas de eliminación de virus y contenido malicioso ***

                Este aviso legal ha sido incorporado automáticamente al mensaje</p>
                <p style="background-color: #3B434C; color: #A2ABB7; padding:5px 20px; margin:0;"><a href="http://twitter.com/quesada1992/">Pedro Quesada Marin</a></p>
                </div> 
            </div>';

  //Definimos AltBody por si el destinatario del correo no admite email con formato html 
  $mail->AltBody = "Su mensaje a sido enviado: '.$observaciones.'";

  //se envia el mensaje, si no ha habido problemas 
  //la variable $exito tendra el valor true
  $exito = $mail->Send();

  //Si el mensaje no ha podido ser enviado se realizaran 4 intentos mas como mucho 
  //para intentar enviar el mensaje, cada intento se hara 5 segundos despues 
  //del anterior, para ello se usa la funcion sleep	
  $intentos=1; 
  while ((!$exito) && ($intentos < 5)) {
	sleep(5);
     	//echo $mail->ErrorInfo;
     	$exito = $mail->Send();
     	$intentos=$intentos+1;	
	
   }
 
		
   if(!$exito)
   {
	echo "Problemas enviando correo electrónico a ".$valor;
	echo "<br/>".$mail->ErrorInfo;	
   }
   else
   {
	echo "Mensaje enviado correctamente";
   } 
?>