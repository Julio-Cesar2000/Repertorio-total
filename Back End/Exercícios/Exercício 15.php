<?php

    $temp_c = 20;

    if ($temp_c < 10){
        echo "A temperatura é $temp_c e está muito frio";
    }
    elseif ($temp_c >= 10 && $temp_c <= 20){
        echo "A temperatura é $temp_c e está frio";
    }
    elseif ($temp_c >= 21 &&  $temp_c < 30){
        echo "A temperatura é $temp_c e está agradável";
    }
    else{
        echo "A temperatura é $temp_c e está quente";
    }

?>