<?php

Class Produto extends Conexao {

    function __construct() {
        $this->conectar();
    }

    public function obterProdutos() {

        $instrucao = $this->pdo->query("SELECT * FROM produto;");
        return $instrucao->fetchAll();
    }
    
    public function obterDados($id) {

        $instrucao = $this->pdo->query("SELECT * FROM produto WHERE id_produto = $id;");
        return $instrucao->fetchAll();
    }

    public function insertProduto($valores) {

        $sql = "INSERT INTO produto(nm_produto, vl_produto, ds_produto, id_fornecedor, dir_foto) VALUES(?";
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

        $instrucao = $this->pdo->prepare("DELETE FROM produto WHERE id_produto = :id");
        $instrucao->bindParam(':id', $id);
        $instrucao->execute();
    }

    public function editProduto($id, $nome, $preco, $desc, $dir) {

        $this->pdo->exec("UPDATE produto SET nm_produto = '$nome', vl_produto = '$preco', ds_produto = '$desc', dir_foto = '$dir' WHERE id_produto = '$id'");
    }

}
