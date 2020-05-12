<?php session_start();

  if((isset($_SESSION["usuario_lp"]) && !empty($_SESSION["usuario_lp"])))
   {    
    
    if(isset($_POST["titu"]) && !empty($_POST["titu"]))
	 {
	
		$titu="Agregar Post";
		$cargue="";		
		require_once("clases/usuarios.php");
		$usir=unserialize($_SESSION["usuario_lp"]);	
		include("tope.php");
		require_once('clases/blog.php');
        $conciertoss= new blog();
		$conciertoss2= new blog();				
		$detos_inm=$conciertoss2->ultimoid();
		$conciertoss->cargar();		
		$conciertoss->id=$detos_inm[0][0];
		$conciertoss->agregar();
		if($conciertoss->el_edo)
		 {
			echo '<div class="container">
					<div class="user-data m-t-40">
					  <div class="col-md-12">
						<div id="cuerpo">
						  <div class="card-body">
				  	<div class="alert alert-success" role="alert" align="center">Post Guardado Exitosamente!!!</div><br>';
		  echo '<div align="center">
            <a class="btn btn-primary" href="blog.php" style="text-decoration:none">Ver Post</a>
          </div></div></div></div></div></div>';
			
		 }
		else 
		 {
		  echo '<div class="container">
					<div class="user-data m-t-40">
					  <div class="col-md-12">
						<div id="cuerpo">
						  <div class="card-body"><div class="alert alert-danger" role="alert" align="center">Post No Guardado Intente Nuevamente</div><br>';
		  echo '<div align="center">
            <a class="btn btn-primary" href="blog_agregar.php" style="text-decoration:none">Volver</a>
          </div></div></div></div></div></div>';
		 }		  		
		$quien=$usir->nombres;
			
		include("cierra.php");		
	 }
	else 
		echo "<meta http-equiv='refresh' content='0;URL=blog.php'>"; 	 
   }
  else 
   {
    echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
   }    
?>