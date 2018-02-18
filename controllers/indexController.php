<?php 
include (HTML_DIR.'includes/head.php'); // Aquí comienza el Cuerpo 
include (HTML_DIR.'includes/navbar.php'); 
$imagen='<div class="col-md-12 cabecera-body"><img class="img-full" src="views/images/nise.png" alt="" /></div>';
$conexion = new gestionBD();
?>
<section class="body">
<div class="container">
<div class="row cont-body">
<?php include (HTML_DIR.'includes/iniciar-sesion.inc') ?>
<?php include (HTML_DIR.'includes/generos.inc') ?>
<!-- Asignaciones dependientes de cada pagina -->
<?php
$sql="SELECT * FROM anime";
// Asignaciones independientes
include (HTML_DIR.'public/lista.php');
$conexion->cerrar(); ?>
</div><!-- <- hasta aquí este div es cont-body -->
</div><!-- <- hasta aquí este div es el container general -->
</section>
<?php include(HTML_DIR.'includes/final-body.inc'); ?>
<?php include (HTML_DIR.'includes/footer.php'); ?> 

