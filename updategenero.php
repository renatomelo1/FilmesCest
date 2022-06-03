<?php
include "conexao.php";
include "index.html";
include "sessao.php";
include "principalgenero.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Gênero</title>
</head>

<body>
    <!-- Formulario -->
    <form method="post">
        Código do genero: <input class="form-control" type="number" name="codgenero">
        <br>

        Digite a alteração: <input class="form-control" type="text" name="genero">
        <br>

        <a href="#" class="btn btn-secondary btn-lg " tabindex="-1" role="button">Cancelar</a>
        <input type="submit" class="btn btn-primary btn-lg " tabindex="-1" role="button" value="Enviar">

    </form>
</body>

</html>
<?php
$resultado = pg_query($conn, "select * from genero;");

// Altera o nome de genero desejado
if ($_POST) {
    $codgenero = $_POST['codgenero'];
    $genero = $_POST['genero'];

    $query = " UPDATE genero SET genero='$genero'
    WHERE codgenero = $codgenero;";

    pg_query($conn, $query) or die("Houve um problema ao executar o comando sql:  " . pg_last_error() . ". <br/>");
    print "<h6><br>$codgenero" . " teve seu nome alterado. </br></h6>";

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
        print_r("<td>" . $linha["genero"] . "</td>");
        print_r("<td>" . $linha["codgenero"] . "</td>");
        print_r("</tr>");
    }
    ?>
</table>