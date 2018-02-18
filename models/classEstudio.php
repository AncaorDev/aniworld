<?php
//require(gestionBD.php);
class Estudio {
//Creamos las variables
  private $conexion;
  private $id_estudio;
  private $name_estudio;
  private $descrip_estudio;
  private $error;
  //private $id;   //private $id_anime;
  public function __construct(){
    $this->conexion = new gestionBD();
  //  foreach ($_POST as $clave => $valor) {
  //   ${$clave}=$_POST[$clave];
  //   $this->$gen_anime = $_POST['gen_anime'];
  //   $this->$id_estudio = $_POST['id_estudio'];
  //   $this->id_estado = $_POST['id_estado']; }
  }
  public function agregar(){
    ///// -- ERRORES -- //// > Expandir(Atom)
    // 1.- Nombre de estudio
    // 2.- Descripción

    ///// -- 1.- PARA EL NOMBRE -- ////
    $this->error = 0;
    if (isset($_POST['nom_estudio']) &&  $this->error==0) {
        $this->nom_estudio = $_POST['nom_estudio'];
        if ($this->nom_estudio == "" or $this->nom_estudio == null) {
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
    // if (isset($_POST['descrip_estudio']) &&  $this->error==0) {
    //     $this->descrip_estudio = $_POST['descrip_estudio'];
    //     if ($this->descrip_estudio == "" or $this->descrip_estudio == null) {
    //         $this->error = 2;
    //         //echo '<script language="javascript">window.location="/aniworld/panel/anime/agregar/2"</script>' ;
    //         $html = '<div class="col-md-10 cabecera-body" style="border:none;">';
    //         $html .= '<div class="alert alert-dismissible alert-danger">';
    //         $html .= '<strong>ERROR</strong> <p>Por favor Rellene el campo Descripcion - Error : '.  $this->error .'</p>';
    //         $html .= '<a class="btn btn-primary" href="javascript:history.back(1)" class="alert-link">Volver Atras</a>';
    //         $html .= '<img style="padding:10px;width:100%;" src="views/images/error.jpg"/>';
    //         $html .= '</div>';
    //         $html .= '</div>';
    //         echo $html;
    //     } else {    }
    // }
    ///// -- 2.- PARA LA DESCRIPCIÓN -- ////
     if (isset($_POST['descrip_estudio']) &&  $this->error==0) {
         $this->descrip_estudio = $_POST['descrip_estudio'];
         if ($this->descrip_estudio == ' ' or $this->descrip_estudio == null) {
            $this->descrip_estudio = ' ';
         } else {    }
     } else { $this->descrip_estudio = ' '; }
      ///// -- INSERTAMOS LOS DATOS -- ////
    if ($this->error == 0) {
      $sql='INSERT INTO estudio (id_estudio, nom_estudio, descrip_estudio)
      VALUES (null ,"'.$this->nom_estudio.'" , "'.$this->descrip_estudio.'");';
      $eje=$this->conexion->ejecutar($sql);
      echo '<script language="javascript">window.location="/aniworld/panel/estudio/agregar/1"</script>' ;
    }
  }

   function editar(){
     $this->error = 0;
     if (isset($_POST['id_estudio'])) {
        $this->id_estudio = $_POST['id_estudio'];
        if ($this->id_estudio == '' or $this->id_estudio == null or $this->id_estudio==0) {
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
     if (isset($_POST['nom_estudio']) &&  $this->error==0) {
         $this->nom_estudio = $_POST['nom_estudio'];
         if ($this->nom_estudio == "" or $this->nom_estudio == null) {
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
     // if (isset($_POST['descrip_estudio']) &&  $this->error==0) {
     //     $this->descrip_estudio = $_POST['descrip_estudio'];
     //     if ($this->descrip_estudio == "" or $this->descrip_estudio == null) {
     //         $this->error = 2;
     //         //echo '<script language="javascript">window.location="/aniworld/panel/anime/agregar/2"</script>' ;
     //         $html = '<div class="col-md-10 cabecera-body" style="border:none;">';
     //         $html .= '<div class="alert alert-dismissible alert-danger">';
     //         $html .= '<strong>ERROR</strong> <p>Por favor Rellene el campo Descripcion - Error : '.  $this->error .'</p>';
     //         $html .= '<a class="btn btn-primary" href="javascript:history.back(1)" class="alert-link">Volver Atras</a>';
     //         $html .= '<img style="padding:10px;width:100%;" src="views/images/error.jpg"/>';
     //         $html .= '</div>';
     //         $html .= '</div>';
     //         echo $html;
     //     } else {    }
     // }
     ///// -- 2.- PARA LA DESCRIPCIÓN -- ////
      if (isset($_POST['descrip_estudio']) &&  $this->error==0) {
          $this->descrip_estudio = $_POST['descrip_estudio'];
          if ($this->descrip_estudio == ' ' or $this->descrip_estudio == null) {
             $this->descrip_estudio = ' ';
          } else {    }
      } else { $this->descrip_estudio = ' '; }
       ///// -- INSERTAMOS LOS DATOS -- ////
       if ($this->error == 0) {
         $sql='UPDATE estudio SET nom_estudio = "'.$this->nom_estudio.'" , descrip_estudio = "'.$this->descrip_estudio.'"  WHERE id_estudio="'. $this->id_estudio .'"';
         $eje=$this->conexion->ejecutar($sql);
         $html = '<div class="col-md-10 cabecera-body" style="border:none;">';
         $html .= '<div class="alert alert-dismissible alert-success">';
         $html .= '<strong>MODIFICADO CORRECTAMENTE.</p>';
         $html .= '<a target="_top" class="btn btn-primary" href="/aniworld/panel/estudio/listar" class="alert-link">Ir al Listado</a>';
         $html .= '</div>';
         $html .= '</div>';
         echo $html;
         echo '<script language="javascript">window.location="/aniworld/panel/estudio/listar"</script>' ;
       }
  }
   function eliminar(){
     $this->error = 0;
     if (isset($_POST['id_estudio'])) {
        $this->id_estudio = $_POST['id_estudio'];
        if ($this->id_estudio == '' or $this->id_estudio == null or $this->id_estudio==0) {
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

       $sql='DELETE FROM estudio WHERE id_estudio = '.$this->id_estudio;
       $eje=$this->conexion->ejecutar($sql);
       echo '<script language="javascript">window.location="/aniworld/panel/estudio/listar"</script>' ;
       $html = '<div class="col-md-10 cabecera-body" style="border:none;">';
       $html .= '<div class="alert alert-dismissible alert-success">';
       $html .= '<strong>ELIMINADO</strong></p>';
       $html .= '<a target="_top" class="btn btn-primary" href="panel/estudio/listar" class="alert-link">Volver al Listado</a>';
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

<!--
$this->nom_anime = $_POST['nom_anime'] ;
$this->gen_anime = $_POST['gen_anime'] ;
$this->id_estudio = $_POST['id_estudio'] ;
$this->id_estado = $_POST['id_estado'] ;
$this->id_temp = $_POST['id_temp'] ;
$this->epi_anime = $_POST['epi_anime'] ;


 private $id_anime;
 private $nom_anime;
 private $gen_anime;
 private $id_estudio;
 private $id_estado;
 private $id_temp;
 private $epi_anime;

 public function($id_anime,$nom_anime,$gen_anime,$id_estudio,$id_Estado,$id_temp,$epi_anime){
   $this->id_anime = $id_anime;
   $this->nom_anime = $nom_anime ;
   $this->gen_anime = $gen_anime ;
   $this->id_estudio = $id_estudio ;
   $this->id_estado = $id_estado ;
   $this->id_temp = $id_temp ;
   $this->epi_anime = $epi_anime ;
 }
 public function get_id_anime(){
     return $this->id_anime;
 }
 public function get_nom_anime(){
   return $this->nom_anime;
 }
 public function get_gen_anime(){
   return $this->gen_anime;
 }
 public function get_id_estudio(){
   return $this->id_estudio;
 }
 public function get_id_estado(){
   return $this->id_estado;
 }
 public function get_id_temp(){
   return $this->id_temp;
 }
 public function get_epi_anime(){
   return $this->epi_anime;
 } -->
