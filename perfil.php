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
    <title>Perfil</title>
</head>

<body>
    <!-- Barra de navegação -->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link " href="principal.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="cadastrofilme.php">Cadastrar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="removerfilme.php">Remover</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="updatefilme.php">Update</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="principalgenero.php">Gênero</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="perfil.php">Perfil</a>
        </li>

        <li class="nav-item " style="font-size:14px; margin: 10px;margin-left: 200px; font-family: 'Times New Roman', Times, serif; ">
            <strong>Bem vindo ao painel, <?php echo $_SESSION['nome']; ?></strong>
            <a style="font-size:small; margin-left: 280px;" href=" logout.php">Sair</a>
        </li>

    </ul>



    <!-- Barra de navegação secundária -->
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link " href="removerusuario.php">Remover</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="updateusuario.php">Atualizar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="listarusuario.php">Listar</a>
        </li>
    </ul>
</body>

</html>