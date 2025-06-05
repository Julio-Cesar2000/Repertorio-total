<?php

    $user = "admin";
    $user_pass = "123456";

    $user_try = "admin";
    $user_pass_try = "123456";

    if ($user == $user_try && $user_pass == $user_pass_try){
        echo "Login feito com sucesso";
    }
    else {
        echo "Usuário e/ou Senha incorretos";
    }

?>