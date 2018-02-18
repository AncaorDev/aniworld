<?php
//require(gestionBD.php);
class Genero {
//Creamos las variables
  private $conexion;
  private $id_gen;
  private $name_gen;
  private $descrip_gen;
  private $error;
  //private $id;   //private $id_anime;
  public function __construct(){
    $this->conexion = new gestionBD();
  }
  public function agregar(){
    ///// -- ERRORES -- //// > Expandir(Atom)
    // 1.- Nombre de gen
    // 2.- Descripción

    ///// -- 1.- PARA EL NOMBRE -- ////
    $this->error = 0;
    if (isset($_POST['nom_gen']) &&  $this->error==0) {
        $this->nom_gen = $_POST['nom_gen'];
        if ($this->nom_gen == "" or $this->nom_gen == null) {
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
    // if (isset($_POST['descrip_gen']) &&  $this->error==0) {
    //     $this->descrip_gen = $_POST['descrip_gen'];
    //     if ($this->descrip_gen == "" or $this->descrip_gen == null) {
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
     if (isset($_POST['descrip_gen']) &&  $this->error==0) {
         $this->descrip_gen = $_POST['descrip_gen'];
         if ($this->descrip_gen == ' ' or $this->descrip_gen == null) {
            $this->descrip_gen = ' ';
         } else {    }
     } else { $this->descrip_gen = ' '; }
      ///// -- INSERTAMOS LOS DATOS -- ////
    if ($this->error == 0) {
      $sql='INSERT INTO genero (id_gen, nom_gen, descrip_gen)
      VALUES (null ,"'.$this->nom_gen.'" , "'.$this->descrip_gen.'");';
      $eje=$this->conexion->ejecutar($sql);
      echo '<script language="javascript">window.location="/aniworld/panel/genero/agregar/1"</script>' ;
    }
  }
//((((((( PARA EDITAR - PD: BUSCAR MODO DE NO REPETIR TODA LA VALIDACION , quizas en un futuro XD)))))))//
   function editar(){

     ///// -- ERRORES -- //// > Expandir(Atom)
     // 1.- Id del genero
     // 2.- Nombre de genero
     // 3.- Descripción del genero

     $this->error = 0;
     if (isset($_POST['id_gen'])) {
        $this->id_gen = $_POST['id_gen'];
        if ($this->id_gen == '' or $this->id_gen == null or $this->id_gen==0) {
            $this->error=1;
            $html = '<div class="col-md-10 cabecera-body" style="border:none;">';
            $html .= '<div class="alert alert-dismissible alert-danger">';
            $html .= '<strong>ERROR</strong>'. $this->error .'</p>';
            $html .= '<a class="btn btn-primary" href="javascript:history.back(1)" class="alert-link">Volver Atras</a>';
            $html .= '<img style="padding:10px;width:100%;" src="views/images/error.jpg"/>';
            $html .= '</div>';
            $html .= '</div>';
            echo $html;  }
     } else {
       $this->error=1;
       $html = '<div class="col-md-10 cabecera-body" style="border:none;">';
       $html .= '<div class="alert alert-dismissible alert-danger">';
       $html .= '<strong>ERROR</strong>'. $this->error .'</p>';
       $html .= '<a class="btn btn-primary" href="javascript:history.back(1)" class="alert-link">Volver Atras</a>';
       $html .= '<img style="padding:10px;width:100%;" src="views/images/error.jpg"/>';
       $html .= '</div>';
       $html .= '</div>';
       echo $html;
     }
     ///// -- 2.- PARA EL NOMBRE -- ////
     if (isset($_POST['nom_gen']) &&  $this->error==0) {
         $this->nom_gen = $_POST['nom_gen'];
         if ($this->nom_gen == "" or $this->nom_gen == null) {
             $this->error = 2;
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
     // if (isset($_POST['descrip_gen']) &&  $this->error==0) {
     //     $this->descrip_gen = $_POST['descrip_gen'];
     //     if ($this->descrip_gen == "" or $this->descrip_gen == null) {
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
      if (isset($_POST['descrip_gen']) &&  $this->error==0) {
          $this->descrip_gen = $_POST['descrip_gen'];
          if ($this->descrip_gen == ' ' or $this->descrip_gen == null) {
             $this->descrip_gen = ' ';
          } else {    }
      } else { $this->descrip_gen = ' '; }
       ///// -- MODIFICAMOS LOS DATOS -- ////
     if ($this->error == 0) {
       $sql='UPDATE genero SET nom_gen = "'.$this->nom_gen.'" , descrip_gen = "'.$this->descrip_gen.'"  WHERE id_gen="'. $this->id_gen .'"';
       $eje=$this->conexion->ejecutar($sql);
       $html = '<div class="col-md-10 cabecera-body" style="border:none;">';
       $html .= '<div class="alert alert-dismissible alert-success">';
       $html .= '<strong>MODIFICADO CORRECTAMENTE.</p>';
       $html .= '<a target="_top" class="btn btn-primary" href="/aniworld/panel/genero/editar/'.$this->id_gen.'" class="alert-link">Ir al Listado</a>';
       $html .= '</div>';
       $html .= '</div>';
       echo $html;
       echo '<script language="javascript">window.location="/aniworld/panel/genero/listado"</script>' ;
     }

  }
   function eliminar (){
     $this->error = 0;
     if (isset($_POST['id_gen'])) {
        $this->id_gen = $_POST['id_gen'];
        if ($this->id_gen == '' or $this->id_gen == null or $this->id_gen==0) {
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

       $sql='DELETE FROM genero WHERE id_gen = '.$this->id_gen;
       $eje=$this->conexion->ejecutar($sql);
       //echo '<script language="javascript">window.location="/aniworld/panel/estudio/listar/4"</script>' ;
       $html = '<div class="col-md-10 cabecera-body" style="border:none;">';
       $html .= '<div class="alert alert-dismissible alert-success">';
       $html .= '<strong>ELIMINADO</strong></p>';
       $html .= '<a target="_top" class="btn btn-primary" href="panel/genero/listar" class="alert-link">Volver al Listado</a>';
       //$html .= '<img style="padding:10px;width:100%;" src="views/images/logo.png"/>';
       $html .= '</div>';
       $html .= '</div>';
       echo $html;
        echo '<script language="javascript">window.location="/aniworld/panel/genero/listado"</script>' ;
     }
  }
  function __destruct(){
    $this->conexion->cerrar();
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
