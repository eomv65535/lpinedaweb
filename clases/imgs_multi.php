<?php
require_once('database.php');

class imgs_multi{

var $id;
var $ruta_img;
var $aleata;
var $el_edo;
var $sql;

public function __construct(){
	$this->sql= new sql();
	$this->el_edo=false;
	}

function cargar(){

$this->id = isset($_POST["id"])?$_POST["id"]:$_GET["id"];
$this->ruta_img = isset($_POST["ruta_img"])?$_POST["ruta_img"]:'';
$this->aleata = isset($_POST["aleata"])?$_POST["aleata"]:'';	
}

function agregar(){

$userData = array(
	'id' => $this->id,
	'ruta_img' => $this->ruta_img,
	'aleata'=>$this->aleata
);
$this->el_edo = $this->sql->insert("imgs_multi", $userData);
}

function modificar(){

$this->el_edo=$this->db_modificar($sql);$userData = array(
	'ruta_img' => $this->ruta_img
);

$condition = array('id =' => $this->id);
$this->el_edo = $this->sql->update("imgs_multi", $userData, $condition);


}

public function consultar($conditions=array()){
	$data = $this->sql->getRows('imgs_multi', $conditions);
	return $data;	
   }
   

public function buscar($cod){
	$conditions['where'] = array(
			'id = ' => $cod
		);
		
		$data = $this->sql->getRows('imgs_multi', $conditions);
		
		return $data;
	}

function eliminar(){

if ($this->id){
	$condition = array('id=' => $this->id);
    $this->el_edo = $this->sql->delete("imgs_multi", $condition);
}
}

function borra_img()
{
	$condition = array('id=' => $this->id);
    $this->el_edo = $this->sql->delete("imgs_multi", $condition);
}
	
}//fin de la clase imgs_multi
?>