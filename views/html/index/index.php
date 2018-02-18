<?php include (HTML_DIR.'includes/head.php'); ?>
<?php include (HTML_DIR.'includes/navbar.php');
$conexion = new gestionBD();?>
<section class="body">
	<div class="container">
		<div class="row cont-body">
			<?php include (HTML_DIR.'includes/iniciar-sesion.inc') ?>
			<?php include (HTML_DIR.'includes/generos.inc') ?>
			<div id="quitar" style="text-align:center;" class="col-md-10 cuadro-body">
				<div  style="height:500px;">
					<h5 class="center">Cargando, Espere un momento...</h5>
					<img src="views/images/alt.gif" alt="" />
				</div>
		  </div>s
				<div id="cargar" class="col-md-10 cuadro-body" style="display:none;">
					<h3 style="text-align:center;" >Animes Agregados Recientemente</h3>
	      	<div class="row">
						<?php
				      $anime=$conexion->ejecutar("SELECT * FROM anime");
				      $rows= $conexion->rows($anime);
				      if ($rows>0) {
				      while ($anime_r=$conexion->recorrer($anime)) {
				      $estudio = $conexion->ejecutar('SELECT nom_estudio FROM estudio WHERE id_estudio='.$anime_r['id_estudio']) ;
				      $estudio_r=$conexion->recorrer($estudio);
				      $genero = $conexion->ejecutar('SELECT nom_gen FROM genero WHERE id_gen in ('.$anime_r['gen_anime'].')') ;?>
							<div class="col-md-4 cuadro-anime">
									<h4><?= $anime_r['nom_anime']  ?></h4>
									<div class="div-col-2">
										<div class="cont-img">
												<img class="img-anime" src="views/images/anime/principal/<?= $anime_r['img_anime'] ?>" alt="" />
										</div>
										<div class="cont-data">
											<p class="title"> Episodios:</p><span class="descrip"> <?= $anime_r['epi_anime']  ?></span>
											<p class="title"> Estudio:</p><span class="descrip"> <?=  $estudio_r[0]  ?> </span>
											<p class="title"> Temporada:</p><span class="descrip"> <?php
                          include('views/html/panel/temporada.xlist');// <- En este archivo esta el listado de los estados >
                          // $r_estado = array estados - $n_estado = catidad de estados
                          if ($n_temporada > 0) { $a=1;
                            while ($a <= $n_temporada) {
                              if ($a==$anime_r['id_temp']) {
                                echo $r_temporada[$a];
																$a=$n_temporada+1;
                              } $a++;
                            }
                          } else {
                         echo 'Revisar temporada.xlist'; }  ?></span>
											<!-- <p class="title"> <?= $anime_r['id_estado']  ?> -->
										</div>
									</div>
									<div class="col-n-1">
										<p class="title">Generos: </p>
										<span class="generos"> <?php while ($genero_r=$conexion->recorrer($genero)) {  echo ' <span style="font-size:11px"; class="label label-default">'.$genero_r[0].'</span>' ; }?> </span>
									</div>
									<div class="col-1">
										<p class="title">Sinopsis: </p>
										<p class="descrip">
											<?= $anime_r['descrip_anime']  ?></p>
									</div>
									<div class="base-cuadro" style="text-align:center;">
											<!-- <a class="vmas" href="#">Ver mas  </a> -->
											<?php $nom_anime = strtolower($anime_r['nom_anime']);
												$format = str_replace(" ", "-", $nom_anime); 
						if (isset($_SESSION['app_id'])) {
												
												 $fav=false;
                       $sqlfav = "SELECT lista_animes FROM favoritos WHERE id_user=".$usuarios[$_SESSION['app_id']]['id_user'];
                       //Ejecución de la consulta.
                        $run_sqlfav=$conexion->ejecutar($sqlfav);
                        //Consultamo si se obtuvieron datos
                        $cont_data=$conexion->rows($run_sqlfav);  
                        // Si los datos son mayores de 0 quiere decir que si tendra lista que mostrar
                        if ($cont_data>0) {
                          // Guardamos la lista en daots
                          $datos = $conexion -> recorrer($run_sqlfav);
                          $ids = explode(',', $datos[0]);
                          // Al ser "$datos" un array asigamos a la posición 0 el dato 0
                        } else { $datos[0] = 0; }
                        $datafav = count($ids);
                        for ($i=0; $i < $datafav; $i++) {
                             if ($anime_r['id_anime']==$ids[$i]) {
                               $fav = true;
                               $i = $datafav;
                             } else {
                               $fav = false;
                             }
                         }
                       
                       if ($fav) {
                       	echo '<a class="btn btn-primary" href="anime/'.$format.'">Ver Mas</span></a> ';
                         echo '<a target="_top" class="btn btn-danger" href="favoritos/delete/'.$anime_r['id_anime'].'">Quitar de Favoritos<span class="glyphicon glyphicon-heart"></span></a>';

                       } else {
                       	echo '<a class="btn btn-primary" href="anime/'.$format.'">Ver Mas</span></a> ';
                         echo '<a target="_top" class="btn btn-success" href="favoritos/add/'.$anime_r['id_anime'].'">Agregar a Favoritos<span class="glyphicon glyphicon-heart"></span></a>';
                       }

                     } else {
                     	echo '<a class="btn btn-primary" href="anime/'.$format.'">Ver Mas</span></a> ';
                       echo '<a  class="btn btn-danger"  role="button" data-toggle="modal" data-target="#Modal">
                       Add to Favorites <span class="glyphicon glyphicon-heart"></span></a>';
                     }?>
                 </div>
             </div>
					<?php   } $conexion->cerrar(); } else { ?>

					<h4 style="text-align:center;" >No hay animes Agregados</h4>
				<?php  } ?>
	      	</div> 		<!-- <- hasta aquí este div es el row -->
				</div> <!-- <- hasta aquí este div es el cuadro-body-->
			</div> <!-- <- hasta aquí este div es el cont-body-->
		</div> <!-- <- hasta aquí este div es el container general-->
</section>

<?php include(HTML_DIR.'includes/final-body.inc'); ?>
<?php include (HTML_DIR.'includes/footer.php'); ?>
