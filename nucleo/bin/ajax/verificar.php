<?php

  if ($_POST) {
    if (isset($_POST['data'])) {
      $dato = $_POST['data'];
      $cant=strlen($dato);
        if ($dato != null or $dato != '') {
            if ($cant>0) {
              echo 'ok';
            }else {
              echo 'vacio';
            }
        } else {
          echo 'vacio';
        }
    }
    if (isset($_POST['contar'])) {
      $dato = $_POST['contar'];
      $cant=strlen($dato);
      $total=600-$cant;
        if ($dato != null or $dato != '') {
            if ($cant>0) {
              echo 'Le quedan: '. $total .' carácteres';
            }else {
              echo 'vacio';
            }
        } else {
          echo 'vacio';
        }
    }
  } else {
    header('../../../');
  }

 ?>
