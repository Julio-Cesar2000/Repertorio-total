<?php

    function validarEmail(string $email): bool{
        $validacao = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$validacao) {
            return false;
        }
        return true;
    }

    echo validarEmail("Julio@gmail.com"). "<br>";

    function gerarslug(string $titulo): string{
        //Deixar o titulo em minusculo
        $slug = strtolower($titulo);
        $slug = preg_replace('/[^a-z0-9\s]/','', $slug);
        $slug = preg_replace('/\s+/','-', $slug);
        return $slug;
    }

    echo gerarslug("Olá mundo!"). "<br>"

?>