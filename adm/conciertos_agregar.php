<?php session_start();

  if((isset($_SESSION["usuario_lp"]) && !empty($_SESSION["usuario_lp"])))
   {    
    
	$titu="Conciertos";
	$cargue="busca_lasimgs1();";
	require_once("clases/usuarios.php");
	$usir=unserialize($_SESSION["usuario_lp"]);
	include("tope.php");

	require_once("clases/conciertos.php");
	$conciertoss=new conciertos();
	$datos=$conciertoss->ultimoid();
	$ultimoid=$datos[0][0];
	
	$_SESSION["xxxid"]=$ultimoid;
	
	include("utiles/claves.php");
	$aleata = "";		
	for ($i = 1; $i <= 6; $i++) {
	    $aleata .= caracter_aleatorio();
	}	
	$_SESSION["xxxaleata"] = $aleata.".jpg";
	
	include("sub_plantillas/subp_inmu.php");		
	

			
	include("cierra.php");		
   }
  else 
   {
    echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
   }    
?>