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
    <form class="form-outline" method="post">
        <!-- Pills navs -->
        <ul class="nav nav-pills nav-justified mb-4" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link btn btn-secondary btn-md " id="tab-login" data-mdb-toggle="pill" href="login.php" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link active btn btn-secondary btn-md" id="tab-register" data-mdb-toggle="pill" href="cadastrousuario.php" role="tab" aria-controls="pills-register" aria-selected="false">Cadastro</a>
            </li>
        </ul>

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
    $sql = "SELECT * FROM usuario WHERE nome = '$nome'";
    $query = pg_query($conn, $sql);

    if (strlen($_POST['nome']) == 0) {
        echo "Preencha seu nome";
    } else if (strlen($_POST['email']) == 0) {
        echo "Preencha seu email";
    } else if (pg_num_rows($query) > 0) {
        echo "Usuario Já cadastrado";
    } else {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $query = "INSERT INTO usuario (nome, email, senha) VALUES ( '$nome', '$email', md5('$senha'));";

        pg_query($conn, $query) or die("Houve um problema ao executar o comando sql: " . pg_last_error() . ". <br/>");

        print "<h6><br>Nome usuário" . " $nome adicionado";

        // Encerrando conexão
        pg_close($conn);
    }
}
?>