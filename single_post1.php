<?php session_start();
  	  include_once("clases/tbs_class.php");
	  
	  $estilos_metas="scripts/estilos_metas.html";  
	  $cabecera="scripts/header.php";  
	  include("idiomas/idioma_moneda.php");
	  $findepag="scripts/footer.php";
	  $contenido="sub_plantillas/subtpl_single.html";  
	  $scrits="scripts/script_gral.html";  
	  $titulo_pagina="BEETHOVEN - Symphony No.5 | Leonardo Pineda conductor";
	  
	  $pagina="single_post1.php";
	  $_SESSION["xpag"]=$pagina; 
	  
	  $cargue="";
	  $c1=$c2=$c3=$c4=$c5=$c6="";
	  $c5="active";
	  $TBS = new clsTinyButStrong ; 
	  $TBS->LoadTemplate("plantillas/p1.html");
	  $TBS->Show();	 
?>
