<?php 

if(!isset($_SESSION["usuario_lp"]) || empty($_SESSION["usuario_lp"]))	  
	echo "<meta http-equiv='refresh' content='0;URL=cierra_session.php'>";


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title>Leonardo Pineda - <?php echo $titu;?></title>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- Ionicons -->
<link href="https://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
<?php include ("SVU-scripts-comunes2.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>

<body class="" onload="<?php echo $cargue;?>">
<?php include ("SVG-header.php")?>
<div class="page-wrapper">
  <div id="contenido"> 
    
    <!-- centro  *******************************************************  -->
    <div id="contenido">  
      
      <!-- Este es el menu del usuario registrado -->
      <?php include ("SVG-menu-usuario.php");?>