<?php

   require_once('clases/imgs_multi.php');
   $imgs_multi= new imgs_multi();	   
   $imgs_multi->id=$_POST["id"];
  
   $dir1="../up/images/thumbnail/";
   $dir2="../up/images/";
   $nomr1=$dir1.$_POST["cual"];
   $nomr2=$dir2.$_POST["cual"];
  if(unlink($nomr1) && unlink($nomr2)) 
	{
		$imgs_multi->eliminar();
	}

?>

