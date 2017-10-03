// JavaScript Document

$(document).ready(function(e) {
	$('#Logar').click(function(e) {
		var email = $('#email_login').val();
		var senha = $('#senha_login').val();

  		if(email === "" || senha === "") {
			demo.initChartist();
						$.notify({
							icon: 'ti-alert',
							message: "Todos os Campos são Obrigatórios"

						},{
							type: 'warning',
							timer: 4000
						});
  		} else {
			$.ajax({
				url: '../engine/controllers/login.php',
  			   	data: {
  					email : email,
  					senha: senha
  			   },
  			   error: function() {
				   demo.initChartist();
						$.notify({
							icon: 'ti-alert',
							message: "Erro na conexão com o servidor. Tente novamente em alguns segundos."

						},{
							type: 'danger',
							timer: 4000
						});
  			   },
  			   success: function(data) {
  					if(data === 'true') {
  						document.location.href = '../';
  					} else if(data === 'no_user_found') {
  						demo.initChartist();
						$.notify({
							icon: 'ti-alert',
							message: "Usuário não encontrado."

						},{
							type: 'danger',
							timer: 4000
						});
  					} else if(data === 'wrong_password') {
  						demo.initChartist();
						$.notify({
							icon: 'ti-lock',
							message: "Senha Incorreta"

						},{
							type: 'warning',
							timer: 4000
						});
  					} else {
						demo.initChartist();
						$.notify({
							icon: 'ti-alert',
							message: "Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes."

						},{
							type: 'danger',
							timer: 4000
						});
  					}
  			   },

  			   type: 'POST'
  			});
		}
    });
	$('#senha_login').keypress(function (e) {
		var key = e.which;
		if(key == 13){
   		$('#Logar').click();
   		return false;  
 		}
	}); 
});