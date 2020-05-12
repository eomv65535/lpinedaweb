<div class="container">
  <div class="user-data m-t-40">
    <div class="col-md-12">
      <div id="cuerpo">
        <div class="card-body">
          <div class="card-title">
            <h3 class="text-center title-2">Modificar Pregunta Frecuente</h3>
          </div>
          <hr>
          <form action="faq_modificar2.php" name="form1" method="post">
            <input id = "id" type = "hidden" name = "id" value="<?php echo $elpk;?>">
            <div class="form-group">
              <label for="nombre" class="control-label mb-1">Pregunta</label>
              <input class="form-control" name="pregunta" id="pregunta" type="text" value="<?php echo $pregunta;?>">
            </div>
            <div class="form-group">
              <label for="nombre" class="control-label mb-1">Respuesta</label>
              <input class="form-control" name="respuesta" id="respuesta" type="text" value="<?php echo $respuesta;?>">
            </div>
            <div align="center">
              <button class="btn btn-primary" type="button" onclick="valida_faq()">Guardar</button>
              <a href="faq.php" class="btn btn-danger" style="text-decoration:none">Cancelar</a></div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
