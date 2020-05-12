<?php
 
 require_once('database.php');
 
class usuarios{

public $id_usuario;
public $email;
public $nombres;
public $clave;
public $el_edo;
public $sql;


public function __construct(){
$this->sql= new sql();
$this->el_edo=false;
}

public function cargar(){

$this->id_usuario = isset($_POST["id_usuario"])?$_POST["id_usuario"]:$_GET["id"];
$this->email = isset($_POST["email"])?$_POST["email"]:'';
$this->nombres = isset($_POST["nombres"])?$_POST["nombres"]:'';
$this->clave = isset($_POST["clave"])?$_POST["clave"]:'';
}

public function agregar(){

$clave_crypt=hash('sha512', trim($this->clave));
$this->clave=$clave_crypt;
 $userData = array(
                 'id_usuario' => $this->id_usuario,
                 'email' => $this->email,
				 'nombres' => $this->nombres,
				 'clave' => $this->clave
            );
$this->el_edo = $this->sql->insert("usuario", $userData);

}

public function modificar(){
if($this->clave!="")
 {
	$clave_crypt=hash('sha512', trim($this->clave));
	$this->clave=$clave_crypt;
	$cookies=hash('sha512', trim($this->email));

 	$userData = array(
                 'email' => $this->email,
				 'nombres' => $this->nombres,
				 'clave' => $this->clave
            );
 }
else
 {
	$cookies=hash('sha512', trim($this->email));
	$userData = array(
                 'email' => $this->email,
				 'nombres' => $this->nombres,
				 'clave' => $this->clave
            );
 } 

	$condition = array('id_usuario =' => $this->id_usuario);
	$this->el_edo = $this->sql->update("usuario", $userData, $condition);

}

//Realizar una consulta
public function consultar($conditions=array()){
    
    $data = $this->sql->getRows('usuario', $conditions);												return $data;	
}

public function buscar($cod){
	
 $conditions['where'] = array(
        'id_usuario = ' => $cod
    );
    
    $data = $this->sql->getRows('usuario', $conditions);
	
	return $data;
	
}

public function buscarlo($email, $pass){
	  
	$clave_crypt=hash('sha512', trim($pass));
	  
	
	$conditions['where'] = array(
        'email = ' => $email,
		' and clave = ' => $clave_crypt
    );
   
    $resul = $this->sql->getRows('usuario', $conditions);
	    
      if($this->sql->num_rows==0)
		$this->el_edo=false;
	  else
	   {
	    $this->el_edo=true;
		$this->id_usuario=$resul[0]["id_usuario"];		
		$this->email=$resul[0]["email"];
		$this->nombres=$resul[0]["nombres"];
		
	   } 
}

	
public function buscarlo2($email, $pass){
	            
	$clave_crypt=hash('sha512', trim($pass));
	  
	
	$conditions['where'] = array(
        'email = ' => "'".$email."'",
		' and clave = ' => "'".$clave_crypt."'"
    );
   
    $resul = $this->sql->getRows('usuario', $conditions);
	    
      if($this->sql->num_rows==0)
		$this->el_edo=false;
	  else
	   {
	    $this->el_edo=true;
		$this->id_usuario=$resul[0]["id_usuario"];		
		$this->email=$resul[0]["email"];
		$this->nombres=$resul[0]["nombres"];
		 
	   }    
      
}

public function buscarlo4($email){
	 
      
	$conditions['where'] = array(
        'email = ' => "'".$email."'"
    );
   
    $resul = $this->sql->getRows('usuario', $conditions);
	    
      if($this->sql->num_rows==0)
		$this->el_edo=false;
	  else
	   {
	    $this->el_edo=true;
		$this->id_usuario=$resul[0]["id_usuario"];		
		$this->email=$resul[0]["email"];
		$this->nombres=$resul[0]["nombres"];
		
	   }   
}


public function comillas_inteligentes($valor)
{
   if (get_magic_quotes_gpc()) {
       $valor = stripslashes($valor);
   }
   if (!is_numeric($valor)) {
       $valor = "'" . mysql_real_escape_string($valor) . "'";
   }
   return $valor;
}

public function validalo($log){
    $conditions['where'] = array(
        'email = ' => "'".$log."'"
    );
   
    $resul = $this->sql->getRows('usuario', $conditions);	
       
        if ($this->sql->num_rows >0)
			return true;
		else	
			return false;
    }

public function validalo2($log,$id){
       
	
    $conditions['where'] = array(
        'email = ' => "'".$log."'",
		' and id_usuario <>' => $id
    );
   
    $resul = $this->sql->getRows('usuario', $conditions);	
       
        if ($this->sql->num_rows >0)
			return true;
		else	
			return false;
    }

public function eliminar(){

if ($this->id_usuario){
	$condition = array('id_usuario=' => $this->id_usuario);
    $this->el_edo = $this->sql->delete("usuario", $condition);
 	
}
}

}//fin de la clase usuarios
?>