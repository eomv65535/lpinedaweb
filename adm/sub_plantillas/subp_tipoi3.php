<h2>Agregar Tipos de Reportes</h2>
<div id="bloquelogin">
  <form action="tipo_incidencia_agregar2.php" name="form1" method="post">
    <input id = "id_tipoi" type = "hidden" name = "id_tipoi" value="0">
    <label for="nombre"><span>Descripción</span>
      <input class="form-control" name="descrip" id="descrip"  type="text">
    </label>
    <label for="lugar_obliga"><span>El lugar del Suceso es Obligatorio?</span>
      <select class="form-control" name="lugar_obliga" id="lugar_obliga">
        <option value="1" selected>Si</option>
        <option value="0">No</option>
      </select>
    </label>
    <div class="card-footer">
      <button class="btn btn-primary" type="button" onclick="valida_tipoa()">Guardar</button>
      <a href="tipo_incidencia.php" class="btn btn-danger" style="text-decoration:none">Cancelar</a> </div>
  </form>
</div>
