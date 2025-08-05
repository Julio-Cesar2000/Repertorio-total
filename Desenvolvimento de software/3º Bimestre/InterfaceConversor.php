<?php

    interface Conversor {
        public function converter(float $valor): float;
    }

    class ConverterDolarReal implements Conversor{
        public $cotacao = 5.53;
        public function converter(float $valor): float{
            return $valor*$this->cotacao;
        }
    }

    class KmParaMilha implements Conversor{
        public $milhas = 0.62;
        public function converter(float $valor): float{
            return $this->milhas*$valor;
        }
    }

    $km = new KmParaMilha();
    echo $km->converter(76)

?>