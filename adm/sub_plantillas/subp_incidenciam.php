<?php
require_once("../clases/incidencias.php");
	$incidencias=new incidencias();
	$datos=$incidencias->buscar($_POST["inci"]);
	$estatus=$datos[0]["estatus"];
	$cax1=	$cax2=	$cax3=$cax33=$cax34="";
	if($estatus==1)
		$cax2="selected";
	elseif($estatus==2)
		$cax2="selected";
	elseif($estatus==3)
		$cax3="selected";
	elseif($estatus==33)
		$cax33="selected";	
	elseif($estatus==34)
		$cax34="selected";	
?>

<div class="container">
  <div class="user-data m-t-40">
    <div class="col-md-12">
      <div id="cuerpo">
        <div class="card-body">
          <div class="card-title">
            <h3 class="text-center title-2">Modificar el estatus del Reporte</h3>
          </div>
          <hr>
          <div id="editarincidencia" class="formulariox">
            <form action="#" name="form1" method="post">
              <input id = "id_incidencia" type = "hidden" name = "id_incidencia" value="<?php echo $_POST["inci"];?>">
              <div class="form-group" style="margin-top:20px">
                <label for="nombre" class="control-label mb-1">Estatus</label>
                <select name="estatus" id="estatus" class="form-control">
                  <option value="1" <?php echo $cax1;?>>Solicitud Recibida</option>
                  <option value="2" <?php echo $cax2;?>>Tramite en Ejecución</option>
                  <option value="3" <?php echo $cax3;?>>Tramite Finalizado - Notificar Propietario</option>
                  <option value="34" <?php echo $cax34;?>>Tramite Finalizado - Notificar Propietario y Condominio</option>
                  <option value="33" <?php echo $cax33;?>>Tramite Finalizado - Notificar Auditoría</option>
                </select>
              </div>
              <div align="center"> <button type="button" class="btn btn-primary" onClick="actualiza_estatus_inci()">Actualizar</button> <button class="btn btn-danger" onclick="cerrar_comen();" type="button">Cancelar</button> </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
