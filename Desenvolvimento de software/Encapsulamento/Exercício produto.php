<?php

    class Produto {
        private $preco;
        private $nome;
    
        public function __construct($pr, $n){
            $this->preco = $pr;
            $this->nome = $n;

        }

        public function setNome($n){
            $this->nome = $n;
        }

        public function setPreco($pr){
            if ($pr > 0) {
                $this->preco = $pr;
            }
            else{
                echo "Valor inválido";
            }
        }

        public function getNome(){
            return $this->nome. "||";
        }

        public function getPreco(){
            return $this->preco. "<br>";
        }

    }

    $produtos = new Produto(45.35, "Gaita");
    echo $produtos->getNome();
    echo $produtos->getPreco();
    $produtos->setNome("Viola");
    echo $produtos->getNome();
    $produtos->setPreco(647.89);
    echo $produtos->getPreco();

?>