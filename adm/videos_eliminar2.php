<?php session_start();
  	
  if((isset($_SESSION["usuario_lp"]) && !empty($_SESSION["usuario_lp"])) )
   {   
    
	require_once("clases/usuarios.php");
	$usir=unserialize($_SESSION["usuario_lp"]);	
	if(isset($_GET["id"]) && !empty($_GET["id"]))
	 {
	
		$titu="Eliminar Videos";
		include("tope.php");
		$cargue="";
		require_once('clases/videos.php');
        $videos= new videos();		
		$videos->cargar();
		$videos->eliminar();
		if($videos->el_edo)
		 {
		  echo '<div class="container">
					<div class="user-data m-t-40">
					  <div class="col-md-12">
						<div id="cuerpo">
						  <div class="card-body">
				  	<div class="alert alert-success" role="alert" align="center">Video Eliminado Exitosamente!!!</div><br>';
		  echo '<div align="center">
            <a class="btn btn-primary" href="videos.php" style="text-decoration:none">Ver videos</a>
          </div></div></div></div></div></div>';
		 }
		else 
		 {

		   echo '<div class="container">
					<div class="user-data m-t-40">
					  <div class="col-md-12">
						<div id="cuerpo">
						  <div class="card-body"><div class="alert alert-danger" role="alert" align="center">Video No Eliminado Intente Nuevamente</div><br>';
		   echo '<div align="center">
            <a class="btn btn-primary" href="videos.php" style="text-decoration:none">Volver</a>
          </div></div></div></div></div></div>';
		 }
		  		
		
		$quien=$usir->nombres;
			
		include("cierra.php");		
	 }
	else 
		echo "<meta http-equiv='refresh' content='0;URL=videos.php'>"; 	 
   }
  else 
   {
    echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
   }    

?>