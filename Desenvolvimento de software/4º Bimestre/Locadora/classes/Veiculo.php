<?php

    abstract class Veiculo{
        protected string $modelo;
        protected string $placa;
        protected float $preco_Diaria;
        protected bool $disponivel;

        public function __construct(string $modelo, string $placa, float $preco_Diaria){
            $this->modelo = $modelo;
            $this->placa = $placa;
            $this->preco_Diaria = $preco_Diaria;
            $this->disponivel = true;
        }

        public function alugar() :void {
            $this->disponivel = false;
        }

        public function devolver() :void {
            $this->disponivel = true;
        }
        
        public function getModelo() :string {
            return $this->modelo;
        }

        public function getPlaca() :string {
            return $this->placa;
        }

        public function getPreco_Diaria() :string {
            return $this->preco_Diaria;
        }

        public function getDisponivel() : bool {
            return $this->disponivel;
        }

        abstract public function getTipo();
    }

?>