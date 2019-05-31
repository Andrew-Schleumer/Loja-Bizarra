<style>

    html{ height:100%; }
    body{ min-height:100%; padding:0; margin:0; position:relative; }

    body::after{ content:''; display:block;}



    body {
        width: 100%;
        height: 400px;
        background-image: url("imgs/background.jpg");
        background-size: 100% 100%;

    }

    .card-img-top {
        width: 100%;
        height: 300px;
        object-fit: cover;
    }

</style>

<?php
session_start();
require 'classes/Conexao.php';
require 'classes/Conta.php';
require 'classes/Produto.php';
require 'classes/Pedido.php';



$login = $_POST['login'] ?? null;
$senha = $_POST['senha'] ?? null;

if ($login != null && $senha != null) {

    $conta = new Conta;
    $dados = $conta->obterLogin($login, $senha);

    if ($dados != null) {

        foreach ($dados as $dado) {
            $_SESSION['nome'] = $dado['nm_nome'];
            $_SESSION['id'] = $dado['id_conta'];
            $_SESSION['tipo'] = $dado['nm_tipo'];
        }
    }
}
?>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="imgs/doria.jpg">
        <img src="imgs/doria.jpg" width="30" height="30" alt="">
    </a>

    <span class="navbar-brand mb-0 h1"><a href="index.php" class="text-reset">Loja Bizarra</a></span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <?php if (!isset($_SESSION['nome'])): ?> 
                <li class="nav-item">
                    <a class="nav-link active" href="login.php">Login</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link active" href="perfil.php">Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="logout.php">Logout</a>
                </li>
            <?php endif ?>
        </ul>
    </div>
</nav>