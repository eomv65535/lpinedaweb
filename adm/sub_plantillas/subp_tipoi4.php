<h2>Modificar Tipos de Reportes</h2>
<div id="bloquelogin">
  <form action="tipo_incidencia_modificar2.php" name="form1" method="post">
    <input id = "id_tipoi" type = "hidden" name = "id_tipoi" value="<?php echo $elpk;?>">
    <label for="nombre"><span>Descripción</span>
      <input class="form-control" name="descrip" id="descrip"  type="text" value="<?php echo $descrip;?>">
    </label>
    <label for="lugar_obliga"><span>El lugar del Suceso es Obligatorio?</span>
      <select class="form-control" name="lugar_obliga" id="lugar_obliga">
        <option value="1"<?php echo $s1;?>>Si</option>
        <option value="0"<?php echo $s2;?>>No</option>
      </select>
    </label>
    <div class="card-footer">
      <button class="btn btn-primary" type="button" onclick="valida_tipoa()">Guardar</button>
      <a href="preg_encuesta.php" class="btn btn-danger" style="text-decoration:none">Cancelar</a> </div>
  </form>
</div>
