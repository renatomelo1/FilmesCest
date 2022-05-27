<?php
include "conexao.php";
include "index.html";
include "sessao.php";
?>

<body>
    <!-- Barra de navegação secundária -->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="principal.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="cadastrofilme.php">Cadastrar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="removerfilme.php">Remover</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="updatefilme.php">Update</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="principalgenero.php">Gênero</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="perfil.php">Perfil</a>
        </li>

        <li class="nav-item" style="font-size:small; margin: 10px;">
            Bem vindo ao painel, <?php echo $_SESSION['nome']; ?>
        </li>
        <a style="font-size:small; margin: 10px;" href=" logout.php">Sair</a>

    </ul>

    <div class="row row-cols-4 row-cols-md-4 g-4">

        <?php while ($filme = pg_fetch_array($filmes)) : ?>

            <!-- Esqueleto para montar a carta do filme -->
            <div class="col ">
                <div class="card" style="width: 16rem; margin: 17px;">
                    <img src="<?php echo $filme["posterfilme"] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title" style="font-size:16px;"><?php echo $filme["nomefilme"] ?></h5>
                        <p class="card-text" style="font-size:12px;"><?php echo $filme["sinopsefilme"] ?></p>
                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                    </div>
                </div>
            </div>

        <?php endwhile ?>

    </div>
</body>