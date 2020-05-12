<?php
session_start();
$cargue = "busca_lasimgsch()";

require_once( "clases/usuarios.php" );
$usir = unserialize( $_SESSION[ "usuario_lp" ] );

if ( !isset( $_SESSION[ "usuario_lp" ] ) || empty( $_SESSION[ "usuario_lp" ] ) )
	echo "<meta http-equiv='refresh' content='0;URL=cierra_session.php'>";


$titu = "Banner Principal";

require_once( "clases/lnkvideo.php" );
$lnkvideo = new lnkvideo();
$detos_about = $lnkvideo->consultar();
include( "tope.php" );
?>
<div class="container">
	<div class="user-data m-t-40">
		<div class="col-md-12">
			<div id="cuerpo">
				<h2>Modificar Imagen del Banner Principal</h2>
				<p>Aquí Usted podrá actualizar la imagen del banner principal</p>
				<br>
				<div id="imagens" class="formulariox">
					<form name="formi" id="formi" action="#" method="post" enctype="application/x-www-form-urlencoded">
						<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.css"/>
						<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js"></script>
						<h4>Imagen Nueva</h4>
						<div class="form-group" style="margin-top:20px">
							<label for="nombre" class="control-label mb-1">Extensiones Permitidas: Imagenes (GIF, JPG, JPEG, PNG).</label>
							<input class="form-control" name="files[]" id="fileupload5" multiple type="file">
						</div>
						<hr/>
						<div id="files" class="files"></div>
						<div id="tab_5" class="galeria">
							<h4>Imagen Actual</h4>
						</div>
						<hr>
					</form>
					<hr/>

					<br/>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include ("cierra.php");?>
</body>
</html>