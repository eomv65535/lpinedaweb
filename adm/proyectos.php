<?php session_start();
  include_once("clases/tbs_class.php");
  if((isset($_SESSION["usuario_lp"]) && !empty($_SESSION["usuario_lp"])))
   {
	
    $cargue="ajuste();"; 
	require_once("clases/usuarios.php");
	$usir=unserialize($_SESSION["usuario_lp"]);
	$_SESSION["titulos"]=array("ID","Nombre","Descripción","Ruta Video","Link");
	$_SESSION["gen"]="proyectos"; //pa los consultar,modif y elimnar  .php
	$_SESSION["nomod"]=0;	 
    $_SESSION["noelim"]=0;
	$_SESSION["siagregar"]=1;
	$_SESSION["si_cons"]=0;
	$_SESSION["ncol"]=5;
	$_SESSION["laconsultica"]="select id,nombre,descrip,video,link,id from proyectos";	
	
	$titu="Proyectos";
	$explicalo="Aquí Usted podrá Agregar, Modificar, Eliminar los Proyectos";
	
	include("tope22.php");
	
	include("latablita.php");
	
	
   }
  else 
   {
    echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
   }    
  include("cierra2.php");
?>