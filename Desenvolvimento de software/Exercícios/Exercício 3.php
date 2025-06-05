<?php

    class produto{
        public $preço;
        public $tipo;
        public $categoria;
        public $marca;
        public $quantidade;

        public function saida (saida) {
            $resto = $this->quantidade - $saida;
            return $resto;

        }

        public function entrada (entrada) {
            $resto = $this->quantidade + $entrada;
            return $soma;

        }
    }

?>