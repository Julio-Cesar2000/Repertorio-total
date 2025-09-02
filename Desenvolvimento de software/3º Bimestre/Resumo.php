<?php

    class pessoa {
        private $nome;
        private $idade;

        public function __construct(string $n, int $i) {
            $this->nome = $n;
            $this->idade = $i;
        }

        public function getNome(): string {
            return $this->nome;
        }
        public function setNome(string $n): void {
            $this->nome = $n;
        }

        public function getIdade(): int {
            return $this->idade;
        }
        public function setIdade(int $i): void {
            $this->idade = $i;
        }
    }

    $obj = new Pessoa("João", 20);
    echo $obj->getNome();
    echo $obj->getIdade();
    $obj->setNome("Maria");
    $obj->setIdade(15);
    echo $obj->getNome();
    echo $obj->getIdade();

?>