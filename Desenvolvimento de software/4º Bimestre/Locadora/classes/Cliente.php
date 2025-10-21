<?php

    class Cliente {
        private string $nome;
        private string $cpf;

        public function __construct( string $nome, string $cpf){
            $this->nome = $nome;
            $this->cpf = $cpf;
        }

        public function __getNome(): string {
            return $this->nome;
        }
        public function __getCpf(): string {
            return $this->cpf;
        }
    }
?>