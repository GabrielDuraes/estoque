<?php session_start();

	require_once "../config.php";

	//1. Receber os dados do form
	$email = $_POST['email'];
	$senha = sha1($_POST['senha']);
	//$senha = $_POST['senha'];
	$res;

	//2. Validar os dados

	$User = new User();
	$User = $User->ReadByEmail($email);

	if ($User === NULL) {
		$res = 'no_user_found';
		session_destroy();
	} else {
		$verificaEmail = strcmp($email,$User['email_user']);
		if ($verificaEmail === 0) {
			$verificaSenha = strcmp($senha,$User['senha_user']);
			if ($verificaSenha === 0) {
				$_SESSION['id_user'] = $User['id_user'];
				$_SESSION['name_user'] = $User['nome_user'];
				$_SESSION['email_user'] = $User['email_user'];
				$_SESSION['nivel_acesso'] = $User['nivel_acesso'];
				$_SESSION['loja'] = $User['loja'];

				$res = 'true';
			} else {
				$res = 'wrong_password';
				session_destroy();
			}
		} else {
			$res = 'wrong_user_found';
			session_destroy();
		}
	}

	echo $res;
?>
