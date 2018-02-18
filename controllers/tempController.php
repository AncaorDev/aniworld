<?php 
if (isset($_GET['subpage'])) {
  include (HTML_DIR.'includes/head.php'); // Aquí comienza el Cuerpo 
  include (HTML_DIR.'includes/navbar.php'); 
  include('views/html/panel/temporada.xlist');// <- En este archivo esta el listado de los estados 
  // $r_temporada = array estados - $n_temporada = cantidad de estados
  $imagen='<div class="col-md-12 cabecera-body"><img class="img-full" src="views/images/nise.png" alt="" /></div>';
  $conexion = new gestionBD(); 
?> 
<section class="body">
  <div class="container">
    <div class="row cont-body">
      <?php include (HTML_DIR.'includes/iniciar-sesion.inc') ?>
      <?php include (HTML_DIR.'includes/generos.inc') ?>
      <div class="col-md-10 cabecera-body">
        <!-- Asignaciones dependientes de cada pagina -->
        <?php
        for ($i=1; $i <= $n_temporada; $i++) {
          if ($i==$_GET['subpage']) {
            $nom_temp=$r_temporada[$i];
          }
        }
        $sql="SELECT * FROM anime WHERE id_temp=".$_GET['subpage'];$ng=$conexion->ejecutar('SELECT nom_gen FROM genero WHERE id_gen='.$_GET['subpage']);
              $ng_r=$conexion->recorrer($ng);
        ?>
        <h3>Se muestra animes de la temporada <?= $nom_temp ?></h3>
      </div>
        <?php
        include (HTML_DIR.'public/lista.php');
        $conexion->cerrar(); ?>

    </div><!-- <- hasta aquí este div es cont-body -->
  </div><!-- <- hasta aquí este div es el container general -->
</section>

<?php include(HTML_DIR.'includes/final-body.inc'); ?>
<?php include (HTML_DIR.'includes/footer.php'); 
} else { header('Location: '.URL_HOME); }  ?>

