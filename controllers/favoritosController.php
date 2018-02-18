<?php
$tipoUser =  $usuarios[$_SESSION['app_id']]['id_tipouser'];
$idUser =   $usuarios[$_SESSION['app_id']]['id_user'];
$imagen='<div class="col-md-12 cabecera-body"><img class="img-full" src="views/images/nise.png" alt="" /></div>';

/* -------- Verficamos los permisos y si existe el usuario ----------------
	1 = Administrador
	2 = Moderador
	3 = Programador
*/
if (isset($_SESSION['app_id']) and ($tipoUser == 1 or $tipoUser == 2 or $tipoUser == 8)) { ?>
	<?php include (HTML_DIR.'includes/head.php'); // Aquí comienza el Cuerpo ?>
	<?php include (HTML_DIR.'includes/navbar.php') ?>
	<section class="body">
	<div class="container">
	<div class="row cont-body">
	<?php include (HTML_DIR.'includes/iniciar-sesion.inc') ?>
	<div class="col-md-10 cabecera-body"><h3>Mis Animes Favoritos </h3></div>
	<?php //echo isset($_GET['subpage'])?$_GET['subpage']:$_GET['subpage']='anime'; 
	//Nos Conectamos a la Base de Datos
	$conexion = new gestionBD();
	//Consulta para obtener la lista de los animes del usuario actual logueado.
	// Por logica este nivel no debe entrar un usuario invitado, solo quería ponerlo. 
	$sqlfav = "SELECT * FROM favoritos WHERE id_user=".$idUser;
	// echo '<script>alert("'.$sqlfav.'")</script>';
	//Ejecución de la consulta.
	$run_sqlfav=$conexion->ejecutar($sqlfav);
	$infofav = $conexion -> recorrer($run_sqlfav);
	
	if ($infofav[2] === 0 or $infofav[2] == '') {
		$datos = 0;
	} else {
		$datos = $infofav[2];
	}
	$sql="SELECT * FROM anime WHERE id_anime in ($datos)"; 
	// Si existe alguna acción
	if (isset($_GET['action'])) {
		switch ($_GET['action']) {
		
		case 'add':
			if (isset($_GET['dato'])) {
				$dato = $_GET['dato'];
				if ($dato != '' or $dato != 0 or $dato != null) {
					if (is_numeric($dato)) {
						$sql="SELECT * FROM anime WHERE id_anime=".$dato; 
						$run_sql=$conexion->ejecutar($sql); 
						$num_sql=$conexion->rows($run_sql);
						if ($num_sql > 0) {
							$sql="SELECT * FROM favoritos WHERE id_user =".$idUser." AND lista_animes like '%".$dato."%'";
							$run_sql=$conexion->ejecutar($sql); 
							$num_sql=$conexion->rows($run_sql);
							if ($num_sql == 0) {
								require('models/classFavoritos.php');
  								$favoritos = new Favoritos();
  								$favoritos -> agregar($idUser,$dato,$datos);
							} else { header('Location:'.URL_HOME.'favoritos'); }
						} else { echo '<script>alert("No existe anime");</script>'; 
						}
					} else {
						header('Location:'.URL_HOME.'favoritos');
					}
				} else {
					header('Location:'.URL_HOME.'favoritos');
				}
			} else {
				header('Location:'.URL_HOME.'favoritos');
			}
		break;
		
		case 'delete':
			if (isset($_GET['dato'])) {
				$dato = $_GET['dato'];
				if ($dato != '' or $dato != 0 or $dato != null) {
					if (is_numeric($dato)) {
						$sql="SELECT * FROM anime WHERE id_anime=".$dato; 
						$run_sql=$conexion->ejecutar($sql); 
						$num_sql=$conexion->rows($run_sql);
						if ($num_sql > 0) {
							$sql="SELECT * FROM favoritos WHERE id_user =".$idUser." AND lista_animes like '%".$dato."%'";
							$run_sql=$conexion->ejecutar($sql); 
							$num_sql=$conexion->rows($run_sql);
							if ($num_sql > 0) {
								require('models/classFavoritos.php');
  								$favoritos = new Favoritos();
  								$favoritos -> eliminar($idUser,$dato,$datos);
							} else { header('Location:'.URL_HOME.'favoritos'); }
						} else { echo '<script>alert("No existe anime");</script>'; 
						}
					}
				} else {
					header('Location:'.URL_HOME.'favoritos');
				}
			} else {
				header('Location:'.URL_HOME.'favoritos');
			}
		break;

		default:
		// Mostramos toda la información , este codigo se reusara
		//Consulta para obtener la lista de los animes del usuario actual logueado.
		// Por logica este nivel no debe entrar un usuario invitado, solo quería ponerlo.	
		include (HTML_DIR.'public/lista.php'); // <= Aquí se envia la variable "$sql" con la cunsulta de los animes 
		break;
		}
	} else {
	// Mostramos toda la información , este codigo se reusara
	//Consulta para obtener la lista de los animes del usuario actual logueado.
	// Por logica este nivel no debe entrar un usuario invitado, solo quería ponerlo.	
	include (HTML_DIR.'public/lista.php'); // <= Aquí se envia la variable "$sql" con la cunsulta de los animes 
	}
	// include("panel-principal.inc") ?>
	</div><!-- <- hasta aquí este div es cont-body -->
	</div><!-- <- hasta aquí este div es el container general -->
	</section>
	<?php include(HTML_DIR.'includes/final-body.inc');
	include (HTML_DIR.'includes/footer.php'); 
	// Cerramos la conexión 
  	$conexion->cerrar(); } 
else {
 //Si no existe Sesion Redireccionamos
header ('Location:/../aniworld');
//echo $usuarios[$_SESSION['app_id']]['id_user'];
} ?>
