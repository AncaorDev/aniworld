<?php
//require(gestionBD.php);
class Anime {
//Creamos las variables
  private $conexion;
  private $id_anime;
  private $nom_anime;
  private $epi_anime;
  private $id_estudio;
  private $gen_anime; // recibe el array
  private $genero; //  aqui se convierte el array en string
  private $sinopis;
  private $id_temp;
  private $id_estado;
  private $img_anime;
  private $error; 
  //private $id_anime;
  public function __construct(){
    $this->conexion = new gestionBD();
  //  foreach ($_POST as $clave => $valor) {
  //   ${$clave}=$_POST[$clave];
  //   $this->$gen_anime = $_POST['gen_anime'];
  //   $this->$id_estudio = $_POST['id_estudio'];
  //   $this->id_estado = $_POST['id_estado']; }
  }

  public function agregar(){
     /* Datos del tipo $_FILES > Expandir(Atom)
       ['nombre']['name']
       ['nombre']['type']
       ['nombre']['size']
       ['nombre']['error']
       ['nombre']['tmp_name'] */

///// -- ERRORES -- //// > Expandir(Atom)
// 1.- Nombre de Anime
// 2.- Episodios
// 3.- Estudio
// 4.- Géneros
// 5.- Sinopsis
// 6.- Temporada
// 7.- Estado
// Por si se amuentan datos...
// 10.- Imagen   <- Se puso al final ya que aui se sube la imagen al servidor y dependera si hay errores o no

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
///// -- 2.- PARA LOS EPISODIOS-- ////
if (isset($_POST['epi_anime']) &&  $this->error==0) {
    $this->epi_anime = $_POST['epi_anime'];
    if ($this->epi_anime == "" or $this->epi_anime == null) {
        $this->error = 2;
        $html = '<div class="col-md-10 cabecera-body" style="border:none;">';
        $html .= '<div class="alert alert-dismissible alert-danger">';
        $html .= '<strong>ERROR</strong> <p>Por favor Rellene el campo Episodio - Error : '.  $this->error .'</p>';
        $html .= '<a class="btn btn-primary" href="javascript:history.back(1)" class="alert-link">Volver Atras</a>';
        $html .= '<img style="padding:10px;width:100%;" src="views/images/error.jpg"/>';
        $html .= '</div>';
        $html .= '</div>';
        echo $html;
    } else {    }
}
///// -- 3.- PARA EL ESTUDIO -- ////
if (isset($_POST['id_estudio']) &&  $this->error==0) {
    $this->id_estudio = $_POST['id_estudio'];
    if (($this->id_estudio == "" or $this->id_estudio == null) or $this->id_estudio == 0 ) {
        $this->error = 3;
        $html = '<div class="col-md-10 cabecera-body" style="border:none;">';
        $html .= '<div class="alert alert-dismissible alert-danger">';
        $html .= '<strong>ERROR</strong> <p>Por favor seleccione un Estudio - Error : '.  $this->error .'</p>';
        $html .= '<a class="btn btn-primary" href="javascript:history.back(1)" class="alert-link">Volver Atras</a>';
        $html .= '<img style="padding:10px;width:100%;" src="views/images/error.jpg"/>';
        $html .= '</div>';
        $html .= '</div>';
        echo $html;
    } else {    }
}
///// -- 4.- PARA EL GÉNERO -- ////
  if (isset($_POST['gen_anime']) &&  $this->error==0) {
    $this->gen_anime = $_POST['gen_anime'];
      if ($this->gen_anime == "" or $this->gen_anime == null) {
        $this->error = 4;
        $html = '<div class="col-md-10 cabecera-body" style="border:none;">';
        $html .= '<div class="alert alert-dismissible alert-danger">';
        $html .= '<strong>ERROR</strong> <p>Por favor seleccione un género - Error : '.  $this->error .'</p>';
        $html .= '<a class="btn btn-primary" href="javascript:history.back(1)" class="alert-link">Volver Atras</a>';
        $html .= '<img style="padding:10px;width:100%;" src="views/images/error.jpg"/>';
        $html .= '</div>';
        $html .= '</div>';
        echo $html;
      } else {
        $num = count($this->gen_anime);
        $num2 = $num-1;
        $this->genero = "";
        if ($num>1) {
          for ($i=0; $i < $num2 ; $i++) {
          $this->genero .= $this->gen_anime[$i].','; }
          $this->genero .= $this->gen_anime[$num2];
        } else {
          $this->genero = $this->gen_anime[0];
        }

      }
  } else {
    $this->error = 4;
    $html = '<div class="col-md-10 cabecera-body" style="border:none;">';
    $html .= '<div class="alert alert-dismissible alert-danger">';
    $html .= '<strong>ERROR</strong> <p>Por favor seleccione un género - Error : '.  $this->error .'</p>';
    $html .= '<a class="btn btn-primary" href="javascript:history.back(1)" class="alert-link">Volver Atras</a>';
    $html .= '<img style="padding:10px;width:100%;" src="views/images/error.jpg"/>';
    $html .= '</div>';
    $html .= '</div>';
    echo $html;
  }

///// -- 5.- PARA LA SINOPSIS -- ////
if (isset($_POST['sinopsis']) &&  $this->error==0 ) {
      $this->sinopsis = $_POST['sinopsis'];
      if (($this->sinopsis == "" or $this->sinopsis == null) or count($this->sinopsis) == 0 ) {
          $this->error = 5;
          //echo '<script language="javascript">window.location="/aniworld/panel/anime/agregar/2"</script>' ;
          $html = '<div class="col-md-10 cabecera-body" style="border:none;">';
          $html .= '<div class="alert alert-dismissible alert-danger">';
          $html .= '<strong>ERROR</strong> <p>Por favor Escriba una sinopsis - Error : '.  $this->error .'</p>';
          $html .= '<a class="btn btn-primary" href="javascript:history.back(1)" class="alert-link">Volver Atras</a>';
          $html .= '<img style="padding:10px;width:100%;" src="views/images/error.jpg"/>';
          $html .= '</div>';
          $html .= '</div>';
          echo $html;
      } else {    }
  }
  ///// -- 6.- PARA LA TEMPORADA -- ////
  if (isset($_POST['id_temp']) &&  $this->error==0 ) {
        $this->id_temp = $_POST['id_temp'];
        if (($this->id_temp == "" or $this->id_temp == null) or $this->id_temp == 0 ) {
            $this->error = 6;
            //echo '<script language="javascript">window.location="/aniworld/panel/anime/agregar/2"</script>' ;
            $html = '<div class="col-md-10 cabecera-body" style="border:none;">';
            $html .= '<div class="alert alert-dismissible alert-danger">';
            $html .= '<strong>ERROR</strong> <p>Por favor seleccione un Temporada - Error : '.  $this->error .'</p>';
            $html .= '<a class="btn btn-primary" href="javascript:history.back(1)" class="alert-link">Volver Atras</a>';
            $html .= '<img style="padding:10px;width:100%;" src="views/images/error.jpg"/>';
            $html .= '</div>';
            $html .= '</div>';
            echo $html;
        } else {    }
    }
    ///// -- 7.- PARA EL ESTADO -- ////
    if (isset($_POST['id_estado']) &&  $this->error==0 ) {
          $this->id_estado = $_POST['id_estado'];
          if (($this->id_estado == "" or $this->id_estado == null) or $this->id_estado == 0 ) {
              $this->error = 7;
              //echo '<script language="javascript">window.location="/aniworld/panel/anime/agregar/2"</script>' ;
              $html = '<div class="col-md-10 cabecera-body" style="border:none;">';
              $html .= '<div class="alert alert-dismissible alert-danger">';
              $html .= '<strong>ERROR</strong> <p>Por favor seleccione un Estado - Error : '.  $this->error .'</p>';
              $html .= '<a class="btn btn-primary" href="javascript:history.back(1)" class="alert-link">Volver Atras</a>';
              $html .= '<img style="padding:10px;width:100%;" src="views/images/error.jpg"/>';
              $html .= '</div>';
              $html .= '</div>';
              echo $html;
          } else {    }
      }
  ///// -- 10 PARA LA IMAGEN -- ////
     //Si la iamgen esta definida se le asigna
  if (isset($_FILES['img_anime']) && $this->error==0) {
        $nom_img = ""; $tipo_dato  = "" ; $tam_img  = ""; $erro_img  = "" ; $nom_tmp = "" ;
        $nom_img = $this->img_anime = $_FILES['img_anime']['name'];
        $tipo_dato = $this->img_anime = $_FILES['img_anime']['type'];
        $tam_img = $this->img_anime = $_FILES['img_anime']['size'];
        $erro_img = $this->img_anime = $_FILES['img_anime']['error'];
        $nom_tmp = $this->img_anime = $_FILES['img_anime']['tmp_name'];
        $dir_subida = 'views/images/anime/principal/';
        
        $fichero_subido = $dir_subida . basename($nom_img);
        if ($nom_img == '' or $nom_img == null) { //Verificamos si esta vacio o null
          $this->error = 10;
          $html = '<div class="col-md-10 cabecera-body" style="border:none;">';
          $html .= '<div class="alert alert-dismissible alert-danger">';
          $html .= '<strong>ERROR</strong> <p>No se ha seleccionado ninguna Imagen - Error : '.  $this->error .'</p>';
          $html .= '<a class="btn btn-primary" href="javascript:history.back(1)" class="alert-link">Volver Atras</a>';
          $html .= '<img style="padding:10px;width:100%;" src="views/images/error.jpg"/>';
          $html .= '</div>';
          $html .= '</div>';
          echo $html;
        } else { //Verificamos si el archivo es una imagen
           if (($tipo_dato == 'image/png' or  $tipo_dato == 'image/jpeg') && $tam_img < 700000) {
             if (move_uploaded_file($nom_tmp , $fichero_subido)) { // movemos el archivo al server
               $html = '<div class="col-md-10 cabecera-body" style="border:none;">';
               $html .= '<div class="alert alert-dismissible alert-success">';
               $html .= '<strong>Subido con Exito</strong>';
               $html .= '</div>';
               $html .= '</div>';
               //echo $html;
             } else { // si no mostramos error
               $html = '<div class="col-md-10 cabecera-body" style="border:none;">';
               $html .= '<div class="alert alert-dismissible alert-danger">';
               $html .= '<strong>ERROR AL SUBIR</strong>';
               $html .= '</div>';
               $html .= '</div>';
               echo $html;
             }
           } else {  // Mensaje si el archivo no es imagen
                $this->error = 10;
                 $html = '<div class="col-md-10 cabecera-body" style="border:none;">';
                 $html .= '<div class="alert alert-dismissible alert-danger">';
                 $html .= '<strong>ERROR</strong> <p>El archivo seleccionado no es una imagen o es demasido pesado - Error : '.  $this->error .'</p>';
                 $html .= '<a class="btn btn-primary" href="javascript:history.back(1)" class="alert-link">Volver Atras</a>';
                 $html .= '<img style="padding:10px;width:100%;" src="views/images/error.jpg"/>';
                 $html .= '</div>';
                 $html .= '</div>';
                 echo  $html;
                //echo '<script language="javascript">alert("El archivo no es una Imagen");</script>' ;
                //echo '<a href="javascript:history.back(1)">Volver Atrás</a>'
                //echo '<script language="javascript">window.location="'.$_SERVER["HTTP_REFERER"].'"</script>' ;
           }
        }
      }// Fin de verficación de imagen
      if ($this->error == 0) {

        $sql='INSERT INTO anime (id_anime, nom_anime, descrip_anime , gen_anime, id_estudio, id_estado, id_temp, epi_anime, img_anime)
        VALUES (null , "'.$this->nom_anime.'" , "'.$this->sinopsis.'" , "'.$this->genero.'" , "'.$this->id_estudio.'" , "'.$this->id_estado.'" , "'.$this->id_temp.'" , "'.$this->epi_anime.'" , "'.$nom_img.'");';
        $eje=$this->conexion->ejecutar($sql);
        echo '<script language="javascript">window.location="/aniworld/panel/anime/agregar/1"</script>' ;
      }
  }

//((((((( PARA EDITAR - PD: BUSCAR MODO DE NO REPETIR TODA LA VALIDACION , quizas en un futuro XD)))))))//

