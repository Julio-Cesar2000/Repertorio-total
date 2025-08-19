<?php

    class Aluno {
        public function __construct() {
            if (!isset($_SESSION['alunos'])){
                $_SESSION['alunos'] = [];
            };
        }

        public function listarTodos(): array {
            return $_SESSION['alunos'];
        }

        public function adicionar(string $nome, int $idade): void {
            $_SESSION['alunos'] = [
                'nome'=>$nome,
                'idade'=>$idade
            ];
        }
    }

?>