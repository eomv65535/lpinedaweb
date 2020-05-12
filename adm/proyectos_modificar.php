<?php session_start();
  
  if((isset($_SESSION["usuario_lp"]) && !empty($_SESSION["usuario_lp"])) )
   {    
    
	$titu="Proyectos";
	$cargue="";
	
	require_once("clases/usuarios.php");
	$usir=unserialize($_SESSION["usuario_lp"]);	
		
	include("tope.php");

	 
	require_once("clases/proyectos.php");
	$proyectos=new proyectos();
	$datos=$proyectos->buscar($_GET["id"]);
	$pk="id";	
	$elpk=$datos[0][0];	
	$nombre=$datos[0]["nombre"];
	$descrip=$datos[0]["descrip"];
	$link=$datos[0]["link"];
	$video=$datos[0]["video"];
	include("sub_plantillas/subp_pro2.php");

	include("cierra.php");		
   }
  else 
   {
    echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
   }      
?>