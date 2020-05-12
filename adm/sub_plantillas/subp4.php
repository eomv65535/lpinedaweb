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
            <h3 class="text-center title-2">Modificar Usuarios</h3>
          </div>
          <hr>
          <form action="usu_modificar2.php" name="form1" method="post">
            <input id = "id_usuarios" type = "hidden" name = "id_usuarios" value="<?php echo $id_usuarios;?>">
            <p>Tipo de Usuario</p>
            <select name="tipo" id="tipo" class="form-control">
              <option value="1" <?php echo $c1;?>>Normal</option>
              <option value="2" <?php echo $c2;?>>Preferente</option>
              <option value="5" <?php echo $c5;?>>Ing. Visitas</option>
              <option value="3" <?php echo $c3;?>>Administrador</option>
              <option value="4" <?php echo $c4;?>>Super Admin</option>
            </select>
            <div class="form-group" style="margin-top:20px">
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
            <p>Vías de Contacto</p>
            <div style="display:block">
              <input type="checkbox" name='cotatos[]' value="1" style="display:inline-block!important;width: 5%;" <?php echo $chequi1;?>>
              Email</div>
            <div style="display:block">
              <input type="checkbox" name='cotatos[]' value="2" style="display:inline-block!important;width: 5%;" <?php echo $chequi2;?>>
              Telf</div>
            <div style="display:block">
              <input type="checkbox" name='cotatos[]' value="3" style="display:inline-block!important;width: 5%;" <?php echo $chequi3;?>>
              Celular (Whastapp/SMS)</div>
            <p style="margin-top:20px"> Cambiar la clave?</p>
            <input id="aceptox" name="aceptox" type="checkbox" style="display:inline-block!important;width: 5%;" onClick="activalox('clave','clavex2','aceptox');">
            <div class="form-group">
              <label for="nombre" class="control-label mb-1">Nueva Clave</label>
              <input class="form-control" name="clave" id="clave" type="password" disabled>
            </div>
            <div class="form-group">
              <label for="nombre" class="control-label mb-1">Confirma Clave</label>
              <input class="form-control" name="clavex2" id="clavex2" type="password" disabled>
            </div>
            <p>Estatus</p>
            <select id = "estatus" name = "estatus" class="form-control">
              <option value="1" <?php echo $act1;?>>Activo</option>
              <option value="0" <?php echo $act2;?>>Inactivo</option>
            </select>
            <p style="margin-top:20px">Crea Reportes?</p>
            <select id = "crea_incidencia" name = "crea_incidencia" class="form-control">
              <option value="1" <?php echo $cri1;?>>Si</option>
              <option value="0" <?php echo $cri2;?>>No</option>
            </select>
            <input name="seleccionadoscr" id="seleccionadoscr" value="0" type="hidden">
            <p style="margin-top:20px">&nbsp;</p>
            <div id="conresagreg"> </div>
            <div align="center"> <a class="btn btn-primary" href="#" onclick="valida_um()" style="text-decoration:none">Guardar</a> <a href="usuarios.php" class="btn btn-danger" style="text-decoration:none">Cancelar</a> </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
