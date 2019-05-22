<style>
    html{ height:100%; }
    body{ min-height:100%; padding:0; margin:0; position:relative; }

    body::after{ content:''; display:block; height:100px; }

    .footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 50px;
    }

    body {
        width: 100%;
        height: 400px;
        background-size: 100% 100%;
    }

    .transparent{
        background:rgba(255,255,255,0.5);
    }

</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
        <img src="imgs/doria.jpg" width="30" height="30" alt="">
    </a>
    <span class="navbar-brand mb-0 h1">Loja Bizarra</span>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link active" href="#">Perfil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#">Produtos</a>
            </li>

        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar roduto" aria-label="Pesquisar produto">
            <button class="btn btn-light my-2 my-sm-0" type="submit">Pesquisar</button>
        </form>
    </div>
</nav>