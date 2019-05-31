<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Produto</title>
    </head>
    <body>


        <?php include 'frags/header.php'; ?>
        <?php
        $id = $_GET['idp'];
        $produto = new Produto();
        $dados = $produto->obterDados($id);
        ?>







        <div class="container-fluid">

            <div class="row"> 
                <div class="container" style="background-color: rgba(245, 245, 245, 0.4);"> 
                    <div class="row " >
                        <div class='col-12 justify-content-center'>
                            <?php foreach ($dados as $dado): ?>
                                <div class="card mx-auto" style="width: 18rem;">
                                    <img src="<?=$dado['dir_foto']?>" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title"><?=$dado['nm_produto']?></h5>
                                        <p class="card-text">S<?=$dado['ds_produto']?></p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><?=$dado['vl_produto']?></li>
                                    </ul>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php include 'frags/footer.php'; ?>
    </body>
</html>
