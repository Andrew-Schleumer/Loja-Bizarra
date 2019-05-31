<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Editar Produto</title>
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
                            
                            if ($_SESSION['tipo'] != "fornecedor"){
                                header("location:index.php");
                            }
                            
                            $id = $_GET['idp'];
                            $produto = new Produto();
                            $dados = $produto->obterDados($id);
                            $nome = $_POST['nome'] ?? null;
                            $valor = $_POST['valor'] ?? null;
                            $ds = $_POST['ds'] ?? null;
                            $cam_foto = "uploads/" . $_SESSION['id'] . "/";



                            foreach ($dados as $dado):
                                $dir_foto = (String) $dado['dir_foto'];
                                if (isset($_POST['editProd'])) {
                                    if (!file_exists($cam_foto)) {
                                        mkdir($cam_foto);
                                    }

                                    if ($_FILES["file"]["error"] > 0) {
                                        
                                    } else {
                                        if (file_exists("upload/" . $_FILES["file"]["name"])) {
                                            echo $_FILES["file"]["name"] . " already exists. ";
                                        } else {

                                            move_uploaded_file($_FILES["file"]["tmp_name"], $cam_foto . $_FILES["file"]["name"]);
                                            $dir_foto = $cam_foto . $_FILES["file"]["name"];
                                        }
                                    }
                                    $produto = new Produto();

                                    $produto->editProduto($id, $nome, $valor, $ds, (String) $dir_foto);
                                }
                                ?>


                                <h3>Editar Produto</h3>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">ID do Produto</label>
                                        <input type="text" class="form-control" value='<?= $id ?>' readonly style='background-color: white;'>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Nome</label>
                                        <input type="text" class="form-control" name='nome' value="<?= $dado['nm_produto'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Valor</label>
                                        <input type="text" class="form-control" name='valor' value="<?= $dado['vl_produto'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Descrição</label>
                                        <input type="text" class="form-control" name='ds' value="<?= $dado['ds_produto'] ?>">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="foto">Mudar Foto</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name='file' value="<?= $dado['dir_foto'] ?>">
                                            <label class="custom-file-label" for="foto">Procurar</label>
                                        </div>
                                    </div>
                                    <input type="submit" class='btn btn-dark' name='editProd' value='Editar Produto'>
                                </form>
                                <h4>Imagen Atual:</h4>
                                <img src="<?= $dado['dir_foto'] ?>" class="thumbnail" width="250" height="250">
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'frags/footer.php'; ?>
    </body>
</html>
