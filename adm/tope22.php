<?php 

if(!isset($_SESSION["usuario_lp"]) || empty($_SESSION["usuario_lp"]))	  
	echo "<meta http-equiv='refresh' content='0;URL=cierra_session.php'>";

	require_once("clases/usuarios.php");
   	$usir=unserialize($_SESSION["usuario_lp"]);

?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Leonardo Pineda - <?php echo $titu;?></title>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- Ionicons -->
<link href="https://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
<?php include ("header22.php")?>


</head>
<body class="" onload="<?php echo $cargue;?>">
	<div class="page-wrapper">
		<div id="contenido"> 
		<?php include ("SVG-menu-usuario.php");?>
