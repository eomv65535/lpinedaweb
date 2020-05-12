<?php

   require_once('clases/blog.php');
   $inmuebles= new blog();	   
   $inmuebles->id=$_POST["id"];
  
   $dir1="../up/blog/".$_POST["id"]."/thumbnail/";
   $dir2="../up/blog/".$_POST["id"]."/";
   $nomr1=$dir1.$_POST["cual"];
   $nomr2=$dir2.$_POST["cual"];
  if(unlink($nomr1) && unlink($nomr2)) 
	{
		$inmuebles->borra_img();
	}

?>

