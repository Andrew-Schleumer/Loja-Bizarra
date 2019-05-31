<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Comprar</title>
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
                            
                            if ($_SESSION['tipo'] != "comprador"){
                                header("location:index.php");
                            }
                            
                            $id = $_GET['idp'];
                            $produto = new Produto();
                            $dados = $produto->obterDados($id);
                            $data = date("D M d, Y G:i");
                            
                            if(isset($_POST['pedido'])){
                                
                                $pedido = new Pedido();
                                $pedido->insertPedido([$_SESSION['id'], $id, $data]);
                                header('location:perfil.php');
                            }

                            foreach ($dados as $dado):
                                
                                ?>


                                <h3>Editar Produto</h3>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">ID do Produto</label>
                                        <input type="text" class="form-control" value='<?= $id ?>' readonly style='background-color: white;'>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Nome</label>
                                        <input type="text" class="form-control" name='nome' value="<?= $dado['nm_produto'] ?>" readonly style='background-color: white;'>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Valor</label>
                                        <input type="text" class="form-control" name='valor' value="<?= $dado['vl_produto'] ?>" readonly style='background-color: white;'>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Descrição</label>
                                        <input type="text" class="form-control" name='ds' value="<?= $dado['ds_produto'] ?>" readonly style='background-color: white;'>
                                    </div>
                                    <h4>Imagem:</h4>
                                    <img src="<?= $dado['dir_foto']?>" class="img-thumbnail">
                                    <input type="submit" class='btn btn-dark' name='pedido' value='Comprar Produto'>
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
