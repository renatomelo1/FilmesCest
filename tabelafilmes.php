<?php
// Conecta banco de dados
$conn = pg_connect(" host=localhost port=5432 user=postgres password=cest dbname=postgres");
// Executa a consulta no banco de dados
$resultado = pg_query($conn, "select * from filmes;");
?>
<!-- Tabela de filmes -->
<table>
    <tr>
        <th>Nome Filmes</th>
        <th>Id Filmes</th>
    </tr>

    <?php
    while ($linha = pg_fetch_array($resultado)) {
        print_r("<tr>");
        print_r("<td>" . $linha["nomefilme"] . "</td>");
        print_r("<td>" . $linha["codfilme"] . "</td>");
        print_r("</tr>");
    }
    ?>
</table>