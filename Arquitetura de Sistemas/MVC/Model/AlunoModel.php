<?php

    class AlunoModel {
        public function listarTodos(): array {
            return [
                ['nome' => "Victor", 'idade' => 29],
                ['nome' => "Antônio", 'idade' => 39],
                ['nome' => "Paula", 'idade' => 35],
                ['nome' => "Willians", 'idade' => 17],
                ['nome' => "Bruno", 'idade' => 17]
            ];
        }
    }

    $aluno = new AlunoModel();

?>