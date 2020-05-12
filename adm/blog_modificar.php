<?php session_start();

  if((isset($_SESSION["usuario_lp"]) && !empty($_SESSION["usuario_lp"])))
   {    
    
	$titu="Concierto";
	require_once("clases/usuarios.php");
	$usir=unserialize($_SESSION["usuario_lp"]);

	require_once("clases/blog.php");
	$conciertoss=new blog();
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
	$descrip=$datos[0]["descrip"];
	$link=$datos[0]["link"];
	
	$cargue="busca_lasimgs1lp();";
	include("tope.php");
	include("sub_plantillas/subp_blog2.php"); 
	
		
	$quien=$usir->nombres;	
	include("cierra.php");		
   }
  else 
   {
    echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
   }    

?>