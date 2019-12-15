<?php
	
	date_default_timezone_set('America/Sao_Paulo');
	require_once("conexao.php");
		
	setlocale(LC_ALL, "", "pt_BR.utf-8");
	
	//CLASSE PARA VERIFICAR SE A EMPRESA JÁ POSSUI O BENEFÍCIO
	
	class Dados
	{			

		private $id;
		private $nome;
		private $idade;
		private $cidade;
		
		public function __get($atributo)
		{			
			return $this->$atributo;
		}
		
		public function __set($atributo, $valor)
		{			
			$this->$atributo = $valor;
		}		
							
		public function listar()
		{	
			try
			{			
				//Conexão com o Banco de Dados (Futuramente podemos atribuir essa conexao a uma classe
				$c = new Conexao();
				$conexao = $c->conectar();
								
				$query = "SELECT * FROM usuarios ORDER BY nome asc";
				
				$stmt = $conexao->prepare($query);	
				$stmt->execute();			
				
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
								
				echo json_encode($result);				
				
			}
			catch(PDOException $e)
			{
				//Verificando o erro ocorrido
				echo "Erro: ".$e->getCode()." Mensagem: ".$e->getMessage();				
			}
		}

		public function listarFormEditar()
		{	
			try
			{			
				//Conexão com o Banco de Dados (Futuramente podemos atribuir essa conexao a uma classe
				$c = new Conexao();
				$conexao = $c->conectar();
								
				$query = "SELECT * FROM usuarios WHERE id = :id";
				
				$stmt = $conexao->prepare($query);	
				$stmt->bindValue(':id',$this->id);
				$stmt->execute();			
				
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);	
				
								
				echo json_encode($result);				
				
			}
			catch(PDOException $e)
			{
				//Verificando o erro ocorrido
				echo "Erro: ".$e->getCode()." Mensagem: ".$e->getMessage();				
			}
		}		
	}		
	
	//PREENCHE AS VARIÁVEIS COM OS DADOS VINDOS DOS CAMPOS DO FORMULÁRIO
	
	if(isset($_POST['listar']))
	{		
		$dados = new Dados();		
		$dados->listar();
	}	
	else if(isset($_POST['id_listar_form_editar']))
	{
		
		$dados = new Dados();
		$dados->id = filter_input(INPUT_POST, 'id_listar_form_editar', FILTER_SANITIZE_STRING);
		$dados->listarFormEditar();
	}
