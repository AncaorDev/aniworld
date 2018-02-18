<div id="quitar" style="text-align:center;" class="col-md-10 cuadro-body">
  <div  style="height:500px;">
    <h5 class="center">Cargando, Espere un momento...</h5>
    <img src="views/images/alt.gif" alt="" />
  </div>
</div>
<div id="cargar" class="col-md-10 cuadro-body" style="display:none;">
  <div class="row">
      <div class="col-md-12 item-anime">
         <?php
         $lista=$conexion->ejecutar($sql);
         $n_lista=$conexion->rows($lista);
         if($n_lista>0) {
           while ($r_lista=$conexion->recorrer($lista)) {
             $estudio = $conexion->ejecutar('SELECT nom_estudio FROM estudio WHERE id_estudio='.$r_lista['id_estudio']) ;
             $estudio_r=$conexion->recorrer($estudio);
             $genero = $conexion->ejecutar('SELECT nom_gen FROM genero WHERE id_gen in ('.$r_lista['gen_anime'].')') ; ?>

             <div class="col-md-4 cuadro-anime">
                 <h4><?= $r_lista['nom_anime']  ?></h4>
                 <div class="div-col-2">
                   <div class="cont-img">
                       <img class="img-anime" src="views/images/anime/principal/<?= $r_lista['img_anime'] ?>" alt="" />
                   </div>
                   <div class="cont-data">
                     <p class="title"> Episodios:</p><span class="descrip"> <?= $r_lista['epi_anime']  ?></span>
                     <p class="title"> Estudio:</p><span class="descrip"> <?=  $estudio_r[0]  ?> </span>
                     <p class="title"> Temporada:</p><span class="descrip"> <?php
                     if (isset($nom_temp)) {
                      echo $nom_temp;
                     } else {
                           if ($n_temporada > 0) { $a=1;
                             while ($a <= $n_temporada) {
                               if ($a==$r_lista['id_temp']) {
                                 echo $r_temporada[$a];
                               } $a++;
                             }
                           } else {
                          echo 'Revisar temporada.xlist'; }
                     }
                       ?></span>
                     <!-- <p class="title"> <?= $r_lista['id_estado']  ?> -->
                   </div>
                 </div>
                 <div class="col-n-1">
                  <p class="title"> Generos:</p>
                  <span class="descrip"> <?php while ($genero_r=$conexion->recorrer($genero)) {  echo ' <span style="font-size:11px"; class="label label-default">'.$genero_r[0].'</span>' ; }?> </span>
                 </div>
                 <div class="col-1">
                   <p class="title">Sinopsis: </p>
                   <p class="descrip">
                     <?= $r_lista['descrip_anime']  ?></p>
                 </div>
                 <div class="base-cuadro" style="text-align:center;">
                     <!-- <a class="vmas" href="#">Ver mas  </a> -->
                     <?php if (isset($_SESSION['app_id'])) {
                       $nom_anime = strtolower($n_lista['nom_anime']);
                       $format = str_replace(" ", "-", $nom_anime);
                       $fav=false;
                       $sqlfav = "SELECT * FROM favoritos WHERE id_user=".$usuarios[$_SESSION['app_id']]['id_user'];
                       $idAnimes=$conexion->ejecutar($sqlfav);
                       $contArray=$conexion->rows($idAnimes);
                       if ($contArray>0) {
                         while ($arrayAnimes=$conexion->recorrer($idAnimes)) {
                           $ids[] = $arrayAnimes[1];}
                       }
                         for ($i=0; $i < $contArray; $i++) {
                             if ($n_lista['id_anime']==$ids[$i]) {
                               $fav = false;
                               $i = $contArray;
                             } else {
                               $fav = true;
                             }
                         }
                       echo '<a class="btn btn-primary" href="anime/'.$format.'">Ver Mas</span></a> ';
                       if ($fav) {
                         echo '<a class="btn btn-danger" href="favoritos/delete/'.$n_lista['id_anime'].'">Quitar de Favoritos<span class="glyphicon glyphicon-heart"></span></a>';
                       } else {
                         echo '<a class="btn btn-success" href="favoritos/add/'.$n_lista['id_anime'].'">Agregar a Favoritos<span class="glyphicon glyphicon-heart"></span></a>';
                       }

                     } else {
                       echo '<a  class="btn btn-danger"  role="button" data-toggle="modal" data-target="#Modal">
                       Add to Favorites <span class="glyphicon glyphicon-heart"></span></a>';
                     }?>
                 </div>
             </div>
    <?php } } else {
            echo '<h2 style="text-align:center;">No se encontraron registros</h2><hr>';
            echo  $imagen; } $conexion->liberar($lista);?>
        </div><!-- <- hasta este div es item-anime -->
    </div><!-- <- hasta aquí este div es row -->
</div><!-- <- hasta aquí este div es cuadro-body -->
