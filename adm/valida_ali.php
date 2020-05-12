<?php 
    require_once("clases/usuarios.php");
	$usuario=new usuarios();
	$res=$usuario->validalo($_POST["u"]);
	if($res)
	 echo "1";
	else
	 echo "0";
   
?>