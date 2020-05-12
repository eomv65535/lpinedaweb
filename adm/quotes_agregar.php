<?php session_start();
  
  if((isset($_SESSION["usuario_lp"]) && !empty($_SESSION["usuario_lp"])) )
   {    
    
	$titu="Quotes";	
	
	$cargue="";

	require_once("clases/usuarios.php");
	$usir=unserialize($_SESSION["usuario_lp"]);
		
	include("tope.php");
	
	include("sub_plantillas/subp_pregres1.php"); 
	
	$quien=$usir->nombres;		
	include("cierra.php");		
   }
  else 
   {
    echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
   }    
?>