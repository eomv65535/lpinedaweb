<?php session_start();
  if((isset($_SESSION["usuario_lp"]) && !empty($_SESSION["usuario_lp"])))
   {      
    
    if(isset($_POST["id"]) && isset($_POST["titu"]) && !empty($_POST["titu"]))
	 {
	
		$titu="Modificar Post";
		require_once("clases/usuarios.php");
		$usir=unserialize($_SESSION["usuario_lp"]);	
		include("tope.php");
		$cargue="";
		require_once('clases/blog.php');
        $conciertoss= new blog();	
		$conciertoss->cargar();
		$conciertoss->modificar();
		if($conciertoss->el_edo)
		 {
		  echo '<div class="container">
					<div class="user-data m-t-40">
					  <div class="col-md-12">
						<div id="cuerpo">
						  <div class="card-body">
				  	<div class="alert alert-success" role="alert" align="center">Post Modificado Exitosamente!!!</div><br>';
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
						  <div class="card-body"><div class="alert alert-danger" role="alert" align="center">Post No Modificado Intente Nuevamente</div><br>';
		  echo '<div align="center">
            <a class="btn btn-primary" href="blog_modificar.php?id='.$_POST["id"].'" style="text-decoration:none">Volver</a>
          </div></div></div></div></div></div>';	
		 }		
		
		
		$quien=$usir->nombres;
		
		include("cierra.php");	
	 }
	else 
		echo "<meta http-equiv='refresh' content='0;URL=blog.php?op=".$_SESSION["activeop"]."'>"; 	 
   }
  else 
   {
    echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
   }    
?>