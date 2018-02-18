<?php ob_start('comprimir_pagina'); ?>
<?php include ('nucleo/nucleo.php');
// $abc='123';
// echo encriptar($abc);
if (isset($_GET['page'])) {
      if ($_GET['page']=='index') {
        include('controllers/indexController.php');
      }
      // else if (file_exists('views/html/public/'.$_GET['page'].'.php')) {
      //     include ('views/html/public/'.$_GET['page'].'.php'); }
     else if (file_exists('controllers/'.$_GET['page'].'Controller.php')) {
          include ('controllers/'.$_GET['page'].'Controller.php');
      } else {echo 'No existe la Pagina';}
} else {
    include('controllers/indexController.php');
}?>

<?php
// Una vez que el búfer almacena nuestro contenido utilizamos "ob_end_flush" para usarlo y deshabilitar el búfer
ob_end_flush();
// Función para eliminar todos los espacios en blanco
function comprimir_pagina($buffer) {
    $busca = array('/\>[^\S ]+/s','/[^\S ]+\</s','/(\s)+/s');
    $reemplaza = array('>','<','\\1');
    return preg_replace($busca, $reemplaza, $buffer);
} 
