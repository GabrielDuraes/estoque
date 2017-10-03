// JavaScript Document

$(document).ready(function(e) {
	$('.getout').click(function(e) {
		e.preventDefault();
		$.ajax({
		   url: 'engine/controllers/logout.php',
		   data: {

		   },
		   error: function() {
				alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
		   },
		   success: function(data) {
				console.log(data);
				if(data === 'kickme'){
					document.location.href = 'login/';
				}


				else{
					alert('Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.');
				}
		   },

		   type: 'POST'
		});

  });

});