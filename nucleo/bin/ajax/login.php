<?php

if (!empty($_POST['user']) and !empty($_POST['pass'])) {
  $con = new gestionBD();
  //$con=gestionBD::getInstance();
  //$con->real_escape_string de mysqli
  $dato = $_POST['user'];
  $pass = Encriptar($_POST['pass']);
  $sql = $con->ejecutar("SELECT id_user FROM user WHERE (nom_user='$dato' OR mail_user='$dato') AND pass_user='$pass' LIMIT 1;");
  if ($con->rows($sql)>0) {
      if ($_POST['sesion']) {
        ini_set('session.cookie_lifetime', time() + (60*60*24));
      }
  $_SESSION['app_id'] = $con->recorrer($sql)[0];
    echo 1;
  } else {
    echo '<div class="alert alert-dismissible alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>ERROR, Datos no Validos</strong>
          </div>';
  }
  $con->liberar($sql);
  $con->cerrar();
} else {
  echo '<div class="alert alert-dismissible alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>ERROR, Ingresar Datos!</strong>
        </div>';
}

 ?>
