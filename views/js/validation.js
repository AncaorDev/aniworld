function Validar() {
		//var user = document.getElementById("user").value;
		//var pass = document.getElementById("pass").value;
		var user = $('#user').val();
		var pass = $('#pass').val();
		$.ajax({
			url:'controller/valuser.php',
			type:'POST',
			data:'user='+user+'&pass='+pass
		}).done(function(resp){
			if(resp==2){
				window.location.href = 'panel.php';
			}
			else{
				$("#mensaje").show();
				$("#mensaje").html(resp);
				$("#info").html("");
				$('#user').val("");
				$('#pass').val("");
				$('#user').focus();
			}
		});
	}