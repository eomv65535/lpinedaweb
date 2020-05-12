<?php
 
 require_once('database.php');
 
class conciertos{

var $id;
var $titu;
var $fecha;
var $donde;
var $ruta_img;
var $link;
var $el_edo;
var $sql;

public function __construct(){
	$this->sql= new sql();
	$this->el_edo=false;
	}

function cargar(){

$this->id = isset($_POST["id"])?$_POST["id"]:$_GET["id"];
$this->titu = isset($_POST["titu"])?$_POST["titu"]:'';
$this->fecha = isset($_POST["fecha"])?$_POST["fecha"]:'';
$this->donde = isset($_POST["donde"])?$_POST["donde"]:'';
$this->ruta_img = isset($_POST["ruta_img"])?$_POST["ruta_img"]:'';
$this->link = isset($_POST["link"])?$_POST["link"]:'';
}

function agregar(){

$userData = array(
	'id' => $this->id,
	'titu' => $this->titu,
	'fecha'=> $this->fecha,
	'donde'=>$this->donde,
	'ruta_img'=>$this->ruta_img,
	'link'=>$this->link
);
$this->el_edo = $this->sql->insert("conciertos", $userData);
}

function modificar(){

$userData = array(
	'titu' => $this->titu,
	'fecha'=> $this->fecha,
	'donde'=>$this->donde,
	'ruta_img'=>$this->ruta_img,
	'link'=>$this->link
);

$condition = array('id =' => $this->id);
$this->el_edo = $this->sql->update("conciertos", $userData, $condition);

}

public function consultar($conditions=array()){
	$data = $this->sql->getRows('conciertos', $conditions);
	return $data;	
   }
   

public function buscar($cod){
	$conditions['where'] = array(
			'id = ' => $cod
		);
		
		$data = $this->sql->getRows('conciertos', $conditions);
		
		return $data;
	}


function borra_img(){

	$userData = array(
	
		'ruta_img'=>''
	);
	
	$condition = array('id =' => $this->id);
	$this->el_edo = $this->sql->update("conciertos", $userData, $condition);


}


function ultimoid(){

$data = $this->sql->query('select ifnull(max(id),0)+1 from conciertos');
return $data;
}

function eliminar(){

if ($this->id){
	$conditions['where'] = array(
		'id = ' => $this->id
	);
	
	$data = $this->sql->getRows('conciertos', $conditions);
	$dir1="../up/conciertos/".$this->id."/thumbnail/";
	$dir2="../up/conciertos/".$this->id."/";
	$nomr1=$dir1.$data[0]["ruta_img"];
	$nomr2=$dir2.$data[0]["ruta_img"];
	unlink($nomr1);
	unlink($nomr2); 

	$condition = array('id=' => $this->id);
    $this->el_edo = $this->sql->delete("conciertos", $condition);
}
}



}//fin de la clase conciertos
?>