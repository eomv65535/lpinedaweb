<?php

   require_once('clases/audios.php');
   $audios= new audios();	   
   $audios->id=$_POST["id"];
  
   
   $dir2="../up/audios/";
   
   $nomr2=$dir2.$_POST["cual"];
  if( unlink($nomr2)) 
	{
		$audios->eliminar();
	}

?>

