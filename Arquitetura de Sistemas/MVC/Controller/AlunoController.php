<?php

    class AlunoController {
        public function listarTodods() {
            $alunoController = new AlunoModel();
            $alunos = $alunoController->listarTodos()
        }
    }

?>