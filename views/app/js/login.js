function Login() {
  var connect, form, response, result, user, pass, sesion;
  user = __('user').value;
  pass = __('pass').value;
  sesion = __('sesion').checked ? true : false;
  form = 'user='+user+'&pass='+pass+'&sesion='+sesion;
  //instanciamos el AJAX
  connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
  connect.onreadystatechange = function(){
      if (connect.readyState == 4 && connect.status == 200) {
          if (connect.responseText == 1) {
            result = '<div class="alert alert-warning alert-dismissible" role="alert">';
            result += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            result += '<p>Conectado....</p>';
            result += '<strong>Redireccionando</strong>';
            result += '</div>' ;
            __('_AJAX_LOGIN_').innerHTML = result;
            location.reload();
          } else {
            __('_AJAX_LOGIN_').innerHTML = connect.responseText;
          }
          //console.log(connect.responseText)
      } else if (connect.readyState !=4) {
        result = '<div class="alert alert-warning alert-dismissible" role="alert">';
        result += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        result += '<p>Procesando....</p>';
        result += '<strong>Intentando Loguearte</strong>';
        result += '</div>' ;
        __('_AJAX_LOGIN_').innerHTML = result;
      }
  }
  connect.open('POST','ajax.php?mode=login',true);
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
  connect.send(form);
}
