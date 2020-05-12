<?php
		$pc='
          <li class="has-sub"> <a href="#"> <i class="fas fa-home"></i> <span class="bot-line"></span>Home</a>
            <ul class="header3-sub-list list-unstyled">
              <li> <a href="banner-home.php">Banner Principal</a> </li>
              <li> <a href="blog.php">Last Post</a> </li>
              <li> <a href="quotes.php">Quotes</a> </li>
            </ul>
          </li>
          <li class="has-sub"> <a href="#"> <i class="fas fa-info"></i> <span class="bot-line"></span>Acerca</a>
            <ul class="header3-sub-list list-unstyled">
              <li> <a href="imgabout.php">Imagen Lateral</a> </li>
              <li> <a href="txtabout.php">Descripción (Acerca)</a> </li>
              <li> <a href="imgfondvideo.php">Image Fondo Video</a> </li>
              <li> <a href="lnkvideo.php">Link Video</a> </li>
            </ul>
          </li>
		  <li class="has-sub"> <a href="#"> <i class="fas fa-film"></i> <span class="bot-line"></span>Media</a>
            <ul class="header3-sub-list list-unstyled">
              <li> <a href="fotos.php">Fotos</a> </li>
              <li> <a href="videos.php">Videos</a> </li>
              <li> <a href="audios.php">Audios</a> </li>
            </ul>
          </li>
		  <li> <a href="conciertos.php"> <i class="fas fa-music"></i> <span class="bot-line"></span>Conciertos</a></li>
		  <li> <a href="proyectos.php"> <i class="fas fa-flag"></i> <span class="bot-line"></span>Proyectos</a></li>';
		
	    $mb='
        <li class="has-sub"> <a class="js-arrow" href="#"> <i class="fas fa-home"></i>Home</a>
          <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
            <li> <a href="banner-home.php">Banner Principal</a> </li>
              <li> <a href="blog.php">Last Post</a> </li>
              <li> <a href="quotes.php">Quotes</a> </li>
          </ul>
        </li>
        <li class="has-sub"> <a class="js-arrow" href="#"> <i class="fas fa-info"></i>Acerca</a>
          <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
            <li> <a href="imgabout.php">Imagen Lateral</a> </li>
              <li> <a href="txtabout.php">Descripción (Acerca)</a> </li>
              <li> <a href="imgfondvideo.php">Image Fondo Video</a> </li>
              <li> <a href="lnkvideo.php">Link Video</a> </li>
          </ul>
        </li>
		<li class="has-sub"> <a class="js-arrow" href="#"> <i class="fas fa-film"></i>Media</a>
          <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
            <li> <a href="imgabout.php">Imagen Lateral</a> </li>
              <li> <a href="fotos.php">Fotos</a> </li>
              <li> <a href="videos.php">Videos</a> </li>
              <li> <a href="audios.php">Audios</a> </li>
          </ul>
        </li>
		<li> <a class="js-arrow" href="conciertos.php"> <i class="fas fa-music"></i>Conciertos</a></li>
		<li> <a class="js-arrow" href="proyectos.php"> <i class="fas fa-flag"></i>Proyectos</a></li>';
	 
	
			?>

<header class="header-desktop3 d-none d-lg-block">
  <div class="section__content section__content--p35">
    <div class="header3-wrap">
      <div class="header__logo"> <a href="index.php"> <img src="../images/firma.png" alt="" width="80" /> </a> </div>
      <div class="header__navbar">
        <ul class="list-unstyled">
          <?php echo $pc;?>
        </ul>
      </div>
      <div class="header__tool">
        <div class="account-wrap">
          <div class="account-item account-item--style2 clearfix js-item-menu">
            <div class="content"> <a class="js-acc-btn" href="#"><?php echo $usir->nombres?></a> </div>
            <div class="account-dropdown js-dropdown">
              <div class="account-dropdown__body">
                <div class="account-dropdown__item"> <a href="miperfil.php"> <i class="zmdi zmdi-account"></i>Mis datos</a> </div>
              </div>
              <div class="account-dropdown__footer"> <a href="cierra_session.php"> <i class="zmdi zmdi-power"></i>Salir</a> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- END HEADER DESKTOP--> 

<!-- HEADER MOBILE-->
<header class="header-mobile header-mobile-2 d-block d-lg-none">
  <div class="header-mobile__bar">
    <div class="container-fluid">
      <div class="header-mobile-inner"> <a class="logo" href="principal.php"> <img src="../images/firma.png" alt="Leonardo Pineda" width="50" /> </a>
        <button class="hamburger hamburger--slider" type="button"> <span class="hamburger-box"> <span class="hamburger-inner"></span> </span> </button>
      </div>
    </div>
  </div>
  <nav class="navbar-mobile">
    <div class="container-fluid">
      <ul class="navbar-mobile__list list-unstyled">
        <?php echo $mb;?>
      </ul>
    </div>
  </nav>
</header>
<div class="sub-header-mobile-2 d-block d-lg-none">
  <div class="header__tool">
    <div class="account-wrap">
      <div class="account-item account-item--style2 clearfix js-item-menu">
        <div class="content"> <a class="js-acc-btn" href="#"><?php echo $usir->nombres?></a> </div>
        <div class="account-dropdown js-dropdown">
          <div class="account-dropdown__body">
            <div class="account-dropdown__item"> <a href="miperfil.php"> <i class="zmdi zmdi-account"></i>Mis Datos</a> </div>
          </div>
          <div class="account-dropdown__footer"> <a href="cierra_session.php"> <i class="zmdi zmdi-power"></i>Salir</a> </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END HEADER MOBILE --> 

<!-- PAGE CONTENT-->
<div class="page-content--bgf7">
<!-- BREADCRUMB-->
<section class="au-breadcrumb2">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h3 class="title-5"> Hola, <span><?php echo $usir->nombres?>!</span> </h3>
      </div>
      <div class="col-md-6">
        <div class="">
          <div class="" style="float:right">
            <ul class="list-unstyled list-inline au-breadcrumb__list">
              <li class="list-inline-item"><?php echo $titu?></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
