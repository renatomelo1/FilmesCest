<?php
include "conexao.php";
include "index.html";
include "sessao.php";
?>
<html>

<head>
    <meta charsaet="UTF-8">
    <title>Cadastro Filme</title>
</head>

<body>
    <!-- barra de navegação da página -->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="principal.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="cadastrofilme.php">Cadastrar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="removerfilme.php">Remover</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="updatefilme.php">Update</a>
        </li>
    </ul>

    <!-- Formulário de cadastro do filme -->
    <form method="post">
        Titulo Filme: <input type="text" name="titulo" type="submit" class="form-control" placeholder="Título Filme">
        <br>

        Gênero Filme:
        <select id="selectgenero" name="selectgenero" class="form-control">
            <option value="">--Escolha o Gênero do Filme--</option>
            <?php
            $conn = pg_connect(" host=localhost port=5432 user=postgres password=cest dbname=postgres");
            $resultado = pg_query($conn, "select * from genero;");

            while ($linhagenero = pg_fetch_assoc($resultado)) {
                echo "<option value=$linhagenero[codgenero] > $linhagenero[genero] </option> ";
            }
            pg_close($conn);
            ?>
        </select>
        <br>

        Sinopse Filme: <textarea type="text" name="sinopse" class="form-control" rows="3"></textarea>
        <br>

        <label for="formFile" class="form-label">Inserir link da imagem do filme:</label>
        <input class="form-control" type="link" name="poster">
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
    $conn = pg_connect(" host=localhost port=5432 user=postgres password=cest dbname=postgres");
    $titulo = $_POST['titulo'];
    $sql = "SELECT * FROM filmes WHERE nomefilme = '$titulo'";
    $query = pg_query($conn, $sql);

    if (pg_num_rows($query) > 0) {
        echo "Filme já cadastrado";
    } else if (strlen($_POST['titulo']) == 0) {
        echo "<h6> Algum campo vazio</h6>";
    } else if (strlen($_POST['sinopse']) == 0) {
        echo "<h6> Preencha campo sinopse </h6>";
    } else if (strlen($_POST['poster']) == 0) {
        echo "<h6> Faltou o campo poster  </h6>";
    } else {

        $titulo = $_POST['titulo'];
        $sinopse = $_POST['sinopse'];
        $poster = $_POST['poster'];
        $genero = $_POST['selectgenero'];

        $query = "insert into filmes(nomeFilme,sinopseFilme,posterFilme,codgenero) values('$titulo','$sinopse','$poster',$genero);";

        pg_query($conn, $query) or die("Houve um problema ao executar o comando sql: " . pg_last_error() . ". <br/>");

        echo "$genero";

        print "<h6><br>$titulo" . " adicionado ao catálogo de filmes</h6> ";

        // Encerrando conexão
        pg_close($conn);
    }
}
?>