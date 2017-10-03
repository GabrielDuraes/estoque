<?php session_start();
	if(empty($_SESSION)){
		?>
      <script>
				document.location.href = 'login/';
			</script>
    <?php
	}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="theme-color" content="#222222">
	<title>Casa Levy</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="css/paper-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="css/demo.css" rel="stylesheet" />


    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="css/themify-icons.css" rel="stylesheet">

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-background-color="black" data-active-color="info">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="index.php" class="simple-text">
                    Casa Levy
                </a>
            </div>

            <ul class="nav">
                <li >
                    <a href="index.php">
                        <i class="ti-home"></i>
                        <p>Home</p>
                    </a>
                </li>
                <?php
                   $user = $_SESSION['nivel_acesso'];
                
                   if ($user === "Admin") {
                 ?>
                <li>
                    <a href="estoque.php?loja=Diamantina">
                        <i class="ti-archive"></i>
                        <p>Loja Diamantina</p>
                    </a>
                </li>
                <li>
                    <a href="estoque.php?loja=P.Kubitschek">
                        <i class="ti-archive"></i>
                        <p>Loja P.Kubitschek</p>
                    </a>
                </li>
                <li>
                    <a href="estoque.php?loja=Serro">
                        <i class="ti-archive"></i>
                        <p>Loja Serro</p>
                    </a>
                </li>
                <li>
                    <a href="lista_compras.php">
                        <i class="ti-shopping-cart"></i>
                        <p>Lista de Compras</p>
                    </a>
                </li>
                <li class="active">
                    <a href="gerir_users.php">
                        <i class="ti-settings"></i>
                        <p>Gerenciar Usuários</p>
                    </a>
                   </li> 
                   <?php }  
                   else{ ?>

                    <li>
                        <a href="estoque.php?loja=<?php echo $_SESSION['loja']; ?>">
                            <i class="ti-shopping-cart"></i>
                            <p>Loja <?php echo $_SESSION['loja']; ?></p>
                        </a>
                    </li>
                    <?php

                    } ?>
                <li class="active-pro">
                    <a href="#" class="getout">
                        <i class="ti-arrow-right "></i>
                        <p>SAIR</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Home</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-user"></i>
									<p> <?php echo $_SESSION['name_user'];?> </p>
									<b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="edit_user.php"><i class="ti-marker-alt"></i> Editar Perfil</a></li>
                                <li><a href="#" class="getout"><i class="ti-arrow-right"></i> Sair</a></li>
                              </ul>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
		
<?php
    require_once "engine/config.php";

?>

        <div class="content">
        <div class="container-fluid">

        <div class="row">
        <h3 class="text-center" style="margin-top: 0px;">Resultados da Pesquisa</h3>
            <div class="col-md-6 col-sm-12">
            <form>
                <input type="text" class="form-control border-input" id="valor_pesquisa" placeholder="Digite e presione enter">
                <button hidden="true" id="pesq">x</button>
                <br>
            </form>
            </div>
        </div>



<?php		
    $Usuario = new User();
    $Usuario = $Usuario->ReadPesq($_GET['pesq']);
    
  if(empty($Usuario)) {
?>

    <h4 class="well"> Nenhum dado encontrado. </h4>
    <?php
    } else {
    ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Usuários</h4>
                                <p class="category">Lista de Todos os Usuários</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Nivel de Acesso</th>
                                        <th>Loja</th>
                                        <th class="text-center">Editar</th>
                                        <th class="text-center">Apagar</th>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        foreach ($Usuario as $usuario) {
                                    ?>

                                        <tr>
                                            <td><?php echo $usuario['nome_user'] ?></td>
                                            <td><?php echo $usuario['email_user'] ?></td>
                                            <td><?php echo $usuario['nivel_acesso'] ?></td>
                                            <td><?php echo $usuario['loja'] ?></td>
                                            <td class="text-center"><a href="edit_useradmin.php?id=<?php echo $usuario['id_user']; ?>"><i class="ti-pencil"></a></td>
                                            <td class="text-center exclui" id="<?php echo $usuario['id_user']; ?>"> <a style="color: red;" href="!"><i class="ti-trash"></a></td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
              <?php  } ?>
            </div>
        </div>
	
        <footer class="footer">
            <div class="container-fluid">
                <div class="copyright pull-right">
					&copy; B&D Sistemas Web <script>document.write(new Date().getFullYear())</script>
				</div>
            </div>
        </footer>

    </div>
</div>

</body>

    <!--   Core JS Files   -->
    <script src="js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="js/bootstrap-checkbox-radio.js"></script>

	<!--  Charts Plugin -->
	<script src="js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="js/demo.js"></script>
	<!-- botoes de sair do sistema funcionem -->
	<script src="js/out.js"></script>
    
    <script>
    $(document).ready(function(e) {               
        $('.exclui').click(function(e) {
            e.preventDefault();
            var id = $(this).attr('id');
            
        if(confirm("Tem certeza que deseja excluir este dado?")){
          $.ajax({
             url: 'engine/controllers/user.php',
             data: {
              id_user : id,
              
              action: 'delete'
             },
             error: function() {
              alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
             },
             success: function(data) {
              if(data === 'true'){
                alert('Usuário apagado com sucesso!');
                location.reload();
              } else {
                alert('Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.'); 
              }
             },
             
             type: 'POST'
          });
        }

        });

        $('#valor_pesquisa').keypress(function (e) {
        var key = e.which;
        if(key == 13){
          $('#PEsquisar').click();
          return true;  
        }
   });

      $('#pesq').click(function(e) {
            e.preventDefault();
            var valor_pesquisa = $('#valor_pesquisa').val(); 
            if(valor_pesquisa == ""){
                alert('Digite um nome . . .');
            }else{
                window.location = "pesq_func.php?pesq="+valor_pesquisa; 
            }
      });

         $('#Adicionar').click(function(e) {
            e.preventDefault();
            var id_user = $('#id_user').val(); 
            var nome_user = $('#nome_user').val(); 
            var email_user = $('#email_user').val(); 
            var senha_user = $('#senha_user').val();
            var nivel_acesso = $('#nivel_acesso').val(); 
            var loja = $('#loja').val();

            if(nome_user =="" || email_user =="" || senha_user =="" || nivel_acesso =="" || loja ==""){
                alert('Preencha todos os campos!');
            }else{
            $.ajax({ 
                       url: 'engine/controllers/user.php',
                       data: {
                                nome_user : nome_user,
                                email_user : email_user,
                                senha_user : senha_user,
                                nivel_acesso : nivel_acesso,
                                loja : loja,

                                action: 'create'
                       },
                       error: function() {
                            alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
                       },
                       success: function(data) {
                           console.log(data);
                            if(data === 'true'){
                                alert('Usuário Adicionado!');
                                location.reload();
                            }

                            else{
                                alert('Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.');
                            }
                       },

                       type: 'POST'
                    });
            }
        });
    });
 </script> 

</html>
