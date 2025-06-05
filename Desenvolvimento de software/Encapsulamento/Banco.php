<?php

    class ContaBanco{

        private $titular;
        private $saldo;

        
        public function __construct($t, $s){

            $this->titular = $t;
            $this->saldo = $s;

        }

        public function setTitular($t){

            $this->titular = $t;

        }

        public function depositar($valor){

            if ($valor >= 0){

                $this->saldo += $valor;

            }

            else{

                echo "Transação Inválida. <br>";

            }

        }

        public function sacar($valor){

            if ($this->getsaldo() >= $valor &&  $valor > 0){

                $this->saldo -= $valor;

            }

            else{

                echo "Saldo Insuficiente. <br>";

            }

        }


        public function getTitular(){

            return $this->titular. "<br>";

        }
        
        public function getSaldo(){

            return $this->saldo. "<br>";

        }

    }

    $titulares = new ContaBanco("Pedro", 500);
    echo $titulares->getTitular();
    echo $titulares->getSaldo();
    $titulares->sacar(500);
    echo $titulares->getsaldo();
    $titulares->depositar(200);
    echo $titulares->getsaldo();
    $titulares->sacar(500);
    echo $titulares->getsaldo();
    
?>