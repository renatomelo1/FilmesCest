<?php
include "conexao.php";
include "index.html";
include "sessao.php";
?>

<html>

<head>
    <meta charsaet="UTF-8">
    <title>Remover Filme</title>
</head>

<body>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

    <!-- Barra de navegação  -->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="principal.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="cadastrofilme.php">Cadastrar</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link active" href="removerfilme.php">Remover</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="updatefilme.php">Update</a>
        </li>
    </ul>

    <!-- Formulario para remover o filme -->
    <form method="post">
        Nome do Filme: <input type="text" name="titulo" class="form-control">
        <br>
        <button style="font-style: normal;" class="btn btn-danger btn-md bi bi-trash-fill" tabindex="-1" role="button"> Remover</button>

    </form>
    <br>

</html>

<?php
// Remove filmes do catálogo.
if ($_POST) {
    $titulo = $_POST['titulo'];

    $query = "DELETE FROM filmes WHERE nomefilme = '$titulo';";

    pg_query($conn, $query) or die("Houve um problema ao executar o comando sql: " . pg_last_error() . ". <br/>");


    print "<h6>$titulo" . " removido do catalogo </h6>";


    // Encerrando conexão
    pg_close($conn);
}

?>