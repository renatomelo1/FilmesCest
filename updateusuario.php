<?php
include "conexao.php";
include "index.html";
include "sessao.php";
include "perfil.php";
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
    <form method="post">
        Código do genero: <input class="form-control" type="number" name="id">
        <br>

        Digite a alteração: <input class="form-control" type="text" name="nome">
        <br>

        <a href="#" class="btn btn-secondary btn-lg " tabindex="-1" role="button">Cancelar</a>
        <input type="submit" class="btn btn-primary btn-lg " tabindex="-1" role="button" value="Enviar">

    </form>
</body>

</html>
<?php
$resultado = pg_query($conn, "select * from usuario;");

// Altera o nome de genero desejado
if ($_POST) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];

    $query = " UPDATE usuario SET nome='$nome'
    WHERE id = $id;";

    pg_query($conn, $query) or die("Houve um problema ao executar o comando sql:  " . pg_last_error() . ". <br/>");
    print "<h6><br>$id" . " teve seu nome alterado. </br></h6>";

    // Encerrando conexão
    pg_close($conn);
}

?>

<!-- Tabela de filmes -->
<table>
    <tr>
        <th>Id </th>
        <th>Usuario</th>
    </tr>
    <?php
    while ($linha = pg_fetch_array($resultado)) {
        print_r("<tr>");
        print_r("<td>" . $linha["id"] . "</td>");
        print_r("<td>" . $linha["nome"] . "</td>");
        print_r("</tr>");
    }
    ?>
</table>