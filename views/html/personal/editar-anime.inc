<div class="col-md-10 cabecera-body" style="border:none;">
<h3>Editar Anime </h3>
</div>

<?php if ($rows>0) { ?>
  <div class="col-md-10 cuadro-body">
    <div class="row">
        <div class="item anime col-md-12" >
          <form target="_top" method="POST" action="personal/editar/<?= $_GET['dato'] ?>" class="form-horizontal" style="padding:20px;">
              <input type="hidden" name="id_anime" value="<?= $_GET['dato'] ?>">
            <fieldset>
              <legend> Modificar los datos del Anime </legend>
              <div class="form-group">
                <div class="col-md-2">
                    <label for="input" class="control-label">Nombre:</label>
                </div>
                <div class="col-md-6">
                  <input type="text" name="nom_anime" class="form-control" id="input" value="<?= $listado_r['nom_anime'] ?>" placeholder="Nombre del Anime" onkeypress="Validar(this.value)"  required>
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
                  <textarea name="descrip_anime" rows="3" class="form-control"> <?= $listado_r['descrip_anime'] ?> </textarea>
                  <span class="help-block">Escriba una Descripción , Opcional</span>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-8 col-lg-offset-3">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a class="btn btn-danger" target="_top" href="personal/listar/">Cancelar</a>
                </div>
              </div>
          </div><!-- <- hasta este div es item-anime -->
      </div><!-- <- hasta aquí este div es row -->
  </div><!-- <- hasta aquí este div es cuadro-body -->

<?php }  else { ?>
  <div class="col-md-10 cuadro-body">
    <div class="row">
        <div class="item anime col-md-12" >
          <h2 class="center">No existe anime con ese ID</h2>
          <?php echo $imagen; ?>
        </div><!-- <- hasta este div es item-anime -->
    </div><!-- <- hasta aquí este div es row -->
  </div><!-- <- hasta aquí este div es cuadro-body -->



<?php }?>
