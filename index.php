<?php session_start();
	if(empty($_SESSION)){
		?>
      <script>
				document.location.href = 'login';
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
                <li class="active">
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
    ?>

        <div class="content">
            <div class="container-fluid">
			
                <div class="row">
                <h3 class="text-center">Estoque</h3>
                <?php if($_SESSION['nivel_acesso'] == 'Admin'){  ?>
				<a href="estoque.php?loja=Diamantina">
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-archive"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Loja</p>
                                            Diamantina
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-package"></i>
                                        <?php 
                                            $numLojaD = 0;
                                            $LojaD = new Mercadorias();
                                            $LojaD = $LojaD->ReadAll('Diamantina');
                                            foreach ($LojaD as $lojaD) {
                                                $numLojaD += '1';    
                                            }
                                            echo $numLojaD;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                    <a href="estoque.php?loja=P.Kubitschek">
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-archive"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Loja</p>
                                            P.Kubitschek
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-package"></i>
                                        <?php 
                                            $numLojaP = 0;
                                            $LojaP = new Mercadorias();
                                            $LojaP = $LojaP->ReadAll('P.Kubitschek');
                                            foreach ($LojaP as $lojaP) {
                                                $numLojaP += '1';    
                                            }
                                            echo $numLojaP;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                    <a href="estoque.php?loja=Serro">
                   <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-archive"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Loja</p>
                                            Serro
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-package"></i>
                                        <?php 
                                            $numLojaS = 0;
                                            $LojaS = new Mercadorias();
                                            $LojaS = $LojaS->ReadAll('Serro');
                                            foreach ($LojaS as $lojaS) {
                                                $numLojaS += '1';    
                                            }
                                            echo $numLojaS;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                    <?php  } else{ ?>

                    <div class="col-md-4"></div>
                    <a href="estoque.php?loja=<?php echo $_SESSION['loja']; ?>">
                   <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-archive"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Loja</p>
                                            <?php echo $_SESSION['loja'] ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-package"></i> 
                                        <?php 
                                            $numLojaS = 0;
                                            $LojaS = new Mercadorias();
                                            $LojaS = $LojaS->ReadAll($_SESSION['loja']);
                                            foreach ($LojaS as $lojaS) {
                                                $numLojaS += '1';    
                                            }
                                            echo $numLojaS;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                    <div class="col-md-12"></div>
                    <?php 
                        }

                   if ($user === "Admin") {
                 ?>
                 <div class="col-md-12"></div>
                  <div class="col-md-3"></div>
					<div class="col-lg-6 col-sm-6">
					<h3 class="text-center">Lista de Compras</h3>
                        <a href="lista_compras.php">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-danger text-center">
                                            <i class="ti-view-list-alt"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Estoque</p>
                                            Baixo
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-package"></i>
                                        <?php 
                                            $numLojaA = 0;
                                            $LojaA = new Mercadorias();
                                            $LojaA = $LojaA->ReadAllLojas();
                                            foreach ($LojaA as $lojaA) {
                                                $numLojaA += '1';    
                                            }
                                            echo $numLojaA;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-md-12"></div>
                    <div class="col-md-3"></div>
                    <div class="col-lg-6 col-sm-6">
                    <h3 class="text-center">Nivel de Acesso</h3>
                        <a href="gerir_users.php">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-info text-center">
                                            <i class="ti-settings"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Gerenciar</p>
                                            Usuários
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-user"></i>
                                        <?php 
                                            $numUser = 0;
                                            $Usuários = new User();
                                            $Usuários = $Usuários->ReadAll();
                                            foreach ($Usuários as $usuários) {
                                                $numUser += '1';    
                                            }
                                            echo $numUser;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
					<?php } else{ }?>
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

</html>
