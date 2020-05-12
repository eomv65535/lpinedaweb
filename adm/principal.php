<?php session_start();
    	$cargue="";
	$titu="Inicio";
	require_once("clases/usuarios.php");
   	$usir=unserialize($_SESSION["usuario_lp"]);

	
	include("tope.php");
	echo '<div class="page-content--bgf7">';
	
	
   	
	echo '
			
			<section class="">
            <div class="row">
                            <div class="col-lg-12"><br>
							<div class="card-body">
                               <div class="alert alert-secondary" role="alert" align="center">
											Debes seleccionar una opción para actualizar o agregar información.
										</div>
                            </div>
                            </div> 
                        </div>
			</section>	';
	
	echo '</div>';
	include("cierra.php");

?>