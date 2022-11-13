<?php
	//Conectando ao banco
	include_once("conexao.php");
	//Tabela no BD
	$tabela="produto";
	
	//Script de uma busca em uma tabela no Banco de Dados
	$sql = "select * from $tabela";
	
	// executando instrução SQL
	$instrucao = mysqli_query($conexao,$sql);
	
	//Retorna uma matriz associativa dos dados
	echo "<br/><a href='cadastroprod.php'>Voltar</a><br/>";
	echo "<h3>Lista de Categorias</h3>";
	//gera uma tabela pela tag table
	echo "<table>
		<tr><th> </th><th>Nome</th><th>Descrição</th><th>Tamanho</th><th>Preço</th><th>Quantidade</th><th>Site</th><th> </th></tr>";
		
	foreach ($instrucao as $exibe) {
		//cria um linha (TR) para cada registro existente na tabela
		//cada TD representa um campo do registro
		echo "<tr>
		<td><a href='editarCategoria.php?&codigo=".$exibe['nome']."'>Editar</a></td> 
		<td align='center'>".$exibe['descricao']."</td>
		<td>".$exibe['nome']."</td>
		<td><a href='removerCategoria.php?&codigo=".$exibe['id']."'>Remover</a></td> 
		</tr>";
	}
	echo "</table>";
	mysqli_close($conexao);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Listar Produto</title>
</head>
<body>
	
</body>
</html>