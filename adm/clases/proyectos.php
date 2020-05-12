<?php
 
 require_once('database.php');
 
class proyectos{

var $id;
var $nombre;
var $descrip;
var $video;
var $link;
var $el_edo;
var $sql;

public function __construct(){
	$this->sql= new sql();
	$this->el_edo=false;
	}

function cargar(){

$this->id = isset($_POST["id"])?$_POST["id"]:$_GET["id"];
$this->nombre = isset($_POST["nombre"])?$_POST["nombre"]:'';
$this->descrip = isset($_POST["descrip"])?$_POST["descrip"]:'';
$this->video = isset($_POST["video"])?$_POST["video"]:'';
$this->link = isset($_POST["link"])?$_POST["link"]:'';
}

function agregar(){

$userData = array(
	'id' => $this->id,
	'nombre' => $this->nombre,
	'descrip' => $this->descrip,
	'video' => $this->video,
	'link'=>$this->link
);
$this->el_edo = $this->sql->insert("proyectos", $userData);
}

function modificar(){

$this->el_edo=$this->db_modificar($sql);$userData = array(
	'nombre' => $this->nombre,
	'descrip' => $this->descrip,
	'video' => $this->video,
	'link'=>$this->link
);

$condition = array('id =' => $this->id);
$this->el_edo = $this->sql->update("proyectos", $userData, $condition);
}

public function consultar($conditions=array()){
	$data = $this->sql->getRows('proyectos', $conditions);
	return $data;	
   }
   

public function buscar($cod){
	$conditions['where'] = array(
			'id = ' => $cod
		);
		
		$data = $this->sql->getRows('proyectos', $conditions);
		
		return $data;
	}

function borra_img(){

$userData = array(
	
	'video'=>''
);

$condition = array('id =' => $this->id);
$this->el_edo = $this->sql->update("proyectos", $userData, $condition);
}


function ultimoid(){
	$data = $this->sql->query('select ifnull(max(id),0)+1 from proyectos');

	if ($this->sql->num_rows >0)
return $data;
return false;
}

function eliminar(){
$this->db_conectar();
if ($this->id){
	
	$condition = array('id=' => $this->id);
    $this->el_edo = $this->sql->delete("proyectos", $condition);
}
}



}//fin de la clase proyectos
?>