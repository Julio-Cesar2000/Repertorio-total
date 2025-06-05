<?php

    class Aluno {

        private $nome;
        private $nota_1;
        private $nota_2;
        private $nota_3;
        private $nota_4;
    
        public function __construct($n, $n_1, $n_2, $n_3, $n_4){
            $this->nome = $n;
            $this->nota_1 = $n_1;
            $this->nota_2 = $n_2;
            $this->nota_3 = $n_3;
            $this->nota_4 = $n_4;
        }

        public function setNome($n){
            $this->nome = $n;
        }

        public function setNota($n_1, $n_2, $n_3, $n_4){
            $this->nota_1 = $n_1;
            $this->nota_2 = $n_2;
            $this->nota_3 = $n_3;
            $this->nota_4 = $n_4;
        }

        public function getNome(){
            return $this->nome . "||";
        }

        public function getMedia(){
            $media = ($this->nota_1 + $this->nota_2 + $this->nota_3 + $this->nota_4) / 4;
            return $media . "||";
        }

        public function foiAprovado(){
            $media = ($this->nota_1 + $this->nota_2 + $this->nota_3 + $this->nota_4) / 4;
            if($media >= 15) {
                return "Aprovado <br>";
            }
            else{
                return "Reprovado <br>";
            }
        }

    }

    $alunos = new Aluno("João", 15, 18, 13, 28);
    echo $alunos->getNome();
    echo $alunos->getMedia();
    echo $alunos->foiAprovado();

    $alunos->setNome("Maria");
    $alunos->setNota(17, 20, 25, 0);
    echo $alunos->getNome();
    echo $alunos->getMedia();
    echo $alunos->foiAprovado();

?>