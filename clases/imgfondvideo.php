<?php
require_once('database.php');

class imgfondvideo{

var $id;
var $ruta;
var $el_edo;
var $sql;

public function __construct(){
	$this->sql= new sql();
	$this->el_edo=false;
	}

function cargar(){

$this->id = isset($_POST["id"])?$_POST["id"]:$_GET["id"];
$this->ruta = isset($_POST["ruta"])?$_POST["ruta"]:'';
}

function agregar(){

$userData = array(
	'id' => $this->id,
	'ruta' => $this->ruta
);
$this->el_edo = $this->sql->insert("imgfondvideo", $userData);
}

function modificar(){
$userData = array(
	'ruta' => $this->ruta
);

$condition = array('id =' => $this->id);
$this->el_edo = $this->sql->update("imgfondvideo", $userData, $condition);
}

public function consultar($conditions=array()){
	$data = $this->sql->getRows('imgfondvideo', $conditions);
	return $data;	
   }
   

public function buscar($cod){
	$conditions['where'] = array(
			'id = ' => $cod
		);
		
		$data = $this->sql->getRows('imgfondvideo', $conditions);
		
		return $data;
	}

function eliminar(){
$this->db_conectar();
if ($this->id){
	$condition = array('id=' => $this->id);
    $this->el_edo = $this->sql->delete("imgfondvideo", $condition);
}
}

function borralo($ruta)
{
	$data = $this->sql->getRows('imgfondvideo');
	@unlink($ruta.$data[0]["ruta"]);
	$condition = array('id=' => $data[0]["id"]);
    $this->el_edo = $this->sql->delete("imgfondvideo", $condition);
}
	
}//fin de la clase imgfondvideo
?>