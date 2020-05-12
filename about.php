<?php session_start();
  	  include_once("clases/tbs_class.php");
	  
	  $estilos_metas="scripts/estilos_metas.html";  
	  $cabecera="scripts/header.php";  
	  include("idiomas/idioma_moneda.php");
	  $findepag="scripts/footer.php";
	  $contenido="sub_plantillas/subtpl_about.html";  
	  $scrits="scripts/script_gral.html";  
	  $titulo_pagina=$about;
	  
	  $pagina="about.php";
	  $_SESSION["xpag"]=$pagina; 
	  
 	  require_once( "clases/txtabout.php" );
	  $txtabout = new txtabout();
	  $detos_about = $txtabout->consultar();
	  $txt_bio=$detos_about[0]["des_".$completxt];

	require_once("clases/imgabout.php");		
	$imgabout=new imgabout();
	$dimgabout=$imgabout->consultar();
	$ruta_abiz=$dimgabout[0]["ruta"];

	require_once("clases/imgfondvideo.php");		
	$imgfondvideo=new imgfondvideo();
	$dimgfondvideo=$imgfondvideo->consultar();
	$ruta_ifv=$dimgfondvideo[0]["ruta"];

	   require_once("clases/lnkvideo.php");
	  $lnkvideo=new lnkvideo();
	  $detos_lnkvideo=$lnkvideo->consultar();
	  $ellinkvideo=$detos_lnkvideo[0]["des"];

	  $cargue="";
	  $c1=$c2=$c3=$c4=$c5=$c6="";
	  $c2="active";
	  $TBS = new clsTinyButStrong ; 
	  $TBS->LoadTemplate("plantillas/p1.html");
	  $TBS->Show();	 
?>
