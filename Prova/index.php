<?php

  require 'conexao.php';

  if(isset($_POST['Inserir']))
  {

    $codigo = $_POST['codigo'];
    $nome = $_POST ['nome'];
    $fabricante = $_POST ['fabricante'];
    $descricao = $_POST ['descricao'];
    $quantidade = $_POST ['quantidade'];

    $query = mysqli_query($conn, "INSERT INTO pecas(codigo,nome,fabricante,descricao,quantidade) VALUES('$codigo','$nome','$fabricante','$descricao','$quantidade')");


  }

  if(!empty($_['codigo'])) {
        
    include_once("./conexao.php");

    $Codigo = $_GET['Codigo'];

    $sql = "SELECT * FROM pecas WHERE codigo = $codigo";
    $res = $conn ->query($sql);

    if($res->num_rows > 0) {

        while($user_data = mysqli_fetch_assoc($res)) {
            $nome = $user_data['nome'];
            $fabricante = $user_data['fabricante'];
            $descricao = $user_data['descricao'];
            $quantidade = intval($user_data['quantidade']);
        }
    }

  }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="shortcut icon" type="image/png" href="./Logo/LogoSystech.jpg"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Gerenciador de peças</title>
</head>

<body>

  <form action="index.php" method ="POST">

    <div class="botao">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Gerenciador de Peças</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

              <div class="navbar-nav">

                   <a href="tabelaPecas.php">Tabela de Peças</a>
              </div>
            </div>
        </nav>


        <div class="campos">

            <label for="codigo">Insira o código da peça</label>
            <input type="text" id="codigo" name="codigo">

            <label for="nome">Insira o nome da peça</label>
            <input type="text" id="nomepeça" name="nome">

            <label for="fabricante">Insira o nome da fabricante da peça</label>
            <input type="text" id="nomefabricante" name="fabricante">

            <label for="descricao">Insira a descrição da peça</label>
            <input type="text" id="descricao" name="descricao">

            <label for="quantidade">Insira a quantidade da peça</label>
            <input type="text" id="quantidade" name="quantidade">


            <button type="submit" id="ins" name="Inserir">Inserir</button>
          </div>

      </form>


    </div>


</body>
</html>
