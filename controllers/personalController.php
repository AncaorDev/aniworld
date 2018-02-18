<?php
$imagen='<div class="col-md-12 cabecera-body"><img class="img-full" src="views/images/nise.png" alt="" /></div>';
  //Verficamos los permisos y si existe el usuario
if (isset($_SESSION['app_id']) and $usuarios[$_SESSION['app_id']]['id_tipouser'] == 8) { ?>
<?php include (HTML_DIR.'includes/head.php'); // Aquí comienza el Cuerpo ?>
<?php include (HTML_DIR.'includes/navbar.php') ?>
<section class="body">
	<div class="container">
		<div class="row cont-body">
	    <?php include (HTML_DIR.'includes/iniciar-sesion.inc') ?>
					<div class="col-md-10 cabecera-body">
						<h3>Lista Personal de Animes </h3>
						<?php //echo isset($_GET['subpage'])?$_GET['subpage']:$_GET['subpage']='anime'; ?>
					</div>
					<div  class="col-md-10 cabecera-body">
						<a target="_top" href="/aniworld/personal"><button class="btn btn-primary" type="button" name="button"><span class="glyphicon glyphicon-home"></span></button></a>
            <a target="_top" href="/aniworld/personal/listar"><button class="btn btn-primary" type="button" name="button">Listar Animes</button></a>
            <a target="_top" href="/aniworld/personal/agregar"><button class="btn btn-primary" type="button" name="button">Agregar Animes</button></a>
					</div>
          <?php
          require('models/classPersonal.php');
            $anime = new Personal();
            $isset_id = isset($_GET['dato']); //&& is_numeric($_GET['dato']) && $_GET['dato'] > 0;
            $conexion = new gestionBD();
            $sql = "SELECT * FROM lista";
            $listado=$conexion->ejecutar($sql);
            $rows= $conexion->rows($listado);
           if (isset($_GET['action'])) {
              switch (strtolower($_GET['action'])) {
                //Si la accion es agregar hara lo siguiente
                case 'agregar':
                  if ($_POST) {
                        $anime->agregar();
                  } else {
                        include (HTML_DIR.'personal/agregar-anime.inc');
                  }
                break;

                //Si la accion es Editar hara lo siguiente
                case 'editar':
                  if ($isset_id) {
                    if ($_POST) {
                      $anime->editar();
                    } else {
                      $listado=$conexion->ejecutar("SELECT * FROM lista WHERE id_anime = ".$_GET['dato']);
                      $rows = $conexion->rows($listado);
                      $listado_r = $conexion->recorrer($listado);

                      include(HTML_DIR.'personal/editar-anime.inc');
                    }
                  } else {
                    echo $imagen;
                  }
                break;

                //Si la accion es Eliminar hara lo siguiente
                case 'eliminar':
                  if ($isset_id) {
                    if ($_POST) {
                      $anime->eliminar();
                    } else {
                      include (HTML_DIR.'personal/delete-anime.inc');
                    }
                  } else {
                    echo $imagen;
                  }
                break;

                //Si la accion es listar hara lo siguiente
                case 'listar':
                  include (HTML_DIR.'personal/data-anime.inc');
                break;

                default:
                  include (HTML_DIR.'personal/data-anime.inc');
                break;
              }
           } else {
             // Si no esta definida no mostramos nada
              include (HTML_DIR.'personal/data-anime.inc');
           }
          ?>
					<?php // include("panel-principal.inc") ?>
				</div><!-- <- hasta aquí este div es cont-body -->
			</div><!-- <- hasta aquí este div es el container general -->
</section>
<?php include(HTML_DIR.'includes/final-body.inc'); ?>
<?php include (HTML_DIR.'includes/footer.php'); ?>
<?php  $conexion->liberar($listado); $conexion->cerrar(); } else {
  //Si no existe Sesion Redireccionamos
  header ('Location:/../aniworld');
  //echo $_SESSION['app_id']['id_tipouser'];
  } ?>
