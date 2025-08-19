<?php

    class AlunoController {
        public function listarAlunos(): void {
            $alunoController = New Aluno();
            $alunos = $alunoController->listarTodos();
            include 'View/alunos.php';
        }
        public function adicionar(){

        }
    }

?>