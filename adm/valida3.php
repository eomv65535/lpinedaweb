<?php
if(isset($_COOKIE["cookie_atc"]) && !empty($_COOKIE["cookie_atc"]))
 {
  
     require_once('clases/usuarios.php');
     $user= new usuarios();		
	 $user->buscarlo3($_COOKIE["cookie_atc"]); 
	
	 if( $user->el_edo )
	  { 
		$_SESSION["usuario_lp"]=serialize($user);
		if($user->tipo<3)
			echo "<meta http-equiv='refresh' content='0;URL=misreportes.php'>";
		else	
			echo "<meta http-equiv='refresh' content='0;URL=principal.php'>";
  	  }
	 else
	 	echo "<meta http-equiv='refresh' content='0;URL=cierra_session.php'>"; 
	
 }
?>