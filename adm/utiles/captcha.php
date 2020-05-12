<?php
function caracter_aleatorio() {
		//mt_srand((double)microtime()*1000000);
		$valor_aleatorio = mt_rand(1,3);
		switch ($valor_aleatorio) {
  		 case 1:
			$valor_aleatorio = mt_rand(97, 122);
			break;
		 case 2:
			$valor_aleatorio = mt_rand(48, 57);
			break;
		 case 3:
			$valor_aleatorio = mt_rand(65, 90);
			break;
		}
	return chr($valor_aleatorio);
 }
 	$captcha_texto = "";		
	for ($i = 1; $i <= 6; $i++) {
	    $captcha_texto .= caracter_aleatorio();
	}	
	$_SESSION["captcha_codigo"] = $captcha_texto;

?>