<?php
	
	 
	require_once("clases/conciertos.php");
	$conciertos=new conciertos();
	$condiciones['order_by']="fecha";
	$condiciones['start']="0";
	$condiciones['limit']="4";
	$detos=$conciertos->consultar($condiciones);

	for($i=0;$i<$conciertos->sql->num_rows;$i++)
	 {
?>

<div class="vertical-item content-absolute hover-entry-content">
  <article class="post side-item side-md content-padding with_background rounded">
    <div class="row">
      <div class="col-md-5">
        <div class="item-media top_rounded overflow_hidden"> <img src="up/conciertos/<?php echo $detos[$i]["id"].'/'.$detos[$i]["ruta_img"];?>" alt="">
          <div class="entry-meta-corner grey"> </div>
        </div>
      </div>
      <div class="col-md-7">
        <div class="item-content">
          <header class="entry-header">
            <h4 class="entry-title bottommargin_0"> <a href="<?php echo $detos[$i]["link"]?>"><?php echo $detos[$i]["titu"]?></a> </h4><br>
            <div class="entry-meta small-text text-center"> <?php echo $detos[$i]["fecha"]?> </div>
          </header>
          <p><?php echo $detos[$i]["donde"]?></p>
          <p class="topmargin_30"> <a href="<?php echo $detos[$i]["link"]?>" class="theme_button color2">[var.comprarlo]</a> </p>
        </div>
      </div>
    </div>
  </article>
</div>
<?php		 
	 }
?>
