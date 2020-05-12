<?php session_start();

$captcha_imagen = imagecreate(150,30);
$Img = imagecreate(80,15);
$color_negro = imagecolorallocate ($captcha_imagen, 0, 0, 0);
$color_blanco = imagecolorallocate ($captcha_imagen, 255, 255, 255);
$color_azul = imagecolorallocate ($captcha_imagen, 0, 131, 204); //aqui
$rojo = imagecolorallocate($captcha_imagen,190,192,192);
imagefill($captcha_imagen, 0, 0, $color_blanco);

$captcha_texto = $_SESSION["captcha_codigo"];
$fuente=imageloadfont("../fuentes/Comic.gdf");
$x1 = 0;
$y1 = 0;
$x2 = 10;
$y2 = 30;
for($i=0;$i<30;$i++){
	imageline($captcha_imagen,$x1,$y1,$x1,$y2,$rojo);
	$x1 = $x1 + 5;
}
$x1 = 0;
$y1 = 5;
$x2 = 150;
$y2 = 5;
for($i=0;$i<4;$i++){
	imageline($captcha_imagen,$x1,$y1,$x2,$y1,$rojo);
	$y1 = $y1 + 5;
}

imagestring($captcha_imagen, $fuente, 10, 3,$captcha_texto, $color_azul);
header("Content-type: image/jpeg");
imagejpeg($captcha_imagen);
?>