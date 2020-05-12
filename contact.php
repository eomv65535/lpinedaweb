<?php session_start();
  	  include_once("clases/tbs_class.php");
	  
	  $estilos_metas="scripts/estilos_metas.html";  
	  $cabecera="scripts/header.php";  
	  include("idiomas/idioma_moneda.php");
	  $findepag="scripts/footer.php";
	  $contenido="sub_plantillas/subtpl_contac.html";  
	  $scrits="scripts/script_gral.html";  
	  $titulo_pagina=$contacto;
	  
	  $pagina="contact.php";
	  $_SESSION["xpag"]=$pagina; 
	  
	  $cargue="";
	  $c1=$c2=$c3=$c4=$c5=$c6="";
	  $cc1=$cc2=$cc3=$cc4=$cc5=$cc6="color:white";
	  $c6="active";
	  $cc6="";
	  $TBS = new clsTinyButStrong ; 
	  $TBS->LoadTemplate("plantillas/p1.html");
	  $TBS->Show();	 
?>
