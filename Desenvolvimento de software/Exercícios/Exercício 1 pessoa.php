<?php

    class Pessoa {
        public $nome;
        public $idade;
        public $data_nasc;

        public function falar(): void {
            echo"Falou". "<br>";
        }

        public function caminhar(): void {
            echo "Caminhou". "<br>";
        }
        
        public function exibirInformações(){
            echo"Nome:: $this->nome, idade: $this->idade, data de nascimento: $this->data_nasc"."<br>";

        }
    }

    $Julio = new Pessoa();
    $Julio->nome = "Júlio Cesar da Fonseca";
    $Julio->idade = 16;
    $Julio->data_nasc = "10/05/2008";
    $Julio->caminhar();
    $Julio->falar();
    
    echo $Julio->nome;
    echo $Julio->caminhar();


?>