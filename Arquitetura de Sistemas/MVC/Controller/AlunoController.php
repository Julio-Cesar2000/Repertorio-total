<?php

    class AlunoController {
        public function listarAlunos(): void {
            $alunoController = New Aluno();
            $alunos = $alunoController->listarTodos();
            include 'View/alunos.php';
        }
        public function adicionar(): void{
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nome = $_POST['nome'] ?? '';
                $idade = $_POST['idade'] ?? '';

                $obj = new Aluno();
                $obj->adicionar($nome, $idade);

                $this->listarAlunos();
            }
        }
    }

?>