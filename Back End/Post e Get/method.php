<?php

    if ($_SERVER["REQUEST_METHOD"]=="POST"){

        $nome = $_POST['nome'];
        $idade = $_POST['idade'];
        $data_nasc = $_POST['data_nasc'];
        $cpf = $_POST['cpf'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $con_senha = $_POST['con_senha'];

        echo $nome, $idade, $data_nasc, $cpf, $cidade, $estado, $email, $senha, $con_senha; 
        
    }

?>