<?php
require_once('database.php');

class bannerppal{

public $id;
public $ruta;
public $el_edo;
public $sql;


public function __construct(){
$this->sql= new sql();
$this->el_edo=false;
}


public function cargar(){

$this->id = isset($_POST["id"])?$_POST["id"]:$_GET["id"];
$this->ruta = isset($_POST["ruta"])?$_POST["ruta"]:'';
}

public function agregar(){

	$userData = array(
                 'id' => $this->id,
				 'ruta' => $this->ruta
            );
	$this->el_edo = $this->sql->insert("bannerppal", $userData);
}

public function modificar(){

	$userData = array(
				 'ruta' => $this->ruta
            );


	$condition = array('id =' => $this->id);
	$this->el_edo = $this->sql->update("bannerppal", $userData, $condition);
}

//Realizar una consulta
public function consultar($conditions=array()){
 $data = $this->sql->getRows('bannerppal', $conditions);												return $data;	
}

public function buscar($cod){
$conditions['where'] = array(
        'id = ' => $cod
    );
    
    $data = $this->sql->getRows('bannerppal', $conditions);
	
	return $data;
}

public function eliminar(){
	
	if ($this->id){
	
	$condition = array('id=' => $this->id);
    $this->el_edo = $this->sql->delete("bannerppal", $condition);
	
	}

}
	
public function borralo($ruta)
{
	
	$data = $this->sql->getRows('bannerppal');
	@unlink($ruta.$data[0]["ruta"]);

	$condition = array('id=' => $data[0]["id"]);
	$this->el_edo = $this->sql->delete("bannerppal", $condition);
}
	
}//fin de la clase bannerppal
?>