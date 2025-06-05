<?php

    // Classe
    class Automóvel{
        // Atributos ou Propriedades
        private $marca;
        private $cor;
        private $modelo;
        private $ano;

        public function __construct($m, $c, $mo, $a) {
            $this-> marca = $m;
            $this->cor = $c;
            $this->modelo = $mo;
            $this->ano = $a;
        } 

        public function getMarca(){
            return $this->marca;
        }
        public function getCor() {
            return $this->cor;
        }
        public function setMarca($m) {
            $this->marca = $m;
        }
        public function setCor($c) {
            $this->cor = $c;
        }

        

        public function exibirInformações(){
            echo"Marca: $this->marca, cor: $this->cor, modelo: $this->modelo, ano: $this->ano" . "<br>";

        }

    }

    // Objetos
    $carro = new Automóvel("Fiat","Vernelho","Uno","1990");
    echo $carro->getMarca();
    echo $carro->getCor();
    $carro->setMarca("Ford");
    $carro->setCor("Verde");
    echo $carro->getMarca();
    echo $carro->getCor();


?>