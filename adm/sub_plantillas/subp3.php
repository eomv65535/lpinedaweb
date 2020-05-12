<link href="bootstrap/css/bootstrap-switch.css" rel="stylesheet">
<script src="bootstrap/js/bootstrap-switch.js"></script>
<link href="bootstrap/css/highlight.css" rel="stylesheet">
<script src="bootstrap/js/highlight.js"></script>
<div class="container">
  <div class="user-data m-t-40">
    <div class="col-md-12">
      <div id="cuerpo">
        <div class="card-body">
          <div class="card-title">
            <h3 class="text-center title-2">Agregar Usuarios</h3>
          </div>
          <hr>
          <form action="usu_agregar2.php" name="form1" method="post" enctype="application/x-www-form-urlencoded" id="form1">
            <input id = "id_usuarios" type = "hidden" name = "id_usuarios" value="0">
            <p>Tipo de Usuario</p>
            <select name="tipo" id="tipo" class="form-control">
              <option value="1" selected>Normal</option>
              <option value="2">Preferente</option>
              <option value="5">Ing. Visitas</option>
              <option value="3">Administrador</option>
              <option value="4">Super Admin</option>
            </select>
            <div class="form-group" style="margin-top:20px">
              <label for="nombre" class="control-label mb-1">Nombres</label>
              <input class="form-control" name="nombres" id="nombres" type="text">
            </div>
            <div class="form-group">
              <label for="nombre" class="control-label mb-1">Apellidos</label>
              <input class="form-control" name="apellidos" id="apellidos" type="text">
            </div>
            <div class="form-group">
              <label for="nombre" class="control-label mb-1">Email</label>
              <input class="form-control" name="email" id="email" type="text">
            </div>
            <div class="form-group">
              <label for="nombre" class="control-label mb-1">Telefono</label>
              <input class="form-control" name="telf" id="telf" type="text">
            </div>
            <div class="form-group">
              <label for="nombre" class="control-label mb-1">Celular</label>
              <input class="form-control" name="celular" id="celular" type="text">
            </div>
            <p>Vías de Contacto</p>
            <div style="display:block">
              <input type=checkbox name='cotatos[]' value="1" style="display:inline-block!important;width: 5%;" checked>
              Email</div>
            <div style="display:block">
              <input type=checkbox name='cotatos[]' value="2" style="display:inline-block!important;width: 5%;" checked>
              Telf</div>
            <div style="display:block">
              <input type=checkbox name='cotatos[]' value="3" style="display:inline-block!important;width: 5%;" checked>
              Celular (Whastapp/SMS)</div>
            <div class="form-group">
              <label for="nombre" class="control-label mb-1">Clave</label>
              <input class="form-control" name="clave" id="clave" type="password" value="123456">
            </div>
            <div class="form-group">
              <label for="nombre" class="control-label mb-1">Confirma Clave</label>
              <input class="form-control" name="clavex2" id="clavex2" type="password" value="123456">
            </div>
            <p>Estatus</p>
            <select id = "estatus" name = "estatus" class="form-control">
              <option value="1" selected>Activo</option>
              <option value="0">Inactivo</option>
            </select>
            <p style="margin-top:20px">Crea Reportes?</p>
            <select id = "crea_incidencia" name = "crea_incidencia" class="form-control">
              <option value="1" selected>Si</option>
              <option value="0">No</option>
            </select>
            <input name="seleccionadoscr" id="seleccionadoscr" value="0" type="hidden">
            <p style="margin-top:20px">&nbsp;</p>
            <div id="conresagreg"> </div>
            <div align="center"> <a class="btn btn-primary" href="#" onclick="valida_ua()" style="text-decoration:none">Guardar</a> <a href="usuarios.php" class="btn btn-danger" style="text-decoration:none">Cancelar</a> </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
