<?php

    class Pessoa {
        public $nome;
        public $cpf;
        public $idade;
        public $altura;
        public $endereco;
        public $bairro;
        public $cidade;

        public function falar(): void {
            echo"Falou";
        }

        public function caminhar(): void {
            echo "Caminhou";
        }
    }

    $Julio = new Pessoa();
    $Julio->nome = "Júlio Cesar da Fonseca";
    $Julio->idade = 16;
    $Julio->altura = 1.60;
    $Julio->endereco = "236";
    $Julio->cpf = "111.222.333-56";
    $Julio->bairro = "Vale do Sol";
    $Julio->cidade = "Cambuí";
    $Julio->caminhar();
    $Julio->falar();
    
    echo $Julio->cpf;
    echo $Julio->caminhar();


?>