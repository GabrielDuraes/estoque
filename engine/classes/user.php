<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class User {
		
		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_user;
		private $nome_user;
		private $email_user;
		private $senha_user;
		private $nivel_acesso;
		private $loja;
				

		//setters
		
		//Funcao que seta uma instancia da classe
		public function SetValues($id_user, $nome_user, $email_user, $senha_user, $nivel_acesso, $loja) { 
			$this->id_user = $id_user;
			$this->nome_user = $nome_user;
			$this->email_user = $email_user;
			$this->senha_user = $senha_user;
			$this->nivel_acesso = $nivel_acesso;
			$this->loja = $loja;
		}
		
		
		//Methods
		
		//Funcao que salva a instancia no BD
		public function Create() {
			
			$sql = "
				INSERT INTO user 
						  (
				 			id_user,
				 			nome_user,
				 			email_user,
				 			senha_user,
				 			nivel_acesso,
				 			loja
						  )  
				VALUES 
					(
				 			'$this->id_user',
				 			'$this->nome_user',
				 			'$this->email_user',
				 			'$this->senha_user',
				 			'$this->nivel_acesso',
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
				SELECT *
				FROM
					user AS t1
				WHERE
					t1.id_user  = '$id'

			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			
			$DB->close();
			return $Data[0]; 
		}
		
		
		//Funcao que retorna um vetor com todos as instancias da classe no BD
		public function ReadAll() {
			$sql = "
				SELECT *
				FROM
					user AS t1
				

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
		
		
		public function ReadPesq($pesq) {
			$sql = "
				SELECT *
				FROM
					user AS t1
				WHERE t1.nome_user LIKE '%$pesq%'
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
		public function ReadAll_Paginacao($inicio, $registros) {
			$sql = "
				SELECT *
				FROM
					user AS t1
					
					
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
				UPDATE user SET
				
				  nome_user = '$this->nome_user',
				  email_user = '$this->email_user',
				  senha_user = '$this->senha_user',
				  nivel_acesso = '$this->nivel_acesso',
				  loja = '$this->loja'
				
				WHERE id_user = '$this->id_user';
				
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
				DELETE FROM user
				WHERE id_user = '$this->id_user';
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
		public function ReadByEmail($email) {
			$sql = "
				SELECT *
				FROM
					user AS t1
				WHERE
					t1.email_user  = '$email'
			";

			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);

			$DB->close();
			return $Data[0];
		}
		
		/*
			--------------------------------------------------
			Viewer SPecific methods -- end 
			--------------------------------------------------
		
		*/
		
		
		//constructor 
		
		function __construct() { 
			$this->id_user;
			$this->nome_user;
			$this->email_user;
			$this->senha_user;
			$this->nivel_acesso;
			$this->loja;		
			
		}
		
		//destructor
		function __destruct() {
			$this->id_user;
			$this->nome_user;
			$this->email_user;
			$this->senha_user;
			$this->nivel_acesso;
			$this->loja;			
			
		}
			
	};

?>
