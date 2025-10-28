<?php

if (isset($_GET['q']) && $_GET['q'] !== "") {
    $pokemom = strtolower(trim($_GET["q"]));

    $url = "https://pokeapi.co/api/v2/pokemon/" . urlencode($pokemom);

    $response = @file_get_contents($url);

    if (!$response) {
        echo "FALHA NA CONEXÃO";
        exit;
    }

    $data = json_decode($response, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        echo "ERRO AO DECODIFICAR O JSON.";
        exit;
    }

}

?>

<!doctype html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Poke API</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    </head>

    <body>
        
        <div class="container text-center">
            <div class="card shadow-lg p-4" style="max-width: 500px; margin: auto;">
                <h1 class="mb-4">PokeDex</h1>
                <form method="get" class="d-flex justify-content-center mb-4">
                <input type="text" class="form-control w-50 h-50 me-2" name="q" id="q" required placeholder="Informe o nome do Pokémon">
                <button class="btn btn-success">Procurar</button>
                </form>
                <?php if($data):?>
                    <div class="card-body">
                        <h2 class="card-title text-capitalize"><?php echo $data['name'];?></h2> <?php endif ?>
                    </div>
            </div>
        </div>
        

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </body>

</html>