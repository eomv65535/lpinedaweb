<?php
if(isset($_POST["email"]) && isset($_POST["pass"]) && !empty($_POST["email"]) && !empty($_POST["pass"])) 
 {
  
     require_once('clases/usuarios.php');
     $user= new usuarios();		
	 $user->buscarlo($_POST["email"],$_POST["pass"]); 
	print_r($user);
	 unset($_POST["email"]);
	 unset($_POST["pass"]);
	 if( !$user->el_edo )
	  {
	   echo '<script>swal("ERROR!!!", "Usuario o Clave Invalido", "error");</script>';
	  }
	 else
	  { 
		$_SESSION["usuario_lp"]=serialize($user);
		echo "<meta http-equiv='refresh' content='0;URL=principal.php'>";
  	  }
	
 }
?>