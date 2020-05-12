<?php
require_once("clases/imgs_multi.php");		
	$imgs_multi=new imgs_multi();
	$detoscats=$imgs_multi->consultar();

	for($i=0;$i<$imgs_multi->sql->num_rows;$i++)
	 {
?>

<div class="isotope-item col-lg-4 col-md-4 col-sm-6 cat1">
  <div class="vertical-item gallery-item content-absolute text-center ds">
    <div class="item-media"> <img src="up/images/<?php echo $detoscats[$i]["ruta_img"];?>" alt="">
      <div class="media-links">
        <div class="links-wrap"> <a class="p-view prettyPhoto " title="" data-gal="prettyPhoto[gal]" href="up/images/<?php echo $detoscats[$i]["ruta_img"];?>"></a> </div>
      </div>
    </div>
  </div>
</div>
<?php
	 }
 require_once("clases/videos.php");
$vides=new videos();
$detosvid=$vides->consultar();

	for($i=0;$i<$vides->sql->num_rows;$i++)
	 {
?>
<div class="isotope-item col-lg-4 col-md-4 col-sm-6 cat2">
  <article class="vertical-item content-padding with_background rounded overflow_hidden text-center">
    <div class="item-media top_rounded overflow_hidden">
      <iframe width="420" height="230" src="<?php echo $detosvid[$i]["des"];?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>
  </article>
</div>
<?php		 
	 }
?>
<div class="isotope-item col-sm-12 cat3">
<article>
  <div class="entry-content">
    <div class="cue-playlist-container">
      <div class="cue-playlist cue-theme-default">
        <ol class="cue-tracks">
        </ol>
      </div>
      <script type="application/json" class="cue-playlist-data">
											{
												"embed_link": "",
												"permalink": "",
												"skin": "",
												"thumbnail": "",
												"tracks": [
	<?php
	
	 require_once("clases/audios.php");
$audios=new audios();
$daudios=$audios->consultar();

	for($i=0;$i<$audios->sql->num_rows;$i++)
	{
?>											
												{
													"artist": "Leonardo Pineda",
													"artworkId": 0,
													"artworkUrl": "#0",
													"audioId": 1,
													"audioUrl": "http://lpineda.com/up/audios/<?php echo $daudios[$i]["ruta_img"];?>",
													"format": "mp3",
													"length": "9:99",
													"title": "Audios",
													"order": 0,
													"mp3": "<?php echo $daudios[$i]["ruta_img"];?>",
													"meta":
													{
														"artist": "Leonardo Pineda",
														"length_formatted": "9:99"
													},
													"src": "<?php echo $daudios[$i]["ruta_img"];?>"
												}
	<?php
		if($i<$audios->sql->num_rows-1)
			echo ',';
	}
	?>											
												
												
												]
											}
										</script> 
    </div>
  </div>
</article>
</div>