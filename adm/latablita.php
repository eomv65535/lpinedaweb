<div class="container">
  <div class="user-data m-t-40">
    <div class="col-md-12">
      <div id="cuerpo">
        <h2><?php echo $titu;?></h2>
        <p><?php echo $explicalo;?></p>
        <br>
        <div class="table-responsive m-b-40">
          <table class="table table-borderless table-data3" width="100%" id="latablitax">
            <thead>
              <tr>
                <?php
				for($i=0;$i<count($_SESSION["titulos"]);$i++)
					echo '<th>'.$_SESSION["titulos"][$i].'</th>';
			  ?>
                <?php if($_SESSION["nomod"]==0 || $_SESSION["noelim"]==0 || $_SESSION["si_cons"]==1){ ?>
                <th width="80">Acciones</th>
                <?php }?>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <?php
				for($i=0;$i<count($_SESSION["titulos"]);$i++)
					echo '<th>'.$_SESSION["titulos"][$i].'</th>';
				?>
                <?php if($_SESSION["nomod"]==0 || $_SESSION["noelim"]==0 || $_SESSION["si_cons"]==1){ ?>
                <th width="80">Acciones</th>
                <?php }?>
              </tr>
            </tfoot>
            <tbody>
            </tbody>
          </table>
        </div>
        <div style="text-align:center"> <span class="m-section__sub">
          <?php if($_SESSION["siagregar"]==1){?>
          <button type="button" class="au-btn au-btn-load" onClick="location.href='<?php echo $_SESSION["gen"];?>_agregar.php';"> <i class="fa fa-plus"></i>&nbsp;&nbsp;Agregar Nuevo </button>
          <?php }?>
          </span> </div>
        <br>
      </div>
    </div>
  </div>
</div>
