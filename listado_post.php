<?php
	require_once("clases/blog.php");
	$blog=new blog();
	$detos=$blog->consultar("","id desc");
include("idiomas/idioma_moneda.php");

	for($i=0;$i<$blog->sql->num_rows;$i++)
	 {
?>
<article class="vertical-item content-padding with_background rounded text-center offset_button">
            <div class="item-media top_rounded overflow_hidden"> <img src="up/blog/<?php echo $detos[$i]["id"].'/'.$detos[$i]["ruta_img"];?>" alt="">
              <div class="media-links"> <a href="<?php echo $detos[$i]["link"]?>" target="_blank" class="abs-link"></a> </div>
            </div>
            <div class="item-content">
              <header class="entry-header">
                <div class="entry-meta small-text content-justify"> <span class="greylinks"> <a href="single_post1.php">
                  <time datetime="2017-10-03T08:50:40+00:00"><?php echo $detos[$i]["fecha"]?> </time>
                  </a> </span> </div>
                <h4 class="entry-title" style="color:#710201"> <a href="<?php echo $detos[$i]["link"]?>" target="_blank"><?php echo $detos[$i]["titu"]?></a> </h4>
              </header>
              <div class="entry-content">
                <p class="content-3lines-ellipsis"><?php echo $detos[$i]["descrip"]?></p>
                <span class="button_wrap"> <a href="<?php echo $detos[$i]["link"]?>" target="_blank" class="theme_button color1">[var.leemas]</a> </span> </div>
            </div>
          </article>

<?php		 
	 }
?>
