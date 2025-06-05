<?php

    class carro {
        public $modelo;
        public $marca;
        public $ano;
    
        public function __construct($mo, $m, $a){
            $this->modelo = $mo;
            $this->marca = $m;
            $this->ano = $a;
        }

        public function exibirInformações(){
            echo"Modelo: $this->modelo, Marca: $this->marca, Ano: $this->ano"."<br>";

        }
    }

    $fiat = new carro("Palio", "FIAT", "2015");
    echo $fiat->exibirInformações();

    $volkswagen = new carro("Gol G3", "Volkswagen", "1999");
    echo $volkswagen->exibirInformações();


?>