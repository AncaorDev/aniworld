<?php
$imagen='<div class="col-md-10 cabecera-body"><img class="img-full" src="views/images/app/panel/'.$_GET['subpage'].'.png" alt="" /></div>';
$imagen2='<div class="col-md-10 cabecera-body"><h2 style="position:absolute;">No existe la Página <br> Error 404</h2><img class="img-full" src="views/images/app/panel/error.jpg" alt="" /></div>';
 ?>
<?php include (HTML_DIR.'panel/accion-btn.inc'); ?>
<?php
require('models/classEstudio.php');
  $estudio = new Estudio();
  //$isset_id = isset($_POST['dato']); //&& is_numeric($_GET['dato']) && $_GET['dato'] > 0;
 if (isset($_GET['action'])) {
    switch (strtolower($_GET['action'])) {
      //Si la accion es agregar hara lo siguiente
      case 'agregar':
        if ($_POST) {
              $estudio->agregar();
        } else {
              include (HTML_DIR.'panel/agregar-estudio.inc');
        }
      break;

      //Si la accion es Editar hara lo siguiente
      case 'editar':
        if ($_POST) {
           $estudio->editar();
        } else {
            include(HTML_DIR.'panel/editar-estudio.inc');
        }
      break;

      //Si la accion es Eliminar hara lo siguiente
      case 'eliminar':
        if ($_POST) {
           $estudio->eliminar();
      } else {
            include (HTML_DIR.'panel/delete-estudio.inc');
      }
      break;

      //Si la accion es listar hara lo siguiente
      case 'listar':
        include (HTML_DIR.'panel/data-estudio.inc');
      break;

      default:
        include (HTML_DIR.'panel/data-estudio.inc');
      break;
    }
 } else {
   include (HTML_DIR.'panel/data-estudio.inc');
    //echo $imagen;
 }
 ?>
