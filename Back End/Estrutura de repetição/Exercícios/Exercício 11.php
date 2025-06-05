<?php

    $notas = [8.5, 7.0, 9.2, 6.8,];

    $nota_final = 0;
    foreach($notas as $nota){
        $nota_final += $nota;
    }
    echo $nota_final . "<br>";

    $media = $nota_final / count($notas);

    echo $media . "<br>";

?>