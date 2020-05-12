<div class="container">
  <div class="user-data m-t-40">
    <div class="col-md-12">
      <div id="cuerpo">
        <div class="card-body">
          <div class="card-title">
            <h3 class="text-center title-2">Agregar Last Post</h3>
          </div>
          <hr>
          <div id="editarincidencia" class="formulariox">
            <form action="blog_agregar2.php" name="form1" method="post">
              <input id = "id" type = "hidden" name = "id" value="<?php echo $ultimoid;?>">
              <input id="ruta_img" type="hidden" name="ruta_img" value="<?php echo $aleata.".jpg";?>">
              <div class="form-group">
                <label for="titu" class="control-label mb-1">Titulo del Post</label>
                <input class="form-control" name="titu" id="titu" type="text">
              </div>
              <div class="form-group">
                <label for="titu" class="control-label mb-1">Fecha del Post</label>
                <input class="form-control" name="fecha" id="fecha" type="text">
              </div>
              <div class="form-group">
                <label for="titu" class="control-label mb-1">Link</label>
                <input class="form-control" name="link" id="link" type="text">
              </div>
				<div class="form-group">
                <label for="titu" class="control-label mb-1">Descripción del Post</label>
                <input class="form-control" name="descrip" id="descrip" type="text">
              </div>
              
              <p>Imagen</p>
              <div id="tab_2"> </div>
              <div align="center">
                <button class="btn btn-primary" type="button" onclick="valida_Inmuebleb()">Guardar</button>
                <a href="blog.php" class="btn btn-danger" style="text-decoration:none">Cancelar</a> </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
