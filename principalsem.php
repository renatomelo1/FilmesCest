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
            <a class="nav-link disabled" href="cadastrofilme.php">Cadastrar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="removerfilme.php">Remover</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="updatefilme.php">Update</a>
        </li>
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
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

        <?php endwhile ?>

    </div>