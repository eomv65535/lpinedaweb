<?php
require 'phpmailer/PHPMailerAutoload.php';

class emails{

var $name;
var $email;
var $message;
var $subject;
var $aquienmail;
var $mail;
var $defectoemail;
var $defectonombre;

function emails(){	
	$this->mail = new PHPMailer;
	$this->defectoemail="lpineda2336@gmail.com";
	$this->defectonombre="Leonardo Pineda - Website";
}

function cargar(){
	$this->name = isset($_POST['name'])?$_POST['name']:'';
	$this->email = isset($_POST['email'])?$_POST['email']:'';
	$this->message = isset($_POST['message'])?$_POST['message']:'';
	$this->subject = isset($_POST['subject'])?$_POST['subject']:'';
	$this->aquienmail = isset($_POST['aquienmail'])?$_POST['aquienmail']:'info@lpineda.com';	
}

function envia_email()
{ 	
	$this->mail->setFrom($this->email,  $this->name);
	$this->mail->addAddress($this->defectoemail, $this->defectonombre);
	$this->mail->Subject = 'Contacto desde '.$this->defectonombre.'!';
	$this->mail->msgHTML($this->message);
	$si=$this->mail->send();
  return $si;	
}

function cuerpo_generico($quien,$masaje)
{
	$htmm='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html>
			<head>
			<meta name="viewport" content="width=device-width" />
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<title>'.$this->defectonombre.' - Desarrollado por Ingenieria Web | http://ingenieriawebsc.com.ve</title>			
			</head>
			<body bgcolor="#FFFFFF" topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">			
			<table style="width: 100%;">
				<tr>
					<td></td>
					<td style="display:block!important;max-width:800px!important;margin:0 auto!important;clear:both!important;" bgcolor="#FFFFFF">	
						<div style="padding:15px;max-width:800px;margin:0 auto;display:block;border: 1px solid #000;border-radius: 4px 4px 4px 4px;-webkit-border-radius: 4px 4px 4px 4px;-moz-border-radius: 4px 4px 4px 4px;-o-border-radius: 4px 4px 4px 4px;-ms-border-radius: 4px 4px 4px 4px;text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.4);">
							<table>
							<tr>
								<td>				
									
									<h4>Hola, '.$quien.'</h4>										
									<p style="margin-bottom: 10px;font-weight: normal;font-size: 14px;line-height: 1.6;">
									'.$masaje.'						 
									</p>					
								</td>
							</tr>
						</table>
						<div style="display: block; clear: both;"></div>					
					</div>
					</td>
					<td></td>
				</tr>
			</table>			
			<table style="width: 100%;clear:both!important;">
				<tr>
					<td></td>
					<td style="display:block!important;max-width:600px!important;margin:0 auto!important; clear:both!important;">
							<div style="padding:15px;max-width:600px;margin:0 auto;display:block;">
							<table>
							<tr>
								<td align="center">
									<p style="border-top: 1px solid rgb(215,215,215); padding-top:15px;font-size:10px;font-weight: bold;">
										© Copyright '.$this->defectonombre.' '.date("Y").' | Desarrollado por 
										<a href="http://ingenieriawebsc.com.ve">Ingeniería Web</a>
									</p>
								</td>
							</tr>
						</table>
							</div>
					</td>
					<td></td>
				</tr>
			</table>
			</body>
			</html>';	
return $htmm;	
}


}//fin de la clase acceso
?>