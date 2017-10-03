<?php

	require_once "../config.php";
	

	//parte1
	
	$id_mercadoria = $_POST['id_mercadoria'];
	$mercadoria = $_POST['mercadoria'];
	$descricao = $_POST['descricao'];
	$fornecedor = $_POST['fornecedor'];
	$cnpj_fornecedor = $_POST['cnpj_fornecedor'];
	$quantidade = $_POST['quantidade'];
	$quantidade_min = $_POST['quantidade_min'];
	$valor = $_POST['valor'];
	$loja = $_POST['loja'];
	
	
	//parte2
	$action = $_POST['action'];
	
	//parte3
	$Item = new Mercadorias();
	$Item->SetValues($id_mercadoria, $mercadoria, $descricao, $fornecedor, $cnpj_fornecedor, $quantidade, $quantidade_min, $valor, $loja); 
	
	
		
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

		case 'updateQnt':
		
			
			
			$res = $Item->updateQnt();
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
