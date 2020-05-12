<?php
 
 require_once('database.php');
 
class detalle_usu extends sql{

var $id_detalle;
var $id_usuarios;
var $cual;
var $el_edo;



function detalle_usu(){
$this->sql();
$this->el_edo=false;
}

function cargar(){

$this->id_detalle = isset($_POST["id_detalle"])?$_POST["id_detalle"]:$_GET["id"];
$this->id_usuarios = isset($_POST["id_usuarios"])?$_POST["id_usuarios"]:'';
$this->cual = isset($_POST["cual"])?$_POST["cual"]:'';
}

function agregar(){
$this->db_conectar();
$sql = sprintf("INSERT INTO detalle_usu (id_detalle,id_usuarios,cual) values('%s','%s','%s')",$this->id_detalle,$this->id_usuarios,$this->cual);
$this->el_edo=$this->db_insertar($sql);
}

function modificar(){
$this->db_conectar();
$sql = sprintf("UPDATE detalle_usu SET id_detalle='%s',id_usuarios='%s',cual='%s' WHERE id_detalle=%d ",$this->id_detalle,$this->id_usuarios,$this->cual,$this->id_detalle);
$this->el_edo=$this->db_modificar($sql);
}

//Realizar una consulta
function consultar($cond = "",$ord = "",$lim=""){$this->db_conectar();
$sql = "SELECT * FROM detalle_usu";
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
$data=$this->db_consulta("select * from detalle_usu where id_detalle='$cod'");
if ($this->numfilas>0)
return $data;
return false;
}

function eliminar(){
$this->db_conectar();
if ($this->id_detalle){$sql = sprintf("DELETE FROM detalle_usu WHERE id_detalle='%s'",$this->id_detalle);
$this->el_edo=$this->db_eliminar($sql);
}
}

function eliminarlos(){
$this->db_conectar();
$sql = sprintf("DELETE FROM detalle_usu WHERE id_usuarios='%s'",$this->id_usuarios);
$this->el_edo=$this->db_eliminar($sql);

}

}//fin de la clase detalle_usu
?> 