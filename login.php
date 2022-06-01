<?php
include "conexao.php";
include "index.html"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width,initial-scale-1.0">
    <title>Login</title>
</head>

<body>
    <div>
        <!-- Pills navs -->

        <form class="form-outline" method="POST">

            <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active btn btn-secondary btn-md" id="tab-login" data-mdb-toggle="pill" href="login.php" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link btn btn-secondary btn-md" id="tab-register" data-mdb-toggle="pill" href="cadastrousuario.php" role="tab" aria-controls="pills-register" aria-selected="false">Cadastro</a>
                </li>
            </ul>

            <br>
            <div class="form-outline mb-3">
                Nome<input type="text" id="loginName" class="form-control" name="nome" />
            </div>

            <p>
            <div class="form-outline mb-3">
                Senha<input class="form-control" type="password" name="senha">
                <br>
            </div>

            <div class="mb-3">
                <!-- <a class="btn btn-secondary btn-lg " tabindex="-1" role="button" href="cadastrousuario.php">Cadastrar-se</a> -->
                <input type="submit" value="Entrar" class="btn btn-primary btn-lg " tabindex="-1" role="button">
            </div>
            </p>

        </form>



    </div>
</body>

</html>

<?php
if (isset($_POST['nome']) && isset($_POST['senha'])) {

    if (strlen($_POST['nome']) == 0) {
        echo "Preencha seue-mail";
    } else if (strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $nome = pg_escape_string($_POST['nome']);
        $senha = pg_escape_string($_POST['senha']);

        $sql = "select * from usuario where nome = '$nome' and senha = md5('$senha')";

        $query = pg_query($conn, $sql) or die("Encontrou um erro ao executar determinada instrução sql: " . pg_last_error() . ". <br/>");

        $quantidade = pg_num_rows($query);

        if ($quantidade == 1) {

            $usuario = pg_fetch_assoc($query);

            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            header("Location: principal.php");
        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }
    }
}

?>