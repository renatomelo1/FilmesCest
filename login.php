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
    <h1>Acesse sua conta</h1>
    <form action="" method="POST">
        <p>
            <label>Nome</label>
            <input type="text" name="nome">
        </p>
        <p>
            <label>Senha</label>
            <input type="password" name="senha">
            <br><br>
            <button type="submit">Enviar</button>
        </p>

    </form>
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