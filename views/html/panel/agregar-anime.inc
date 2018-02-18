<div>
<div class="col-md-10 cabecera-body" style="border:none;">
<h3>Agregar Anime </h3>
<?php if (isset($_GET['std'])){
  if ($_GET['std']==1) {?>
  <div class="alert alert-dismissible alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong> Agregado Correctamente   </strong>
  </div>
<?php }else if ($_GET['std']==2){ ?>
  <div class="alert alert-dismissible alert-falied">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Todos Los campos deben estar llenos  </strong>
  </div>
<?php } } ?>
</div>
  <div style="text-align:center;" class="col-md-10 cuadro-body">
    <div id="quitar" class="progress">
      <div id="bar" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
      </div>
    </div>
  </div>
  <div id="cargar" class="col-md-10 cuadro-body" style="display:none;">
    <div class="row">
      <div class="col-md-12 item-anime">
          <!-- <h4>Hai to Gensou no Grimgar</h4> -->
          <form target="_top" method="post" action="panel/anime/agregar" enctype="multipart/form-data">
          <div class="div-full-2">
            <div id="marcoVistaPrevia" class="data-img">
                <h4 style="width:100%;" class="help-block">Vista Previa Imagen</h4>
                  <h6 id="infoNombre" style="width:100%;" class="help-block"></h6>
                <img id="vistaPrevia" class="img-anime" src="views/images/imagen.jpg" alt="" />

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
                              <input title="Selecione una Imagen"  class="form-control"  name="img_anime"  accept="image/*" type="file" id="archivo" required="true">
                              <span class="help-block">Solo JPG o PNG , Max. 700kbs</span>
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
                                <input type="text" minlength="2" name="nom_anime" class="form-control" id="nom_anime" placeholder="Nombre anime" onkeypress="Validar(this.value)" required>
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
                                <input type="text" maxlength="4" name="epi_anime" class="form-control" id="episodios" placeholder="Episodios" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false, alert('Solo numeros');" required>
                            </div>
                            <div class="col-md-2">
                              <label  for="Estudio" class="control-label">Estudio:</label>
                            </div>
                            <div class="col-md-3">
                              <select name="id_estudio" class="form-control">
                                <option style="border-bottom:6px solid black;" value="0">Elegir opción</option>
                                <?php
                                  $conexion = new gestionBD();
                                  $sql= "SELECT * FROM estudio";
                                  $submit = '';
                                  $estudio=$conexion->ejecutar($sql);
                                  $rows= $conexion->rows($estudio);
                                  if ($rows>0) {
                                    $submit=1;
                                    while ($re_estudio=$conexion->recorrer($estudio)) { ?>
                                        <option value="<?php echo $re_estudio[0]?>"><?php echo $re_estudio[1] ?></option>
                                  <?php  }; } else { ?>
                                          <option value="0">No hay estudios en la Base de Datos</option>
                                  <?php $submit=2;}   ?>

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
                                      while ($r_generos=$conexion->recorrer($generos)) { ?>
                                        <label class="l-check">
                                          <input type="checkbox"  name="gen_anime[]" value="<?php echo $r_generos[0] ?>">
                                          <?php echo $r_generos[1] ?>
                                        </label>
                                    <?php  }; } else { ?>
                                      <label class="l-check">
                                          <h5>No hay generos en la base de datos, agregar primero generos por favor ;)</h5>
                                      </label>
                                    <?php $submit=2; } ; $conexion->cerrar();    ?>
                                </div>
                              </div>
                          </div>
                          <div class="form-group" style="padding-left:12px;">
                            <div class="col-sm-3">
                              <label for="textArea" class="control-label">Sinopsis </label>
                            </div>
                            <div class="col-sm-8">
                              <textarea class="form-control" rows="5" name="sinopsis" id="textArea" maxlength="600" onkeyup="Contar(this.value)" ></textarea>
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
                                  <?php include('temporada.xlist');// <- En este archivo esta el listado de los estados >
                                    // $r_estado = array estados - $n_estado = catidad de estados : Nota empezar por el indice 1
                                    $a=1;
                                    while ($a <= $n_temporada) {
                                          echo '<option value="'.$a.'">'.$r_temporada[$a].'</option>'; $a++;
                                      }  ?>
                                </select>
                            </div>
                            <div class="col-sm-2">
                              <label  for="Episodios" class="control-label">Estado:</label>
                            </div>
                            <div class="col-sm-3">
                                <select name="id_estado" class="form-control">
                                  <option value="0">Elegir opción</option>
                                  <?php include('estado.xlist');// <- En este archivo esta el listado de los estados >
                                    // $r_estado = array estados - $n_estado = catidad de estados : Nota empezar por el indice 1
                                    $a=1;
                                    while ($a <= $n_estado) {
                                          echo '<option value="'.$a.'">'.$r_estado[$a].'</option>'; $a++;
                                      }  ?>
                                </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-md-8 col-lg-offset-3">
                              <?php
                              if ($submit==1) { echo '<button type="submit" class="btn btn-primary">Agregar</button>';}
                              else { echo '<button type="button" class="btn btn-primary disabled">Agregar</button>'; }?>
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
</div>
<script type="text/javascript">

</script>
