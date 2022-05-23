<?php
include "conexao.php";
include "index.html";
include "sessao.php";
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
    <!-- Barra de navegação secundária -->
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
            <a class="nav-link " href="updatefilme.php">Update</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active " href="genero.php">Gênero</a>
        </li>
        <li class="nav-item">
            <a class="nav-link  " href="perfil.php">Perfil</a>
        </li>
        <li class="nav-item" style="font-size:small; margin: 10px;">
            Bem vindo ao painel, <?php echo $_SESSION['nome']; ?>
        </li>
        <a style="font-size:small; margin: 10px;" href=" logout.php">Sair</a>
    </ul>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" href="cadastrousuario.php">Cadastrar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="removerusuario.php">Remover</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="updateusuario.php">Update</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="listarusuario.php">Listar</a>
        </li>
    </ul>
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