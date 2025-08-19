<?php

    class Conexao {
        private $dbName = "CRUD_Simples";
        private $host = "localhost";
        private $user = "root";
        private $password = "1234";
        protected ?PDO $conn = null;

        public function connect(): ?PDO {
            try {
                $this->conn = new PDO("mysql: host=$this->host; dbname=$this->dbName", $this->user, $this->password);
                return $this->conn;
            }
            catch(PDOException $e){
                echo "Erro na conexão" . $e->getMessage();
                return null;
            }

        }

    }

?>