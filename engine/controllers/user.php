<?php

	require_once "../config.php";
	

	//parte1
	
	$id_user = $_POST['id_user'];
	$nome_user = $_POST['nome_user'];
	$email_user = $_POST['email_user'];
	$senha_user = $_POST['senha_user'];
	$nivel_acesso = $_POST['nivel_acesso'];
	$loja = $_POST['loja'];
	
	
	//parte2
	$action = $_POST['action'];
	
	//parte3
	$Item = new User();
	$Item->SetValues($id_user, $nome_user, $email_user, sha1($senha_user), $nivel_acesso, $loja); 
	
	
		
	//parte4
	switch($action) {
		case 'create':
			
			
			$res = $Item->Create();
			if ($res === NULL) {
				$res = "true";
			}
			else {
				$res = "false";	
			}			

			echo $res;
			
		
		break;	
		
		case 'update':
		
			
			
			$res = $Item->Update();
			
			if ($res === NULL) {
				$res= 'true';	
			}
			else {
				$res = 'false';	
			}
			echo $res;
			
		
		break;	
		
		case 'delete':
		
			
			
			$res = $Item->Delete();
			if ($res === NULL) {
				$res= 'true';	
			}
			else {
				$res = 'false';	
			}
			echo $res;
			
		
		break;	
		
		
		
	}
?>
