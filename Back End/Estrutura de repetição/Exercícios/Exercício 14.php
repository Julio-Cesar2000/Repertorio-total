<?php

    $vendas = [850, 1200, 990, 1320, 500, 2000];
    $cont = 0;

    foreach ($vendas as $venda){
        if ($venda > 1000){
            $cont ++;
        };
    }
    
    echo $cont . "<br>";

?>