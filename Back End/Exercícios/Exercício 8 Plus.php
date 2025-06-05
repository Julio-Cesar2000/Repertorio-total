<!DOCTYPE html>
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>

        <style>
            body{
                background-color: azure;
            }
            text{
                background-color: black;
            }
            button{background-color: black;
            }
        </style>

        <form>

            <label for="Nome">Nome:</label> <br><br>
            <input type="text" name="nome" id="nome" size="50" required placeholder="Digite seu nome"> <br><br>

            <label for="Idade">Idade:</label> <br><br>
            <input type="number" name="idade" id="idade" size="50" required placeholder="Insira sua idade"> <br><br>

            <label for="CPF">CPF:</label> <br><br>
            <input type="text" name="cpf" \
			pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" \
			title="Digite um CPF no formato: xxx.xxx.xxx-xx"\
            size="50" required placeholder="Digite seu CPF no Formato: xxx.xxx.xxx-xx"> <br><br>

            <label for="Estado Civil">Estado CIvil:</label> <br><br>
            <select name="estado civil" id="estado civil" required aria-placeholder="Informe seu estado civil">
                <option value="Casado">Casado(a)</option>
                <option value="Solteiro">Solteiro(a)</option>
                <option value="Divorciado">Divorciado(a)</option>
                <option value="Viuvez">Viuvo(a)</option>
            </select> <br><br>

            <label for="Sexo">Sexo biológico:</label> <br><br>
            <select name="sexo" id="sexo" required aria-placeholder="Inforeme o seu sexo biológico">
                <option value="masculino">Masculino:</option>
                <option value="feminino">Feminino</option>
            </select> <br><br>

            <label for="Cidade">Cidade:</label> <br><br>
            <input type="text" name="cidade" id="cidade" size="50" required placeholder="Digite sua Cidade"> <br><br>

            <label for="Estado">Estado:</label> <br><br>
            <input type="text" name="estado" id="estado" size="50" required placeholder="Digite seu Estado"> <br><br>

            <label for="Data Nascimento">Data de Nascimento:</label> <br><br>
            <input type="datetime-local" name="Data Nascimento" id="Data Nascimento" size="50" required placeholder="Informe sua data de nascimento"> <br><br>

            <label for="Email">Digite seu E-mail:</label> <br><br>
            <input type="email" name="email" id="email" size="50" required placeholder="Digite seu E-mail"> <br><br>

            <label for="Senha">Senha:</label> <br><br>
            <input type="password" name="senha" id="senha" size="50" required placeholder="Digite sua Senha"> <br><br>

            <button type="submit" size="50">Enviar para o banco de dados</button> <br><br>


        </form>
        <script>
            window.alert("Bem Vindo")
        </script>

    </body>
</html>