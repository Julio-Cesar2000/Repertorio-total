<?php

    class AlunoController {
        public function listarAlunos(): void {
            $alunos = Aluno::listarTodos();
            include 'View/alunos.php';
        }
    }

?>