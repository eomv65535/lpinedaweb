<?php session_start();     
	require_once("clases/imgabout.php");		
	$imgabout=new imgabout();
	$dimgabout=$imgabout->consultar();

		echo '<h4>Imagen Actual</h4>';
			
		 	$ruta='../up/imgabout/'.$dimgabout[0]["ruta"];
				
					echo ' <a data-fancybox="gallery" href="'.$ruta.'" class="foto">
					<img src="'.$ruta.'" width="500" /> </a>'; 
		
		
?>
