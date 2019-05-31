<?php

class Conta extends Conexao {

    function __construct() {
        $this->conectar();
    }

        public function obterDados($id) {

        $instrucao = $this->pdo->query("SELECT * FROM conta WHERE id_conta = $id;");
        return $instrucao->fetchAll();
    }

    public function insertConta($valores) {

        $sql = "INSERT INTO conta(nm_tipo, nm_nome, nm_endereco, cd_cpf, nm_login, cd_senha) VALUES(?";
        for ($i = 1; $i < count($valores); $i++) {
            $sql .= ',?';
        }
        $sql .= ')';

        $instrucao = $this->pdo->prepare($sql);

        for ($i = 0; $i < count($valores); $i++) {
            $instrucao->bindParam(($i + 1), $valores[$i]);
        }

        return $instrucao->execute();
        
    }

    public function obterLogin($login, $senha) {

        $instrucao = $this->pdo->query("SELECT * FROM conta WHERE nm_login = '$login' AND cd_senha = '$senha';");
        return $instrucao->fetchAll();
        
    }
    
    public function editPerfil($id, $nome, $endereco){
        
        $this->pdo->exec("UPDATE conta SET nm_nome = '$nome', nm_endereco = '$endereco' WHERE id_conta = '$id'");
        
        
    }

}
