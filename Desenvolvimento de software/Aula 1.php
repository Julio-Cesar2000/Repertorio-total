<?php

    class Pessoa {
        public $nome;
        public $cpf;
        public $idade;
        public $altura;
        public $endereco;

        public function falar(){
            echo"Falou";

        }
    }

    $Julio = new Pessoa();
    $Julio->nome = "Júlio Cesar da Fonseca";
    $Julio->idade = 16;
    $Julio->altura = 1.60;
    $Julio->endereco = "Vale do Sol";
    $Julio->cpf = "111.222.333-56";
    $Julio->falar();
    
    echo $Julio->cpf;

?>