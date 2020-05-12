<?php
require_once('database.php');

class opciones extends sql{

var $id_opcion;
var $id_modulo;
var $nombre;
var $link;
var $el_edo;



function opciones(){
$this->sql();
$this->el_edo=false;
}

function cargar(){

$this->id_opcion = isset($_POST["id_opcion"])?$_POST["id_opcion"]:$_GET["id"];
$this->id_modulo = isset($_POST["id_modulo"])?$_POST["id_modulo"]:'';
$this->nombre = isset($_POST["nombre"])?$_POST["nombre"]:'';
$this->link = isset($_POST["link"])?$_POST["link"]:'';
}

function agregar(){
$this->db_conectar();
$sql="select max(id_opcion)+1 from opciones";
$res=$this->db_consulta($sql);
$sql = sprintf("INSERT INTO opciones (id_opcion,id_modulo,nombre,link) values('%s','%s','%s','%s')",$res[0][0],$this->id_modulo,$this->nombre,$this->link);
$this->el_edo=$this->db_insertar($sql);
$sql="insert into acceso select 0,id_perfil,".$res[0][0].",0 from perfiles";
$this->db_query($sql);
}

function modificar(){
$this->db_conectar();
$sql = sprintf("UPDATE opciones SET id_opcion='%s',id_modulo='%s',nombre='%s',link='%s' WHERE id_opcion=%d ",$this->id_opcion,$this->id_modulo,$this->nombre,$this->link,$this->id_opcion);
$this->el_edo=$this->db_modificar($sql);
}

//Realizar una consulta
function consultar($cond = "",$ord = "",$lim=""){$this->db_conectar();
$sql = "SELECT * FROM opciones";
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
$data=$this->db_consulta("select * from opciones where id_opcion='$cod'");
if ($this->numfilas>0)
return $data;
return false;
}

function eliminar(){
$this->db_conectar();
if ($this->id_opcion){
	$sql = sprintf("DELETE FROM acceso WHERE id_opcion='%s'",$this->id_opcion);
	$this->el_edo=$this->db_eliminar($sql);
	$sql = sprintf("DELETE FROM opciones WHERE id_opcion='%s'",$this->id_opcion);
	$this->el_edo=$this->db_eliminar($sql);
}
}

}//fin de la clase opciones
?>