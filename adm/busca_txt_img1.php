<?php session_start();     	

	if(isset($_SESSION["xxxid"]) && !empty($_SESSION["xxxid"]) && isset($_SESSION["xxxaleata"]) && !empty($_SESSION["xxxaleata"]) && is_file('../up/conciertos/'.$_SESSION["xxxid"].'/'.$_SESSION["xxxaleata"]))
		 {
		echo '<div align="center" id="lasim1">
						<table>
							<tr>
								<td>
								<img src="../up/conciertos/'.$_SESSION["xxxid"].'/'.$_SESSION["xxxaleata"].'" alt="" style="max-width:150px"/>
								</td>
								<td><a class="btn btn-danger" style="text-decoration:none" onclick="eliminar_imgs_inmuebles('.$_SESSION["xxxid"].',\''.$_SESSION["xxxaleata"].'\');"> Eliminar</a></td>
						  </tr>
						</table>  
					</div>'; 
		 }		
	  else	
		{
				echo '<div align="center" id="lasim1"></div>
				  <div class="container"> <br>
					<span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Subir Imagen...</span>
					<input id="fileupload3" type="file" name="files[]" multiple>
					</span> <br>
					<br>
					<div id="files" class="files"></div>
					<br>
				  </div>';
					
		} 
?>
