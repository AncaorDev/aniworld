<?php
session_start();
/* ---------------------------------------------------
    Obtenemos el host en la cual esta el proyecto
--------------------------------------------------- */
$https = (!empty($_SERVER['HTTPS']) ? 'https' : 'http');
if (stristr($_SERVER["HTTP_HOST"], "localhost") === false) {
    $host = $https . '://' . $_SERVER["HTTP_HOST"] .'/';
} else {
    $urldata = explode('/', $_SERVER['SCRIPT_NAME']);
    $folder = $urldata[1];
    $host = $https . '://' . $_SERVER["HTTP_HOST"] .'/' . $folder . '/' ;
}
//Constantes de APP
DEFINE('BASE',$host.'views');
DEFINE('HTML_DIR','views/html/');
DEFINE('TITLE','Aniworld');
//DEFINE('DIR_ROOT','/'.'ancaor'.'/');
DEFINE('COPY','Ancaor &#8480; 2015 - '.date('Y'));
DEFINE('DATE',date('d-Y-m'));
DEFINE('URL_HOME',$host);

//Estructura
require('models/gestionBD.php');
require('nucleo/bin/functions/functions.php');
require('nucleo/bin/functions/usuarios.php');
$usuarios = Usuarios();
 ?>
