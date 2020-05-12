<?php session_start();
  	
  if((isset($_SESSION["usuario_lp"]) && !empty($_SESSION["usuario_lp"])) )
   {    
    
    if(isset($_POST["nombre"]) && !empty($_POST["nombre"]))
	 {
	
		$titu="Agregar Proyectos";
		$cargue="";		
		require_once("clases/usuarios.php");
		$usir=unserialize($_SESSION["usuario_lp"]);	
		include("tope.php");
		require_once('clases/proyectos.php');
        $proyectos= new proyectos();				
		$proyectos->cargar();
		
		$proyectos->agregar();
		if($proyectos->el_edo)
		 {
		  echo '<div class="container">
					<div class="user-data m-t-40">
					  <div class="col-md-12">
						<div id="cuerpo">
						  <div class="card-body">
				  	<div class="alert alert-success" role="alert" align="center">Proyecto Guardado Exitosamente!!!</div><br>';
		  echo '<div align="center">
            <a class="btn btn-primary" href="proyectos.php" style="text-decoration:none">Ver Proyectos</a>
          </div></div></div></div></div></div>';	
		 }
		else 
		 {
		  echo '<div class="container">
					<div class="user-data m-t-40">
					  <div class="col-md-12">
						<div id="cuerpo">
						  <div class="card-body"><div class="alert alert-danger" role="alert" align="center">Proyectos No Guardado Intente Nuevamente</div><br>';
		  echo '<div align="center">
            <a class="btn btn-primary" href="proyectos_agregar.php" style="text-decoration:none">Volver</a>
          </div></div></div></div></div></div>';	
		 }		  		
		
		$quien=$usir->nombres;
			
		include("cierra.php");				
	 }
	else 
		echo "<meta http-equiv='refresh' content='0;URL=proyectos.php'>"; 	 
   }
  else 
   {
    echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
   }     
?>