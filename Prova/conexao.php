
<?php

    $dbhost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'gerenciarpecas';

    $conn = new mysqli($dbhost, $dbUsername, $dbPassword, $dbName);

    // if($conn->connect_errno){

    //     echo "Erro ao conectar ao banco de dados: " . $conn->connect_error;    }

    // else{

    //     echo "Conexão efetuada com sucesso";
    // }



?>
