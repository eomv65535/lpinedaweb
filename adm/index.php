<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Leonardo Pineda | Inicio</title>
<?php include ("header.php");
if((isset($_SESSION["usuario_lp"]) && !empty($_SESSION["usuario_lp"]))) 
	echo "<meta http-equiv='refresh' content='0;URL=principal.php'>";
?>
</head>
<body class="">
<div class="page-wrapper">
  <div class="page-content--bge5">
    <div class="container">
      <div class="login-wrap">
        <div class="login-content">
          <div class="login-logo"> <a href="index.php"> <img src="../images/firma.png" width="150"> </a> </div>
          <div class="login-form">
            <form action="index.php" name="formi" id="formi" method="post" onsubmit="return valida_login();">
              <div class="form-group">
                <label>Email</label>
                <input class="au-input au-input--full" type="email" name="email" id="email" placeholder="Email">
              </div>
              <div class="form-group">
                <label>Contraseña</label>
                <input class="au-input au-input--full" type="password" name="pass" id="pass" placeholder="Contraseña">
              </div>             
              <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Acceder</button>
            </form>
          
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php 

include ("footer.php");	  
if(isset($_POST["email"]) && isset($_POST["pass"]) && !empty($_POST["email"]) && !empty($_POST["pass"]))
	  require_once("valida.php");
?>
</body>
</html>