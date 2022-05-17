<?php include "cabecalho.php" ?>
<?php
// conecta banco de dados
$conn = pg_connect(" host=localhost port=5432 user=postgres password=cest dbname=postgres");
// E xecuta a consulta no banco de dados
$filmes = pg_query($conn, "select * from filmes;");

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
    </ul>
    <!-- barra de naveção desativada -->
    <!-- <nav class="nav bar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="principal.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cadastrofilme.php">Cadastro</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Funções
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="conexao.php">Filmes Do BD</a></li>
                            <li><a class="dropdown-item" href="removerfilme.php">remover filme</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex" style="margin-bottom:10px">
                    <input class="form-control me-3" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav> -->
    <div class="row row-cols-4 row-cols-md-4 g-4">

        <?php while ($filme = pg_fetch_array($filmes)) : ?>

            <!-- Esqueleto para montar a carta do filme -->
            <div class="col ">
                <div class="card" style="width: 16rem; margin: 17px;">
                    <img src="<?php echo $filme["posterfilme"] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title" style="font-size:16px;"><?php echo $filme["nomefilme"] ?></h5>
                        <p class="card-text" style="font-size:12px;"><?php echo $filme["sinopsefilme"] ?></p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

        <?php endwhile ?>

    </div>