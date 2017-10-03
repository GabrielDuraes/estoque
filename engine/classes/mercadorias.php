<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class Mercadorias {
		
		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_mercadoria;
		private $mercadoria;
		private $descricao;
		private $fornecedor;
		private $cnpj_fornecedor;
		private $quantidade;
		private $quantidade_min;
		private $valor;
		private $loja;
				

		//setters
		
		//Funcao que seta uma instancia da classe
		public function SetValues($id_mercadoria, $mercadoria, $descricao, $fornecedor, $cnpj_fornecedor, $quantidade, $quantidade_min, $valor, $loja) { 
			$this->id_mercadoria = $id_mercadoria;
			$this->mercadoria = $mercadoria;
			$this->descricao = $descricao;
			$this->fornecedor = $fornecedor;
			$this->cnpj_fornecedor = $cnpj_fornecedor;
			$this->quantidade = $quantidade;
			$this->quantidade_min = $quantidade_min;
			$this->valor = $valor;
			$this->loja = $loja;
						
		}
		
		
		//Methods
		
		//Funcao que salva a instancia no BD
		public function Create() {
			
			$sql = "
				INSERT INTO mercadorias 
						  (
				 			id_mercadoria,
				 			mercadoria,
				 			descricao,
				 			fornecedor,
				 			cnpj_fornecedor,
				 			quantidade,
				 			quantidade_min,
				 			valor,
				 			loja
						  )  
				VALUES 
					(
				 			'$this->id_mercadoria',
				 			'$this->mercadoria',
				 			'$this->descricao',
				 			'$this->fornecedor',
				 			'$this->cnpj_fornecedor',
				 			'$this->quantidade',
				 			'$this->quantidade_min',
				 			'$this->valor',
				 			'$this->loja'
					);
			";
			
			$DB = new DB();
			$DB->open();
			$result = $DB->query($sql);
			$DB->close();
			return $result;
		}
		
		//Funcao que retorna uma Instancia especifica da classe no bd
		public function Read($id) {
			$sql = "
				SELECT
					 t1.id_mercadoria,
					 t1.mercadoria,
					 t1.descricao,
					 t1.fornecedor,
					 t1.cnpj_fornecedor,
					 t1.quantidade,
					 t1.quantidade_min,
					 t1.valor
				FROM
					mercadorias AS t1
				WHERE
					t1.id_mercadoria  = '$id'

			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			
			$DB->close();
			return $Data[0]; 
		}
		
		
		//Funcao que retorna um vetor com todos as instancias da classe no BD
		public function ReadAll($loja) {
			$sql = "
				SELECT
					 t1.id_mercadoria,
					 t1.mercadoria,
					 t1.descricao,
					 t1.fornecedor,
					 t1.cnpj_fornecedor,
					 t1.quantidade,
					 t1.quantidade_min,
					 t1.valor
				FROM
					mercadorias AS t1
				WHERE t1.loja = '$loja'
				

			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			$realData;
			if($Data ==NULL){
				$realData = $Data;
			}
			else{
				
				foreach($Data as $itemData){
					if(is_bool($itemData)) continue;
					else{
						$realData[] = $itemData;	
					}
				}
			}
			$DB->close();
			return $realData; 
		}

				//Funcao que retorna um vetor com todos as instancias da classe no BD
		public function ReadAllLojas() {
			$sql = "
				SELECT *
				FROM
					mercadorias AS t1
					
				WHERE t1.quantidade < t1.quantidade_min				

			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			$realData;
			if($Data ==NULL){
				$realData = $Data;
			}
			else{
				
				foreach($Data as $itemData){
					if(is_bool($itemData)) continue;
					else{
						$realData[] = $itemData;	
					}
				}
			}
			$DB->close();
			return $realData; 
		}
		
		
		
		
		//Funcao que retorna um vetor com todos as instancias da classe no BD com paginacao
		public function ReadAll_Paginacao($inicio, $registros, $loja) {
			$sql = "
				SELECT *
				FROM
					mercadorias AS t1

				WHERE t1.loja = '$loja'
					
					
				LIMIT $inicio, $registros;
			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			
			$DB->close();
			return $Data; 
		}

		//Funcao que retorna um vetor com todos as instancias da classe no BD com paginacao
		public function ReadAlllojas_Paginacao($inicio, $registros) {
			$sql = "
				SELECT *
				FROM
					mercadorias AS t1				
				
				WHERE t1.quantidade < t1.quantidade_min

				LIMIT $inicio, $registros;
			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			
			$DB->close();
			return $Data; 
		}
		
		//Funcao que atualiza uma instancia no BD
		public function Update() {
			$sql = "
				UPDATE mercadorias SET
				
				  mercadoria = '$this->mercadoria',
				  descricao = '$this->descricao',
				  fornecedor = '$this->fornecedor',
				  cnpj_fornecedor = '$this->cnpj_fornecedor',
				  quantidade = '$this->quantidade',
				  quantidade_min = '$this->quantidade_min',
				  valor = '$this->valor'
				
				WHERE id_mercadoria = '$this->id_mercadoria';
				
			";
		
			
			$DB = new DB();
			$DB->open();
			$result =$DB->query($sql);
			$DB->close();
			return $result;
		}

		public function updateQnt() {
			$sql = "
				UPDATE mercadorias SET
				
				  quantidade = quantidade - '$this->quantidade'

				WHERE id_mercadoria = '$this->id_mercadoria';
				
			";
		
			
			$DB = new DB();
			$DB->open();
			$result =$DB->query($sql);
			$DB->close();
			return $result;
		}
		
		//Funcao que deleta uma instancia no BD
		public function Delete() {
			$sql = "
				DELETE FROM mercadorias
				WHERE id_mercadoria = '$this->id_mercadoria';
			";
			$DB = new DB();
			
			$DB->open();
			$result =$DB->query($sql);
			$DB->close();
			return $result;
		}
		
		
		/*
			--------------------------------------------------
			Viewer SPecific methods -- begin 
			--------------------------------------------------
		
		*/
		
		public function Readcompras_pesq($pesq) {
			$sql = "
				SELECT *
				FROM
					mercadorias AS t1
				WHERE t1.mercadoria LIKE '%$pesq%' AND t1.quantidade < t1.quantidade_min	
			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			$realData;
			if($Data ==NULL){
				$realData = $Data;
			}
			else{
				
				foreach($Data as $itemData){
					if(is_bool($itemData)) continue;
					else{
						$realData[] = $itemData;	
					}
				}
			}
			$DB->close();
			return $realData; 
		}
		
		public function Readall_pesqloja($loja, $pesq) { 
			$sql = "
				SELECT *
				FROM
					mercadorias AS t1
				WHERE t1.loja = '$loja' AND t1.mercadoria LIKE '%$pesq%'
			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			$realData;
			if($Data ==NULL){
				$realData = $Data;
			}
			else{
				
				foreach($Data as $itemData){
					if(is_bool($itemData)) continue;
					else{
						$realData[] = $itemData;	
					}
				}
			}
			$DB->close();
			return $realData; 
		}

		/*
			--------------------------------------------------
			Viewer SPecific methods -- end 
			--------------------------------------------------
		
		*/
		
		
		//constructor 
		
		function __construct() { 
			$this->id_mercadoria;
			$this->mercadoria;
			$this->descricao;
			$this->fornecedor;
			$this->cnpj_fornecedor;
			$this->quantidade;
			$this->quantidade_min;
			$this->valor;
			
			
		}
		
		//destructor
		function __destruct() {
			$this->id_mercadoria;
			$this->mercadoria;
			$this->descricao;
			$this->fornecedor;
			$this->cnpj_fornecedor;
			$this->quantidade;
			$this->quantidade_min;
			$this->valor;
			
			
		}
			
	};

?>
