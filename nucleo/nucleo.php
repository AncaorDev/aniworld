<?php
session_start();
//Constantes de APP
DEFINE('BASE','http://localhost/aniworld/views');
DEFINE('HTML_DIR','views/html/');
DEFINE('TITLE','Aniworld');
//DEFINE('DIR_ROOT','/'.'ancaor'.'/');
DEFINE('COPY','Ancaor &#8480; 2015 - '.date('Y'));
DEFINE('DATE',date('d-Y-m'));
DEFINE('URL_HOME','http://localhost/aniworld/');

//Estructura
require('models/gestionBD.php');
require('nucleo/bin/functions/functions.php');
require('nucleo/bin/functions/usuarios.php');
$usuarios = Usuarios();
 ?>
