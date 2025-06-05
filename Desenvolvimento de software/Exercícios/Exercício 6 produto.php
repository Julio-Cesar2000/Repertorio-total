<?php

    class Produto {
        public $preco;
        public $nome;
    
        public function __construct($pr, $n){
            $this->preco = $pr;
            $this->nome = $n;

        }

        public function aplicar_desconto($pe){
            $desconto = ($this->preco*$pe)/100;
            $this->preco = $this->preco-$desconto;

        }

        public function exibirInformações(){
            echo"$this->nome  ||  R$: $this->preco"."<br>";

        }
    }

    $gaita = new Produto(50.00, "Gaita");
    $gaita->aplicar_desconto(5);
    echo $gaita->exibirInformações();

    $Viola = new Produto(950.00, "Viola");
    $Viola->aplicar_desconto(5);
    echo $Viola->exibirInformações();


?>