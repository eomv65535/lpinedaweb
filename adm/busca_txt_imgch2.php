<?php session_start();     
	require_once("clases/imgs_multi.php");		
	$imgs_multi=new imgs_multi();
	$detoscats=$imgs_multi->consultar();

		echo '<h4>Imagenes ya cargadas</h4>';
		for($i=0;$i<$imgs_multi->sql->num_rows;$i++)
		 {			
		 	$ruta='../up/images/'.$detoscats[$i]["ruta_img"];

			$trozos = explode(".", $detoscats[$i]["ruta_img"]); 

			if($trozos[1]=="mp4")
				$ruta="img/video.jpg";
			if($trozos[1]=="mp3")
				$ruta="img/audio.jpg";
				
					echo '<div class="foto"> <a data-fancybox="gallery" href="../up/images/'.$detoscats[$i]["ruta_img"].'" >
					<img src="'.$ruta.'" /> </a><br><a onclick="eliminar_imgs_2('.$detoscats[$i]["id"].',\''.$detoscats[$i]["ruta_img"].'\')" style="padding: 2px 5px;" 
				data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-md btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</a></div>'; 
		} 
		
?>