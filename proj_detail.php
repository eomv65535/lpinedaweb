<?php session_start();
  	  include_once("clases/tbs_class.php");
	  
	  $estilos_metas="scripts/estilos_metas.html";  
	  $cabecera="scripts/header.php";  
	  include("idiomas/idioma_moneda.php");
	  $findepag="scripts/footer.php";
	  $contenido="sub_plantillas/subtpl_festivals.html";  
	  $scrits="scripts/script_gral.html";  

	require_once("clases/proyectos.php");
	$proyectos=new proyectos();
	$detos=$proyectos->buscar($_GET["id"]);

	  $titulo_pagina=$detos[0]["nombre"];
	  $nombre=$detos[0]["nombre"];
	  $video=$detos[0]["video"];
	  $link=$detos[0]["link"];
	  $_SESSION["ptex"]=$detos[0]["descrip"];
	  $pagina="proj_detail.php?id=".$_GET["id"];
	  $_SESSION["xpag"]=$pagina; 
	  $texto_pry="texto_pry.php";
	  $cargue="";
	  $c1=$c2=$c3=$c4=$c5=$c6="";
	  $c5="active";
	  
	  $listado_fotos_bmc="listado_fotos_bmc.php";
	  
	  $TBS = new clsTinyButStrong ; 
	  $TBS->LoadTemplate("plantillas/p1.html");
	  $TBS->Show();	 
?>
