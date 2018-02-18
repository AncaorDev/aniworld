<?php
$tipoUser =  $usuarios[$_SESSION['app_id']]['id_tipouser'];
$imagen='<div class="col-md-12 cabecera-body"><img class="img-full" src="views/images/nise.png" alt="" /></div>';

  //Verficamos los permisos y si existe el usuario
if (isset($_SESSION['app_id']) and ($tipoUser == 1 or $tipoUser == 2 or $tipoUser == 8)) { ?>
<?php include (HTML_DIR.'includes/head.php'); // Aquí comienza el Cuerpo ?>
<?php include (HTML_DIR.'includes/navbar.php') ?>
<section class="body">
	<div class="container">
		<div class="row cont-body">
	    <?php include (HTML_DIR.'includes/iniciar-sesion.inc') ?>
					<div class="col-md-10 cabecera-body">
						<h3>Mis Animes Favoritos </h3>
						<?php //echo isset($_GET['subpage'])?$_GET['subpage']:$_GET['subpage']='anime'; ?>
					</div>
          <?php
            $conexion = new gestionBD();
            $sqlfav = "SELECT * FROM favoritos WHERE id_user=".$usuarios[$_SESSION['app_id']]['id_user'];
            $idAnimes=$conexion->ejecutar($sqlfav);
						$contArray=$conexion->rows($idAnimes);
						if ($contArray>0) {
							while ($arrayAnimes=$conexion->recorrer($idAnimes)) {
								$ids[] = $arrayAnimes[1];}
							$a = 0;
							$id = "";
							while ($a < ($contArray-1)) {
									$id .= $ids[$a].",";
									$a++;
							}; $id .= $ids[$a];
						} else {
								$id = 0;
						}
						$sql="SELECT * FROM anime WHERE id_anime in (".$id.")";
          ?>
          <!--  Mostramos toda la información , este codigo se reusara-->

          <?php  include (HTML_DIR.'public/lista.php');?>
					<?php // include("panel-principal.inc") ?>
				</div><!-- <- hasta aquí este div es cont-body -->
			</div><!-- <- hasta aquí este div es el container general -->
</section>
<?php include(HTML_DIR.'includes/final-body.inc'); ?>
<?php include (HTML_DIR.'includes/footer.php'); ?>
<?php  $conexion->cerrar(); } else {
  //Si no existe Sesion Redireccionamos
  header ('Location:/../aniworld');
  //echo $usuarios[$_SESSION['app_id']]['id_user'];
  } ?>
