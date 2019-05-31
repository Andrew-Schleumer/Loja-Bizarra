<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Perfil</title>
    </head>
    <body>
        <?php include 'frags/header.php'; ?>

        <div class="container-fluid">

            <div class="row"> 
                <div class="container" style="background-color: rgba(245, 245, 245, 0.4);"> 
                    <div class="row" >
                        <div class='col-12'>

                            <br>
                            <?php
                            $pedido = new Pedido();
                            $conta = new Conta();
                            $dados = $conta->obterDados($_SESSION["id"]);
                            $tipo_conta;
                            
                            if(isset($_GET['idpe'])){
                                $idpe=$_GET['idpe'] ?? null;
                                $pedido->excluir($idpe);
                            }
                            
                            foreach ($dados as $dado):
                                ?>
                                <ul class="list-group">
                                    <li class="list-group-item bg-dark text-white"><strong>Perfil</strong></li>
                                    <li class="list-group-item">ID: <?= $dado['id_conta'] ?></li>
                                    <li class="list-group-item">Nome: <?= $dado['nm_nome'] ?></li>
                                    <li class="list-group-item">Endereço: <?= $dado['nm_endereco'] ?></li>
                                    <li class="list-group-item">CPF: <?= $dado['cd_cpf'] ?></li>
                                    <li class="list-group-item">Tipo: <?= $dado['nm_tipo'] ?></li>
                                    <?php $tipo_conta = $dado['nm_tipo']; ?>
                                </ul>
                            <?php endforeach; ?>
                            <a href='editar-perfil.php'><button type="button" class="btn btn-dark">Editar Perfil</button></a>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class='col-12'>
                            <?php if ($_SESSION['tipo'] == "comprador"): ?>
                                <h3>Pedidos</h3>
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col"># do produto</th>
                                            <th scope="col">Data do pedido</th>
                                            <th scope="col">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        
                                        $pedidos = $pedido->obterDados($_SESSION['id']);

                                        foreach ($pedidos as $pidido):
                                            ?>
                                            <tr>
                                                <th><?= $pidido['id_pedido'] ?></th>
                                                <td><?= $pidido['id_produto'] ?></td>
                                                <td><?= $pidido['dt_pedido'] ?></td>
                                                <td>
                                                    <form><input type='hidden' value="<?= $pidido['id_pedido'] ?>" name='idpe'><input type='submit' class='btn btn-dark' value='Excluir Pedido'></form>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>

                            <?php else: ?> 
                                <a href='adicionar-produto.php'><button type="button" class="btn btn-dark">Adicionar produto</button></a>
                                <h3>Produtos</h3>
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nome</th>
                                            <th scope="col">Valor</th>
                                            <th scope="col">Descrição</th>
                                            <th scope="col" colspan="3">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $produto = new Produto();
                                        $produtos = $produto->obterProdutos();
                                        foreach ($produtos as $p):
                                            ?>
                                            <tr>
                                                <th><?= $p['id_produto'] ?></th>
                                                <td><?= $p['nm_produto'] ?></td>
                                                <td><?= $p['vl_produto'] ?></td>
                                                <td><?= $p['ds_produto'] ?></td>
                                                <td><form action='produto.php'><input type='hidden' value="<?= $p['id_produto'] ?>" name='idp'><input type='submit' class='btn btn-dark' value='Detalhes'></form></td>
                                                <td><form action='editar-produto.php'><input type='hidden' value="<?= $p['id_produto'] ?>" name='idp'><input type='submit' class='btn btn-dark' value='Editar'></form></td>
                                                <td><form action='excluir-produto.php'><input type='hidden' value="<?= $p['id_produto'] ?>" name='idp'><input type='submit' class='btn btn-dark' value='Excluir'></form></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'frags/footer.php'; ?>
</body>
</html>
