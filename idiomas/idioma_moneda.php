<?php 
	  $sele_idioma_1=$sele_idioma_2=$testojs=$completxt="";	  
	  if(isset($_POST["idioma"]))
		 $_SESSION["xidioma"]=$_POST["idioma"];			 
	   else	
		{
		 if(!isset($_SESSION["idioma"]) || empty($_SESSION["idioma"]))
		  {
			 $_SESSION["xidioma"]=2;
			 $testojs="textos_en";
			 $img_band="uk";
			 $completxt="eng";
		  }
		} 
		
	  if($_SESSION["xidioma"]==1)
		  {
		   $_SESSION["idioma"]="es.php";
		   $testojs="textos_es";
		   $img_band="es";
		   $completxt="esp";
		  }
		 else
		  {
		   $_SESSION["idioma"]="en.php";
		   $testojs="textos_en";
		   $img_band="uk";	
		   $completxt="eng";	 
		  }	
	  include($_SESSION["idioma"]);	 			  
	  
?>