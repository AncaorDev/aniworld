<div class="col-md-10 cabecera-body" style="border:none;">
<h3> Editar Genero </h3>
</div>
<?php $conexion = new gestionBD();
      $genero=$conexion->ejecutar("SELECT * FROM genero WHERE id_gen = ".$_GET['dato']);
      $rows = $conexion->rows($genero);
      $genero_r = $conexion->recorrer($genero);
?>
<div class="col-md-10 cuadro-body">
  <div class="row">
      <div class="item anime col-md-12" >
        <form target="_top" method="POST" action="panel/genero/editar/<?= $_GET['dato']  ?>" class="form-horizontal" style="padding:20px;">
          <input type="hidden" name="id_gen" value="<?= $_GET['dato'] ?>">
          <fieldset>
            <legend> Modificar los datos del Genero </legend>
            <div class="form-group">
              <div class="col-md-2">
                  <label for="input" class="control-label">Nombre:</label>
              </div>
              <div class="col-md-6">
                <input type="text" name="nom_gen" class="form-control" id="input" value="<?= $genero_r['nom_gen'] ?>" onkeypress="Validar(this.value)"  required>
              </div>
              <div class="col-md-1">
                  <label  id="response" class="control-label"> </label>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-2">
                  <label for="input" class="control-label">Descripción:</label>
              </div>
              <div class="col-md-6">
                <textarea name="descrip_gen" rows="3" class="form-control"> <?= $genero_r['descrip_gen'] ?>  </textarea>
                <span class="help-block">Escriba una Descripción , Opcional</span>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-8 col-lg-offset-3">
              <button type="submit" class="btn btn-primary">Guardar</button>
              <button type="reset" class="btn btn-danger">Cancelar</button>
              </div>
            </div>
        <?php $conexion->cerrar(); ?>
        </div><!-- <- hasta este div es item-anime -->
    </div><!-- <- hasta aquí este div es row -->
</div><!-- <- hasta aquí este div es cuadro-body -->
