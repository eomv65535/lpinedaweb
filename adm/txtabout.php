<?php session_start();
	$cargue="";
	
	require_once("clases/usuarios.php");
   	$usir=unserialize($_SESSION["usuario_lp"]);

if ( !isset( $_SESSION[ "usuario_lp" ] ) || empty( $_SESSION[ "usuario_lp" ] ) )
	echo "<meta http-equiv='refresh' content='0;URL=cierra_session.php'>";


$titu = "Texto del Acerca";

require_once( "clases/txtabout.php" );
$txtabout = new txtabout();
$detos_about = $txtabout->consultar();
include("tope.php");
?>
			<div class="container">
				<div class="user-data m-t-40">
					<div class="col-md-12">
						<div id="cuerpo">
							<h2>Modificar Texto del Acerca</h2>
							<p>Aquí Usted podrá modificar el texto localizado a la derecha de la foto en el Acerca.</p>
							<br>
							<div id="modtxtabout" class="formulariox">
								<form name="formi" id="formi" action="txtabout2.php" method="post" enctype="application/x-www-form-urlencoded">
									<input id="id" name="id" value="<?php echo $detos_about[0]["id"];?>" type="hidden"/>

									<div class="form-group" style="margin-top:20px">
										<label for="nombre" class="control-label mb-1">Descripción (Español)</label>
										<textarea class="form-control" name="des_esp" id="des_esp"><?php echo $detos_about[0]["des_esp"];?></textarea>
									</div>
									<div class="form-group" style="margin-top:20px">
										<label for="nombre" class="control-label mb-1">Descripción (Inglés)</label>
										<textarea class="form-control" name="des_eng" id="des_eng"><?php echo $detos_about[0]["des_eng"];?></textarea>
									</div>
									<hr>
								</form>
								<hr/>
								<div align="center">
									<button class="btn btn-primary" type="button" onclick="valida_txtabout()" style="text-decoration:none">Enviar</button>
								</div>
								<br/>
							</div>
						</div>
					</div>
				</div>
			</div>
	
	<?php include ("cierra.php");?>
</body>
</html>