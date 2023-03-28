<?php

// Conecte-se ao banco de dados
require 'conexao.php';

// Verifique se a solicitação POST foi enviada
if (isset($_POST['Deletar'])) {
    // Obtenha o ID do registro que se deseja excluir
    $codigo = $_POST['codigo'];

    // Crie uma consulta SQL para excluir o registro do banco de dados
    $query = "DELETE FROM tabela WHERE codigo = '$codigo'";
    
    // Execute a consulta SQL
    $resultado = mysqli_query($conn, $query);

    // Verifique se a exclusão foi bem-sucedida e exiba uma mensagem apropriada
    if ($resultado) {
        echo "Registro excluído com sucesso.";
    } else {
        echo "Erro ao excluir registro: " . mysqli_error($conn);
    }
}

// Feche a conexão com o banco de dados
mysqli_close($conn);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./CSS/table.css">
	<link rel="shortcut icon" type="image/png" href="./Logo/LogoSystech.jpg"/>
	<link rel="stylesheet" href="./CSS/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">


    <title>Systech</title>
</head>
<body>

<form action="edit.php" method="POST">
<div class="botao">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="#">Gerenciador de Peças</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
	  <span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNavAltMarkup">

	  <div class="navbar-nav">

	  	<button type="submit" id="att" name="Editar">Editar</button>
		  <input type="hidden" name="Editar" value="1">

	<form action="./delete.php" method="POST">
				

		<button id="del"><a href="./delete.php">Deletar</a></button>
	</form>

	  </div>
	</div>
</nav>


    <h1>Lista de Peças</h1>
	<table>
		<tr>
			<th>Código</th>
			<th>Nome</th>
			<th>Fabricante</th>
			<th>Descrição</th>
			<th>Quantidade</th>
		</tr>
<?php

	require 'conexao.php';

	$query = "SELECT * FROM pecas";
	$resultado = mysqli_query($conn, $query);

	// Exibir as peças na tabela HTML
	while ($linha = mysqli_fetch_assoc($resultado)) {
		echo "<tr>";
		echo "<td>" . $linha['codigo'] . "</td>";
		echo "<td>" . $linha['nome'] . "</td>";
		echo "<td>" . $linha['fabricante'] . "</td>";
		echo "<td>" . $linha['descricao'] . "</td>";
		echo "<td>" . $linha['quantidade'] . "</td>";
		echo "</tr>";
	}

  

	?>


	</table>
</form>
</body>
</html>
