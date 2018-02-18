<div class="col-md-10 cabecera-body">
  <h4>Generos</h4>
  <div class="row">
    <div class="col-md-12 generos">

      <?php
      $gen = $conexion->ejecutar('SELECT * FROM genero');
      $num = $conexion->rows($gen);
      if ($num > 0) {
        while ($gen_r=$conexion->recorrer($gen)) {
          echo ' <a target="_top" href="gen/'.$gen_r[0].'"><span style="font-size:11px"; class="label label-default">'.$gen_r[1].'</span></a> ' ; }
      } else {
            echo '<h4>No hay generos agregados</h4>' ;
      }
      ?>
    </div>
  </div>
</div>
