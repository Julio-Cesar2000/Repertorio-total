<?php

require_once __DIR__ . '/Carro.php';
require_once __DIR__ . '/Moto.php';
require_once __DIR__ . '/Cliente.php';

class Locadora {
    public function __construct(){
        if(!isset($_SESSION['veiculos'])) {
            $_SESSION['veiculos'] = [
                new Carro("Fusca", "AAA-6A66", 50),
                new Carro("Fiat-147", "FIA-1T47", 40),
                new Carro("Monza-Tubarão", "CCC-9C99", 90),
                new Carro("Voyage", "BBB-7B77", 180),
                new Moto("Himalayan", "ZZZ-5Z55", 140),
                new Moto("CG-150", "III-3I33", 70)
            ];
        }
    }

    public function listar(): array {
        return $_SESSION['veiculos'];
    }

    public function alugar(string $placa, Cliente $cliente): void {
        foreach ($_SESSION['veiculos'] as $v) {
            
        }
    }
}

?>
