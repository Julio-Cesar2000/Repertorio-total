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
            echo "Aluno inserido.";
            return $stmt->execute();
        }

        public function readAll(): array {
            $sql = "SELECT * FROM alunos";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update(int $id, string $name, string $email, string $password): bool{
            $sql = "UPDATE alunos SET nome=:name, email=:email, senha=:password WHERE id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", $password);
            echo "Aluno Atualizado.";
            return $stmt->execute();
        }

    }

    $obj = new Aluno();
    $obj->update(2, "Bruno", "bruno@gmail.com","1345");
    $tabela = $obj->readAll();
    print_r($tabela);

?>