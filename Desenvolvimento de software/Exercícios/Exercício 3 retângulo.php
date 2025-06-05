<?php

    class Retangulo {
        public $Largura;
        public $Altura;

        public function calcular_area(){
            return $this->Largura*$this->Altura;
        }
    
        
        public function exibirInformações(){
            echo"Altura: $this->Altura, Largura: $this->Largura"."<br>";

        }
    }

    $Retangulo = new Retangulo();
    $Retangulo->Altura = 20;
    $Retangulo->Largura = 16;

    echo $Retangulo->exibirInformações();
    echo $Retangulo->calcular_area();


?>