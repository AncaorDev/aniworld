<!-- <section class="cabecera">
  <div class="container">
    <div class="row">
      <div class="col-md-12 data-cabecera">
        <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
        Aniworld
        </div>
      </div>
    </div>
  </div>
</section> -->
<nav class="navbar navbar-default "> <!--navbar-fixed-top-->
  <div class="container">
    <div class="navbar-header">
     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
       <span class="sr-only">Toggle navigation</span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
     </button>
     <a class="navbar-brand" target="_top" href="/aniworld">Aniworld <span class="min">Alpha</span></a>
   </div>
   <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a target="_top" href="ver">Sobre la Web</a></li>
        <!-- <li><a href="#">Link</a></li> -->
        <form target="_top" class="navbar-form navbar-right" role="search">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="¿Que desa encontrar?">
          </div>
          <button type="submit" class="btn btn-default">Buscar</button>
        </form>
        <li class="dropdown">
          <a  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          Temporada <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <?php include('views/html/panel/temporada.xlist');// <- En este archivo esta el listado de los estados >
              // $r_estado = array estados - $n_estado = catidad de estados : Nota empezar por el indice 1
              $a=1;
              while ($a <= $n_temporada) {
                    echo '<li><a target="_top" href="temp/'.$a.'">'.$r_temporada[$a].'</a></li>'; $a++;
                }  ?>
          </ul>
        </li>
      <?php if (!isset($_SESSION['app_id'])) {?>
        <li class="dropdown">
          <a  class="dropdown-toggle"  role="button" data-toggle="modal" data-target="#Modal">
          <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Inicar Sesión </span></a>
        </li>
       <?php  } else { ?>
      <li class="dropdown">
         <a  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
           <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $usuarios[$_SESSION['app_id']]['nom_user']; ?><span class="caret"></span></a>
           <ul class="dropdown-menu">
            <?php if ($usuarios[$_SESSION['app_id']]['id_tipouser']==1 or $usuarios[$_SESSION['app_id']]['id_tipouser']==8): ?>
               <li><a target="_top" href="panel">Administar</a></li>
             <?php endif; ?>
             <li><a target="_top" href="favoritos">Mi Animes Favoritos</a></li>
             <?php if ($usuarios[$_SESSION['app_id']]['id_tipouser']==8): ?>
               <li><a target="_top" href="personal">Mi Lista</a></li>
             <?php endif; ?>
             <!-- <li><a href="#">Editar Perfil</a></li> -->
             <li role="separator" class="divider"></li>
             <li><a href="models/cerrar.php" target="_top" >Cerrar Sesión</a></li>
           </ul>
          </li>
         <?php } ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div>
</nav>
