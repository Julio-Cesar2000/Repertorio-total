<?php
require_once __DIR__ . '/Veiculo.php';

    class Moto extends Veiculo {
        public function getTipo(): string {
            return "Moto";
        }
    }
?>