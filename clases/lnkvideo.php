<?php
require_once('database.php');

class lnkvideo{

var $id;
var $des;
var $el_edo;
var $sql;

public function __construct(){
	$this->sql= new sql();
	$this->el_edo=false;
	}

function cargar(){

$this->id = isset($_POST["id"])?$_POST["id"]:$_GET["id"];
$this->des = isset($_POST["des"])?$_POST["des"]:'';
}

function agregar(){

$userData = array(
	'id' => $this->id,
	'des' => $this->des
);
$this->el_edo = $this->sql->insert("lnkvideo", $userData);
}

function modificar(){


	$userData = array(
	'des' => $this->des
);

$condition = array('id =' => $this->id);
$this->el_edo = $this->sql->update("lnkvideo", $userData, $condition);
}

public function consultar($conditions=array()){
	$data = $this->sql->getRows('lnkvideo', $conditions);
	return $data;	
   }
   

public function buscar($cod){
	$conditions['where'] = array(
			'id = ' => $cod
		);
		
		$data = $this->sql->getRows('lnkvideo', $conditions);
		
		return $data;
	}

function eliminar(){
$this->db_conectar();
if ($this->id){
    $condition = array('id=' => $this->id);
    $this->el_edo = $this->sql->delete("lnkvideo", $condition);
}
}

}//fin de la clase lnkvideo
?>