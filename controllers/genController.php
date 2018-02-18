<?php include (HTML_DIR.'includes/head.php'); // Aquí comienza el Cuerpo ?>
<?php include (HTML_DIR.'includes/navbar.php'); ?>
<?php include('views/html/panel/temporada.xlist');// <- En este archivo esta el listado de los estados >
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
				// Asignacion para detectar que genero es
				$ng=$conexion->ejecutar('SELECT nom_gen FROM genero WHERE id_gen='.$_GET['subpage']);
        $ng_r=$conexion->recorrer($ng);
				// Aqui se coloca la sentencia de lo que se desea encontrar
				//En este caso es para los generos
				$sql="SELECT * FROM anime WHERE gen_anime like '%".$_GET['subpage']."%'";
        ?>
        <h3>Se muestra animes del genero <?= $ng_r[0] ?></h3>
      </div>
        <?php
				// Asignaciones independientes
        include (HTML_DIR.'public/lista.php');
        $conexion->cerrar(); ?>
    </div><!-- <- hasta aquí este div es cont-body -->
  </div><!-- <- hasta aquí este div es el container general -->
</section>
<?php include(HTML_DIR.'includes/final-body.inc'); ?>
<?php include (HTML_DIR.'includes/footer.php'); ?>
