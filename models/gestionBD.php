<?php
class gestionBD extends mysqli {
  private $conexion;
  private $server='localhost';
  private $usuario='root';
  private $password='';
  private $base_datos='aniworld';

  /*La función construct para ejecutar automaticamente la conexion al instanciarla*/
  public function __construct(){
    $this->conectar();
  }
  /*Evitamos el clonaje del objeto. Patrón Singleton*/
  private function __clone(){ }
  /*La funcion destruc destruye la clase cuando no se utiliza */
  //private function __destruct(){ }

  /*La funcion conextar es privada*/
  private function conectar(){
     $this->conexion=mysqli_connect($this->server, $this->usuario, $this->password);
     mysqli_select_db($this->conexion,$this->base_datos);
     //$this->set_charset('utf8');
     //@mysqli_query("SET NAMES 'utf8'");
     mysqli_set_charset($this->conexion,"utf8");
  }
  // Función para ejecutar una sentencia sql
  public function ejecutar($sql){
      $this->stmn=mysqli_query($this->conexion,$sql);
      return $this->stmn;
  }
  /*Funcion que nos permite extraer un array*/
  public function recorrer($sql){
    return mysqli_fetch_array($sql);
  }
  // Función para obtener la cantidad de datos
  public function rows($sql){
    return mysqli_num_rows($sql);
  }
  // Función para liberar sql
  public function liberar($sql){
    return mysqli_free_result($sql);
  }
  // Función para cerrar la conexion
  public function cerrar(){
    mysqli_close($this->conexion);
  }
}

 ?>
