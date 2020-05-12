<?php
require_once('database.php');

class txtabout{

var $id;
var $des_esp;
var $des_eng;
var $el_edo;
var $sql;

public function __construct(){
	$this->sql= new sql();
	$this->el_edo=false;
	}

function cargar(){

$this->id = isset($_POST["id"])?$_POST["id"]:$_GET["id"];
$this->des_esp = isset($_POST["des_esp"])?$_POST["des_esp"]:'';
$this->des_eng = isset($_POST["des_eng"])?$_POST["des_eng"]:'';
}

function agregar(){

$userData = array(
	'id' => $this->id,
	'des_esp' => $this->des_esp,
	'des_eng'=>$this->des_eng
);
$this->el_edo = $this->sql->insert("txtabout", $userData);
}

function modificar(){

$userData = array(
	'des_esp' => $this->des_esp,
	'des_eng'=>$this->des_eng
);

$condition = array('id =' => $this->id);
$this->el_edo = $this->sql->update("txtabout", $userData, $condition);
}

public function consultar($conditions=array()){
	$data = $this->sql->getRows('txtabout', $conditions);
	return $data;	
   }
   

public function buscar($cod){
	$conditions['where'] = array(
			'id = ' => $cod
		);
		
		$data = $this->sql->getRows('txtabout', $conditions);
		
		return $data;
	}

function eliminar(){
$this->db_conectar();
if ($this->id){
    $condition = array('id=' => $this->id);
    $this->el_edo = $this->sql->delete("txtabout", $condition);
}
}

}//fin de la clase txtabout
?>