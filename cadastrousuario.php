<?php
include "conexao.php";
include "index.html";
?>
<html>

<head>
    <meta charsaet="UTF-8">
    <title>Cadastro usuário</title>
</head>

<body>
    <!-- Formulário de cadastro do filme -->
    <form class="form-control" method="post">
        Nome: <input type="text" name="nome" type="submit" class="form-control" placeholder="Nome">
        <br>

        E-mail: <input type="email" name="email" class="form-control"></input>
        <br>

        Senha: <input type="password" name="senha" class="form-control"></input>
        <br>

        <!-- Botões de cancelar e cadastrar -->
        <input type="reset" value="Cancelar" class="btn btn-secondary btn-lg " tabindex="-1" role="button">
        <a href="login.php" type="submit" class="btn btn-primary btn-lg " tabindex="-1" role="button">Cadastrar</a>
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