<?php session_start();

  if((isset($_SESSION["usuario_lp"]) && !empty($_SESSION["usuario_lp"])))
   {    
    
	$titu="Concierto";
	require_once("clases/usuarios.php");
	$usir=unserialize($_SESSION["usuario_lp"]);

	require_once("clases/conciertos.php");
	$conciertoss=new conciertos();
	$datos=$conciertoss->buscar($_GET["id"]);
	
	$elpk=$datos[0][0];	
	
	$_SESSION["xxxid"]=$_GET["id"];
	if(empty($datos[0]["ruta_img"]))
	 {
		include("utiles/claves.php");
		$aleata = "";		
		for ($i = 1; $i <= 6; $i++) {
			$aleata .= caracter_aleatorio();
		}	
		$_SESSION["xxxaleata"] = $aleata.".jpg"; 
	 }
	else 
		$_SESSION["xxxaleata"] = $datos[0]["ruta_img"]; 

	$ruta_img=$_SESSION["xxxaleata"];	

	$titu=$datos[0]["titu"];
	$fecha=$datos[0]["fecha"];
	$donde=$datos[0]["donde"];
	$link=$datos[0]["link"];
	
	$cargue="busca_lasimgs1();";
	include("tope.php");
	include("sub_plantillas/subp_inmu2.php"); 
	
	require_once("clases/usuarios.php");
	$usir=unserialize($_SESSION["usuario_lp"]);	
	
	include("cierra.php");		
   }
  else 
   {
    echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
   }    

?>