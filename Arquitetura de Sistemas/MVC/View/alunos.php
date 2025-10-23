<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Alunos</title>
</head>
<body>
    <h1>Alunos</h1>
    <ul>
        <?php if (count($alunos) > 0) { ?>
            <?php foreach ($alunos as $aluno) { ?>
                <li><?php echo $aluno['nome']; ?></li>
            <?php } ?>
        <?php } else { ?>
            <li>Nenhum aluno encontrado.</li>
        <?php } ?>
    </ul>

    <h1>Adicionar Alunos</h1>
    <form action="?acao=adicionar" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required placeholder="Coloque o nome do aluno"><br>

        <label for="idade">Idade:</label>
        <input type="number" name="idade" id="idade" required placeholder="Informe a idade do aluno"><br>

        <button type="submit">Adicionar</button>
    </form>
</body>
</html>
