<?php session_start();
	$cargue="";
	
	require_once("clases/usuarios.php");
   	$usir=unserialize($_SESSION["usuario_lp"]);

if ( !isset( $_SESSION[ "usuario_lp" ] ) || empty( $_SESSION[ "usuario_lp" ] ) )
	echo "<meta http-equiv='refresh' content='0;URL=cierra_session.php'>";


$titu = "Link del Video del Acerca";

require_once( "clases/lnkvideo.php" );
$lnkvideo = new lnkvideo();
$detos_about = $lnkvideo->consultar();
include("tope.php");
?>
			<div class="container">
				<div class="user-data m-t-40">
					<div class="col-md-12">
						<div id="cuerpo">
							<h2>Modificar Link del Video del Acerca</h2>
							<p>Aquí Usted podrá modificar el link del video. Recuerde incluir toda la ruta por ejemplo: https://www.youtube.com/watch?v=TIk5PjAX2uI&feature=youtu.be</p>
							<br>
							<div id="modlnkvideo" class="formulariox">
								<form name="formi" id="formi" action="lnkvideo2.php" method="post" enctype="application/x-www-form-urlencoded">
									<input id="id" name="id" value="<?php echo $detos_about[0]["id"];?>" type="hidden"/>

									<div class="form-group" style="margin-top:20px">
										<label for="nombre" class="control-label mb-1">Ruta </label>
										<input type="text" class="form-control" name="des" id="des" value="<?php echo $detos_about[0]["des"];?>">
									</div>
									
									<hr>
								</form>
								<hr/>
								<div align="center">
									<button class="btn btn-primary" type="button" onclick="valida_lnkvideo()" style="text-decoration:none">Enviar</button>
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