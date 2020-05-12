<?php
session_start();
$cargue = "busca_txt_imgch_audio()";

require_once( "clases/usuarios.php" );
$usir = unserialize( $_SESSION[ "usuario_lp" ] );

if ( !isset( $_SESSION[ "usuario_lp" ] ) || empty( $_SESSION[ "usuario_lp" ] ) )
	echo "<meta http-equiv='refresh' content='0;URL=cierra_session.php'>";

include("utiles/claves.php");
$aleata = "";		
	for ($i = 1; $i <= 6; $i++) {
	    $aleata .= caracter_aleatorio();
	}	
	$_SESSION["xxxaleata"] = $aleata;

$titu = "Audios";

include( "tope.php" );
?>
<div class="container">
	<div class="user-data m-t-40">
		<div class="col-md-12">
			<div id="cuerpo">
				<h2>Audios</h2>
				<p>Aquí Usted podrá Agregar los Audios</p>
				<br>
				<div id="imagens" class="formulariox">
					<form name="formi" id="formi" action="#" method="post" enctype="application/x-www-form-urlencoded">
						<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.css"/>
						<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js"></script>
						<h4>Audio Nuevo</h4>
						<div class="form-group" style="margin-top:20px">
							<label for="nombre" class="control-label mb-1">Extensiones Permitidas: Audio (MP3).</label>
							<input class="form-control" name="files[]" id="fileupload5" multiple type="file">
						</div>
						<hr/>
						<div id="files" class="files"></div>
						<div id="tab_5" class="galeria col-xs-12">
							<h4>Audios Cargados</h4>
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