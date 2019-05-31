<?php

Class Pedido extends Conexao {

    function __construct() {
        $this->conectar();
    }

    public function obterDados($id) {

        $instrucao = $this->pdo->query("SELECT * FROM pedido WHERE id_cliente = $id;");
        return $instrucao->fetchAll();
    }

    public function insertPedido($valores) {

        $sql = "INSERT INTO pedido(id_cliente, id_produto, dt_pedido) VALUES(?";
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

    public function excluir($id) {

        $instrucao = $this->pdo->prepare("DELETE FROM pedido WHERE id_pedido = :id");
        $instrucao->bindParam(':id', $id);
        $instrucao->execute();
    }

}
