<h2>Modificar Motivos de Reportes</h2>
<div id="bloquelogin">
  <form action="motivo_incidencia_modificar2.php" name="form1" method="post">
    <input id = "id_motivo" type = "hidden" name = "id_motivo" value="<?php echo $elpk;?>">
    <input name="id_tipoi" id="id_tipoi" value="1" type="hidden">
    <label for="nombre"><span>Descripción</span>
      <input name="descrip" id="descrip" type="text" value="<?php echo $descrip;?>">
    </label>
    <div class="card-footer">
      <button class="btn btn-primary" type="button" onclick="valida_tipoa2()">Guardar</button>
      <a href="motivo_incidencia.php" class="btn btn-danger" style="text-decoration:none">Cancelar</a> </div>
  </form>
</div>
