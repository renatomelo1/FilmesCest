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
    <title>Adicionar Gênero</title>
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
            <a class="nav-link active " href="listargenero.php">Gênero</a>
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
            <a class="nav-link" href="cadastrogenero.php">Cadastrar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="removergenero.php">Remover</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="updategenero.php">Atualizar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="listargenero.php">Listar</a>
        </li>
    </ul>
    <form method="post">
        <label>Retirar</label>
        <input type="text" name="genero">

        <button type="submit">Remover</button>


    </form>
</body>

</html>
<?php
if ($_POST) {
    // Adicionar gênero
    $genero = $_POST['genero'];

    $query = "delete from genero where genero = '$genero'";

    pg_query($conn, $query) or die("Houve um problema no SQL:" . pg_last_error() . "<br>");

    print "<h6><br>Gênero removido do sistema " . "$genero";

    pg_close($conn);
}
?>