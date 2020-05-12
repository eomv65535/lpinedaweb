<?php
require_once('database.php');

class modulo extends sql{

var $id_modulo;
var $nombre;
var $link;
var $el_edo;



function modulo(){
$this->sql();
$this->el_edo=false;
}

function cargar(){

$this->id_modulo = isset($_POST["id_modulo"])?$_POST["id_modulo"]:$_GET["id"];
$this->nombre = isset($_POST["nombre"])?$_POST["nombre"]:'';
$this->link = isset($_POST["link"])?$_POST["link"]:'';
}

function agregar(){
$this->db_conectar();
$sql = sprintf("INSERT INTO modulo (id_modulo,nombre,link) values('%s','%s','%s')",$this->id_modulo,$this->nombre,$this->link);
$this->el_edo=$this->db_insertar($sql);
}

function modificar(){
$this->db_conectar();
$sql = sprintf("UPDATE modulo SET id_modulo='%s',nombre='%s',link='%s' WHERE id_modulo=%d ",$this->id_modulo,$this->nombre,$this->link,$this->id_modulo);
$this->el_edo=$this->db_modificar($sql);
}

//Realizar una consulta
function consultar($cond = "",$ord = "",$lim=""){$this->db_conectar();
$sql = "SELECT * FROM modulo";
if (!empty($cond))
$sql.= " WHERE $cond";
if (!empty($ord))
$sql.= " ORDER BY $ord";
if (!empty($lim))
$sql.= " LIMIT $lim";
$data=$this->db_consulta($sql);
if ($this->numfilas>0)
return $data;
return false;
}

function buscar($cod){
$this->db_conectar();
$data=$this->db_consulta("select * from modulo where id_modulo='$cod'");
if ($this->numfilas>0)
return $data;
return false;
}

function eliminar(){
$this->db_conectar();
if ($this->id_modulo){$sql = sprintf("DELETE FROM modulo WHERE id_modulo='%s'",$this->id_modulo);
$this->el_edo=$this->db_eliminar($sql);
}
}

}//fin de la clase modulo
?>