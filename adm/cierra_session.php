<?php session_start ();
setcookie("cookie_atc","",time()-3600);
unset($_COOKIE['cookie_atc']);
?>
<script language="JavaScript">
//bloquea el boton derecho del mouse
function evitarmenu() {
	return false
}
 document.oncontextmenu =evitarmenu
</script>

<?php

   if (isset($_SESSION["usuario_lp"]))
    {
		session_unset();		
		session_destroy();
		
		echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
	}
  else
	  echo "<meta http-equiv='refresh' content='0;URL=index.php'>";	
?>

