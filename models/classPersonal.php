<?php
class Personal {
//Creamos las variables
  private $conexion;
  private $id_anime;
  private $id_user;
  private $nom_anime;
  private $descrip_anime;

  public function __construct(){
    $this->conexion = new gestionBD();
  }

  function Agregar($id_user) {
    ///// -- ERRORES -- //// > Expandir(Atom)
    // 1.- Nombre de anime
    // 2.- Descripción

    ///// -- 1.- PARA EL NOMBRE -- ////
    $this->error = 0;
    if (isset($_POST['nom_anime']) &&  $this->error==0) {
        $this->nom_anime = $_POST['nom_anime'];
        if ($this->nom_anime == "" or $this->nom_anime == null) {
            $this->error = 1;
            //echo '<script language="javascript">window.location="/aniworld/panel/anime/agregar/2"</script>' ;
            $html = '<div class="col-md-10 cabecera-body" style="border:none;">';
            $html .= '<div class="alert alert-dismissible alert-danger">';
            $html .= '<strong>ERROR</strong> <p>Por favor Rellene el campo nombre - Error : '.  $this->error .'</p>';
            $html .= '<a class="btn btn-primary" href="javascript:history.back(1)" class="alert-link">Volver Atras</a>';
            $html .= '<img style="padding:10px;width:100%;" src="views/images/error.jpg"/>';
            $html .= '</div>';
            $html .= '</div>';
            echo $html;
        } else {    }
    }

    ///// -- 2.- PARA LA DESCRIPCIÓN -- ////
     if (isset($_POST['descrip_anime']) &&  $this->error==0) {
         $this->descrip_anime = $_POST['descrip_anime'];
         if ($this->descrip_anime == ' ' or $this->descrip_anime == null) {
            $this->descrip_anime = ' ';
         } else {    }
     } else { $this->descrip_anime = ' '; }
    ///// -- 3.- USUARIO -- ////
     $this->id_user = $id_user;
      ///// -- INSERTAMOS LOS DATOS -- ////
    if ($this->error == 0) {
      $sql='INSERT INTO lista (id_anime,id_user, nom_anime, descrip_anime)
      VALUES (null , '.$this->id_user.',"'.$this->nom_anime.'" , "'.$this->descrip_anime.'");';
      $eje=$this->conexion->ejecutar($sql);
      echo '<script language="javascript">window.location="/aniworld/personal/agregar/1"</script>' ;
    }
  }


