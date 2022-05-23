<?php
include "conexao.php";
include "index.html";
include "sessao.php";
?>
<html>

<head>
    <meta charsaet="UTF-8">
    <title>Cadastro Filme</title>
</head>

<body>
    <!-- barra de navegação da página -->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="principal.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="cadastrofilme.php">Cadastrar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="removerfilme.php">Remover</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="updatefilme.php">Update</a>
        </li>
    </ul>

    <!-- Formulário de cadastro do filme -->
    <form method="post">
        Titulo Filme: <input type="text" name="titulo" type="submit" class="form-control" placeholder="Título Filme">
        <br>

        Sinopse Filme: <textarea type="text" name="sinopse" class="form-control" rows="3"></textarea>
        <br>

        <label for="formFile" class="form-label">Inserir link da imagem do filme:</label>
        <input class="form-control" type="link" name="poster">
        <br>

        <!-- Botões de cancelar e cadastrar -->
        <input type="reset" value="Cancelar" class="btn btn-secondary btn-lg " tabindex="-1" role="button">
        <input type="submit" value="Cadastrar" class="btn btn-primary btn-lg " tabindex="-1" role="button">
        <br>
    </form>
</body>

</html>


<?php
// Adiciona filmes ao cátalogo
if ($_POST) {
    $titulo = $_POST['titulo'];
    $sinopse = $_POST['sinopse'];
    $poster = $_POST['poster'];

    $query = "insert into filmes(nomeFilme,sinopseFilme,posterFilme) values('$titulo','$sinopse','$poster');";

    pg_query($conn, $query) or die("Houve um problema ao executar o comando sql: " . pg_last_error() . ". <br/>");

    print "<h6><br>$titulo" . " adicionado ao catálogo de filmes</h6> ";

    // Encerrando conexão
    pg_close($conn);
}
?>