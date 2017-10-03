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
                <li>
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
                <li>
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

    $Mercadoria = new Mercadorias();
    $Mercadoria = $Mercadoria->Read($_GET['id']);
?>

        <div class="content">
            <div class="container-fluid">
			
                <div class="row">
                   
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Editar Dados de <?php echo $Mercadoria['mercadoria']; ?></h4>
                            </div>
                            <div class="content">
                                <form>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Mercadoria *</label>
                                            <input type="text" class="form-control border-input" value="<?php echo $Mercadoria['mercadoria'] ?>" id="mercadoria">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Valor Unitário *</label>
                                            <input type="text" class="form-control border-input" value="<?php echo $Mercadoria['valor'] ?>" id="valor">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Fornecedor *</label>
                                            <input type="text" class="form-control border-input" value="<?php echo $Mercadoria['fornecedor'] ?>" id="fornecedor">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">CNPJ Fornecedor *</label>
                                            <input type="text" class="form-control border-input" value="<?php echo $Mercadoria['cnpj_fornecedor'] ?>" id="cnpj_fornecedor">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="exampleInputEmail1">Quantidade *</label>
                                            <input type="number" class="form-control border-input" value="<?php echo $Mercadoria['quantidade'] ?>" id="quantidade">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="exampleInputEmail1">Quantidade Mínima *</label>
                                            <input type="number" class="form-control border-input" value="<?php echo $Mercadoria['quantidade_min'] ?>" id="quantidade_min">
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                              <label for="loja">Loja *</label>
                                              <select class="form-control" id="loja">
                                                <option <?php if($Usuario['loja'] == 'Diamantina'){echo 'selected';} ?>>Diamantina</option>
                                                <option <?php if($Usuario['loja'] == 'P.Kubitschek'){echo 'selected';} ?>>P.Kubitschek</option>
                                                <option <?php if($Usuario['loja'] == 'Serro'){echo 'selected';} ?>>Serro</option>
                                              </select>
                                            </div>
                                        </div>
                                        <input type="hidden" name="" id="id" value="<?php echo $_GET['id'] ?>">
                                        <div class="col-md-12">
                                            <label for="exampleInputEmail1">Descrição </label>
                                            <textarea class="form-control border-input" id="descricao" maxlength="255"><?php echo $Mercadoria['descricao'] ?></textarea>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd" id="Atualizar">Atualizar</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
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
        $('#Atualizar').click(function(e) { 
            e.preventDefault();
            var id = $('#id').val();
            var mercadoria = $('#mercadoria').val(); 
            var fornecedor = $('#fornecedor').val(); 
            var cnpj_fornecedor = $('#cnpj_fornecedor').val(); 
            var quantidade = $('#quantidade').val();
            var quantidade_min = $('#quantidade_min').val();
            var valor = $('#valor').val(); 
            var loja = $('#loja').val();
            var descricao = $('#descricao').val();

            if(mercadoria == "" || fornecedor == "" || cnpj_fornecedor == "" || quantidade == "" || quantidade_min == "" || valor == "" || loja == ""){
                alert('Preencha todos os campos com (*)');
            }else{
                $.ajax({ 
                     url: 'engine/controllers/mercadorias.php',
                     data: {
                      id_mercadoria: id,  
                      mercadoria : mercadoria,
                      fornecedor : fornecedor,
                      cnpj_fornecedor : cnpj_fornecedor,
                      quantidade : quantidade,

                      quantidade_min : quantidade_min,
                      valor : valor,
                      loja : loja,
                      descricao : descricao,
                      
                      action: 'update'
                     },
                     error: function() {
                      alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
                     },
                     success: function(data) {
                      if(data === 'true'){
                        alert('Mercadoria Atualizada!');
                        history.go(-1);
                      } else {
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
