<?php session_start();
  
  if((isset($_SESSION["usuario_lp"]) && !empty($_SESSION["usuario_lp"])) )
   {    
    
	$titu="Quotes";
	$cargue="";
	
	require_once("clases/usuarios.php");
	$usir=unserialize($_SESSION["usuario_lp"]);	
		
	include("tope.php");

	 
	require_once("clases/quotes.php");
	$quotes=new quotes();
	$datos=$quotes->buscar($_GET["id"]);
	$pk="id";	
	$elpk=$datos[0][0];	
	$titu_esp=$datos[0]["titu_esp"];
	$titu_eng=$datos[0]["titu_eng"];
	$des_esp=$datos[0]["des_esp"];
	$des_eng=$datos[0]["des_eng"];
	include("sub_plantillas/subp_pregres2.php");

	include("cierra.php");		
   }
  else 
   {
    echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
   }      
?>