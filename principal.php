<?php
include "conexao.php";
include "index.html";
include "sessao.php";
?>

<body>
    <!-- Barra de Navegação -->
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

        <li class="" style="font-size:14px; margin: 10px;margin-left: 200px; font-family: 'Times New Roman', Times, serif; ">
            <strong>Bem vindo ao painel, <?php echo $_SESSION['nome']; ?></strong>
            <a style="font-size:small; margin-left: 280px;" href=" logout.php">Sair</a>
        </li>

    </ul>
    <!-- Loop do formado do filme -->
    <div class="d-flex bd-highlight mb-3">
        <?php while ($filme = pg_fetch_array($filmes)) : ?>

            <!-- Esqueleto para montar a carta do filme -->
            <div class="">
                <div class="card" style="width: 16rem; margin: 17px;">
                    <img src="<?php echo $filme["posterfilme"] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title" style="font-size:16px;"><?php echo $filme["nomefilme"] ?></h5>
                        <p class="card-text" style="font-size:12px;"><?php echo $filme["sinopsefilme"] ?> <br> <strong>Gênero:</strong> <?php echo $filme["genero"] ?></p>
                        <br>
                    </div>
                </div>
            </div>

        <?php endwhile ?>

    </div>
</body>