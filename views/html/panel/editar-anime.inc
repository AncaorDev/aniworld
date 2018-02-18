<div class="col-md-10 cabecera-body" style="border:none;">
<h3>Editar Anime <?php //echo $_GET['dato'];?></h3>
</div>
<?php $conexion = new gestionBD();
      $anime=$conexion->ejecutar("SELECT * FROM anime WHERE id_anime = ".$_GET['dato']);
      $rows = $conexion->rows($anime);
      $anime_r = $conexion->recorrer($anime);

      $genero_a = $conexion->ejecutar("SELECT gen_anime FROM anime WHERE id_anime = ".$_GET['dato']);
      $genero_a_r = $conexion->recorrer($genero_a);
      $leng = strlen($genero_a_r[0]) ;
      if ($leng>1) {
        $genero_e_r = explode("," , $genero_a_r[0]);
      } else { $genero_e_r = $genero_a_r[0];  }
      $countgen = count($genero_e_r);
       ?>
<div class="col-md-10 cuadro-body">
  <div class="row">
      <div class="col-md-12 item-anime">
          <h4>Editar el anime : <?php echo $anime_r[1] ?></h4>
          <div class="div-full-2">
            <form target="_top" method="post" action="panel/anime/editar/<?php echo $_GET['dato']; ?>" enctype="multipart/form-data">
              <input type="hidden" name="id_anime" value="<?php echo $_GET['dato']; ?>">
            <div class="div-full-2">
              <div id="marcoVistaPrevia" class="data-img">
                  <h4 style="width:100%;" class="help-block">Imagen Actual </h4>
                    <h6 id="infoNombre" style="width:100%;" class="help-block"></h6>
                  <img id="vistaPrevia" class="img-anime" src="views/images/anime/principal/<?= $anime_r['img_anime'] ?> " alt="" />

              </div>
              <div class="data-anime">
                  <div class="div-media-2">
                      <div class="full">
                        <div class="form-horizontal">
                            <legend>Ingresar los Siguientes Datos:</legend>
                            <div class="form-group"  style="padding-left:12px;">
                              <div class="col-md-3">
                                <label  class="control-label"  for="exampleInputFile">Seleccionar Imagen</label>
                                  <!-- <input type="hidden" name="MAX_FILE_SIZE" value="700000" />  -->
                              </div>
                              <div id="botonera" class="col-md-8">
                                <input title="Selecione una Imagen"  class="form-control"  name="img_anime"  accept="image/*" type="file" id="archivo">
                                <span class="help-block">Solo JPG o PNG , Max. 700kbs, si desea conservar la imagen no seleccione ningun archivo</span>
                              </div>
                              <div class="col-md-1">
                                <input id="cancelar" type="button" value="Quitar Imagen"></input>
                              </div>
                            </div>
                            <div class="form-group" style="padding-left:12px;">
                              <div class="col-md-3">
                                  <label for="input" class="control-label">Nombre Anime:</label>
                              </div>
                              <div class="col-md-8">
                                  <input type="text" minlength="2" name="nom_anime" class="form-control" id="nom_anime" value="<?= $anime_r['nom_anime'] ?>" placeholder="Nombre anime" onkeypress="Validar(this.value)" required>
                              </div>
                              <div class="col-md-1">
                                  <label  id="response" class="control-label"> </label>
                              </div>
                            </div>
                            <div class="form-group" style="padding-left:12px;">
                              <div class="col-md-3">
                                <label  for="Episodios" class="control-label">Episodios:</label>
                              </div>
                              <div class="col-md-3">
                                  <input type="text" maxlength="4" name="epi_anime" class="form-control" id="episodios" value="<?= $anime_r['epi_anime'] ?>" placeholder="Episodios" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false, alert('Solo numeros');" required>
                              </div>
                              <div class="col-md-2">
                                <label  for="Estudio" class="control-label">Estudio:</label>
                              </div>
                              <div class="col-md-3">
                                <select name="id_estudio" class="form-control">
                                  <option style="border-bottom:6px solid black;" value="0">Elegir opción</option>
                                  <?php
                                    $estudio=$conexion->ejecutar("SELECT * FROM estudio");
                                    $re_estudio2=$conexion->recorrer($conexion->ejecutar("SELECT id_estudio FROM anime WHERE id_anime=".$_GET['dato']));
                                    $rows = $conexion->rows($estudio);
                                    if ($rows>0) {  $submit=1;
                                      while ($re_estudio=$conexion->recorrer($estudio)) {
                                            if ($re_estudio['id_estudio']==$re_estudio2['id_estudio']){
                                              echo '<option value="'.$re_estudio['id_estudio'].'" selected>'.$re_estudio['nom_estudio'].'</option>';
                                             } else {
                                              echo '<option value="'.$re_estudio['id_estudio'].'">'.$re_estudio['nom_estudio'].'</option>';
                                            }
                                      } // <-- fin while
                                    } else {
                                             echo '<option value="0">No hay estudios en la Base de Datos</option>';
                                             $submit=2; }   ?>
                                </select>
                              </div>
                            </div>
                            <div class="form-group" style="padding-left:12px;">
                              <div class="col-sm-3">
                                <label  for="Episodios" class="control-label" style="text-align:left;padding-left:0;padding-top:5px;">Generos:</label>
                              </div>
                              <div class="col-sm-8">
                                  <div class="checkbox">
                                    <?php
                                      $sqlgen= "SELECT * FROM genero";
                                      $submit = '';
                                      $generos=$conexion->ejecutar($sqlgen);
                                      $rows= $conexion->rows($generos);
                                      if ($rows>0) {
                                        $submit=1;
                                        while ($r_generos=$conexion->recorrer($generos)) {
                                        $listatotal[]=$r_generos[0];$listanombres[]=$r_generos[1]; };
                                           //print_r($listatotal); echo "<br>";//print_r($genero_e_r); echo "<br>"; //echo $countgen.'<br>';
                                        $a=0;
                                        while ($a < $rows) {
                                           for ($i=0;  $i < $countgen; $i++) {
                                                  if ($listatotal[$a]==$genero_e_r[$i]) {
                                                       $listafinal = array('0' => $listatotal[$a],'1' => 'true', '2' => $listanombres[$a]);
                                                        $i=$countgen;
                                                    } else {
                                                        $listafinal = array('0' => $listatotal[$a],'1' => 'false', '2' => $listanombres[$a]);
                                                  }
                                         };
                                         $listafinal2[]=$listafinal;
                                         $a++;}
                                        $num2=count($listafinal2); $c=0;
                                         //print_r($listafinal2);
                                         while ($c < $num2) {
                                              if ($listafinal2[$c][1]=='true') {
                                                echo '<label class="l-check"> <input type="checkbox"  name="gen_anime[]" value="'.$listafinal2[$c][0].'" checked>'.$listafinal2[$c][2].'</label> ';
                                              } else {
                                                echo '<label class="l-check"> <input type="checkbox"  name="gen_anime[]" value="'.$listafinal2[$c][0].'">'.$listafinal2[$c][2].'</label> ';
                                              } $c++;
                                           }
                                        }   else { ?>
                                        <label class="l-check">
                                            <h5>No hay generos en la base de datos, agregar primero generos por favor ;)</h5>
                                            <label class="l-check">
                                              <input type="checkbox"  name="gen_anime[]" value="<?php echo $r_generos[0]?>">
                                              <?php echo $r_generos[1] ?>
                                              <?php echo  $r_generos[0] ?>
                                            </label>
                                        </label>
                                      <?php $submit=2; } ;    ?>
                                  </div>
                                </div>
                            </div>
                            <div class="form-group" style="padding-left:12px;">
                              <div class="col-sm-3">
                                <label for="textArea" class="control-label">Sinopsis </label>
                              </div>
                              <div class="col-sm-8">
                                <textarea class="form-control" rows="5" name="sinopsis" id="textArea" maxlength="600" onkeyup="Contar(this.value)" ><?= $anime_r['descrip_anime'] ?></textarea>
                                <span class="help-block">Escriba una sinopsis - Max. 600 palabras</span>
                              </div>
                              <div class="col-sm-1">
                                  <label  id="contar" class="control-label"> </label>
                              </div>
                            </div>
                            <div class="form-group" style="padding-left:12px;">
                              <div class="col-sm-3">
                                <label  for="Episodios" class="control-label">Temporada:</label>
                              </div>
                              <div class="col-sm-3">
                                  <select name="id_temp" class="form-control">
                                    <option value="0">Elegir opción</option>
                                    <?php
                                      include('temporada.xlist');// <- En este archivo esta el listado de los estados >
                                      // $r_estado = array estados - $n_estado = catidad de estados
                                      if ($n_temporada > 0) {  $submit=1; $a=1;
                                        while ($a <= $n_temporada) {
                                          if ($a==$anime_r['id_temp']) {
                                            echo '<option value="'.$a.'" selected>'.$r_temporada[$a].'</option>';
                                          } else {
                                            echo '<option value="'.$a.'">'.$r_temporada[$a].'</option>';
                                          } $a++;
                                        }
                                      } else {
                                     echo '<option value="0">Revisar temporada.xlist</option>';
                                     $submit=2; }   ?>
                                  </select>
                              </div>
                              <div class="col-sm-2">
                                <label  for="Episodios" class="control-label">Estado:</label>
                              </div>
                              <div class="col-sm-3">
                                  <select name="id_estado" class="form-control">
                                    <option value="0">Elegir opción</option>
                                    <?php  include('estado.xlist');// <- En este archivo esta el listado de los estados
                                      // $r_estado = array estados - $n_estado = catidad de estados
                                      if ($n_estado > 0) {  $submit=1; $a=1;
                                        while ($a <= $n_estado) {
                                          if ($a==$anime_r['id_estado']) {
                                            echo '<option value="'.$a.'" selected>'.$r_estado[$a].'</option>';
                                          } else {
                                              echo '<option value="'.$a.'">'.$r_estado[$a].'</option>';
                                          } $a++;
                                        }
                                      } else {
                                     echo '<option value="0">Revisar xlist respectivo </option>';
                                     $submit=2; }   ?>
                                  </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-md-8 col-lg-offset-3">
                                <?php
                                $conexion->cerrar();
                                if ($submit==1) { echo '<button type="submit" class="btn btn-primary">Guardar</button>';}
                                else { echo '<button type="button" class="btn btn-primary disabled">Guardar</button>'; } ?>
                                <button type="reset" class="btn btn-danger">Cancelar</button>
                              </div>
                            </div>
                        </div>
                      </form>
                    </div>
                  </div>  <!-- <- hasta aquí div-media-2 -->
                </div>
              </div><!-- <- hasta este div es div-full-2 -->
          </div><!-- <- hasta este div es item-anime -->

    </div><!-- <- hasta aquí este div es row -->
</div><!-- <- hasta aquí este div es cuadro-body -->
