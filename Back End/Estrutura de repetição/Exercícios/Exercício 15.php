<?php

    $produtos = [
        "Camiseta" => 49.90,
        "Boné" => 29.90,
        "Tênis" => 199.90
    ];

    echo "<ul>";

    foreach ($produtos as $produto =>$preco) {
        echo "<li>", $produto, " || R$", $preco, "</li>";
    }

    echo "</ul>";

?>