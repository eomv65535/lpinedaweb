<?php
	require_once("clases/quotes.php");
	$quotes=new quotes();
	$datos=$quotes->consultar("","id desc");
include("idiomas/idioma_moneda.php");

	for($i=0;$i<$quotes->sql->num_rows;$i++)
	 {
?>
<div class="col-sm-12 text-center">
          <h2 class="small">“<?php echo $datos[$i]["des_".$completxt];?>”</h2>
          <p>― <?php echo $datos[$i]["titu_".$completxt];?></p>
        </div>  
<?php		 
	 }
?>
