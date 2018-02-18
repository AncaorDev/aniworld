<?php //$_GET['subpage'] ?>
<div class="col-md-10 cabecera-body" <?php if (isset($_GET['action'])) { echo "style='background-image:url(views/images/app/panel/".$_GET['subpage'].".png);background-size:80%;background-position:0px -140px;'";} ?>>
  <a target="_top" href="panel/<?php echo $_GET['subpage']?>/listar"><button type="button" class="btn btn-success" name="button">Listar <?php echo $_GET['subpage'] ?></button></a>
  <a target="_top" href="panel/<?php echo $_GET['subpage']?>/agregar"><button type="button" class="btn btn-success" name="button">Agregar <?php echo $_GET['subpage'] ?></button></a>
  <!-- <p>   <?php // echo $_GET['action']; ?>  </p> -->
</div>
  <?php if(isset($_GET['action'])) {      }
    else {?>
    <!-- <div class="col-md-10 cabecera-body">
    <img class="img-full" src="views/images/app/panel/<?php //echo $_GET['subpage'] ?>.png" alt="" />
    </div> -->
  <?php } ?>
