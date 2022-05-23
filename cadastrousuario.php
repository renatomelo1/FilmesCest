<?php
include "conexao.php";
include "index.html";
include "sessao.php";
?>
<html>

<head>
    <meta charsaet="UTF-8">
    <title>Cadastro usuário</title>
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
            <a class="nav-link " href="principalgenero.php">Gênero</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active " href="perfil.php">Perfil</a>
        </li>
        <li class="nav-item" style="font-size:small; margin: 10px;">
            Bem vindo ao painel, <?php echo $_SESSION['nome']; ?>
        </li>
        <a style="font-size:small; margin: 10px;" href="logout.php">Sair</a>
    </ul>
    <!-- barra de navegação da página -->
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

    <!-- Formulário de cadastro do filme -->
    <form method="post">
        Nome: <input type="text" name="nome" type="submit" class="form-control" placeholder="Nome">
        <br>

        E-mail: <input type="email" name="email" class="form-control"></input>
        <br>

        Senha: <input type="password" name="senha" class="form-control"></input>
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
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $query = "INSERT INTO usuario (nome, email, senha) VALUES ( '$nome', '$email', md5('$senha'));";

    pg_query($conn, $query) or die("Houve um problema ao executar o comando sql: " . pg_last_error() . ". <br/>");

    print "<h6><br>Nome usuário" . " $nome adicionado";

    // Encerrando conexão
    pg_close($conn);
}
?>