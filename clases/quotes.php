<?php
require_once('database.php');

class quotes{

var $id;
var $titu_esp;
var $titu_eng;
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
$this->titu_esp = isset($_POST["titu_esp"])?$_POST["titu_esp"]:'';
$this->titu_eng = isset($_POST["titu_eng"])?$_POST["titu_eng"]:'';
$this->des_esp = isset($_POST["des_esp"])?$_POST["des_esp"]:'';
$this->des_eng = isset($_POST["des_eng"])?$_POST["des_eng"]:'';	
}

function agregar(){


$userData = array(
	'id' => $this->id,
	'titu_esp' => $this->titu_esp,
	'titu_eng' => $this->titu_eng,
	'des_esp' => $this->des_esp,
	'des_eng'=>$this->des_eng
);
$this->el_edo = $this->sql->insert("quotes", $userData);
}

function modificar(){

$userData = array(
	'titu_esp' => $this->titu_esp,
	'titu_eng' => $this->titu_eng,
	'des_esp' => $this->des_esp,
	'des_eng'=>$this->des_eng
);

$condition = array('id =' => $this->id);
$this->el_edo = $this->sql->update("quotes", $userData, $condition);
}

public function consultar($conditions=array()){
	$data = $this->sql->getRows('quotes', $conditions);
	return $data;	
   }
   

public function buscar($cod){
	$conditions['where'] = array(
			'id = ' => $cod
		);
		
		$data = $this->sql->getRows('quotes', $conditions);
		
		return $data;
	}

function eliminar(){
$this->db_conectar();
if ($this->id){
    $condition = array('id=' => $this->id);
    $this->el_edo = $this->sql->delete("quotes", $condition);
}
}

}//fin de la clase quotes
?>