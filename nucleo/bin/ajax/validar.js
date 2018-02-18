function Validar(text){
  var ajax, html, enviar;
  enviar = '';
  ajax = window.XMLHttpRequest? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP') ;
  ajax.onreadystatechange = function(){
    if (ajax.readyState == 4 && ajax.status == 200) {
        if (ajax.responseText == 'ok') {
          //html  = '<div class="alert alert-dismissible alert-success"';
          //html  += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
          html  = '<span class="badge" style="background:green;"><span class="glyphicon glyphicon-ok"></span></span>';
            __('response').innerHTML = html;
        } else if (ajax.responseText == 'vacio' ){
          html  = '<span class="badge" style="background:red;"><span class="glyphicon glyphicon-remove"></span></span>';
            __('response').innerHTML = html;
        }
    } else {
        __('response').innerHTML = ajax.responseText;
    }

  }
  ajax.open('POST','ajax.php?mode=verificar',true);
  ajax.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
  ajax.send('data='+text);
}
