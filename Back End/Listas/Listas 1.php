<?php

    // Array Indexado

    $frutas = ["Banana", "Maçã", "Melancia", "Laranja"];

    print_r($frutas)."<br>";

    //Array Associativo

    $pessoas = [
        "nome" => "João",
        "idade" => 15,
        "cidade" => "Cambuí",
        "estado" => "MG"
    ];

    echo $pessoas ["nome"]."<br>";

    //Array Numérico Multidimenssional

    $vendas = [
        ["Camisetas", 20, 20.5],
        ["Calça", 15, 89.9],
        ["Tênis", 10, 160]
    ];

    echo $vendas[0][1]."<br>";

    //Array Associativo Multidimensional

    $produtos = [
        "produto_1"=>[
            "nome" =>"Refrigerante",
            "preco" => 8
        ],
        "produto_2"=>[
            "nome" =>"Salgado",
            "preco" => 5
        ],
        "produto_3"=>[
            "nome" =>"Chocolate",
            "preco" => 10
        ]
    ];

    echo $produtos["produto_2"]["nome"]. "<br>";

    //Funções Array

    $numeros = [10, 30, 30, 70, 20];

    array_push ($numeros, 80);

    print_r($numeros). "<br>";

    unset ($numeros[1]);

    print_r($numeros). "<br>";

?>