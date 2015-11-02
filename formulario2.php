<?php 

require "class.phpmailer.php";
include("class.smtp.php");
				if (isset($_POST['enviar'])){

					$mail = new PHPMailer;
					//$mail->SMTPDebug = 2;                               // Enable verbose debug output
					$mail->isSMTP();                                      // Set mailer to use SMTP
					$mail->SMTPAuth = true;
				    $mail->SMTPSecure = "tsl"; //tsl / ssl  
			      	$mail->Host = "smtp.1and1.es";
    				$mail->Port = 25;  //587 / 465
    				$mail->charset = 'UTF-8';
					//$mail->Host = '';  // Specify main and backup SMTP servers
					//$mail->SMTPAuth = true;                               // Enable SMTP authentication
                    
                    
                    
                    
                    
					$mail->Username = 'contacto@gmail.com';                 // SMTP username
					$mail->Password = '****';                           // SMTP password
                    
					//$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
					//$mail->Port = 465;                                    // TCP port to connect to
					$mail->From = 'contacto@demo.com';
					$mail->FromName = 'contacto';
					$mail->addAddress('demo@gmail.com', 'contacto');     // Add a recipient
					//$mail->addAddress('ellen@example.com');               // Name is optional
                    
                    $mail->addReplyTo('', ''); 
                    
                    $mail->addCC('');
					//$mail->addBCC('contacto@demo.com');
					//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
					//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
					$mail->isHTML(true);                                  // Set email format to HTML
					$mail->Subject = 'Un nuevo competidor se ha inscrito en Duelos';
					$mail->Body    = "<p>El competidor: " .$_POST['nombre']. " (".$_POST['email'].") se ha inscrito en el evento:  con la siguiente prioridad: </p>
					<br/>
					Observaciones: ". $_POST['observaciones'];
					
					if(!$mail->send()) {
						echo '<p class="aviso bg-danger">La inscripci&oacute;n no ha podido hacerse. Por favor int&eacute;ntelo de nuevo. Gracias.</p>';
						echo '<p class="aviso bg-danger">Mailer Error: ' . $mail->ErrorInfo . '</p>';
					} else {
						echo '<p class="aviso bg-success">Su inscripci&oacute;n ha sido enviada.</p>';
					}

					$mail2 = new PHPMailer;
					//$mail->SMTPDebug = 2;                               // Enable verbose debug output
					$mail2->isSMTP();                                      // Set mailer to use SMTP
					$mail2->SMTPAuth = true;
				    $mail2->SMTPSecure = "tsl";
			      	$mail2->Host = "smtp.1and1.es";
    				$mail2->Port = 25;
					$mail2->charset = 'UTF-8';
					//$mail->Host = 'smtp.contacto.com';  // Specify main and backup SMTP servers
					//$mail->SMTPAuth = true;                               // Enable SMTP authentication
					$mail2->Username = 'contacto@gmail.com';                 // SMTP username
					$mail2->Password = '****';                           // SMTP password
					//$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
					//$mail->Port = 465;                                    // TCP port to connect to
					$mail2->From = 'contacto@demo.com';
					$mail2->FromName = 'contacto';
					//$mail2->addAddress('contacto@demo.com', 'contacto');     // Add a recipient
					$mail2->addAddress($_POST['email']);               // Name is optional
                    $mail2->addReplyTo('', '');

                    $mail2->addCC('');
					//$mail->addBCC('contacto@demo.com');
					//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
					//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
					$mail2->isHTML(true);                                  // Set email format to HTML
					$mail2->Subject = 'Inscripción Duelo.';
				    $mail2->Body ='<div class="container" style="background-color: #EFF3F8; padding: 10px;">
                  <div style="background-color: #FFF; border:1px solid #E1E1E1;">
                    <p align="center" style="padding:20px;"><img src=""></p>
                    <p style="color: #E26A6A; background-color: #DBDBDB; padding:10px 20px;"><b>INSCRIPCION</b></p>
                    <h4 style="padding:0 20px;">Sr./Sra. '.$_POST['nombre'].'</h4>            
                    <p style="padding: 20px; margin:0;"><b>Muchas gracias por registrarse y por su interés. <br/>
                                Procedemos a valorar su solicitud y próximamente contactaremos con usted, para confirmarle en qué categoría queda                                 registrado.<br/><br/>
                                Un saludo, </b></p>
                    <p style="background-color: #48525E; color:#A2ABB7; padding:10px 20px; margin:0; font-size: 10px;" >AVISO LEGAL: El contenido de este                         mensaje de correo electrónico,                   incluidos los ficheros adjuntos, es confidencial y está protegido por el artículo                         18.3 de la Constitución Española, que garantiza el secreto de             las comunicaciones. Si usted recibe este mensaje por error,                     por favor póngase en contacto con el remitente para informarle de este hecho, y no              difunda su contenido ni haga copias.

                    *** Este mensaje ha sido verificado con herramientas de eliminación de virus y contenido malicioso ***

                Este aviso legal ha sido incorporado automáticamente al mensaje</p>
                <p style="background-color: #3B434C; color: #A2ABB7; padding:5px 20px; margin:0;"><a href="http://twitter.com/quesada1992/">Pedro Quesada Marin</a></p>
                </div> 
            </div>';

					
					if(!$mail2->send()) {
						echo '<p class="aviso bg-danger">La inscripci&oacute;n no ha podido hacerse. Por favor int&eacute;ntelo de nuevo. Gracias.</p>';
						echo '<p class="aviso bg-danger">Mailer Error: ' . $mail->ErrorInfo . '</p>';
					} else {
						echo '<p class="aviso bg-success">Le hemos enviado un email, nuestro equipo se encuentra valorando su solicitud. Gracias.</p>';
					}



				} 				
			?>