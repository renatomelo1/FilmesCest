<?php include "cabecalho.php" ?>
<?php include "inserir.html"; ?>


<!-- Formulário para alterar titulo -->
<form method="post" style="margin: 20px;">
    Código do filme: <input class="form-control" type="number" name="codfilme">
    <br>

    Digite a alteração: <input class="form-control" type="text" name="titulo">
    <br>

    <a href="#" class="btn btn-secondary btn-lg " tabindex="-1" role="button">Cancelar</a>
    <input type="submit" class="btn btn-primary btn-lg " tabindex="-1" role="button" value="Enviar">

</form>

<?php
// Conecta banco de dados
$conn = pg_connect(" host=localhost port=5432 user=postgres password=cest dbname=postgres");
// Executa a consulta no banco de dados
$resultado = pg_query($conn, "select * from filmes;");

// Altera o nome de filme desejado
if ($_POST) {
    $codfilme = $_POST['codfilme'];
    $titulo = $_POST['titulo'];

    $query = " UPDATE filmes SET nomefilme='$titulo'
    WHERE codfilme = $codfilme;";

    pg_query($conn, $query) or die("Encountered an error when executing given sql statement: " . pg_last_error() . ". <br/>");
    print "<h6><br>$codfilme" . " teve seu nome alterado. </br></h6>";

    // Encerrando conexão
    pg_close($conn);
}


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