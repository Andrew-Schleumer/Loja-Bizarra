<!DOCTYPE html>
<html lang="pt-br">    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Editar Perfil</title>
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
                            $conta = new Conta();
                            $nome = $_POST['nome'] ?? null;
                            $endereco = $_POST['endereco'] ?? null;
                            $editPerfil = $_POST['editPerfil'] ?? null;
                            
                            if($editPerfil != null){
                                
                                $conta->editPerfil((int)$_SESSION['id'], $nome, $endereco);
                            }
                            
                            
                            $dados = $conta->obterDados($_SESSION["id"]);

                            foreach ($dados as $dado):
                                ?>
                                <h3>Editar Perfil</h3>
                                <form method="post">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">ID</label>
                                        <input type="text" class="form-control" value='<?= $dado['id_conta']?>' readonly style='background-color: white;'>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Nome</label>
                                        <input type="text" class="form-control" name='nome' value='<?= $dado['nm_nome'] ?>'>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Endereço</label>
                                        <input type="text" class="form-control" name='endereco' value='<?= $dado['nm_endereco'] ?>'>
                                    </div>
                                    <input type="submit" class='btn btn-dark' name='editPerfil' value='Editar Perfil'>
                                </form>
                            <?php endforeach; ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php include 'frags/footer.php'; ?>
</body>
</html>
