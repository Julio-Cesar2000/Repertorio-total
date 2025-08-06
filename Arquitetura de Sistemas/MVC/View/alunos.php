<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Alunos</title>
</head>
<>
    <h1>Alunos</h1>

    <ul>
    <?php foreach ($alunos as $aluno) { ?>
        <li> <?php echo "Nome: " . $aluno ['nome'] ." || Idade: " . $aluno ['idade'];?> </li>
        <?php } ?>
    </ul>

    <h1>Adicionar Alunos</h1>
    <form action="acao = adicionar">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required placeholder="Coloque o nome do aluno"> <br>

        <label for="idade">Idade:</label>
        <input type="text" name="idade" id="idade" required placeholder="Informe a idade do aluno"> <br>

        <button type = "submit">Adicionar</button>

    </form>

</body>
</html>