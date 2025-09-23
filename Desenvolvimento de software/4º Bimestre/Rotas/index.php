<?php

    $url = $_GET['url'] ?? 'produto/adicionar';
    $partes = explode('/', $url);
    $controller = ucfirst($partes[0]) . ' controller';
    $action = $partes[1] ?? 'index';

        require "Controller/$controller.php";
    
    $obj = new $controller();
    $obj->$action();

?>