<?php

    if(isset($_GET['q']) && $_GET['q'] !== "") {
        $pokemom = strtolower(trim($_GET["q"]));

        $url = "https://pokeapi.co/api/v2/pokemon/" . urlencode($pokemom);

        $response = @file_get_contents($url);

        if(!$response){
            echo "FALHA NA CONEXÃO";
            exit;
        }

        $data = json_decode($response, true);

        var_dump($data);
    }

?>
<form method="get">
    <input type="text" name="q" placeholder="Escreva o nome de um Pokemon">
    <button>Enviar</button>
</form>
