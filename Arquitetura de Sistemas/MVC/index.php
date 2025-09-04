<?php

    session_start();
    require_once 'Model/Aluno.php';
    require_once 'Controller/AlunoController.php';

    $controller = new AlunoController();
    $acao = $_GET['acao'] ?? '';
    if ($acao === "adicionar") {
        $controller->adicionar();
    }
    else {
        $controller->listarAlunos();
    }
?>