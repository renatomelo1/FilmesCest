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
            <a class="nav-link" href="principal.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="cadastrofilme.php">Cadastrar</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link " href="removerfilme.php">Remover</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="updatefilme.php">Update</a>
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

<!-- Tabela de filmes -->
<table>
    <tr>
        <th>Nome Filmes</th>
        <th>Id Filmes</th>
    </tr>
    <?php
    while ($linha = pg_fetch_array($resultado)) {
        print_r("<tr>");
        print_r("<td>" . $linha["nomefilme"] . "</td>");
        print_r("<td>" . $linha["codfilme"] . "</td>");
        print_r("</tr>");
    }
    ?>
</table>