   function editar(){
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
            echo $html;
        }
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
     ///// -- 2.- PARA EL NOMBRE-- ////
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
     ///// -- 2.- PARA LOS EPISODIOS-- ////
     if (isset($_POST['epi_anime']) &&  $this->error==0) {
         $this->epi_anime = $_POST['epi_anime'];
         if ($this->epi_anime == "" or $this->epi_anime == null) {
             $this->error = 2;
             $html = '<div class="col-md-10 cabecera-body" style="border:none;">';
             $html .= '<div class="alert alert-dismissible alert-danger">';
             $html .= '<strong>ERROR</strong> <p>Por favor Rellene el campo Episodio - Error : '.  $this->error .'</p>';
             $html .= '<a class="btn btn-primary" href="javascript:history.back(1)" class="alert-link">Volver Atras</a>';
             $html .= '<img style="padding:10px;width:100%;" src="views/images/error.jpg"/>';
             $html .= '</div>';
             $html .= '</div>';
             echo $html;
         } else {    }
     }
     ///// -- 3.- PARA EL ESTUDIO -- ////
     if (isset($_POST['id_estudio']) &&  $this->error==0) {
         $this->id_estudio = $_POST['id_estudio'];
         if (($this->id_estudio == "" or $this->id_estudio == null) or $this->id_estudio == 0 ) {
             $this->error = 3;
             $html = '<div class="col-md-10 cabecera-body" style="border:none;">';
             $html .= '<div class="alert alert-dismissible alert-danger">';
             $html .= '<strong>ERROR</strong> <p>Por favor seleccione un Estudio - Error : '.  $this->error .'</p>';
             $html .= '<a class="btn btn-primary" href="javascript:history.back(1)" class="alert-link">Volver Atras</a>';
             $html .= '<img style="padding:10px;width:100%;" src="views/images/error.jpg"/>';
             $html .= '</div>';
             $html .= '</div>';
             echo $html;
         } else {    }
     }
     ///// -- 4.- PARA EL GÉNERO -- ////
       if (isset($_POST['gen_anime']) &&  $this->error==0) {
         $this->gen_anime = $_POST['gen_anime'];
           if ($this->gen_anime == "" or $this->gen_anime == null) {
             $this->error = 4;
             $html = '<div class="col-md-10 cabecera-body" style="border:none;">';
             $html .= '<div class="alert alert-dismissible alert-danger">';
             $html .= '<strong>ERROR</strong> <p>Por favor seleccione un género - Error : '.  $this->error .'</p>';
             $html .= '<a class="btn btn-primary" href="javascript:history.back(1)" class="alert-link">Volver Atras</a>';
             $html .= '<img style="padding:10px;width:100%;" src="views/images/error.jpg"/>';
             $html .= '</div>';
             $html .= '</div>';
             echo $html;
           } else {
             $num = count($this->gen_anime);
             $num2 = $num-1;
             $this->genero = "";
             if ($num>1) {
               for ($i=0; $i < $num2 ; $i++) {
               $this->genero .= $this->gen_anime[$i].','; }
               $this->genero .= $this->gen_anime[$num2];
             } else {
               $this->genero = $this->gen_anime[0];
             }

           }
       } else {
         $this->error = 4;
         $html = '<div class="col-md-10 cabecera-body" style="border:none;">';
         $html .= '<div class="alert alert-dismissible alert-danger">';
         $html .= '<strong>ERROR</strong> <p>Por favor seleccione un género - Error : '.  $this->error .'</p>';
         $html .= '<a class="btn btn-primary" href="javascript:history.back(1)" class="alert-link">Volver Atras</a>';
         $html .= '<img style="padding:10px;width:100%;" src="views/images/error.jpg"/>';
         $html .= '</div>';
         $html .= '</div>';
         echo $html;
       }
     ///// -- 5.- PARA LA SINOPSIS -- ////
     if (isset($_POST['sinopsis']) &&  $this->error==0 ) {
           $this->sinopsis = $_POST['sinopsis'];
           if (($this->sinopsis == "" or $this->sinopsis == null) or count($this->sinopsis) == 0 ) {
               $this->error = 5;
               //echo '<script language="javascript">window.location="/aniworld/panel/anime/agregar/2"</script>' ;
               $html = '<div class="col-md-10 cabecera-body" style="border:none;">';
               $html .= '<div class="alert alert-dismissible alert-danger">';
               $html .= '<strong>ERROR</strong> <p>Por favor Escriba una sinopsis - Error : '.  $this->error .'</p>';
               $html .= '<a class="btn btn-primary" href="javascript:history.back(1)" class="alert-link">Volver Atras</a>';
               $html .= '<img style="padding:10px;width:100%;" src="views/images/error.jpg"/>';
               $html .= '</div>';
               $html .= '</div>';
               echo $html;
           } else {    }
       }
       ///// -- 6.- PARA LA TEMPORADA -- ////
       if (isset($_POST['id_temp']) &&  $this->error==0 ) {
             $this->id_temp = $_POST['id_temp'];
             if (($this->id_temp == "" or $this->id_temp == null) or $this->id_temp == 0 ) {
                 $this->error = 6;
                 //echo '<script language="javascript">window.location="/aniworld/panel/anime/agregar/2"</script>' ;
                 $html = '<div class="col-md-10 cabecera-body" style="border:none;">';
                 $html .= '<div class="alert alert-dismissible alert-danger">';
                 $html .= '<strong>ERROR</strong> <p>Por favor seleccione un Temporada - Error : '.  $this->error .'</p>';
                 $html .= '<a class="btn btn-primary" href="javascript:history.back(1)" class="alert-link">Volver Atras</a>';
                 $html .= '<img style="padding:10px;width:100%;" src="views/images/error.jpg"/>';
                 $html .= '</div>';
                 $html .= '</div>';
                 echo $html;
             } else {    }
         }
         ///// -- 7.- PARA EL ESTADO -- ////
         if (isset($_POST['id_estado']) &&  $this->error==0 ) {
               $this->id_estado = $_POST['id_estado'];
               if (($this->id_estado == "" or $this->id_estado == null) or $this->id_estado == 0 ) {
                   $this->error = 7;
                   //echo '<script language="javascript">window.location="/aniworld/panel/anime/agregar/2"</script>' ;
                   $html = '<div class="col-md-10 cabecera-body" style="border:none;">';
                   $html .= '<div class="alert alert-dismissible alert-danger">';
                   $html .= '<strong>ERROR</strong> <p>Por favor seleccione un Estado - Error : '.  $this->error .'</p>';
                   $html .= '<a class="btn btn-primary" href="javascript:history.back(1)" class="alert-link">Volver Atras</a>';
                   $html .= '<img style="padding:10px;width:100%;" src="views/images/error.jpg"/>';
                   $html .= '</div>';
                   $html .= '</div>';
                   echo $html;
               } else {    }
           }
       ///// -- 10 PARA LA IMAGEN -- ////
          //Si la imagen esta definida se le asigna
       if (isset($_FILES['img_anime']) && $this->error==0) {
             $nom_img = ""; $tipo_dato  = "" ; $tam_img  = ""; $erro_img  = "" ; $nom_tmp = "" ;
             $nom_img = $this->img_anime = $_FILES['img_anime']['name'];
             $tipo_dato = $this->img_anime = $_FILES['img_anime']['type'];
             $tam_img = $this->img_anime = $_FILES['img_anime']['size'];
             $erro_img = $this->img_anime = $_FILES['img_anime']['error'];
             $nom_tmp = $this->img_anime = $_FILES['img_anime']['tmp_name'];
             $dir_subida = 'views/images/anime/principal/';
             $fichero_subido = $dir_subida . basename($nom_img);
             if ($nom_img == '' or $nom_img == null) { //Verificamos si esta vacio o null
                $upl_ima='false';
             } else { //Verificamos si el archivo es una imagen
               $upl_ima='true';
                if (($tipo_dato == 'image/png' or  $tipo_dato == 'image/jpeg') && $tam_img < 700000) {
                  if (move_uploaded_file($nom_tmp , $fichero_subido)) { // movemos el archivo al server
                    $html = '<div class="col-md-10 cabecera-body" style="border:none;">';
                    $html .= '<div class="alert alert-dismissible alert-success">';
                    $html .= '<strong>Subido con Exito</strong>';
                    $html .= '</div>';
                    $html .= '</div>';
                    //echo $html;
                  } else { // si no mostramos error
                    $html = '<div class="col-md-10 cabecera-body" style="border:none;">';
                    $html .= '<div class="alert alert-dismissible alert-danger">';
                    $html .= '<strong>ERROR AL SUBIR</strong>';
                    $html .= '</div>';
                    $html .= '</div>';
                    echo $html;
                  }
                } else {  // Mensaje si el archivo no es imagen
                     $this->error = 10;
                      $html = '<div class="col-md-10 cabecera-body" style="border:none;">';
                      $html .= '<div class="alert alert-dismissible alert-danger">';
                      $html .= '<strong>ERROR</strong> <p>El archivo seleccionado no es una imagen o es demasido pesado - Error : '.  $this->error .'</p>';
                      $html .= '<a class="btn btn-primary" href="javascript:history.back(1)" class="alert-link">Volver Atras</a>';
                      $html .= '<img style="padding:10px;width:100%;" src="views/images/error.jpg"/>';
                      $html .= '</div>';
                      $html .= '</div>';
                      echo  $html;
                     //echo '<script language="javascript">alert("El archivo no es una Imagen");</script>' ;
                     //echo '<a href="javascript:history.back(1)">Volver Atrás</a>'
                     //echo '<script language="javascript">window.location="'.$_SERVER["HTTP_REFERER"].'"</script>' ;
                }
             }
           } else {

           }// Fin de verficación de imagen
           if ($this->error == 0) {
             $sql='UPDATE anime SET nom_anime = "'.$this->nom_anime.'" , ';
             $sql .= 'descrip_anime = "'.$this->sinopsis.'" ,';
             $sql .= 'gen_anime = "'.$this->genero.'" , ';
             $sql .= 'id_estudio = "'.$this->id_estudio.'" ,';
             $sql .= 'id_estado = "'.$this->id_estado.'" ,';
             $sql .= 'id_temp ="'.$this->id_temp.'" ,';
             if ($upl_ima!='false') {$sql .= 'img_anime ="'.$nom_img.'" ,';}
             $sql .= 'epi_anime ="'.$this->epi_anime.'" ';
             $sql .= 'WHERE  id_anime="'.$this->id_anime.'"';
             $eje=$this->conexion->ejecutar($sql);
             $html = '<div class="col-md-10 cabecera-body" style="border:none;">';
             $html .= '<div class="alert alert-dismissible alert-success">';
             $html .= '<strong> Cambio realizado con exito </strong>';
             $html .= '</div>';
             $html .= '</div>';
             echo $html;//dar tiempo al mensaje
             echo '<script language="javascript">window.location="/aniworld/panel/anime/editar/'.$this->id_anime.'"</script>' ;
            //  $html = '<div class="col-md-10 cabecera-body" style="border:none;">';
            //  $html .= '<div class="alert alert-dismissible alert-danger">';
            //  $html .= '<strong>ERROR</strong> : '.  $sql.'</p>';
            //  $html .= '<a class="btn btn-primary" href="javascript:history.back(1)" class="alert-link">Volver Atras</a>';
            //  $html .= '<img style="padding:10px;width:100%;" src="views/images/error.jpg"/>';
            //  $html .= '</div>';
            //  $html .= '</div>';
            //  echo  $html;
           }
  }
   function eliminar (){
     $this->error = 0;
     if (isset($_POST['id_anime']) &&  $this->error==0) {
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
            echo $html;
        }
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
       $sql='DELETE FROM anime WHERE id_anime = "'.$this->id_anime.'"';
       $eje=$this->conexion->ejecutar($sql);
       $html = '<div class="col-md-10 cabecera-body" style="border:none;">';
       $html .= '<div class="alert alert-dismissible alert-success">';
        $html .= '<strong>ELIMINADO CORRECTAMENTE</strong></p>';
       $html .= '<a target="_top" class="btn btn-primary" href="/aniworld/panel/anime/listar" class="alert-link">Volver al Listado</a>';
       $html .= '</div>';
       $html .= '</div>';
       echo $html;
       echo '<script language="javascript">window.location="/aniworld/panel/anime/listar"</script>' ;
     }

  } //Fin eliminar
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
