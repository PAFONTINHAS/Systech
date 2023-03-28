<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Atualizar Dados</title>
</head>
<body>
	<h1>Atualizar Dados</h1>

	<?php

		require 'conexao.php';
		// Verifica se foi enviado algum dado pelo formulário
		if (isset($_POST['codigo']) && isset($_POST['nome']) && isset($_POST['fabricante']) && isset($_POST['descricao']) && isset($_POST['quantidade'])) {
			

			// Verifica se a conexão foi bem sucedida
			if (!$conn) {
				die("Erro ao conectar com o banco de dados: " . mysqli_connect_error());
			}

			// Escapa os dados enviados pelo formulário para evitar injeção de SQL
			$codigo = mysqli_real_escape_string($conn, $_POST['codigo']);
			$nome = mysqli_real_escape_string($conn, $_POST['nome']);
			$fabricante = mysqli_real_escape_string($conn, $_POST['fabricante']);
			$descricao = mysqli_real_escape_string($conn, $_POST['descricao']);
			$quantidade = mysqli_real_escape_string($conn, $_POST['quantidade']);

			// Monta a query de atualização
			$query = "UPDATE pecas SET nome = '$nome', fabricante = '$fabricante', descricao = '$descricao', quantidade = '$quantidade' WHERE codigo = '$codigo'";

			// Executa a query
			if (mysqli_query($conn, $query)) {
				echo "<p>Dados atualizados com sucesso!</p>";
			} else {
				echo "<p>Erro ao atualizar os dados: " . mysqli_error($conn) . "</p>";
			}

			// Fecha a conexão com o banco de dados
			mysqli_close($conn);
		}
	?>

	<form method="POST">
		<label for="codigo">Código:</label>
		<input type="text" name="codigo"><br>

		<label for="nome">Nome:</label>
		<input type="text" name="nome"><br>

		<label for="fabricante">Fabricante:</label>
		<input type="text" name="fabricante"><br>

		<label for="descricao">Descrição:</label>
		<input type="text" name="descricao"><br>

		<label for="quantidade">Quantidade:</label>
		<input type="text" name="quantidade"><br>

		<button type="submit">Editar</button>
	</form>
</body>
</html>
