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
    <title>Gênero</title>
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
</body>

</html>