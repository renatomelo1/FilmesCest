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
    <title>Adicionar Gênero</title>
</head>

<body>

</body>

</html>
<?php
$resultado = pg_query($conn, "SELECT * FROM usuario;") or die("Houve um problema no SQL:" . pg_last_error() . "<br>");

// Encerrando conexão
pg_close($conn);
?>
<!-- Tabela de filmes -->
<table>
    <tr>
        <th>Id </th>
        <th>Usuario</th>
    </tr>
    <?php
    while ($linha = pg_fetch_array($resultado)) {
        print_r("<tr>");
        print_r("<td>" . $linha["id"] . "</td>");
        print_r("<td>" . $linha["nome"] . "</td>");
        print_r("</tr>");
    }
    ?>
</table>