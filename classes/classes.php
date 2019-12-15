<?php
	

	date_default_timezone_set('America/Sao_Paulo');
	require_once("conexao.php");
		
	setlocale(LC_ALL, "", "pt_BR.utf-8");
	
	//CLASSE PARA VERIFICAR SE A EMPRESA JÁ POSSUI O BENEFÍCIO
	
	class Usuarios
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
							
		public function cadastrar()
		{	
			try
			{			
				//Conexão com o Banco de Dados (Futuramente podemos atribuir essa conexao a uma classe
				$c = new Conexao();
				$conexao = $c->conectar();
								
				$query = "INSERT INTO usuarios(nome,idade,cidade)VALUES(:nome,:idade,:cidade)";
				
				$stmt = $conexao->prepare($query);
				$stmt->bindValue(':nome',$this->nome);
				$stmt->bindValue(':idade',$this->idade);
				$stmt->bindValue(':cidade',$this->cidade); //Pode ser assim também
				
				$stmt->execute();
				$total = 0;
				$total = $stmt->rowCount();

				
				if($total > 0)
				{					
					echo "sucesso";	
					die();
				}
				else
				{
					echo "falha";	
					die();
				}
				
			}
			catch(PDOException $e)
			{
				//Verificando o erro ocorrido
				echo "Erro: ".$e->getCode()." Mensagem: ".$e->getMessage();				
			}
		}	

		public function editar()
		{	
			try
			{			
				//Conexão com o Banco de Dados (Futuramente podemos atribuir essa conexao a uma classe
				$d = new Conexao();
				$conexao = $d->conectar();
								
				$query = "UPDATE usuarios SET nome = :nome, idade = :idade, cidade = :cidade WHERE id = :id";
				
				$stmt = $conexao->prepare($query);
				$stmt->bindValue(':nome',$this->nome);
				$stmt->bindValue(':idade',$this->idade);
				$stmt->bindValue(':cidade',$this->cidade);
				$stmt->bindValue(':id',$this->id);
				$stmt->execute();
				
				$total = $stmt->rowCount();				
				
				if($total > 0)
				{
					echo "sucesso";	
					die();					
				}
				else
				{
					echo "falha";	
					die();
				}

				
			}
			catch(PDOException $e)
			{
				//Verificando o erro ocorrido
				echo "Erro: ".$e->getCode()." Mensagem: ".$e->getMessage();				
			}
		}	
		
		public function deletar()
		{	
			try
			{			
				//Conexão com o Banco de Dados (Futuramente podemos atribuir essa conexao a uma classe
				$d = new Conexao();
				$conexao = $d->conectar();
								
				$query = "DELETE FROM usuarios WHERE id = :id";
				
				$stmt = $conexao->prepare($query);
				$stmt->bindValue(':id',$this->id);
				
				$stmt->execute();
				$total = $stmt->rowCount();				
				
				if($total > 0)
				{
					echo "sucesso";	
					die();						
				}
				else
				{
					echo "falha";	
					die();	
				}

				
			}
			catch(PDOException $e)
			{
				//Verificando o erro ocorrido
				echo "Erro: ".$e->getCode()." Mensagem: ".$e->getMessage();				
			}
		}	
		
	}
		
	
	//PREENCHE AS VARIÁVEIS COM OS DADOS VINDOS DOS CAMPOS DO FORMULÁRIO
	
	if(isset($_POST['cadastrar']))
	{
		$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING); 
		$idade = filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_STRING);
		$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
		
		$usuarios = new Usuarios();
		
		$usuarios->nome = $nome;
		$usuarios->idade = $idade;
		$usuarios->cidade = $cidade;

		$usuarios->cadastrar();
	}	
	else if(isset($_POST['cod-editar']))
	{
		$nome = filter_input(INPUT_POST, 'nome-editar', FILTER_SANITIZE_STRING); 
		$idade = filter_input(INPUT_POST, 'idade-editar', FILTER_SANITIZE_STRING);
		$cidade = filter_input(INPUT_POST, 'cidade-editar', FILTER_SANITIZE_STRING);
		$id = filter_input(INPUT_POST, 'cod-editar', FILTER_SANITIZE_STRING);
		
		$usuarios = new Usuarios();
		
		$usuarios->nome = $nome;
		$usuarios->idade = $idade;
		$usuarios->cidade = $cidade;
		$usuarios->id = $id;

		$usuarios->editar();
	}
	else if(isset($_POST['remover']))
	{
		$id = filter_input(INPUT_POST, 'remover', FILTER_SANITIZE_STRING); 
		
		
		$usuarios = new Usuarios();		
		$usuarios->id = $id;
		
		$usuarios->deletar();
	}
