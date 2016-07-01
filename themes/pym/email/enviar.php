<?php
	
	//Obtenemos las valores enviados
	$from    = $_POST['email'];
	$message = $_POST['message'];
	$name    = $_POST['name'];
	$phone   = $_POST['phone'];
	$subject = $_POST['subject'];

	//Email A quien se le rinde cuentas
	$webmaster_email1 = "constructorapym@gmail.com";
	$webmaster_email2 = "jgomez@ingenioart.com";

	include("./class.phpmailer.php");
 	include("./class.smtp.php");

	$mail = new PHPMailer();
	
	/*$mail->IsSMTP(); // send via SMTP
	$mail->SMTPSecure = 'ssl'; 
	$mail->Host      = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->Port      = 465;
	$mail->SMTPAuth  = true; // turn on SMTP authentication
	$mail->Username  = "jgomez.4net@gmail.com"; // Enter your SMTP username
	$mail->Password  = "ARLAC_RINO1EVER"; // SMTP password */

	$mail->From     = $from;
	$mail->FromName = $name;
	$mail->AddAddress( $webmaster_email1 );
	$mail->AddAddress( $webmaster_email2 );

	$mail->IsHTML( true ); // send as HTML
	$mail->Subject = "Consulta - Mensaje P&M Constructora Formulario: " . $subject;

	//Customizar el mensaje
	$mensaje  = "De Sr.(a) " . $name . "<br/>";
	$mensaje .= $message;
	$mensaje .= "<br/> Su tel&eacute;fono &oacute; celular es: " . $phone;

	$mail->Body = $mensaje;

	if($mail->Send()){
		echo "Su mensaje a sido enviado con éxito, estaremos respondiendo a la brevedad."; 
	} else {
		echo "Mailer Error: " . $mail->ErrorInfo ; 
	}

?>