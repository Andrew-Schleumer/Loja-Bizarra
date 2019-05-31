<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Adicionar Produto</title>
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
                            $nome = $_POST['nome'] ?? null;
                            $valor = $_POST['valor'] ?? null;
                            $ds = $_POST['ds'] ?? null;
                            $cam_foto = "uploads/" . $_SESSION['id'] . "/";
                            $dir_foto;
                            
                            if(isset($_POST['addProd'])) {
                                if(!file_exists($cam_foto)){
                                    mkdir($cam_foto);
                                }
                                
                                
                                if ($_FILES["file"]["error"] > 0) {
                                    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
                                } else {
                                    if (file_exists("upload/" . $_FILES["file"]["name"])) {
                                        echo $_FILES["file"]["name"] . " already exists. ";
                                    } else {
                                        move_uploaded_file($_FILES["file"]["tmp_name"], $cam_foto . $_FILES["file"]["name"]);
                                        $dir_foto = $cam_foto . $_FILES["file"]["name"];
                                    }
                                }
                                $produto = new Produto();
                                $produto->insertProduto([$nome, $valor, $ds, (int)$_SESSION['id'], (String)$dir_foto]);
                            }
                            
                            ?>
                            <h3>Editar Perfil</h3>
                            <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">ID do Fornecedor</label>
                                    <input type="text" class="form-control" value='<?= $_SESSION['id'] ?>' readonly style='background-color: white;'>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Nome</label>
                                    <input type="text" class="form-control" name='nome' >
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Valor</label>
                                    <input type="text" class="form-control" name='valor' >
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Descrição</label>
                                    <input type="text" class="form-control" name='ds'>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="foto">Adicionar Foto</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name='file'>
                                        <label class="custom-file-label" for="foto">Procurar</label>
                                    </div>
                                </div>
                                <input type="submit" class='btn btn-dark' name='addProd' value='Adicionar Produto'>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'frags/footer.php'; ?>
    </body>
</html>
