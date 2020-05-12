<?php
require_once('database.php');

class audios{

	public $id;
	public $ruta_img;
	public $aleata;
	public $el_edo;
	public $sql;



public function __construct(){
	$this->sql= new sql();
	$this->el_edo=false;
	}

public function cargar(){

$this->id = isset($_POST["id"])?$_POST["id"]:$_GET["id"];
$this->ruta_img = isset($_POST["ruta_img"])?$_POST["ruta_img"]:'';
$this->aleata = isset($_POST["aleata"])?$_POST["aleata"]:'';	
}

public function agregar(){


$userData = array(
	'id' => $this->id,
	'ruta_img' => $this->ruta_img,
	'aleata'=> $this->aleata
);
$this->el_edo = $this->sql->insert("audios", $userData);
}

public function modificar(){

$userData = array(
	'ruta_img' => $this->ruta_img,
	'aleata'=> $this->aleata
);

$condition = array('id =' => $this->id);
$this->el_edo = $this->sql->update("audios", $userData, $condition);
}

//Realizar una consulta
public function consultar($conditions=array()){
	$data = $this->sql->getRows('audios', $conditions);
	return $data;	
   }
   

public function buscar($cod){
	$conditions['where'] = array(
			'id = ' => $cod
		);
		
		$data = $this->sql->getRows('audios', $conditions);
		
		return $data;
	}

public function eliminar(){

if ($this->id){
	
	$condition = array('id=' => $this->id);
    $this->el_edo = $this->sql->delete("audios", $condition);
	
	}
}

public function borra_img()
{
	$condition = array('id=' => $this->id);
    $this->el_edo = $this->sql->delete("audios", $condition);
}
	
}//fin de la clase audios
?>