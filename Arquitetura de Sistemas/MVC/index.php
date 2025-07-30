<?php

    require_once 'Model/Aluno.php';
    require_once 'Controller/AlunoController.php';

    $controller = new AlunoController();
    $controller->listarAlunos();

?>