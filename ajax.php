<?php

  if ($_POST) {
    require('nucleo/nucleo.php');
    switch (isset($_GET['mode']) ? $_GET['mode'] : null) {
      case 'login':
          require('nucleo/bin/ajax/login.php');
        break;

      case 'cerrar':
          require('nucleo/bin/ajax/cerrar.php');
      break;

      case 'verificar':
        require('nucleo/bin/ajax/verificar.php');
      break;

      case 'imagen':
        require('nucleo/bin/ajax/imagen.php');
      break;

      default:
          header ('Location:index.php');
        break;
    }
  } else {
        header ('Location:index.php');
  }

 ?>
