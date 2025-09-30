<?php

    require_once "Aluno.php";
    $aluno = new Aluno();
    if (isset($_POST['create'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $aluno->create($nome, $email, $senha);
        //header("Location : index.php");
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CRUD de Alunos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Cadastro de Alunos</h1>

<!-- Formulário de Cadastro -->
<form method="POST">
    <input type="hidden" name="id" value="">

    <input type="text" name="nome" placeholder="Nome" required>
    
    <input type="email" name="email" placeholder="Email" required>
    
    <input type="password" name="senha" placeholder="Senha" required>

    <button type="submit" name="create">Cadastrar</button>
</form>

<!-- Listagem -->
<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($alunos as $row): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['nome'] ?></td>
        <td><?= $row['email'] ?></td>
        <td>
            <!-- Botão de Editar -->
            <form method="POST" style="display:inline-block;">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <input type="text" name="nome" value="<?= $row['nome'] ?>" required>
                <input type="email" name="email" value="<?= $row['email'] ?>" required>
                <button type="submit" name="update" class="update">Atualizar</button>
            </form>
            <!-- Botão de Deletar -->
            <a href="?delete=<?= $row['id'] ?>" class="delete" onclick="return confirm('Tem certeza que deseja excluir?')">Deletar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>