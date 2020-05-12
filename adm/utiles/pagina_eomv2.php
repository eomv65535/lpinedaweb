<?php session_start();

function escapeJsonString($value) { # list from www.json.org: (\b backspace, \f formfeed)
    $escapers = array("\\", "/", "\"", "\n", "\r", "\t", "\x08", "\x0c");
    $replacements = array("\\\\", "\\/", "\\\"", "\\n", "\\r", "\\t", "\\f", "\\b");
    $result = str_replace($escapers, $replacements, $value);
    return $result;
}

require_once("../clases/database.php");
	
	$bd=new sql();
	
	$data=$bd->query($_SESSION["laconsultica"]);	
	$tabla="";
	 for($i=0;$i<$bd->num_rows;$i++)
	{		
	$editar =$eliminar =$consultar = "";
		
		if($_SESSION["si_cons"]==1)
			$consultar = '<a style=\"padding: 2px 5px;\" href=\"'.$_SESSION["gen"].'.php?search='.$data[$i][$_SESSION["ncol"]].'\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Consultar\" class=\"btn btn-sm btn-outline-info\"><i class=\"fa fa-search\" aria-hidden=\"true\"></i></a>';
		$tabla.='[';
		for($j=0;$j<$_SESSION["ncol"];$j++)
		  {
			if($_SESSION["si_cons"]==1)
			 {				
				$tabla.= '"<a href=\"'.$_SESSION["gen"].'.php?search='.$data[$i][$_SESSION["ncol"]].'\" style=\"text-decoration:none;color: #333;\">'.escapeJsonString(utf8_decode($data[$i][$j])).'</a>"';  
			 }
			else	
				$tabla.='"'.escapeJsonString(utf8_decode($data[$i][$j])).'"';
			if($j<$_SESSION["ncol"]-1)
				$tabla.=',';			
		  }
		if($_SESSION["si_cons"]==1)  
			$tabla.=',"'.$consultar.'"';
		$tabla.='],';		
	}	

	//eliminamos la coma que sobra
	$tabla = substr($tabla,0, strlen($tabla) - 1);

	echo '{"data":['.$tabla.']}';	

?>