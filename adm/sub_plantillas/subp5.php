<link href="bootstrap/css/highlight.css" rel="stylesheet">
<link href="bootstrap/css/bootstrap-switch.css" rel="stylesheet">
<script src="bootstrap/js/highlight.js"></script>
<script src="bootstrap/js/bootstrap-switch.js"></script>
<div class="container">
<div class="user-data m-t-40">
<div class="col-md-12">
<div id="cuerpo">
<div class="card-body">
<div class="card-title">
  <h3 class="text-center title-2">Actualizar Datos</h3>
</div>
<hr>
<div id="editarincidencia" class="formulariox">
  <form action="actualiza_datos2.php" name="form1" method="post">
    <input id = "id_usuarios" type = "hidden" name = "id_usuarios" value="<?php echo $id_usuarios;?>">
    <input id = "estatus" type = "hidden" name = "estatus" value="<?php echo $estatus;?>">
    <input id = "crea_incidencia" type = "hidden" name = "crea_incidencia" value="<?php echo $crea_incidencia;?>">
    <input id = "tipo" type = "hidden" name = "tipo" value="<?php echo $tipo;?>">
    <div class="form-group">
      <label for="nombre" class="control-label mb-1">Nombres</label>
      <input class="form-control" name="nombres" id="nombres" type="text" value="<?php echo $nombres;?>">
    </div>
    <div class="form-group">
      <label for="nombre" class="control-label mb-1">Apellidos</label>
      <input class="form-control" name="apellidos" id="apellidos" type="text" value="<?php echo $apellidos;?>">
    </div>
    <div class="form-group">
      <label for="nombre" class="control-label mb-1">Email</label>
      <input class="form-control" name="email" id="email" type="text" value="<?php echo $email;?>">
    </div>
    <div class="form-group">
      <label for="nombre" class="control-label mb-1">Telefono</label>
      <input class="form-control" name="telf" id="telf" type="text" value="<?php echo $telf;?>">
    </div>
    <div class="form-group">
      <label for="nombre" class="control-label mb-1">Celular</label>
      <input class="form-control" name="celular" id="celular" type="text" value="<?php echo $celular;?>">
    </div>
    <div class="form-group">
      <p>Vías de Contacto</p>
      <div style="display:block">
        <input type=checkbox name='cotatos[]' value="1" style="display:inline-block!important;width: 5%;" <?php echo $chequi1;?>>
        Email</div>
      <div style="display:block">
        <input type=checkbox name='cotatos[]' value="2" style="display:inline-block!important;width: 5%;" <?php echo $chequi2;?>>
        Telf</div>
      <div style="display:block">
        <input type=checkbox name='cotatos[]' value="3" style="display:inline-block!important;width: 5%;" <?php echo $chequi3;?>>
        Celular (Whastapp/SMS)</div>
    </div>
    <p> Cambiar la clave?</p>
    <input id="aceptox" name="aceptox" type="checkbox" style="display:inline-block!important;width: 5%;" onClick="activalox('clave','clavex2','aceptox');" class="form-control">
    <div class="form-group">
      <label for="nombre" class="control-label mb-1">Nueva Clave</label>
      <input class="form-control" name="clave" id="clave" type="password" disabled>
    </div>
    <div class="form-group">
      <label for="nombre" class="control-label mb-1">Confirma Clave</label>
      <input class="form-control" name="clavex2" id="clavex2" type="password" disabled>
    </div>
    <div align="center">
      <button class="btn btn-primary" type="button" onclick="valida_actualiza_datos()">Guardar</button>
      <a href="miperfil.php" class="btn btn-danger" style="text-decoration:none">Cancelar</a> </div>
  </form>
</div>
