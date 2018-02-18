<?php
function Usuarios() {
  $con = new gestionBD();
  $sql = $con->ejecutar("SELECT * FROM user;");
  if ($con ->rows($sql)>0) {
    while ($d = $con->recorrer($sql)) {
      $usuarios[$d['id_user']] = array(
      'id_user' =>  $d['id_user'],
      'id_tipouser' => $d['id_tipouser'],
      'nom_user' =>  $d['nom_user'],
      'pass_user' =>  $d['pass_user'],
      'mail_user' =>  $d['mail_user'],
      );
    }
  } else {
    $usuarios = false;
  }
  $con->liberar($sql);
  $con->cerrar();
  return $usuarios;
}
 ?>
