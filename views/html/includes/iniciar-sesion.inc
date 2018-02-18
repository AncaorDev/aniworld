<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">

  <div class="modal-content">
    <div id="_AJAX_LOGIN_" class="">

    </div>
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">Iniciar Sesión</h4>
    </div>
    <div class="modal-body">
      <form class="form" role="form" method="post" onSubmit="Login();return false">
        <div class="row">
          <div class="col-md-10 form-group">
            <label for="exampleInputEmail1">Ingrese Usuario</label>
            <input type="text" class="form-control" id="user" placeholder="Nombre de Usuario">
          </div>
        </div>
      <div class="row">
        <div class="col-md-10 form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="pass" placeholder="Contraseña">
        </div>
      </div>
        <div class="checkbox">
          <label>
            <input id="sesion" type="checkbox"> Mantener Sesión Activa
          </label>
        </div>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancelar</button>
      </form>
    </div>
  </div>
</div>
</div><!-- <- Hasta Aquí Modal  -->
