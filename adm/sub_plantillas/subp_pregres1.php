<div class="container">
	<div class="user-data m-t-40">
		<div class="col-md-12">
			<div id="cuerpo">
				<div class="card-body">
					<div class="card-title">
						<h3 class="text-center title-2">Agregar Quotes</h3>
					</div>
					<hr>
					<div id="bloquelogin">
						<form action="quotes_agregar2.php" name="form1" method="post">
							<input id="id" type="hidden" name="id" value="0">
							<div class="form-group">
								<label for="nombre" class="control-label mb-1">Autor (Esp)</label>
								<input class="form-control" name="titu_esp" id="titu_esp" type="text">
							</div>
							<div class="form-group">
								<label for="nombre" class="control-label mb-1">Autor (Eng)</label>
								<input class="form-control" name="titu_eng" id="titu_eng" type="text">
							</div>
							<div class="form-group">
								<label for="nombre" class="control-label mb-1">Texto (Esp)</label>
								<input class="form-control" name="des_esp" id="des_esp" type="text">
							</div>
							<div class="form-group">
								<label for="nombre" class="control-label mb-1">Texto (Eng)</label>
								<input class="form-control" name="des_eng" id="des_eng" type="text">
							</div>
							<div align="center" style="margin-top:20px">
								<button class="btn btn-primary" type="button" onclick="valida_quotes()">Guardar</button>
								<a href="quotes.php" class="btn btn-danger" style="text-decoration:none">Cancelar</a> </div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>