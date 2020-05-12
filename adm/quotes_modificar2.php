<?php session_start();
  	
  if((isset($_SESSION["usuario_lp"]) && !empty($_SESSION["usuario_lp"])))
   {     
    
    if(isset($_POST["titu_esp"]) && !empty($_POST["titu_esp"]) && isset($_POST["titu_eng"]) && !empty($_POST["titu_eng"]))
	 {
	
		$titu="Modificar Quotes";
		$cargue="";		
		require_once("clases/usuarios.php");
		$usir=unserialize($_SESSION["usuario_lp"]);	
		include("tope.php");
		require_once('clases/quotes.php');
        $quotes= new quotes();		
		$quotes->cargar();
		$quotes->modificar();
		if($quotes->el_edo)
		 {
		  echo '<div class="container">
					<div class="user-data m-t-40">
					  <div class="col-md-12">
						<div id="cuerpo">
						  <div class="card-body">
				  	<div class="alert alert-success" role="alert" align="center">Quote Modificada Exitosamente!!!</div><br>';
		  echo '<div align="center">
            <a class="btn btn-primary" href="quotes.php" style="text-decoration:none">Ver Quotes</a>
         </div></div></div></div></div></div>';	
		 }
		else 
		 {		  
		   echo '<div class="container">
					<div class="user-data m-t-40">
					  <div class="col-md-12">
						<div id="cuerpo">
						  <div class="card-body"><div class="alert alert-danger" role="alert" align="center">Quote No Modificada Intente Nuevamente</div><br>';
		  echo '<div align="center">
            <a class="btn btn-primary" href="quotes_modificar.php?id='.$_POST["id"].'" style="text-decoration:none">Volver</a>
          </div></div></div></div></div></div>';	
		 }		
		
		$quien=$usir->nombres;
			
		include("cierra.php");		
	 }
	else 
		echo "<meta http-equiv='refresh' content='0;URL=quotes.php'>"; 	 
   }
  else 
   {
    echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
   }    
 
?>