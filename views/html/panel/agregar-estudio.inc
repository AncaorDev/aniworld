<div class="col-md-10 cabecera-body" style="border:none;">
<h3>Agregar Estudio </h3>
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
<div class="col-md-10 cuadro-body">
  <div class="row">
      <div class="item anime col-md-12" >
        <form target="_top" method="POST" action="panel/estudio/agregar" class="form-horizontal" style="padding:20px;">
          <fieldset>
            <legend>Por favor ingrese los siguientes datos</legend>
            <div class="form-group">
              <div class="col-md-2">
                  <label for="input" class="control-label">Nombre:</label>
              </div>
              <div class="col-md-6">
                <input type="text" name="nom_estudio" class="form-control" id="input" placeholder="Nombre del Estudio" onkeypress="Validar(this.value)"  required>
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
                <textarea name="descrip_estudio" rows="3" class="form-control"></textarea>
                <span class="help-block">Escriba una Descripción , Opcional</span>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-8 col-lg-offset-3">
              <button type="submit" class="btn btn-primary">Agregar</button>
              <button type="reset" class="btn btn-danger">Cancelar</button>
              </div>
            </div>
        </div><!-- <- hasta este div es item-anime -->
    </div><!-- <- hasta aquí este div es row -->
</div><!-- <- hasta aquí este div es cuadro-body -->
