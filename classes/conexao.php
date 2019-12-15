<?php
	
	class Conexao
	{	
		public function conectar()
		{	
			try
			{				
				//Conexão com o Banco de Dados (Futuramente podemos atribuir essa conexao a uma classe
				$banco = "mysql:host=localhost;dbname=crud";
				$usuario = 'root';
				$senha = '';				
				$conexao = new PDO($banco,$usuario,$senha,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
				
				return $conexao;
								
			}
			catch(PDOException $e)
			{
				//Verificando o erro ocorrido
				echo "Erro: ".$e->getCode()." Mensagem: ".$e->getMessage();				
			}
		}
			
	}	
