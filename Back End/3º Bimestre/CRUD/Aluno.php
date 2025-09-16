<?php
    require_once "Conexao.php";

    class Aluno {
        private ?PDO $conn;

        public function __construct(){
            $db = new Conexao();
            $this->conn = $db->connect();
        }

        public function create(string $name, string $email, string $password): bool {
            $sql = "INSERT INTO alunos (nome, email, senha) VALUES (:name, :email, :password)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", $password);
            return $stmt->execute();
        }

        public function readAll(): void {
            $sql = "SELECT * FROM alunos";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
        }

    }

    $obj = new Aluno();
    print_r($obj->readAll());

?>