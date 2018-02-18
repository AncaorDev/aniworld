<?php
$imagen='<div class="col-md-10 cabecera-body"><img class="img-full" src="views/images/app/panel/'.$_GET['subpage'].'.png" alt="" /></div>';
$imagen2='<div class="col-md-10 cabecera-body"><h2 style="position:absolute;">No existe la Página <br> Error 404</h2><img class="img-full" src="views/images/app/panel/error.jpg" alt="" /></div>';
 ?>
<?php include (HTML_DIR.'panel/accion-btn.inc'); ?>
<?php
require('models/classGenero.php');
  $anime = new Genero();
  $isset_id = isset($_GET['dato']); //&& is_numeric($_GET['dato']) && $_GET['dato'] > 0;
 if (isset($_GET['action'])) {
    switch (strtolower($_GET['action'])) {
      //Si la accion es agregar hara lo siguiente
      case 'agregar':
        if ($_POST) {
              $anime->agregar();
        } else {
              include (HTML_DIR.'panel/agregar-genero.inc');
        }
      break;

      //Si la accion es Editar hara lo siguiente
      case 'editar':
        if ($isset_id) {
          if ($_POST) {
            $anime->editar();
          } else {
            include(HTML_DIR.'panel/editar-genero.inc');
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
            include (HTML_DIR.'panel/delete-genero.inc');
          }
        } else {
          echo $imagen;
        }
      break;

      //Si la accion es listar hara lo siguiente
      case 'listar':
        include (HTML_DIR.'panel/data-genero.inc');
      break;

      default:
        include (HTML_DIR.'panel/data-genero.inc');
      break;
    }
 } else {
   include (HTML_DIR.'panel/data-genero.inc');
   //echo $imagen;
 }
 ?>
