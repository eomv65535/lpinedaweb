<?php session_start();
  	  include_once("clases/tbs_class.php");
	  
	  $estilos_metas="scripts/estilos_metas.html";  
	  $cabecera="scripts/header.php";  
	  include("idiomas/idioma_moneda.php");
	  $findepag="scripts/footer.php";
	  $contenido="sub_plantillas/subtpl_festivals.html";  
	  $scrits="scripts/script_gral.html";  
	  $titulo_pagina="Bard Music Colombia";
	  
	  $pagina="bmc.php";
	  $_SESSION["xpag"]=$pagina; 
	  $listado_festivals="listado_festivals.php";
	  $cargue="";
	  $c1=$c2=$c3=$c4=$c5=$c6="";
	  $c5="active";
	  
	  $listado_fotos_bmc="listado_fotos_bmc.php";
	  
	  $TBS = new clsTinyButStrong ; 
	  $TBS->LoadTemplate("plantillas/p1.html");
	  $TBS->Show();	 
?>
