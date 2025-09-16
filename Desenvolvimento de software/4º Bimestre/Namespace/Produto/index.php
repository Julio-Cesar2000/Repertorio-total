<?php

    require 'Estoque/Produto.php';
    require 'Loja/Produto.php';

    // Namespace Loja
    $produto_loja = new \Loja\Produto();
    echo $produto_loja->mostrar(). "<br>";

    // Namespace Estoque
    $produto_estoque = new \Estoque\Produto();
    echo $produto_estoque->mostrar(). "<br>";


?>