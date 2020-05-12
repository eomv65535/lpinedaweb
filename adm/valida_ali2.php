<?php 
    require_once("clases/usuarios.php");
	$usuario=new usuarios();
	$res=$usuario->validalo2($_POST["u"],$_POST["id"]);
	if($res)
	 echo "1";
	else
	 echo "0";
   
?>