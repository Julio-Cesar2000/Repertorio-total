<?php

    interface Autenticavel {
        public function login(string $usuario, string $senha): bool;
    }

    class UsuarioComum implements Autenticavel {
        public function login(string $usuario, string $senha): bool{
            if ($usuario == "user" && $senha == "1234"){
                echo "Usuário logado". "<br>";
                return true;
            }
            else{
                echo "Dados incorretos". "<br>";
                return false;
            }
        }
    }

    $usuario = new UsuarioComum();
    $usuario->login("user", "1234");

    $usuario2 = new UsuarioComum();
    $usuario2->login("feio", "13422")

?>