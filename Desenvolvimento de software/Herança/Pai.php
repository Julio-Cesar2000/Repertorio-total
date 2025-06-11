<?php

    class Pessoa {
        public $nome;
        public $idade;
        public $email;

    }
        
    class PessoaFisica extends Pessoa {
        public $cpf;
        }

    class PessoaJuridica extends Pessoa {
        public $cnpj;
    }

    $empresa1 = new PessoaJuridica();
    $empresa1->nome = "Empresa1";
    $empresa1->email = "Empresa1@gmail.com";
    $empresa1->cnpj = "50.137.584/0001-10";
    echo $empresa1->nome = "Empresa1";
    echo $empresa1->email = "Empresa1@gmail.com";
    echo $empresa1->cnpj = "50.137.584/0001-10";


?>