  function Editar() {
    $this->error = 0;
    if (isset($_POST['id_anime'])) {
       $this->id_anime = $_POST['id_anime'];
       if ($this->id_anime == '' or $this->id_anime == null or $this->id_anime==0) {
           $this->error=11;
           $html = '<div class="col-md-10 cabecera-body" style="border:none;">';
           $html .= '<div class="alert alert-dismissible alert-danger">';
           $html .= '<strong>ERROR</strong>'. $this->error .'</p>';
           $html .= '<a class="btn btn-primary" href="javascript:history.back(1)" class="alert-link">Volver Atras</a>';
           $html .= '<img style="padding:10px;width:100%;" src="views/images/error.jpg"/>';
           $html .= '</div>';
           $html .= '</div>';
           echo $html;  }
    } else {
      $this->error=11;
      $html = '<div class="col-md-10 cabecera-body" style="border:none;">';
      $html .= '<div class="alert alert-dismissible alert-danger">';
      $html .= '<strong>ERROR</strong>'. $this->error .'</p>';
      $html .= '<a class="btn btn-primary" href="javascript:history.back(1)" class="alert-link">Volver Atras</a>';
      $html .= '<img style="padding:10px;width:100%;" src="views/images/error.jpg"/>';
      $html .= '</div>';
      $html .= '</div>';
      echo $html;
    }
    if (isset($_POST['nom_anime']) &&  $this->error==0) {
        $this->nom_anime = $_POST['nom_anime'];
        if ($this->nom_anime == "" or $this->nom_anime == null) {
            $this->error = 1;
            //echo '<script language="javascript">window.location="/aniworld/panel/anime/agregar/2"</script>' ;
            $html = '<div class="col-md-10 cabecera-body" style="border:none;">';
            $html .= '<div class="alert alert-dismissible alert-danger">';
            $html .= '<strong>ERROR</strong> <p>Por favor Rellene el campo nombre - Error : '.  $this->error .'</p>';
            $html .= '<a class="btn btn-primary" href="javascript:history.back(1)" class="alert-link">Volver Atras</a>';
            $html .= '<img style="padding:10px;width:100%;" src="views/images/error.jpg"/>';
            $html .= '</div>';
            $html .= '</div>';
            echo $html;
        } else {    }
    }
    ///// -- 2.- PARA LA DESCRIPCIÓN -- ////
     if (isset($_POST['descrip_anime']) &&  $this->error==0) {
         $this->descrip_anime = $_POST['descrip_anime'];
         if ($this->descrip_anime == ' ' or $this->descrip_anime == null) {
            $this->descrip_anime = ' ';
         } else {    }
     } else { $this->descrip_anime = ' '; }
      ///// -- INSERTAMOS LOS DATOS -- ////
      if ($this->error == 0) {
        $sql='UPDATE lista SET nom_anime = "'.$this->nom_anime.'" , descrip_anime = "'.$this->descrip_anime.'"  WHERE id_anime="'. $this->id_anime .'"';
        $eje=$this->conexion->ejecutar($sql);
        $html = '<div class="col-md-10 cabecera-body" style="border:none;">';
        $html .= '<div class="alert alert-dismissible alert-success">';
        $html .= '<strong>MODIFICADO CORRECTAMENTE.</p>';
        $html .= '<a target="_top" class="btn btn-primary" href="/aniworld/personal/listar" class="alert-link">Ir al Listado</a>';
        $html .= '</div>';
        $html .= '</div>';
        echo $html;
        echo '<script language="javascript">window.location="/aniworld/personal/listar"</script>' ;
      }
  }

  function Eliminar() {
    $this->error = 0;
    if (isset($_POST['id_anime'])) {
       $this->id_anime = $_POST['id_anime'];
       if ($this->id_anime == '' or $this->id_anime == null or $this->id_anime==0) {
           $this->error=11;
           $html = '<div class="col-md-10 cabecera-body" style="border:none;">';
           $html .= '<div class="alert alert-dismissible alert-danger">';
           $html .= '<strong>ERROR</strong>'. $this->error .'</p>';
           $html .= '<a class="btn btn-primary" href="javascript:history.back(1)" class="alert-link">Volver Atras</a>';
           $html .= '<img style="padding:10px;width:100%;" src="views/images/error.jpg"/>';
           $html .= '</div>';
           $html .= '</div>';
           echo $html;  }
    } else {
      $this->error=11;
      $html = '<div class="col-md-10 cabecera-body" style="border:none;">';
      $html .= '<div class="alert alert-dismissible alert-danger">';
      $html .= '<strong>ERROR</strong>'. $this->error .'</p>';
      $html .= '<a class="btn btn-primary" href="javascript:history.back(1)" class="alert-link">Volver Atras</a>';
      $html .= '<img style="padding:10px;width:100%;" src="views/images/error.jpg"/>';
      $html .= '</div>';
      $html .= '</div>';
      echo $html;
    }
    if ($this->error == 0) {

      $sql='DELETE FROM lista WHERE id_anime = '.$this->id_anime;
      $eje=$this->conexion->ejecutar($sql);
      echo '<script language="javascript">window.location="/aniworld/personal/listar"</script>' ;
      $html = '<div class="col-md-10 cabecera-body" style="border:none;">';
      $html .= '<div class="alert alert-dismissible alert-success">';
      $html .= '<strong>ELIMINADO</strong></p>';
      $html .= '<a target="_top" class="btn btn-primary" href="panel/personal/listar" class="alert-link">Volver al Listado</a>';
      $html .= '<img style="padding:10px;width:100%;" src="views/images/logo.png"/>';
      $html .= '</div>';
      $html .= '</div>';
      //echo $html;
    }

  }
  function __destruc(){
    $this->db->cerrar();
  }
}
 ?>
