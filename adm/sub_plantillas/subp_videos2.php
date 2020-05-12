<div class="container">
	<div class="user-data m-t-40">
		<div class="col-md-12">
			<div id="cuerpo">
				<div class="card-body">
					<div class="card-title">
						<h3 class="text-center title-2">Modificar Videos</h3>
					</div>
					<hr>
					<div id="bloquelogin">
						<form action="videos_modificar2.php" name="formi" method="post">
							
							<input id="id" type="hidden" name="id" value="<?php echo $elpk;?>">
							<div class="form-group">
								<label for="nombre" class="control-label mb-1">Ruta Video</label>
								<input class="form-control" name="des" id="des" type="text" value="<?php echo $des;?>">
							</div>
							
							<div align="center" style="margin-top:20px">
								<button class="btn btn-primary" type="button" onclick="valida_lnkvideo()">Guardar</button>
								<a href="videos.php" class="btn btn-danger" style="text-decoration:none">Cancelar</a> </div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>