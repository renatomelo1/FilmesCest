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
    <!-- Formulário de cadastro do usuario -->
    <form class="form-outline" method="post">
        <!-- Pills navs -->
        <ul class="nav nav-pills nav-justified-center mb-3 w-50" id="ex1" role="tablist">
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
    // variavel para usuário já cadastrado
    $nome = $_POST['nome'];
    $sql = "SELECT * FROM usuario WHERE nome = '$nome'";
    $query = pg_query($conn, $sql);

    // Caso receba algum campo vazio
    if (strlen($_POST['nome']) == 0) {
        echo "<h6>Preencha seu nome</h6>";
    } else if (strlen($_POST['email']) == 0) {
        echo "<h6>Preencha seu e-mail</h6>";
    } else if (strlen($_POST['senha']) == 0) {
        echo "<h6>Preencha sua senha</h6>";
    } else if (pg_num_rows($query) > 0) {
        echo "<h6>Usuario já cadastrado";
    } else {
?>
        <h6>
            <div class="alert alert-success alert-dismissible d-flex align-items-center w-50 p-3" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                Cadastrado com SUCESSO
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </h6>
<?php
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $query = "INSERT INTO usuario (nome, email, senha) VALUES ( '$nome', '$email', md5('$senha'));";

        pg_query($conn, $query) or die("Houve um problema ao executar o comando sql: " . pg_last_error() . ". <br/>");

        // Encerrando conexão
        pg_close($conn);
    }
}
?>