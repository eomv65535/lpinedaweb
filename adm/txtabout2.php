<?php session_start();
  	
  if((isset($_SESSION["usuario_lp"]) && !empty($_SESSION["usuario_lp"])))
   {     
    require_once("clases/usuarios.php");
   	$usir=unserialize($_SESSION["usuario_lp"]);
	  
    if(isset($_POST["des_esp"]) && !empty($_POST["des_esp"]) && isset($_POST["des_eng"]) && !empty($_POST["des_eng"]))
	 {
	
		$titu="Modificar Texto del Acerca";
		$cargue="";		
			
		include("tope.php");
		require_once('clases/txtabout.php');
        $txtabout= new txtabout();		
		$txtabout->cargar();
		$txtabout->modificar();
		if($txtabout->el_edo)
		 {
		  echo '<div class="container">
					<div class="user-data m-t-40">
					  <div class="col-md-12">
						<div id="cuerpo">
						  <div class="card-body">
				  	<div class="alert alert-success" role="alert" align="center">Texto del Acerca Modificado Exitosamente!!!</div><br>';
		  echo '<div align="center">
            <a class="btn btn-primary" href="txtabout.php" style="text-decoration:none">Volver</a>
         </div></div></div></div></div></div>';	
		 }
		else 
		 {		  
		   echo '<div class="container">
					<div class="user-data m-t-40">
					  <div class="col-md-12">
						<div id="cuerpo">
						  <div class="card-body"><div class="alert alert-danger" role="alert" align="center">Texto del Acerca No Modificado Intente Nuevamente</div><br>';
		  echo '<div align="center">
            <a class="btn btn-primary" href="txtabout.php" style="text-decoration:none">Volver</a>
          </div></div></div></div></div></div>';	
		 }		
		
		$quien=$usir->nombres;
				
		include("cierra.php");		
	 }
	else 
		echo "<meta http-equiv='refresh' content='0;URL=txtabout.php'>"; 	 
   }
  else 
   {
    echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
   }    
 
?>