<?php

    $vogais = ["A", "E", "I", "O", "U"];

    $letra_digitada = "E";

    if (in_array($letra_digitada, $vogais)){
        echo "Vogal";
    }
    
    else{
        echo "Consoante";
    }

?>