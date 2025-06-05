<?php

    // Classe
    class Automóvel{
        // Atributos ou Propriedades
        public $marca;
        public $cor;
        public $modelo;
        public $ano;

        // Métodos
        public function andar(){
            echo"Andou" . "<br>";
        }

        public function frear(){
            echo "Freou" . "<br>";

    }
        public function exibirInformações(){
            echo"Marca: $this->marca, cor: $this->cor, modelo: $this->modelo, ano: $this->ano" . "<br>";

        }

    }

    // Objetos
    $carro = new Automóvel();
    $carro->marca = "FIAT";
    $carro->cor = "Amarelo";
    $carro->modelo = "147";
    $carro->ano = "1977";
    $carro->exibirInformações();
    $carro->frear();
    

?>