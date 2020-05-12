<div class="container">
  <div class="user-data m-t-40">
    <div class="col-md-12">
      <div id="cuerpo">
        <div class="card-body">
          <div class="card-title">
            <h3 class="text-center title-2">Agregar Pregunta Frecuente</h3>
          </div>
          <hr>
          <form action="faq_agregar2.php" name="form1" method="post">
            <input id = "id" type = "hidden" name = "id" value="0">
            <div class="form-group">
              <label for="nombre" class="control-label mb-1">Pregunta</label>
              <input class="form-control" name="pregunta" id="pregunta" type="text">
            </div>
            <div class="form-group">
              <label for="nombre" class="control-label mb-1">Respuesta</label>
              <input class="form-control" name="respuesta" id="respuesta" type="text">
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
