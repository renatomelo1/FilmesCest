<?php
include "conexao.php";
include "index.html";
include "sessao.php";
include "principalgenero.php";

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
    <!-- Formulario -->
    <form method="post">
        <label>Remover</label>
        <input type="text" name="genero">

        <button type="submit">Excluir</button>


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