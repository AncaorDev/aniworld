<div class="col-md-10 cabecera-body" style="border:none;">
<h3>Mi lista Personal de Animes</h3>
</div>
<div class="col-md-10 cuadro-body">
  <div class="row">
      <div class="col-md-12 item-anime">
        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">Lista de Animes Personales</div>
          <!-- Se intento usar tablas, ver en archivos elimnados.data "Estudio - e1" -->
            <div class="row data-estudio" style="padding:8px;border-bottom:2px solid rgb(127, 202, 136); width:100%; margin:0 auto;">
              <div class="col-md-1" style="text-align:center;border-top:1px solid rgb(127, 202, 136);">
                  <h4>Id</h4>
              </div>
              <div class="col-md-3" style="text-align:center;border-top:1px solid rgb(127, 202, 136);">
                  <h4>Nombre</h4>
              </div>
              <div class="col-md-5" style="text-align:center;border-top:1px solid rgb(127, 202, 136);">
                  <h4>Descripción</h4>
              </div>
              <div class="col-md-3" style="text-align:center;border-top:1px solid rgb(127, 202, 136);">
                  <h4>Acciones</h4>
              </div>
            </div>
        <?php
              if ($rows>0) {
              while ($listado_r=$conexion->recorrer($listado)) { ?>
              <div class="row data-estudio" style="padding:8px;border-bottom:2px solid rgb(127, 202, 136); width:100%; margin:0 auto;">
                <div class="col-md-1" style="text-align:center;border-top:0px solid rgb(127, 202, 136);">
                    <h4 style="color:black;"><?php echo $listado_r[0] ?></h4>
                </div>
                <div class="col-md-3" style="text-align:center;border-top:0px solid rgb(127, 202, 136);">
                    <h4 style="color:black;"><?php echo $listado_r[1] ?></h4>
                </div>
                <div class="col-md-5" style="text-align:center;border-top:0px solid rgb(127, 202, 136);">
                    <p style="color:black;"> <?php echo $listado_r[2] ?> </p>
                </div>
                <div class="col-md-3" style="text-align:center">
                    <a target="_top" href="personal/editar/<?php echo $listado_r[0] ?>"> <button class="btn btn-primary" type="button" name="button" >Editar</button></a>
                    <a target="_top" href="personal/eliminar/<?php echo $listado_r[0] ?>"><button class="btn btn-danger" type="button" name="button" >Eliminar</button></a>
                </div>
              </div>
         <?php } } else { echo '<h2 style="text-align:center;">No hay información en la Base de Datos</h2>'; }?>
        </div><!-- <- hasta este div es item-anime -->
    </div><!-- <- hasta aquí este div es row -->
</div><!-- <- hasta aquí este div es cuadro-body -->
