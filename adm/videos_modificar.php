<?php session_start();
  
  if((isset($_SESSION["usuario_lp"]) && !empty($_SESSION["usuario_lp"])) )
   {    
    
	$titu="videos";
	$cargue="";
	
	require_once("clases/usuarios.php");
	$usir=unserialize($_SESSION["usuario_lp"]);	
		
	include("tope.php");

	 
	require_once("clases/videos.php");
	$videos=new videos();
	$datos=$videos->buscar($_GET["id"]);
	$pk="id";	
	$elpk=$datos[0][0];	
	$des=$datos[0]["des"];

		  
	include("sub_plantillas/subp_videos2.php");

	include("cierra.php");		
   }
  else 
   {
    echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
   }      
?>