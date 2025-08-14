<?php
    require_once "Conexao.php";

    class Aluno {
        private ?PDO $conn;

        public function __construct(){
            $db = new Conexao();
            $this->conn = $db->connect();
        }

        public function create(string $name, string $email): bool {
            $sql = "INSERT INTO alunos (nome, email) VALUES (:name, :email)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":email", $email);
            return $stmt->execute();
        }
    }

?>