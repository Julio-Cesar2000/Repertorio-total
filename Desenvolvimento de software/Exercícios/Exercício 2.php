<?php

    class Animal {
        public $nome;
        public $idade;
        public $altura;
        public $peso;
        public $raça;

        public function andar(){
            echo"Andou";

        }
        public function latir(){
            echo "Auau";

        }
    }

    $Layla = new Animal();
    $Layla->nome = "Layla";
    $Layla->idade = 8;
    $Layla->altura = 61;
    $Layla->peso = 38;
    $Layla->raça = "Malamute do Alaska";
    $Layla->andar();
    $Layla->latir();
    
    echo $Layla->raça;

?>