<?php session_start();     
	require_once("clases/audios.php");		
	$audios=new audios();
	$detoscats=$audios->consultar();

		echo '<h4>Audios ya Cargados</h4>';
		for($i=0;$i<$audios->sql->num_rows;$i++)
		 {			
		 	$ruta='../up/audios/'.$detoscats[$i]["ruta_img"];

			$trozos = explode(".", $detoscats[$i]["ruta_img"]); 

			if($trozos[1]=="mp4")
				$ruta="img/video.jpg";
			if($trozos[1]=="mp3")
				$ruta="img/audio.jpg";
				
					echo '<div class="foto"> <a data-fancybox="gallery" href="../up/audios/'.$detoscats[$i]["ruta_img"].'" >
					<img src="'.$ruta.'" /> </a><br><a onclick="eliminar_imgs_a('.$detoscats[$i]["id"].',\''.$detoscats[$i]["ruta_img"].'\')" style="padding: 2px 5px;" 
				data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-md btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</a></div>'; 
		} 
		
?>