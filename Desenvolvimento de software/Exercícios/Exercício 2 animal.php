<?php

    class Animal {
        public $especie;
        public $nome;
        public $cor;

        public function latir(): void {
            echo"Latiu". "<br>";
        }

        public function caminhar(): void {
            echo "Caminhou". "<br>";
        }
        
        public function exibirInformações(){
            echo"Nome: $this->nome, espécie: $this->especie, cor: $this->cor"."<br>";

        }
    }

    $Layla = new Animal();
    $Layla->nome = "Layla". "<br>";
    $Layla->especie = "Doberman". "<br>";
    $Layla->cor = "Preto". "<br>";
    $Layla->caminhar();
    $Layla->latir();
    
    echo $Layla->nome;
    echo $Layla->caminhar();


?>