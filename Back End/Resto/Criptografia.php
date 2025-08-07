<?php

    $senha = "123456";

    $cost = ['cost' => 12];
    $hash = password_hash($senha, PASSWORD_BCRYPT, $cost);

    $senha_digitada = "123456";
    
    if (password_verify ($senha , $hash)) {
        echo "Senha correta";
    }
    else {
        echo "Senha incorreta";
    }

?>