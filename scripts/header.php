<header class="page_header header_white toggler_xs_right tall_header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 display_table">
        <div class="header_left_logo display_table_cell"> <a href="index.php" class="logo top_logo"> <img src="images/firma.png" alt="" width="100"> </a> </div>
        <div class="header_mainmenu display_table_cell text-center">
          <nav class="mainmenu_wrapper">
            <ul class="mainmenu nav sf-menu">
              <li class="[var.c1]"> <a href="index.php">[var.inic_o]</a></li>
              <li class="[var.c2]"> <a href="about.php">[var.about]</a></li>
              <li class="[var.c3]"> <a href="media.php">Media</a></li>
              <li class="[var.c4]"> <a href="concerts.php">[var.concerts]</a></li>
              <li class="[var.c5]"> <a href="#">[var.festivals]</a>
				  
	<?php
				  
		require_once("clases/proyectos.php");		  
			$proyectos=new proyectos();	
				  $dpro=$proyectos->consultar();
				  
				  ?>			  
                <ul>
					
					<?php
					for($i=0;$i<$proyectos->sql->num_rows;$i++)
					{
						echo '<li><a href="proj_detail.php?id='.$dpro[$i]["id"].'">'.$dpro[$i]["nombre"].'</a></li>';
					}
					?>
                  
                </ul>
              </li>
              <li class="[var.c6]"> <a href="contact.php">[var.contacto]</a></li>
            </ul>
          </nav>
          <span class="toggle_menu"><span></span></span> </div>
        <div class="display_table_cell text-right">
          <div class="inline-content small-text greylinks" style="width: 80px;">
            <div>
              <form name="formid" id="formid" action="[var.pagina]" method="post" enctype="multipart/form-data">
                <input type="hidden" name="idioma" id="idioma" value="2">
              </form>
              <div class="dropdown"> <a href="#0" id="account-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/[var.img_band].png" width="24"> <span class="caret"></span> </a>
                <ul class="dropdown-menu" aria-labelledby="account-dropdown">
                  <li> <a href="#" class="interno" onClick="cambia_idima(2)"><img src="images/uk.png" width="24"></a> </li>
                  <li> <a href="#" class="interno" onClick="cambia_idima(1)"><img src="images/es.png" width="24"></a> </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>