<!DOCTYPE html>
<html lang="es">
<?php include (HTML_DIR.'includes/head.php'); ?>
<style>
  .modal{
    color: black;
  }
</style>
<body>
<?php include (HTML_DIR.'includes/cabecera.php') ?>

<?php include (HTML_DIR.'includes/nav.php') ?>

  <section class="data-body">
    <div class="container">
      <div class="row cont-data">
        <div class="col-md-8 cuadro-data">
          <h2>Inciar Sesión</h2>
          <form class="form-horizontal" role="form" method="post" onSubmit="Validar();return false">
            <div class="modal">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                  </div>
                  <div class="modal-body">
                    <p>One fine body…</p>
                  </div>
                  <div class="modal-footer">
                    <button id="cerrarmod" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
            <fieldset>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Usuario</label>
                <div class="col-lg-4">
                  <input type="text" class="form-control" id="user" name="user" placeholder="Usuario" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword" class="col-lg-2 control-label">Contraseña</label>
                <div class="col-lg-4">
                  <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña" required>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"> Mantener Sesión Activa
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="reset" class="btn btn-default">Cancel</button>
                  <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                </div>
              </div>
            </fieldset>
          </form>
          <!-- <h3><a href="">Descargar Codigo</a></h3> -->
        </div>
        <div class="col-md-4 cuadro-data">
            <img style="margin-top:88px;" src="views/images/wolf.png" alt="Wolf">
        </div>
      </div>
    </div>
  </section>
  <script src="views/js/jquery-1.7.2.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.0.3/bootstrap.min.js"></script>
  <script>
  $(document).click(function(){
    $('.close').click(function(){
          $('.modal').modal('toggle');
    });
    $('#cerrarmod').click(function(){
          $('.modal').modal('toggle');
    });
  });



  	function Validar() {
  		//var user = document.getElementById("user").value;
  		//var pass = document.getElementById("pass").value;
  		var user = $('#user').val();
  		var pass = $('#pass').val();
  		$.ajax({
  			url:'base/controller/valuser.php',
  			type:'POST',
  			data:'user='+user+'&pass='+pass
  		}).done(function(resp){
  			if(resp==2){
  				window.location.href = 'panel';
  			}
  			else{
  				$(".modal").show();
  				$(".modal-title").html(resp);
  				$("#info").html("");
  				$('#user').val("");
  				$('#pass').val("");
  				$('#user').focus();
  				$("#mensaje").fadeOut(1300);
  			}
  		});
  	}
  </script>
</body>
<?php include (HTML_DIR.'includes/footer.php'); ?>
</html>
