<div class="col-md-10 cabecera-body" style="border:none;">
<h3>Editar Estudio </h3>
</div>
<?php $conexion = new gestionBD();
      $estudio=$conexion->ejecutar("SELECT * FROM estudio WHERE id_estudio = ".$_GET['dato']);
      $rows = $conexion->rows($estudio);
      $estudio_r = $conexion->recorrer($estudio);
?>
<div class="col-md-10 cuadro-body">
  <div class="row">
      <div class="item anime col-md-12" >
        <form target="_top" method="POST" action="panel/estudio/editar/<?= $_GET['dato'] ?>" class="form-horizontal" style="padding:20px;">
            <input type="hidden" name="id_estudio" value="<?= $_GET['dato'] ?>">
          <fieldset>
            <legend> Modificar los datos del Estudio </legend>
            <div class="form-group">
              <div class="col-md-2">
                  <label for="input" class="control-label">Nombre:</label>
              </div>
              <div class="col-md-6">
                <input type="text" name="nom_estudio" class="form-control" id="input" value="<?= $estudio_r['nom_estudio'] ?>" placeholder="Nombre del Estudio" onkeypress="Validar(this.value)"  required>
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
                <textarea name="descrip_estudio" rows="3" class="form-control"> <?= $estudio_r['descrip_estudio'] ?> </textarea>
                <span class="help-block">Escriba una Descripción , Opcional</span>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-8 col-lg-offset-3">
              <button type="submit" class="btn btn-primary">Guardar</button>
              <a class="btn btn-danger" target="_top" href="panel/estudio/">Cancelar</a>
              </div>
            </div>
          <?php $conexion->cerrar(); ?>
        </div><!-- <- hasta este div es item-anime -->
    </div><!-- <- hasta aquí este div es row -->
</div><!-- <- hasta aquí este div es cuadro-body -->
