<div class="col-md-10 cabecera-body" style="border:none;">
<h3>Listado de Animes</h3>
</div>
<div class="col-md-10 cuadro-body">
  <div class="row">

<?php $conexion = new gestionBD();
      $sql = "SELECT * FROM anime";
      $anime=$conexion->ejecutar($sql);
      $rows= $conexion->rows($anime);
      if ($rows>0) {
      while ($anime_r=$conexion->recorrer($anime)) {
      $estudio = $conexion->ejecutar('SELECT nom_estudio FROM estudio WHERE id_estudio='.$anime_r['id_estudio']) ;
      $estudio_r=$conexion->recorrer($estudio);
      $genero = $conexion->ejecutar('SELECT nom_gen FROM genero WHERE id_gen in ('.$anime_r['gen_anime'].')') ;?>

      <div class="col-md-12 item-anime">
          <h4><?php echo $anime_r['nom_anime'] ?></h4>
          <div class="div-full-2">
            <div class="data-img">
                <img class="img-anime" src="views/images/anime/principal/<?php echo $anime_r['img_anime']; ?>" alt="" />
            </div>
            <div style="text-align:right;" class="base-cuadro">
                <a target="_top" class="btn btn-primary" href="panel/anime/editar/<?php echo $anime_r['id_anime']; ?>"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
                <a target="_top" class="btn btn-danger" href="panel/anime/eliminar/<?php echo $anime_r['id_anime']; ?>"> <span class="glyphicon glyphicon-remove"></span> Eliminar</a>
            </div>
            <div class="data-anime-lg">
            </div>
            <div class="data-anime">
                <div class="div-media-2" style="padding-left:12px;">
                    <div class="media1">
                     <p class="title"> Episodios: <span class="descrip"> <?php echo $anime_r['epi_anime']; ?> </span></p>
                     <p class="title"> Estudio: <span class="descrip"> <?php echo $estudio_r[0]?></span></p>
                     <p class="title"> Temporada: <span class="descrip">   <?php
                         include('temporada.xlist');// <- En este archivo esta el listado de los estados >
                         // $r_estado = array estados - $n_estado = catidad de estados
                         if ($n_temporada > 0) { $a=1;
                           while ($a <= $n_temporada) {
                             if ($a==$anime_r['id_temp']) {
                               echo $r_temporada[$a];
                             } $a++;
                           }
                         } else {
                        echo 'Revisar temporada.xlist'; }  ?>
                    </div>
                    <div class="media1">
                     <p class="title"> Generos:<span class="descrip"> <?php while ($genero_r=$conexion->recorrer($genero)) {  echo ' <span style="font-size:12px"; class="label label-default">'.$genero_r[0].'</span>' ; }?> </span></p>
                    </div>
                    <div class="full">
                      <p class="title">Sinopsis:
                      <span class="descrip">
                         <?php echo $anime_r['descrip_anime']; ?></span></p>
                    </div>
                </div>
              </div>
            </div>
          </div><!-- <- hasta este div es item-anime -->
        <?php   } }  else {  ?>
            <div class="col-md-12 item-anime">
              <h2>No hay animes Agregados</h2>
            </div>
      <?php   } $conexion->cerrar();?>
    </div><!-- <- hasta aquí este div es row -->
</div><!-- <- hasta aquí este div es cuadro-body -->
