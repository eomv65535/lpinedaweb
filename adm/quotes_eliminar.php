<?php session_start();
  
  if((isset($_SESSION["usuario_lp"]) && !empty($_SESSION["usuario_lp"])) )
   {    
    
	$titu="Eliminar Quotes";	
 	$cargue="";
	
	require_once("clases/usuarios.php");
	$usir=unserialize($_SESSION["usuario_lp"]);	
	
	include("tope.php");
	
	require_once("clases/quotes.php");
	$quotes=new quotes();
	$datos=$quotes->buscar($_GET["id"]);
	$id_tipoi=$datos[0]["id"];
	$nombre=$datos[0]["titu_esp"];
	$menr="Seguro de eliminar el Quote: '".$nombre."'?";

	$eliminalo="quotes_eliminar2.php?id=".$_GET["id"];
		
		echo '<div class="container">
			<div class="user-data m-t-40">
			  <div class="col-md-12">
				<div id="cuerpo">
				  <div class="card-body">
				  	<div class="alert alert-info" role="alert" align="center">'.$menr."</div><br>";
	echo '<div align="center"><a class="btn btn-primary" style="text-decoration:none" href="'.$eliminalo.'">Eliminar</a>
      					<a href="quotes.php" class="btn btn-danger" style="text-decoration:none">Cancelar</a>
		 </div></div></div></div></div></div>';
	
	$quien=$usir->nombres;	
	include("cierra.php");	
   }
  else 
   {
    echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
   }    
?>