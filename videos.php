<?php session_start();
  	  include_once("clases/tbs_class.php");
	  
	  $estilos_metas="scripts/estilos_metas.html";  
	  $cabecera="scripts/header.php";  
	  include("idiomas/idioma_moneda.php");
	  $findepag="scripts/footer.php";
	  $contenido="sub_plantillas/subtpl_video.html";  
	  $scrits="scripts/script_gral.html";  
	  $titulo_pagina=$inic_o;
	  
	  $pagina="index.php";
	  $_SESSION["xpag"]=$pagina; 
	  
	  $listado_fotos="listado_fotos.php";
	  
	  $cargue="";
	  $c1=$c2=$c3=$c4=$c5=$c6="";	 
	  $c3="active";
	  $TBS = new clsTinyButStrong ; 
	  $TBS->LoadTemplate("plantillas/p1.html");
	  $TBS->Show();	 
?>
