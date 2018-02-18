  <?php if (isset($_GET['subpage'])){
    $imagen='<div class="col-md-10 cabecera-body"><img class="img-full" src="views/images/app/panel/'.$_GET['subpage'].'.png" alt="" /></div>';
    $imagen2='<div class="col-md-10 cabecera-body"><h2 style="position:absolute;">No existe la Página <br> Error 404</h2><img class="img-full" src="views/images/app/panel/error.jpg" alt="" /></div>';
    //Cuando la sub pagina es anime
    if ($_GET['subpage']=='anime') {
        include ('accion-btn.inc');
        if (isset($_GET['action'])) {
           if ($_GET['action']=='listar') {
               include ('data-anime.inc');
           } else if ($_GET['action']=='editar') {
                  if (isset($_GET['dato'])) {
                      if ($_GET['dato']!='') {
                          include ('editar-anime.inc');
                      } else {     include ('data-anime.inc');   }
                  } else {      }
            } else if ($_GET['action']=='agregar') {
                   include ('agregar-anime.inc');                    
            } else if ($_GET['action']=='' || $_GET['action']==null) {
              echo $imagen;
            } else {  echo $imagen2;   }
         }
     }
  //Cuando la sub pagina es genero
             else if ($_GET['subpage']=='genero') {
              include ('accion-btn.inc');
                 if (isset($_GET['action'])) {
                     if ($_GET['action']=='listar') {
                          include ('data-genero.inc');
                     } else if ($_GET['action']=='editar') {
                          if (isset($_GET['dato'])) {
                              if ($_GET['dato']!='') {
                                 include ('editar-genero.inc');
                              } else {     include ('data-genero.inc');      }
                          } else {      }
                     } else if ($_GET['action']=='' || $_GET['action']==null) {
                          echo $imagen;
                     } else {  echo $imagen2;   }
                 }
              }
 //Cuando la sub pagina es estudio
           else if ($_GET['subpage']=='estudio') {
               include ('accion-btn.inc');
                if (isset($_GET['action'])) {
                    if ($_GET['action']=='listar') {
                         include ('data-estudio.inc');
                    } else if ($_GET['action']=='editar') {
                         if (isset($_GET['dato'])) {
                             if ($_GET['dato']!='') {
                                include ('editar-estudio.inc');
                             } else {     include ('data-estudio.inc');      }
                         } else {      }
                    } else if ($_GET['action']=='' || $_GET['action']==null) {
                         echo $imagen;
                    } else {  echo $imagen2;   }
                }
  //cuando la sub pagina sea vacia o no exista
            }  else if($_GET['subpage']=='' || $_GET['subpage']==null){
                  include('cab-principal.inc');
              } else {       }
  //Cuando no este definida subpage
        }  else { include('cab-principal.inc'); }
?>
