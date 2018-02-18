<?php include (HTML_DIR.'includes/head.php'); // Aquí comienza el Cuerpo ?>
<?php include (HTML_DIR.'includes/navbar.php'); ?>

<?php include('views/html/panel/temporada.xlist');// <- En este archivo esta el listado de los estados >
// $r_temporada = array estados - $n_temporada = cantidad de temporadas
$imagen='<div class="col-md-12 cabecera-body"><img class="img-full" src="views/images/nise.png" alt="" /></div>';
$conexion = new gestionBD();
  for ($i=1; $i <= $n_temporada; $i++) {
    if ($i==$_GET['subpage']) {
      $nom_temp=$r_temporada[$i];
    }
  }
?>
<!-- Logica y asignacion de variables globales -->
<?php
$sql="SELECT * FROM anime WHERE id_temp=".$_GET['subpage'];
?>
<section class="body">
	<div class="container">
		<div class="row cont-body">
      <?php include (HTML_DIR.'includes/iniciar-sesion.inc') ?>
      <?php include (HTML_DIR.'includes/generos.inc') ?>
      <div class="col-md-10 cabecera-body">
        <h3>Se muestra animes de la temporada <?= $nom_temp ?></h3>
    </div>
        <!--  Mostramos toda la información , este codigo se reusara-->
        <?php  include (HTML_DIR.'public/lista.php');?>
    </div><!-- <- hasta aquí este div es cont-body -->
  </div><!-- <- hasta aquí este div es el container general -->
</section>
<?php $conexion->cerrar(); ?>
<?php include(HTML_DIR.'includes/final-body.inc'); ?>
<?php include (HTML_DIR.'includes/footer.php'); ?>
