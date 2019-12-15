<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<!-- Required meta tags -->
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE-edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			  
	  
	   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		
		<title>Crud</title>
		
	
	</head>

<body>

<!-- Div com o formulário de login do get -->
<div class="container">
	<div class="row"> 
		<div class="col-lg-8 offset-lg-2">
			
			<h1 class="text-center">CRUD Simples de Exemplo</h1>
		
			<form id="formulario-crud">
							
				<div class="form-group">
					<label for="nome">Nome</label>
					<input class="form-control" type="text" id="nome" name="nome" required />
				</div>
			
				<div class="form-group">
					<label for="idade">Idade</label>
					<input class="form-control" type="text" id="idade" name="idade" required />
				</div>			
			
				<div class="form-group">
					<label for="cidade">Cidade</label>
					<input class="form-control" type="text" id="cidade" name="cidade" required />
				</div>
				
				<input type="hidden" id="cadastrar" name="cadastrar" value="cadastrar" required /> 

				<div class="form-group">
					<button class="btn btn-primary" value="cadastrar" type="submit">Cadastrar</button>
				</div>		
							
			</form>
			
		</div>
	</div>
	
	
	<div class="row" id="">									
	<!-- DIV QUE EXIBE AS INFORMAÇÕES DE RETORNO DA CONSULTA -->				
		<div class="col-lg-10 offset-lg-1 mt-2" id="exibicao">						
			<!-- TABELA QUE EXIBE DINAMICAMENTE COM O PHP OS RESULTADOS DA CONSULTA AO BANCO -->					
			<table class="table border table-sm" id="resultado-exibicao">
				
				<thead class="">
					
					<tr class="text-center">
						<!--<tr><th>Código</th>-->
						<th scope="col"  class="thfixado bg-dark text-light">Editar</th>
						<th scope="col"  class="thfixado bg-dark text-light">Nome</th>	
						<th scope="col"  class="thfixado bg-dark text-light">Idade</th>
						<th scope="col"  class="thfixado bg-dark text-light">Cidade</th>
						<th scope="col"  class="thfixado bg-dark text-light">Remover</th>						
						
					</tr>

				</thead>
				
				<tbody class="text-center" id="listar-usuarios">
					
					
					
				</tbody>			
			
			</table>								
		
		</div>
	
	</div>			
	
	
</div>

				<div class="modal fade bd-example-modal-sm tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true"  id="modal-editar-usuario">
					<div class="modal-dialog">
						<div class="modal-content">
						
							<div class="modal-header bg-info">
								<h5 class="modal-title text-light">Editar dados do usuário</h5>
								<button class="close"
										aria-label="close"
										data-dismiss="modal">
									<span aria-hidden="true">&times;</span>
								</button>					
							</div>
								
							<div class="modal-body">
									
								<form id="formulario-editar-crud">
							
									<div class="form-group">
										<label for="nome-editar">Nome</label>
										<input class="form-control" type="text" id="nome-editar" name="nome-editar" required />
									</div>
								
									<div class="form-group">
										<label for="idade-editar">Idade</label>
										<input class="form-control" type="text" id="idade-editar" name="idade-editar" required />
									</div>			
								
									<div class="form-group">
										<label for="cidade-editar">Cidade</label>
										<input class="form-control" type="text" id="cidade-editar" name="cidade-editar" required />
									</div>
										
									<input class="form-control" type="hidden" id="cod-editar" name="cod-editar" required />									

									<div class="form-group">
										<button class="btn btn-primary" value="editar" type="submit">Cadastrar</button>
									</div>		
												
								</form>
									
							</div>
						</div>
					</div>
				</div>
							
							
							
							
							
					


<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="_scripts/script.js"></script>

</body>
</html>