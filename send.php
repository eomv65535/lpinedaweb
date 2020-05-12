<?php 
	require_once("clases/emails.php");
	$ema=new emails();
	$ema->cargar();
	$ema->message='Se ha recibido un email de la zona de contactenos de : '.$ema->name.', Email: '.$ema->email.'. Cuyo Mensaje es: '.$ema->message;
	echo $ema->envia_email();
?>