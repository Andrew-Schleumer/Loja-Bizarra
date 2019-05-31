<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Login</title>
    </head>
    <body >

        <?php include 'frags/header.php'; ?>
        
        <div class="container">

            <div class="row justify-content-center">

                <div class="col-8" style="background-color: rgba(245, 245, 245, 0.4);">

                    <form method="post" action="index.php">
                        <div class="form-group">
                            <label for="login">Login</label>
                            <input type="text" class="form-control" id="login" aria-describedby="emailHelp" placeholder="Nome de Login" name="login">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Senha</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha" name="senha">
                        </div>
                        <input type="submit" name="formLogin" class="btn btn-dark" value="Logar">
                    </form>
                    <br>
                    <a href="cadastro.php"><button class="btn btn-dark">Cadastrar</button></a>
                </div>
            </div>
        </div>



        <?php include 'frags/footer.php'; ?>

    </body>

</html>