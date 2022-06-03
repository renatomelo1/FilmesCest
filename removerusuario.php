<?php
include "conexao.php";
include "index.html";
include "sessao.php";
include "perfil.php";
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
    <form method="post">
        <label>Retirar</label>
        <input type="text" name="nome">

        <button type="submit">Remover</button>


    </form>
</body>

</html>
<?php
if ($_POST) {
    $nome = $_POST['nome'];
    $sql = "SELECT * FROM usuario WHERE nome = '$nome'";
    $query = pg_query($conn, $sql);

    if (strlen($_POST['nome']) == 0) {
        echo "Preencha seue-mail";
    } else if (pg_num_rows($query) == 0) {
        echo "Usuario Enexistente";
    } else {
        // Adicionar gênero
        $nome = $_POST['nome'];

        $query = "delete from usuario where nome = '$nome'";

        pg_query($conn, $query) or die("Houve um problema no SQL:" . pg_last_error() . "<br>");

        print "<h6><br>Usuário  " . "$nome" . " removido do sistema ";

        pg_close($conn);
    }
}
?>