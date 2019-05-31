<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Cadastro</title>
    </head>
    <body >

        <?php include 'frags/header.php'; ?>
        <?php
        $login = $_POST['login'] ?? null;
        $senha = $_POST['senha'] ?? null;

        $senhac = $_POST['senhac'] ?? null;
        $nome = $_POST['nome'] ?? null;
        $endereco = $_POST['endereco'] ?? null;
        $cpf = $_POST['cpf'] ?? null;
        $tipo = $_POST['tipo'] ?? null;

        if ($login != null && $senha == $senhac) {

            $conta = new Conta();
            $conta->insertConta([$tipo, $nome, $endereco, $cpf, $login, $senha]);
            header("location:login.php");
        }
        ?>

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-8" style="background-color: rgba(245, 245, 245, 0.4);">

                    <form method='post'>
                        <h3>Cadastro</h3>
                        <div class="form-group">
                            <label for="login">Login</label>
                            <input type="text" class="form-control" id="login" name="login">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Senha</label>
                            <input type="password" class="form-control" id="exampleInputPassword1"  name="senha">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Confirmar Senha</label>
                            <input type="password" class="form-control" id="exampleInputPassword1"  name="senhac">
                        </div>
                        <div class="form-group">
                            <label for="login">Nome</label>
                            <input type="text" class="form-control" id="login" name="nome">
                        </div>
                        <div class="form-group">
                            <label for="login">Endereço</label>
                            <input type="text" class="form-control" id="login"  name="endereco">
                        </div>
                        <div class="form-group">
                            <label for="login">CPF</label>
                            <input type="number" class="form-control" id="login" name="cpf">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tipo" id="comprador" value="comprador" checked>
                            <label class="form-check-label" for="comprador">
                                Comprador
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tipo" id="fornecedor" value="fornecedor">
                            <label class="form-check-label" for="fornecedor">
                                Fornecedor
                            </label>
                        </div>
                        <input type="submit" name="formCadastro" class="btn btn-dark" value="Cadastrar">
                    </form>

                </div>
            </div>
        </div>



<?php include 'frags/footer.php'; ?>

    </body>

</html>
