<div class="container">
	<div class="user-data m-t-40">
		<div class="col-md-12">
			<div id="cuerpo">
				<div class="card-body">
					<div class="card-title">
						<h3 class="text-center title-2">Agregar Proyectos</h3>
					</div>
					<hr>
					<div id="bloquelogin">
						<form action="proyectos_agregar2.php" name="form1" method="post">
							<input id="id" type="hidden" name="id" value="0">
							<div class="form-group">
								<label for="nombre" class="control-label mb-1">Nombre</label>
								<input class="form-control" name="nombre" id="nombre" type="text">
							</div>
							<div class="form-group">
								<label for="nombre" class="control-label mb-1">Video</label>
								<input class="form-control" name="video" id="video" type="text">
							</div>
							<div class="form-group">
								<label for="nombre" class="control-label mb-1">Descripción</label>
								<textarea class="form-control" name="descrip" id="descrip"></textarea>
							</div>
							<div class="form-group">
								<label for="nombre" class="control-label mb-1">Link</label>
								<input class="form-control" name="link" id="link" type="text">
							</div>
							<div align="center" style="margin-top:20px">
								<button class="btn btn-primary" type="button" onclick="valida_proys()">Guardar</button>
								<a href="proyectos.php" class="btn btn-danger" style="text-decoration:none">Cancelar</a> </div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>