<?php
include "conexao.php";
include "index.html";
include "sessao.php";
?>
<html>

<head>
    <meta charsaet="UTF-8">
    <title>Alterar Nome Filme</title>
</head>

<body>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

    <!-- Barra de navegação  -->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link " href="principal.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="cadastrofilme.php">Cadastrar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="removerfilme.php">Remover</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="updatefilme.php">Update</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="principalgenero.php">Gênero</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="perfil.php">Perfil</a>
        </li>

        <li class="nav-item " style="font-size:14px; margin: 10px;margin-left: 200px; font-family: 'Times New Roman', Times, serif; ">
            <strong>Bem vindo ao painel, <?php echo $_SESSION['nome']; ?></strong>
            <a style="font-size:small; margin-left: 280px;" href=" logout.php">Sair</a>
        </li>

    </ul>

    <!-- Formulário para alterar titulo -->
    <form method="post" style="margin: 20px;">
        Código do filme: <input class="form-control" type="number" name="codfilme">
        <br>

        Digite a alteração: <input class="form-control" type="text" name="titulo">
        <br>

        <a href="#" class="btn btn-secondary btn-lg " tabindex="-1" role="button">Cancelar</a>
        <input type="submit" class="btn btn-primary btn-lg " tabindex="-1" role="button" value="Enviar">

    </form>

</html>



<?php
$resultado = pg_query($conn, "select * from filmes;");

// Altera o nome de filme desejado
if ($_POST) {
    $codfilme = $_POST['codfilme'];
    $titulo = $_POST['titulo'];

    $query = " UPDATE filmes SET nomefilme='$titulo'
    WHERE codfilme = $codfilme;";

    pg_query($conn, $query) or die("Houve um problema ao executar o comando sql:  " . pg_last_error() . ". <br/>");
    print "<h6><br>$codfilme" . " teve seu nome alterado. </br></h6>";

    // Encerrando conexão
    pg_close($conn);
}

?>

<!-- Lista Filmes -->
<div class="d-flex bd-highlight mb-4">

    <?php while ($filme = pg_fetch_array($filmes)) : ?>

        <!-- Esqueleto para montar a carta do filme -->
        <div class="p-3">
            <div class="card" style="width: 10rem;">
                <img src="<?php echo $filme["posterfilme"] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title" style="font-size:10px;"><?php echo $filme["nomefilme"] ?></h5>
                    <p class="card-text" style="font-size:10px;">
                        Codigo: <?php echo $filme["codfilme"] ?>
                    </p>

                </div>
            </div>
        </div>

    <?php endwhile ?>