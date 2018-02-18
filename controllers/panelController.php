<?php
  //Verficamos los permisos y si existe el usuario
if (isset($_SESSION['app_id']) and ($usuarios[$_SESSION['app_id']]['id_tipouser'] == 1 or $usuarios[$_SESSION['app_id']]['id_tipouser'] == 8)) { ?>
<?php include (HTML_DIR.'includes/head.php'); // Aquí comienza el Cuerpo ?>
<?php include (HTML_DIR.'includes/navbar.php') ?>
<section class="body">
	<div class="container">
		<div class="row cont-body">
	    <?php include (HTML_DIR.'includes/iniciar-sesion.inc') ?>
					<div class="col-md-10 cabecera-body">
						<h3>Panel de Administración de Animes</h3>
						<?php //echo isset($_GET['subpage'])?$_GET['subpage']:$_GET['subpage']='anime'; ?>
					</div>

					<div  class="col-md-10 cabecera-body">
						<a target="_top" href="/aniworld/panel"><button class="btn btn-primary" type="button" name="button"><span class="glyphicon glyphicon-home"></span></button></a>
						<a target="_top" href="/aniworld/panel/anime"><button class="btn btn-primary" type="button" name="button">Gestionar Animes</button></a>
						<a target="_top" href="/aniworld/panel/genero"><button class="btn btn-primary" type="button" name="button">Gestionar Generos</button></a>
						<a target="_top" href="/aniworld/panel/estudio"><button class="btn btn-primary" type="button" name="button">Gestionar Estudios</button></a>
					</div>

          <?php
             if (isset($_GET['subpage'])) {
               switch (strtolower($_GET['subpage'])) {
                 case 'anime':
                   include ('panel/animeController.php');
                  break;
                  case 'genero':
                    include ('panel/generoController.php');
                   break;
                   case 'estudio':
                     include ('panel/estudioController.php');
                    break;
                 default:
                    include (HTML_DIR.'panel/cab-principal.inc');
                   break;
               }
             } else {
                  include (HTML_DIR.'panel/cab-principal.inc');
             }
          ?>
					<?php // include("panel-principal.inc") ?>
				</div><!-- <- hasta aquí este div es cont-body -->
			</div><!-- <- hasta aquí este div es el container general -->
</section>
<?php include(HTML_DIR.'includes/final-body.inc'); ?>
<?php include (HTML_DIR.'includes/footer.php'); ?>
<?php } else {
  //Si no existe Sesion Redireccionamos
  header ('Location:/../aniworld');
  //echo $_SESSION['app_id']['id_tipouser'];
  } ?>
