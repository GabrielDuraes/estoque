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
                <li class="active">
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

<?php
    require_once "engine/config.php";
?>

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
		
        <div class="content">
            <div class="container-fluid">
            
            <div class="row">
            <h3 class="text-center">Lista de Compras</h3>
            </div>

<?php
    $item_por_pag = 9;
    
    $Loja = new Mercadorias();
    $LojaNum = 0;
    $Loja = $Loja->ReadAllLojas();
        foreach($Loja as $loja){
            $LojaNum += 1; 
            }
    $pagina = intval($_GET['pagina']);
    $num_paginas = ceil($LojaNum/$item_por_pag);
        
        $item = 0;
        for($a = 0; $a<$pagina; $a++){
            $item = $item+$item_por_pag;
            }

    $Mercadoria = new Mercadorias();
    $Mercadoria = $Mercadoria->ReadAlllojas_Paginacao($item, $item_por_pag);
    
  if(empty($Mercadoria)) {
?>

    <h4 class="well"> Nenhum dado encontrado. </h4>
    <?php
    } else { 
    ?>
                <div class="row">
                <br>
                <div class="col-md-6 col-sm-12">
                    <form class="form-inline">
                    <input type="text" class="form-control border-input" id="valor_pesquisa" placeholder="Digite e presione enter">
                    <button hidden="true" id="pesq">x</button>
                    <br>
                    </form>
                </div>
                    <div class="col-md-12">
                    <br>
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Mercadorias</h4>
                                <p class="category"><?php echo $lojas; ?></p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>Mercadoria</th>
                                        <th>Descrição</th>
                                        <th>Fornecedor</th>
                                        <th>CNPJ Forn</th>
                                        <th>Loja</th>
                                        <th>Estoque</th>
                                        <th>Quant Min</th>
                                        <th>Valor</th>
                                        <th class="text-center">Editar</th>
                                        <th class="text-center">Apagar</th>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        foreach ($Mercadoria as $mercadoria) { 
                                    ?>

                                        <tr>
                                            <td><?php echo $mercadoria['mercadoria'] ?></td>
                                            <td><?php echo $mercadoria['descricao'] ?></td>
                                            <td><?php echo $mercadoria['fornecedor'] ?></td>
                                            <td><?php echo $mercadoria['cnpj_fornecedor'] ?></td>
                                            <td><?php echo $mercadoria['loja'] ?></td>
                                            <td><?php echo $mercadoria['quantidade'] ?></td>
                                            <td><?php echo $mercadoria['quantidade_min'] ?></td>
                                            <td><?php echo $mercadoria['valor'] ?></td>
                                            <td> <p class="text-center"> <a style="color: blue;" href="edit_mercadoria.php?id=<?php echo $mercadoria['id_mercadoria'] ?>"><i class="ti-pencil"></i></a></p> </td>
                                            <td> <p class="text-center"> <a style="color: red;" class="exclui" id="<?php echo $mercadoria['id_mercadoria'] ?>" href="#"><i class="ti-trash"></i> </a></p> </td>
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

<!-- Paginação Links -->   
                    <nav aria-label="Page navigation">
                      <ul class="pagination">
                        <li>
                          <a style="text-transform: uppercase;font-weight: 700; color: #222;"  href="lista_compras.php?pagina=0" aria-label="Previous"><i class="fa fa-arrow-left"></i> Início</a>
                        </li>
                        <?php for($i=0; $i<$num_paginas; $i++){ 
                            $estilo =" ";
                            if($pagina == $i){ 
                                $estilo = "background: #222; color: white;";
                            }
                        ?>
                        <li> <a style="text-transform: uppercase;font-weight: 700; color: #222; <?php echo $estilo; ?>"   href="lista_compras.php?pagina=<?php echo $i; ?>&loja=<?php echo $lojas ?>"><?php echo $i+1; ?></a></li>
                        <?php }?>
                        <li>
                        <li>
                          <a style="    text-transform: uppercase;font-weight: 700; color: #222;"  href="lista_compras.php?pagina=<?php echo $num_paginas-1; ?>" aria-label="Next">Fim <i class="fa fa-arrow-right"></i></a>
                        </li>
                      </ul>
                    </nav>  

	<?php
    }
?>

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
                alert('Digite um algo . . .');
            }else{
                window.location = "pesq_compras.php?pesq="+valor_pesquisa; 
            }
      });

        $('#Atualizar').click(function(e) {
            e.preventDefault();
            var id_user = $('#id_user').val(); 
            var nome_user = $('#nome_user').val(); 
            var email_user = $('#email_user').val(); 
            var senha_user = $('#senha_user').val();
            var nivel_acesso = $('#nivel_acesso').val(); 
            var loja = $('#loja').val();

            $.ajax({ 
                       url: 'engine/controllers/user.php',
                       data: {
                                id_user: id_user,
                                nome_user : nome_user,
                                email_user : email_user,
                                senha_user : senha_user,
                                nivel_acesso : nivel_acesso,
                                loja : loja,

                                action: 'update'
                       },
                       error: function() {
                            alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
                       },
                       success: function(data) {
                           console.log(data);
                            if(data === 'true'){
                                alert('Dados Atualizados!');
                                location.reload();
                            }

                            else{
                                alert('Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.');
                            }
                       },

                       type: 'POST'
                    });
        });

        $('.exclui').click(function(e) {
            e.preventDefault();
            var id = $(this).attr('id');
            
        if(confirm("Tem certeza que deseja excluir este dado?")){
          $.ajax({ 
             url: 'engine/controllers/mercadorias.php',
             data: {
              id_mercadoria : id,
              
              action: 'delete'
             },
             error: function() {
              alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
             },
             success: function(data) {
              if(data === 'true'){
                alert('Mercadoria apagada com sucesso!');
                window.location = "lista_compras.php?pagina=0";
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
