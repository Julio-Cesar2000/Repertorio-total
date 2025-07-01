<?php

    interface Imprimivel {
        public function imprimir():void;
    }

    class DocumentoPDF implements Imprimivel{
        public function imprimir(): void{
            echo "<h1> Imprimindo PDF </h1> <br>";
        }

    }
    class ImagemJPEG implements Imprimivel{
        public function imprimir(): void{
            echo "<h1> Imprimindo imagem JPEG </h1> <br>";
        }

    }

    $imagem = new ImagemJPEG();
    $imagem->imprimir();

    $PDF = new DocumentoPDF();
    $PDF->imprimir();

?>