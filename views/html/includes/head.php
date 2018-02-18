<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Aniworld <?php if (isset($_GET['page'])) {echo $_GET['page']; } ?></title>
<!-- Metas -->
<base href="<?php echo BASE; ?>" target="_blank" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, user-scalable=no">
<meta name="Author" content="Ancaor/ancaor.com" />
<meta property='og:locale' content='es_ES'/>
<meta property='og:type' content='website'/>
<meta property='og:site_name' content='<?php echo TITLE  ?>'/>
<meta property='fb:app_id' content=''/>
<!-- Favicon -->
<?php include ('favicon.inc'); ?>
<!-- Estilos -->
<link rel="stylesheet" href="views/socicon/css/socicon.min.css">
<link rel="stylesheet" href="views/mobirise/css/style.css">
<!-- Optional theme -->
<!-- <link href="http://bootswatch.com/lumen/bootstrap.min.css" rel="stylesheet"> -->
<!-- <link href="views/css/bootstrap.min.css" rel="stylesheet"> -->
<!-- theme darkly -->
<!-- <link href="views/css/darkly-bootstrap.min.css" rel="stylesheet"> -->
<!-- theme slate -->
<!-- <link href="views/css/slate-bootstrap.min.css" rel="stylesheet"> -->
<!-- theme paper -->
<!-- <link href="views/css/paper-bootstrap.min.css" rel="stylesheet"> -->
<!-- theme cerulean -->
<link href="views/css/cerulean-bootstrap.min.css" rel="stylesheet">
<link href="views/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="views/css/aniworld.css">
<!-- Custom CSS -->
<?php if (isset($_GET['page'])){ ?>
  <?php if ($_GET['page']=='admin'): ?>
    <link href="views/css/sb-admin.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="views/css/plugins/morris.css" rel="stylesheet">
  <?php endif; ?>
<?php } ?>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<!--  jQuery All version https://developers.google.com/speed/libraries/#jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script> <!--  Necesario para vista previa -->
<script  src="views/js/jquery-1.11.2.min.js"></script>
<!-- JS Archives -->
<script src="views/app/js/generales.js" type="text/javascript"></script>
<script src="views/app/js/login.js" type="text/javascript"></script>
<!-- <script scr="views/js/jquery-1.10.2.js" type="text/javascript"></script> -->
<script src="views/app/js/vistaprevia.js" type="text/javascript"></script>
<!-- <script src="views/app/js/cerrar.js" type="text/javascript"></script> -->
<script src="views/app/js/validar.js" type="text/javascript"></script>
<script src="views/app/js/contar.js" type="text/javascript"></script>

<!-- <script type="text/javascript">
  $(document).ready(function(){
    var elem = document.getElementById("bar");
    var width = 0;
    var id = setInterval(frame, 25);
    function frame() {
     if (width >= 100) {
       clearInterval(id);
       $("#quitar").hide();
       //$("#quitar").animate({display:'none'},1000, function(){ $(this).hide();});
       $("#cargar").slideDown(1000);
     } else {
       width++;
       elem.style.width = (width*2.1) + '%';
       document.getElementById("bar").innerHTML = width  + '%';
     }
    }
    $(window).load(function(){
        //$("#quitar").animate({height:'0'},2000, function(){});
        //$("#imgx").animate({display: 'none'},2000, function(){ $(this).fadeOut(); });
        //$("#imgx").fadeOut(2000);
        //$("#text").animate({height:'0px'},2000, function(){ $(this).hide(); });
        //$("#cargar").fadeIn(2000);
        // $("#quitar").hide(4000, function(){
        //    alert( "Animation complete." );
        // });
    });
  });
</script> -->
<script type="text/javascript">
  $(document).ready(function(){
    var width = 0;
    var id = setInterval(frame, 10);
    function frame() {
       if (width >= 100) {
         clearInterval(id);
         $("#quitar").hide();
         $("#cargar").slideDown(1000);
       } else {
         width++;
       }
     }
    });
</script>
<style media="screen">

</style>
</head>
<!-- El inicio del Cuerpo esta en el head.php -->
<body>
