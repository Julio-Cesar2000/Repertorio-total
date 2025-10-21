<?php
require_once __DIR__ . '/Veiculo.php';

    class Carro extends Veiculo {
        public function getTipo(): string {
            return "Carro";
        }
    }
?>