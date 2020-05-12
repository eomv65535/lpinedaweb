<?php session_start();     
	require_once("clases/imgfondvideo.php");		
	$imgfondvideo=new imgfondvideo();
	$dimgfondvideo=$imgfondvideo->consultar();

		echo '<h4>Imagen Actual</h4>';
			
		 	$ruta='../up/imgfondvideo/'.$dimgfondvideo[0]["ruta"];
				
					echo ' <a data-fancybox="gallery" href="'.$ruta.'" class="foto">
					<img src="'.$ruta.'" width="500" /> </a>'; 
		
		
?>
