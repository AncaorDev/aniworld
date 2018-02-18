<div class="col-md-10 cabecera-body" style="border:none;">
<h3> Eliminar Estudio </h3>
</div>

<div class="col-md-10 cuadro-body">
  <div class="row">
    <form target="_top" class="" action="panel/estudio/eliminar/<?php echo $_GET['dato']; ?>" method="POST">
      <input type="hidden" name="id_estudio" value="<?php echo $_GET['dato']; ?>">
      <div class="col-md-12 item-anime">
        <div class="jumbotron">
        <p>¿Esta Seguro que desea eliminar esa información?</p>
        <p><input type="submit" class="btn btn-danger btn-lg" value="Eliminar"> <input type="button" class="btn btn-primary btn-lg" value="Cancelar"></p>
        </div>
      </div><!-- <- hasta este div es item-anime -->
    </form>
  </div><!-- <- hasta aquí este div es row -->
</div><!-- <- hasta aquí este div es cuadro-body -->
