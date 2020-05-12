<?php session_start();     
	require_once("clases/bannerppal.php");		
	$bannerppal=new bannerppal();
	$dbannerppal=$bannerppal->consultar();

		echo '<h4>Imagen Actual</h4>';
			
		 	$ruta='../up/bannerppal/'.$dbannerppal[0]["ruta"];
				
					echo ' <a data-fancybox="gallery" href="'.$ruta.'" class="foto">
					<img src="'.$ruta.'" width="500" /> </a>'; 
		
		
?>
