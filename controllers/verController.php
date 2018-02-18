<?php include (HTML_DIR.'includes/head.php'); // Aquí comienza el Cuerpo ?>
<?php include (HTML_DIR.'includes/navbar.php'); ?>
<?php include('views/html/panel/temporada.xlist');// <- En este archivo esta el listado de los estados >
// $r_temporada = array estados - $n_temporada = cantidad de estados
$imagen='<div class="col-md-12 cabecera-body"><img class="img-full" src="views/images/nise.png" alt="" /></div>'; ?>

<section class="body">
	<div class="container">
		<div class="row cont-body">
      <?php include (HTML_DIR.'includes/iniciar-sesion.inc') ?>
      <div class="col-md-10 cabecera-body">
    </div>
        <?php
        include (HTML_DIR.'public/version.php'); ?>
    </div><!-- <- hasta aquí este div es cont-body -->
  </div><!-- <- hasta aquí este div es el container general -->
</section>

<?php include(HTML_DIR.'includes/final-body.inc'); ?>
<?php include (HTML_DIR.'includes/footer.php'); ?>
