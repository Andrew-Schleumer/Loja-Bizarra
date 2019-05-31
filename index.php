<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Loja Bizarra</title>
    </head>
    <body>


        <?php include 'frags/header.php'; ?>
        <?php
        $produto = new Produto();
        $dados = $produto->obterProdutos();
        ?>

        <div class="container-fluid">

            <div class="row"> 
                <div class="container" style=""> 
                    <div class="row " >
                        <div class='col-12 justify-content-center'>
                            <div class="card-deck mt-2">
                                <?php foreach ($dados as $dado): ?>
                                    <div class="card mx-2" style="width: 18rem;">
                                        <img src="<?= $dado['dir_foto'] ?>" class="card-img-top">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $dado['nm_produto'] ?></h5>
                                            <p class="card-text"><?= $dado['ds_produto'] ?></p>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><?= $dado['vl_produto'] ?></li>
                                        </ul>
                                        <div class="card-body">
                                            <center><form action='comprar.php'><input type='hidden' value="<?=$dado['id_produto']?>" name='idp'><input type='submit' class='btn btn-dark' value='Comprar'></form></center>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php include 'frags/footer.php'; ?>
    </body>
</html>
