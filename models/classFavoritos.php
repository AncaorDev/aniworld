<?php
//require(gestionBD.php);
class Favoritos {
//Creamos las variables
  private $conexion;
  private $idUser;
  private $lista;
  //private $id;   //private $id_anime;
  public function __construct(){
    $this->conexion = new gestionBD();
  } 

  public function agregar($idUser,$idAnime,$lista){
  	if ($lista === 0) {
  		$this -> lista = $idAnime;		
  	} else {
  		$this -> lista = $lista.','.$idAnime;
  	}
  		$this -> idUser = $idUser;
  		$sql = "UPDATE favoritos SET lista_animes = '" . $this -> lista. "' WHERE id_user = " . $this -> idUser ;
		$run_sql=$this->conexion->ejecutar($sql); 
		// $num_sql=$conexion->rows($run_sql);
		echo '<script>alert("Agregado a favoritos");window.location.href="javascript:history.back(1)";</script>';
		// header('Location:'.URL_HOME.'favoritos');
		// echo '<script>alert("'.$this -> lista.'");</script>';
  }
 public function eliminar($idUser,$idAnime,$lista){
 		$delimiter = strpos($lista, ',');
	  	if ($delimiter === false) {	
	  		$this -> lista = '';
	  	} else if ($delimiter !== false){
	  		$array_list = explode(',', $lista);
	  		for ($i=0; $i < (count($array_list)); $i++) { 
	  			if ($array_list[$i] == $idAnime) {
	  				unset($array_list[$i]);
	  				// var_export ($array_list);
	  			}
	  		}
	        $this -> lista = implode(',', $array_list);
	        
	  	} else {
	  		$this -> lista = $lista;
	  	}
  		$this -> idUser = $idUser;
  		$sql = "UPDATE favoritos SET lista_animes = '" . $this -> lista. "' WHERE id_user = " . $this -> idUser ;
		$run_sql=$this->conexion->ejecutar($sql); 
		// $num_sql=$conexion->rows($run_sql);
		echo '<script>alert("Eliminado");window.location.href="javascript:history.back(1)";</script>';
		// header('Location:'.URL_HOME.'favoritos');
		// echo '<script>alert("'.$this -> lista.'");</script>';
  }
  function __destruct(){
    $this->conexion->cerrar();
  }

}