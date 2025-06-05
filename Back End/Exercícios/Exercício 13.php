<?php

    $n_1 = 89;
    $n_2 = 33;
    $user_choice = "+";

    if ($user_choice == "+"){
        echo "A soma de $n_1 e $n_2 é: ". $n_1 + $n_2;
    }
    elseif ($user_choice == "-"){
        echo "A subtração de $n_1 e $n_2 é: ". $n_1 - $n_2;
    }
    elseif ($user_choice == "*"){
        echo "A mulptiplicação de $n_1 e $n_2 é: ". $n_1 * $n_2;
    }
    elseif ($user_choice == "/"){
        if ($n_2 == 0){
            echo "Impossível a divisão po zero";
        }
        else{
            echo "A divisão de $n_1 e $n_2 é: ". $n_1 / $n_2;
        }
    }
    else {
        echo "Símbolo inexistente";
    }


?>