$(document).ready(function()
{	

	//Preenche os dados da listagem de usuários (Primeiramente, assim quando carrega a tela)
	$(function(){
		
		preencherDados();		
		
	})

	//EVENTO PARA QUANDO SUBMITAMOS O FORMULÁRIO DE CADASTRO
	$('#formulario-crud').submit(function(e)
	{			
		e.preventDefault();
		
		let formulario = $(this);
		
		$.ajax
		({
			url:"classes/classes.php",		
			type:"post",
			dataType:"html",
			data:formulario.serialize(),
		
				
		}).done(function(data)
		{	
		
			console.log(data);
			if(data)
			{
				alert("Usuário Cadastrado com Sucesso");
				location.reload();
			}
			else
			{
				alert("O usuário não foi cadastrado");
			}
				
		}).fail(function()
		{
			
		}).always(function(retornoempresas)
		{
			
		});	
		
	});
	
	
	//Editar usuário
	$(document).on("click",".botao-editar", function(e)
	{  		
		e.preventDefault();
		//Pegando a o ID do <tr>, que é o código da empresa
		let line = $(this).parent().parent();
		let codigo_line = $(line).attr('id');
			
		$("#nome-editar").val("");
		$("#idade-editar").val("");
		$("#cidade-editar").val("");
		
		$.ajax
		({					
			url:"classes/listar.php",		
			type:"POST",
			data:{id_listar_form_editar:codigo_line},
			cache: false			
			
		}).done(function(listar)
		{			
			
			$.each($.parseJSON(listar), function(chave, valor)
			{
			
				$("#nome-editar").val(valor.nome);
				$("#idade-editar").val(valor.idade);
				$("#cidade-editar").val(valor.cidade);
				$("#cod-editar").val(valor.id);
							
			});			
			
						
			
		}).fail(function()
		{
		}).always(function()
		{
		});		
		
		
	});
	
	//Remover usuário
	$(document).on("click",".botao-remover", function(e)
	{  		
		e.preventDefault();
		//Pegando a o ID do <tr>, que é o código da empresa
		let line = $(this).parent().parent();
		let codigo_line = $(line).attr('id');
		
		if(!confirm('Tem certeza que deseja excluir esse usuário ?'))
			return;
		
		$.ajax
		({					
			url:"classes/classes.php",		
			type:"POST",
			data:{remover:codigo_line},			
			
		}).done(function(delet)
		{			
			
			if(delet)
			{	
				alert("Usuário excluído com Sucesso");
				location.reload();
			}
			else
			{
				alert("Não foi apagado");
			}
			
			
		}).fail(function()
		{
		}).always(function()
		{
		});		;
	});
	
	//EVENTO PARA QUANDO SUBMITAMOS O FORMULÁRIO QUE ALTERA O BENEFÍCIO
	$('#formulario-editar-crud').submit(function(e)
	{			
		e.preventDefault();		
		
		let formulario = $(this);
		
		$.ajax
		({
			url:"classes/classes.php",		
			type:"post",
			dataType:"html",
			data:formulario.serialize(),
		
				
		}).done(function(data)
		{	
		
			console.log(data);
			if(data)
			{
				alert("Usuário Cadastrado com Sucesso");
				location.reload();
			}
			else
			{
				alert("O usuário não foi cadastrado");
			}
				
		}).fail(function()
		{
			
		}).always(function(retornoempresas)
		{
			
		});	
		
		
	});

	
	function preencherDados()
	{
		let listar = true;
		$.ajax
		({
			//dataType: "json",
			type:"POST",
			data:{listar:listar},
			url:"classes/listar.php",
						
		}).done(function(data)
		{
			
			let atividades = "";
		

			$.each($.parseJSON(data), function(chave, valor)
			{	
				//FUNÇÃO PARA FORMATAR AS DATAS QUE VEM DO PHP
				
					
				//CRIANDO AS LINHAS COM OS TD DA TABELA QUE SÃO O RESULTADO NA CONSULTA AO BANCO 
				atividades += '<tr id="'+ valor.id +'">';
					atividades += '<td nowrap>' + valor.nome + '</td>';
					atividades += '<td nowrap >' + valor.idade + '</td>';
					atividades += '<td nowrap >' + valor.cidade + '</td>';
					atividades += '<td "><button href="#" class="btn- btn-success botao-editar" data-toggle="modal" data-target="#modal-editar-usuario">Editar</button></td>';
					atividades += '<td "><button class="btn- btn-danger botao-remover">Remover</button></td>';		
				atividades += '</tr>';
				
							

			});
			
			$('#listar-usuarios').html(atividades);
			
		});
	}
			
});
